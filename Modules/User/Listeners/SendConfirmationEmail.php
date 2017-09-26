<?php

namespace Modules\User\Listeners;

use Illuminate\Auth\Events\Registered;
use Modules\User\Notifications\UnconfirmedEmail;

class SendConfirmationEmail
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        if (! $event->user->confirmed) {
            $event->user->notify(new UnconfirmedEmail);
        }
    }
}
