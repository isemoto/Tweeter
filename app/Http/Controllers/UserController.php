<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index(Request $request)
    {
        //最初の表示
        $items = User::all();
        $follows = Follow::where('follow_user_id',Auth::id())->get();
        return view('tweeter.user_search', ['items' => $items, 'follows' => $follows]);
    }

    public function search(Request $request)
    {
        //ユーザー検索
        $items = User::where('name','like','%' .  $request->input . '%')->get();
        $follows = Follow::where('follow_user_id',Auth::id())->get();
        return view('tweeter.user_search', ['items' => $items, 'follows' => $follows]);
    }

    public function create(Request $request)
    {
        //フォロー処理
        $follows = new Follow;
        $follows->follow_user_id = Auth::id();
        $follows->followed_user_id = $request->id;
        $follows->save();
        return redirect('/user/search');
    }

    public function delete(Request $request)
    {
        //フォロー解除
        Follow::where('follow_user_id', Auth::id())
            ->where('followed_user_id', $request->id)
            ->delete();
        return redirect('/user/search');
    }
}
