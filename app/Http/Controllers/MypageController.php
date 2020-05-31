<?php

namespace App\Http\Controllers;

use App\Follow;
use App\Tweet;
use App\User;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    //
    public function index(Request $request)
    {
        $tweets = Tweet::where('user_id',$request->id)->get();
//        $tweets = Tweet::all();
        return view('user.mypage',['tweets' => $tweets]);
    }
//フォローor フォロワー　表示？
    public function search(Request $request)
    {
//        //if フォローの時
//        $is_follow=true;
//        if ($is_follow) {
//            $users= User::where('followed_user_id', $request->id)->get([name]);
//            return view('user.follow_list',['items'=>$users]);
//        }else//フォロワーの時
//        {
//            $users = User::where('follow_user_id',$request->id)->get([name]);
//            return view('user.follow_list',['items'=>$users]);
//        }
        $items = User::all();
        $follows = Follow::where('follow_user_id',1)->get();
        return view('user.follow_listwq', ['items' => $items, 'follows' => $follows]);

    }

    public function delete_tweet(Request $request)
    {
        Tweet::where('user_id',$request->id)->delete();
        return redirect('/user/mypage');
    }
// フォロー解除
    public function delete_follow(Request  $request)
    {

       // Follow::where('followed_user_id',$request->id)->where('follow_user_id',$hoge)->delete();
        return redirect('/user/follow_list');
    }
//フォローする
    public function create_follow(Request $request)
    {
        $users=new Follow;
        $users->followed_user_id = $request->id;
//        $users->follow_user_id = ?;
        $users->timestamps();
        return redirect('/user/follow_list');
    }

}
