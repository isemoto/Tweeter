<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Tweet::where('user_id',$request->id)->get();
        return view('user.mypage',['items' => $items]);
    }
//フォローor フォロワーサーチ
    public function search(Request $request)
    {

    }

    public function deleteTweet(Request $request)
    {
        Tweet::destroy('user_id',$request->id);
        return redirect('/user/mypage');
    }

    public function deleteFollow()
    {

    }
//フォローする
    public function create(Request $request)
    {

    }

}
