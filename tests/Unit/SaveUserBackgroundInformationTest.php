<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Events\UserSaved;
use App\Listeners\SaveUserBackgroundInformation;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

class SaveUserBackgroundInformationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_handles_user_saved_event()
    {
        // Create a User instance
        $user = User::factory()->create();

        // Mock UserService to expect saveUserDetails to be called with correct data
        $serviceMock = $this->createMock(UserService::class);
        $serviceMock->expects($this->once())
            ->method('saveUserDetails')
            ->with($this->callback(function($data) use ($user) {
                // Ensure the data passed to saveUserDetails contains the expected user ID
                return isset($data['user_id']) && $data['user_id'] === $user->id;
            }));

        // Create the listener and pass the mock service
        $listener = new SaveUserBackgroundInformation($serviceMock);

        // Call the handle method directly with the UserSaved event
        $listener->handle(new UserSaved($user));

        // Since we're testing the listener's behavior, there's no need to assert event dispatch
        // We're verifying that saveUserDetails is called on the mock service
    }
}
