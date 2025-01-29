<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\UserSaved;
use App\Services\UserService;
class SaveUserBackgroundInformation
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
     * Handle the event.
     */
    
     public function handle(UserSaved $event)
     {
         $user = $event->user;
 
         $data = [

            'user_id' => $user->id,
            'key' => 'up_'.$user->id,
            'value' => json_encode([
                'full_name' => "{$user->firstname} {$user->middlename} {$user->lastname}",
                'middle_initial' => $user->middlename ? strtoupper($user->middlename[0]) : null,
                'avatar' => $user->photo ?? null,
                'gender' => $this->userService->getGenderFromNamePrefix(explode(' ', $user->firstname)[0]),
            ]),
            'icon' => $user->avatar_icon ?? 'default-icon.png',
            'status' => 'active',
            'type' => 'profile',


         ];
 
         $this->userService->saveUserDetails($data);
    }
}   
