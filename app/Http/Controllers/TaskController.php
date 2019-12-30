<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id)
    {
        // すべてのフォルダを取得する
        $folders = Folder::all();
    
        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);
    
        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = Task::where('folder_id', $current_folder->id)->get();
    
        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }
}
