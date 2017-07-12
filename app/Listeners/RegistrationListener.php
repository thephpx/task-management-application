<?php

namespace App\Listeners;

use App\Events\Registration;
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



    }
}
