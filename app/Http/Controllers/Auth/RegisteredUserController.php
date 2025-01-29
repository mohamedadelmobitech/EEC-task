<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Storage;
use App\Services\UserService;

class RegisteredUserController extends Controller
{


    protected $userService;

    /**
    * Create the event listener.
    */
   public function __construct(UserService $userService)
   {   
       // inject the UserService class
       $this->userService = $userService;
   }


    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'avatar' => 'nullable|max:2048', 
        ]);
        $avatarValue = null;

        if($request->has('avatar')) {
            foreach ($request->avatar as $avatar) {
                $avatarValue =    $this->handle_file($avatar, 'public', 'avatars');
            }
        }

        $user = User::create([
            'full_name' =>  "{$request->firstname} {$request->middlename} {$request->lastname}",
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'middle_initial' => $request->middlename ? strtoupper($request->middlename[0]) : null,
            'gender' => $this->userService->getGenderFromNamePrefix(explode(' ', $request->firstname)[0]),
            'avatar' => $avatarValue != null ? $avatarValue['file'] :  'default-avatar.png',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    function handle_file($file, $sotrage_disk, $dir = null)
    {
        if ($dir != null) {
            $file = Storage::disk($sotrage_disk)->put($dir, $file);
        } else {
            $file = Storage::disk($sotrage_disk)->put('', $file);
        }

        $url = Storage::disk($sotrage_disk)->url($file);
        $data = [
            'file' => $file,
            'url' => $url
        ];
        return $data;
    }

}
