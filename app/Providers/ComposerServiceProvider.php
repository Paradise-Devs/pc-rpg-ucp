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
                $new_msg_count = Message::where('user_id', $user->id)->where('receiver_id', $user->id)->where('read', false)->count();
                $view->with('user', $user);
                $view->with('new_msg_count', $new_msg_count);
                if($new_msg_count > 0)
                {
                    $new_messages = Message::where('user_id', $user->id)->where('receiver_id', $user->id)->where('read', false)->take(5)->get();
                    $view->with('new_messages', $new_messages);
                }
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
