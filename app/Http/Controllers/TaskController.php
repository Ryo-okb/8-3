<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $folders = $user->folders()->with('tasks')->get();

        return view('tasks.index', compact('folders'));

    }

    public function create()
    {
        $folders = auth()->user()->folders;

        return view('tasks.create', compact('folders'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required|in:未着手,着手中,完了',
            'folder_id' => 'required|exists:folders,id',
        ]);

        $task = new Task();
        $task->title = $validatedData['title'];
        $task->deadline = $validatedData['deadline'];
        $task->status = $validatedData['status'];
        $task->folder_id = $validatedData['folder_id'];
        $task->user_id = auth()->id();
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'タスクが作成されました');
    }

    public function edit(Task $task)
    {
        $folders = auth()->user()->folders;

        return view('tasks.edit', compact('task', 'folders'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'required|date',
            'status' => 'required|in:未着手,着手中,完了',
            'folder_id' => 'required|exists:folders,id',
        ]);

        $task->title = $validatedData['title'];
        $task->deadline = $validatedData['deadline'];
        $task->status = $validatedData['status'];
        $task->folder_id = $validatedData['folder_id'];
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->del_flg = true;
        $task->save();
    
        return redirect()->route('tasks.index')->with('success', 'タスクが削除されました');
    }
    
}
