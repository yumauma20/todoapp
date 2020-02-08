<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditUser;

class HomeController extends Controller
{
    public function index()
    {
        //ログインユーザーを取得する
        $user = Auth::user();

        //ログインユーザーに紐づくフォルダを１つ取得する
        $folder = $user->folders()->first();

        //まだ1つもフォルダを作ってなければホームページをレスポンスする
        if (is_null($folder)){
            return view('home');
        }

        //フォルダがあればそのフォルダのタスク一覧にリダイレクトする
        return redirect()->route('tasks.index',[
            'id' => $folder->id,
        ]);
    }

    //ユーザーページの表示
    public function showUserForm()
    {
        return view('showuser');
    }

    //ユーザー名編集ページの表示
    public function nameEditForm()
    {
        return view('nameedit');
    }

    public function nameedit(EditUser $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->save();

        $folder = $user->folders()->first();

        if (is_null($folder)){
            return view('home');
        }

        return redirect()->route('tasks.index',[
            'id' => $folder->id,
        ]);
    }

}
