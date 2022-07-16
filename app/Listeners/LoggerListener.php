<?php

namespace App\Listeners;

use App\Events\LoggerEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoggerListener
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
     * @param  \App\Events\LoggerEvent  $event
     * @return void
     */
    public function handle(LoggerEvent $event)
    {
        //
    }
}
