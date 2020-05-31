<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Tweet;
use App\Follow;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\TweetRequest;

class TweetController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $followings = Follow::following($user->id)->get();

        $show_user_id = [];
        foreach ($followings as $following)
        {
            array_push($show_user_id, $following->followed_user_id);
        }
        array_push($show_user_id, $user->id);

        $tweets = Tweet::whereIn('user_id', $show_user_id)
            ->where('reply_id', '0')
            ->latest()
            ->get();

        return view('tweeter.index', [
            'user' => $user,
            'tweets' => $tweets,
        ]);

    }

    public function add(Request $request)
    {
        return view('tweeter.tweet');
    }

    public function create(TweetRequest $request)
    {
        $Tweet = new Tweet;
        $Tweet->message = $request->message;
        $user = Auth::user();
        $Tweet->user_id = $user->id;
        $Tweet->reply_id = 0;
        $Tweet->save();
        return redirect('/tweeter');
    }
}
