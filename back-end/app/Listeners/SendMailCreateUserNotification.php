<?php

namespace App\Listeners;

use App\Events\CreateUserEvent;
use App\Notifications\UserCreateNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendMailCreateUserNotification
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
     * @param  \App\Events\CreateUserEvent  $event
     * @return void
     */
    public function handle(CreateUserEvent $event)
    {
        Notification::send($event->user, new UserCreateNotificationMail($event->user));
    }
}
