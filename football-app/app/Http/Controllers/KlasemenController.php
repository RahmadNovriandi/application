<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\FootballMatch;

class KlasemenController extends Controller
{
    public function index()
    {
        // Ambil data klasemen dari database
        $klasemen = $this->generateKlasemen();

        // Tampilkan tampilan klasemen
        return view('standings.create', compact('standings'));
    }

    private function generateKlasemen()
    {
        // Logika untuk menghasilkan data klasemen 
        // Misalnya, hitung jumlah main (Ma), menang (Me), seri (S), kalah (K), dll.
        // Gunakan model Club dan FootballMatch untuk mengakses data dari database

        $teams = Club::all();
        $klasemenData = [];
    
        foreach ($teams as $team) {
            $matches = FootballMatch::where('team1_id', $team->id)
                            ->orWhere('team2_id', $team->id)
                            ->get();
    
            $main = $matches->count();
            $menang = $matches->where('winner_id', $team->id)->count();
            $seri = $matches->where('winner_id', null)->count();
            $kalah = $main - $menang - $seri;
            $goal_menang = $matches->where('winner_id', $team->id)->sum('score1');
            $goal_kalah = $matches->where('winner_id', '<>', $team->id)->sum('score1');
            $point = $menang * 3 + $seri;
    
            
        

        return $klasemenData;
    }


}
}
