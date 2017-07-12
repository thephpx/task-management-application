<?php

namespace App\Listeners;

use App\Crew;
use App\Events\Registration;
use App\Repositories\CrewsRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registration  $event
     * @return void
     */
    // create a test crew for this new user
    public function handle(Registration $event)
    {

        CrewsRepository::createCrew([
            'name'    => $event->user->name . 'Test',
            'user_id' => $event->user->id,
            'persons'  => 0,
            'type'     => 1
        ]);

    }
}
