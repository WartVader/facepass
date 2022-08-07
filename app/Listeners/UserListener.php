<?php

namespace App\Listeners;

use App\Events\FriendsRecieved;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Services\VkImportUserService;
use App\Services\VkUserAdapter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;

class UserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    /* public function __construct()
    {
        //
    } */

    /**
     * Handle the event.
     *
     * @param  \App\Events\FriendsRecieved  $event
     * @return void
     */
    public function handle(FriendsRecieved $event)
    {
        VkImportUserService::import($event->friends);
    }
}
