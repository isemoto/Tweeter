<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    //
    public function index(Request $request)
    {
        $items = Tweet::where('user_id',$request->id);
        return view('user.mypage',['items' => $items]);
    }

    public function search(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }

    public function create(Request $request)
    {

    }

}
