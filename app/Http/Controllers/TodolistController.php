<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    // Tampilkan semua list milik user yang sedang login
    public function index()
    {
        $lists = Todolist::where('user_id', auth()->id())->get();
        return view('todolist.index', compact('lists'));
    }

    // Form tambah list
    public function create()
    {
        return view('todolist.create');
    }

    // Proses tambah list
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Todolist::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('/todolist')->with('success', 'List berhasil dibuat!');
    }

    // Form edit
    public function edit($id)
    {
        $list = Todolist::where('user_id', auth()->id())->findOrFail($id);
        return view('todolist.edit', compact('list'));
    }

    // Proses update
    public function update(Request $request, $id)
    {
        $list = Todolist::where('user_id', auth()->id())->findOrFail($id);

        $list->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('/todolist')->with('success', 'List berhasil diupdate!');
    }

    // Hapus list
    public function destroy($id)
    {
        $list = Todolist::where('user_id', auth()->id())->findOrFail($id);
        $list->delete();

        return redirect('/todolist')->with('success', 'List berhasil dihapus!');
    }
}
