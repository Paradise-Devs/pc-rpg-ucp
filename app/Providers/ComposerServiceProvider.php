<?php
namespace App\Providers;

use Auth;
use View;
use App\Message;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using Closure based composers...
        View::composer('*', function($view)
        {
            if(Auth::check())
            {
                $user = Auth::user();
                $unreadNotifications = $user->notifications()->unread()->get();
                $unreadMessages = $user->notifications()->unread()->message()->count();
                $view->with('unreadMessages', $unreadMessages);
                $view->with('notifications', $unreadNotifications);
            }
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
