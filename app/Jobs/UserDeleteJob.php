<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\UserDeleteNotifiaction;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserDeleteJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void


    {
        logger($this->user->name .'job');
        $this->user->notify(new UserDeleteNotifiaction($this->user));
        $this->user->delete();
    }
}
