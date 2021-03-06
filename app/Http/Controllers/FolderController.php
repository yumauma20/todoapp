<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use App\Http\Requests\EditFolder;
use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {

        //フォルダモデルのインスタンスを作成する
        $folder = new Folder();
        //タイトルに入力値を代入する
        $folder->title = $request->title;

        //ユーザーに紐づけて保存
        Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index',[
            'id' => $folder->id,
        ]);
    }

    public function showEditForm(int $id)
    {
        $folder = Folder::find($id);

        return view('folders/edit',[
            'folder' => $folder,
        ]);
    }

    public function edit(int $id, EditFolder $request)
    {
        //1
        $folder = Folder::find($id);

        //2
        $folder->title = $request->title;
        $folder->save();

        //3
        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }

    public function delete(int $id)
    {
        $folder = Folder::find($id);
        $tasks = Task::where('folder_id', $folder->id)->get();

        $tasks->each->delete();
        $folder->delete();
        
        $firstfolder = Auth::user()->folders()->first();

        if(is_null($firstfolder)){
            return view('home');
        }

        return redirect()->route('tasks.index', [
            'id' => $firstfolder->id,
        ]);
    }
}
