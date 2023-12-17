<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use App\Models\FootballMatch;


class StandingsController extends Controller
{
    //
    public function index()
    {
        $standings = Club::orderBy('points', 'desc')->get();
        return view('standings.create', compact('standings'));
    }
}
