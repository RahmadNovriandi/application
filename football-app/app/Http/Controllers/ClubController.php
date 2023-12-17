<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;


class ClubController extends Controller
{

public function create()
{
    return view('clubs.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:clubs|max:255',
        'city' => 'required|max:255',
    ]);

    Club::create([
        'name' => $request->name,
        'city' => $request->city,
    ]);

    return redirect()->route('clubs.create')->with('success', 'Data klub berhasil disimpan.');
}

// Metode untuk menampilkan daftar klub (index)
public function index()
{
    $clubs = Club::all();
    return view('clubs.index', compact('clubs'));
}

}
