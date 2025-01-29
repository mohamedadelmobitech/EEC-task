<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Events\UserSaved;
use App\Listeners\SaveUserBackgroundInformation;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    
    // define the event to listener mappings
    protected $listen = [
        UserSaved::class => [
            SaveUserBackgroundInformation::class,
        ],
    ];
    

  
    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
