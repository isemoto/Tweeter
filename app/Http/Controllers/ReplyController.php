<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use Illuminate\Http\Request;

use App\Tweet;
use App\Follow;

use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        $tweets = Tweet::where('tweet_id', $request->tweet_id)
            ->orwhere('reply_id', $request->tweet_id)
            ->oldest()
            ->get();
        $tweet_id = $request->tweet_id;

        return view('tweeter.reply_list', [
            'tweet_id' => $tweet_id,
            'tweets' => $tweets,
            'user' => $user,
        ]);

    }

    public function create(TweetRequest $request)
    {
        $Tweet = new Tweet;
        $Tweet->message = $request->message;
        $user = Auth::user();
        $Tweet->user_id = $user->id;
        $Tweet->reply_id = $request->tweet_id;
        $Tweet->save();
        return redirect('/tweeter/reply_list?tweet_id=' . $request->tweet_id);
    }

}
