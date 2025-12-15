<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index()
    {
        $lists = Todolist::where('user_id', auth()->id())->get();
        return view('todolist.index', compact('lists'));
    }

    public function create()
    {
        return view('todolist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_list' => 'required',
            'description' => 'nullable'
        ]);

        Todolist::create([
            'user_id' => auth()->id(),
            'nama_list' => $request->nama_list,
            'description' => $request->description
        ]);

        return redirect()->route('todolist.index');
    }

    public function edit($id)
    {
        $list = Todolist::where('user_id', auth()->id())->findOrFail($id);
        return view('todolist.edit', compact('list'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_list' => 'required',
            'description' => 'nullable'
        ]);

        $list = Todolist::where('user_id', auth()->id())->findOrFail($id);

        $list->update([
            'nama_list' => $request->nama_list,
            'description' => $request->description
        ]);

        return redirect()->route('todolist.index');
    }

    public function destroy($id)
    {
        $list = Todolist::where('user_id', auth()->id())->findOrFail($id);
        $list->delete();

        return redirect()->route('todolist.index');
    }
}
