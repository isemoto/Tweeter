<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MypageController extends Controller
{
    //

    public function index(Request $request)
    {
        $tweets = Tweet::where('user_id',Auth::id())->get();
//        $tweets = Tweet::all();
        return view('user.mypage',['tweets' => $tweets]);
    }
//フォローor フォロワー　表示
    public function search(Request $request)
    {
        //if フォローの時
        if (0) {
           $follows = Follow::where('followed_user_id',Auth::id());
           $users = User::where('id',$follows->follow_user_id);
           return view('user.follow_list',['follows'=>$follows,'users'=>$users,'is_follow'=>true]);
        }else//フォロワーの時
        {
          $follows_id = Follow::where('follow_user_id',Auth::id())->get(['followed_user_id']);
          $users = User::whereIn('id',$follows_id)->get();
          return view('user.follow_list',['follows'=>$follows_id,'users'=>$users,'is_follow'=>false]);
        }

    }

    public function delete_tweet(Request $request)
    {
        Tweet::where('tweet_id',$request->id)->delete();
        return redirect('/user/mypage');
    }
// フォロー解除
    public function delete_follow(Request  $request)
    {
        Follow::where('follow_user_id', Auth::id())
            ->where('followed_user_id', $request->id)
            ->delete();
        return redirect('/user/follow_list');
    }
//フォローする
    public function create_follow(Request $request)
    {
        $users = new Follow;
        $users->follow_user_id = Auth::id();
        $users->followed_user_id = $request->id;
        $users->timestamps;
        $users->save();
        return redirect('/user/follow_list');
    }

}
