<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use App\Utils;

use Auth;
use Redirect;
use Image;

class ProfileController extends Controller
{

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

}
