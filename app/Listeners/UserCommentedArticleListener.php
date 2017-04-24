<?php

namespace App\Listeners;

use App\Events\UserCommentedArticleEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserCommentedArticleListener implements ShouldQueue
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
     * @param  UserCommentedArticleEvent  $event
     * @return void
     */
    public function handle(UserCommentedArticleEvent $event)
    {
        echo json_encode($event);
        sleep(5);
    }
}
