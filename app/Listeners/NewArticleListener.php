<?php

namespace App\Listeners;

use App\Events\NewArticleEvent;
use App\Mail\NewArticleMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewArticleListener
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
    public function handle(NewArticleEvent $event): void
    {
        Mail::to('admin@mail.com')->send(new NewArticleMail($event->article));
    }
}
