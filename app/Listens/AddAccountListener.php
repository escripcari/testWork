<?php

namespace App\Listens;

use App\Events\AddAccountEvent;
use App\Mail\TestMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AddAccountListener
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
     * @param  AddAccountEvent  $event
     * @return void
     */
    public function handle(AddAccountEvent $event)
    {
        Mail::to($event->user->email)->send(new TestMail($event->send()));
    }
}
