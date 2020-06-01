<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MypageController extends Controller
{
    public function index(Request $request)
    {
        $tweets = Tweet::where('user_id', Auth::id())->get();
        $user = Auth::user();
        return view('user.mypage', ['tweets' => $tweets, 'user' => $user]);
    }

    public function search(Request $request)
    {
        //if フォローの時
        if ($request->type == 'follow') {
            $follows = Follow::where('follow_user_id', Auth::id())->get();
            $show_user_id = [];
            foreach ($follows as $follow) {
                array_push($show_user_id, $follow->followed_user_id);
            }
            $users = User::whereIn('id', $show_user_id)->get();

            foreach ($users as $user) {
                $user->is_follow = 0;
                foreach ($follows as $follow) {
                    if ($user->id == $follow->followed_user_id) {
                        $user->is_follow = 1;
                    }
                }
            }
            return view('user.follow_list', ['users' => $users, 'type' => 'follow']);
        } else//フォロワーの時
        {
            $follows = Follow::where('followed_user_id', Auth::id())->get();
            $show_user_id = [];
            foreach ($follows as $follow) {
                array_push($show_user_id, $follow->follow_user_id);
            }
            $users = User::whereIn('id', $show_user_id)->get();

            foreach ($users as $user) {
                $user->is_follow = 0;
                foreach ($follows as $follow) {
                    if ($user->id == $follow->follow_user_id) {
                        $user->is_follow = 1;
                    }
                }
            }
            return view('user.follow_list', ['users' => $users, 'type' => 'follower']);
        }

    }

    public function delete_tweet(Request $request)
    {
        Tweet::where('tweet_id', $request->tweet_id)->delete();
        return redirect('/user/mypage');
    }

    public function delete_follow(Request $request)
    {
        Follow::where('follow_user_id', Auth::id())
            ->where('followed_user_id', $request->id)
            ->delete();
        return redirect('/user/follow_list?type=' . $request->type);

    }

//フォローする
    public function create_follow(Request $request)
    {
        $users = new Follow;
        $users->follow_user_id = Auth::id();
        $users->followed_user_id = $request->id;
        $users->timestamps;
        $users->save();
        return redirect('/user/follow_list?type=' . $request->type);
    }
}
