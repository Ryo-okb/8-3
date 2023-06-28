<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function create()
    {
        return view('folders.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $folder = new Folder();
        $folder->name = $validatedData['name'];
        $folder->user_id = auth()->user()->id;
        $folder->save();
    
        return redirect()->route('tasks.index');
    }

    public function destroy(Folder $folder)
    {
        $folder->del_flg = true;
        $folder->save();

        return redirect()->route('tasks.index')->with('success', 'フォルダが削除されました');
    }

}
