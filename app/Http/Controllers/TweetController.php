<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Tweet;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $followings = Follow::following($user->id)->get();

        $followed_user_id = [];
        foreach ($followings as $following)
        {
            array_push($followed_user_id, $following->followed_user_id);
        }

        $tweets = Tweet::whereIn('user_id', $followed_user_id)
            ->where('reply_id', '0')
            ->latest()
            ->get();

//        $users = User::whereIn('user_id', $followed_user_id)
//            ->get();

        return view('tweeter.index', [
//            'user' => $user,
//            'follows' => $followings,
            'tweets' => $tweets,
//            'users' => $users,
        ]);

    }

    public function add(Request $request)
    {

    }

    public function create(Request $request)
    {

    }
}
