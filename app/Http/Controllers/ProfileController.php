<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use App\Utils;

use Auth;
use Redirect;
use Image;
use Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function config()
    {
        $profileDetails = Auth::user();
        return view('pages.profile.edit', ['profile' => $profileDetails]);
    }

    public function info(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:10|max:40',
            'bio' => 'max:200'
        ]);

        $fields = [
            'name' => $request->input('name'),
            'bio' => $request->input('bio'),
            'twitter_url' => $request->input('twitter_url'),
            'facebook_url' => $request->input('facebook_url'),
            'github_url' => $request->input('github_url')
        ];

        User::where('id', Auth::user()->id)->update($fields);
        return Redirect::to('perfil/configuracoes')->with('success', true);
    }

    public function avatar(Request $request)
    {
        if($request->hasFile('file2'))
        {
            $this->validate($request, [
                'file2' => 'required|mimes:jpeg,jpg,png,gif|max:500'
            ]);
            $image = $request->file('file2');

            $path = 'uploads/avatars/';
            $ext = $image->getClientOriginalExtension();
            $fname = md5(time()) . ".$ext";

            Image::make($image->getRealPath())->resize(165, 165)->save($path . $fname);

            User::where('id', Auth::user()->id)->update(['avatar_url' => $fname]);
            return Redirect::to('perfil/configuracoes')->with('success', true);
        }
    }

    public function email(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'email' => 'required|email|max:255|unique:users|confirmed',
            'email_confirmation' => 'required|email'
        ]);

        if(Hash::check($request->input('password'), Auth::user()->password))
        {
            User::where('id', Auth::user()->id)->update(['email' => $request->input('email')]);
            return Redirect::to('perfil/configuracoes')->with('success', true);
        }
        else
        {
            return Redirect::to('perfil/configuracoes')->with('error', true);
        }
    }

    public function friendslist($id)
    {
        $profile = User::findOrFail($id);
        return view('pages.profile.friends', ['profile' => $profile]);
    }

    public function addFriend($id)
    {
        $recipient = User::findOrFail($id);
        $user = Auth::user();

        if(!$user->isFriendWith($recipient))
        {
            $user->befriend($recipient);
        }
        return Redirect::to('perfil/'.$id);
    }

    public function removeFriend($id)
    {
        $recipient = User::findOrFail($id);
        $user = Auth::user();

        if($user->isFriendWith($recipient))
        {
            $user->unfriend($recipient);
        }
        return Redirect::to('perfil/'.$id);
    }

    public function acceptFriend($id)
    {
        $sender = User::findOrFail($id);
        $recipient = Auth::user();

        if($recipient->hasFriendRequestFrom($sender))
        {
            $recipient->acceptFriendRequest($sender);
        }
        return Redirect::to('perfil/'.$id);
    }

    public function denyFriend($id)
    {
        $sender = User::findOrFail($id);
        $recipient = Auth::user();

        if($recipient->hasFriendRequestFrom($sender))
        {
            $recipient->denyFriendRequest($sender);
        }
        return Redirect::to('perfil/'.$id);
    }
}
