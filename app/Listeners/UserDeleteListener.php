<?php

namespace App\Listeners;

use App\Events\UserDeleteEvent;
use App\Jobs\UserDeleteJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserDeleteListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserDeleteEvent $event): void
    {

        logger("User deleted: {$event->user->id}");
        UserDeleteJob::dispatch($event->user);
    }
}
