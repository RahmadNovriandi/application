<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FootballMatch;
use App\Models\Club;

class MatchController extends Controller
{
   
//         public function create()
//         {
//             $clubs = Club::all();
//             return view('matches.create', compact('clubs'));
//         }
    
//         public function store(Request $request)
//         {
//             $request->validate([
//                 'team1' => 'required',
//                 'team2' => 'required',
//                 'score1' => 'required|integer|min:0',
//                 'score2' => 'required|integer|min:0',
//             ]);
    
//             // Simpan data pertandingan
//             $match = Match::create([
//                 'team1' => $request->team1,
//                 'team2' => $request->team2,
//                 'score1' => $request->score1,
//                 'score2' => $request->score2,
//             ]);
    
//             // Hitung poin dan update data klub
//             $this->updateClubStats($match);
    
//             return redirect()->route('matches.create')->with('success', 'Data pertandingan berhasil disimpan.');
//         }
    
//         private function updateClubStats($match)
//         {
//             $club1 = Club::where('name', $match->team1)->first();
//             $club2 = Club::where('name', $match->team2)->first();
    
//             // Logika perhitungan poin
//             if ($match->score1 > $match->score2) {
//                 // Tim 1 menang
//                 $club1->matches_won += 1;
//                 $club1->points += 3;
//             } elseif ($match->score1 == $match->score2) {
//                 // Pertandingan seri
//                 $club1->matches_drawn += 1;
//                 $club1->points += 1;
    
//                 $club2->matches_drawn += 1;
//                 $club2->points += 1;
//             } else {
//                 // Tim 2 menang
//                 $club2->matches_won += 1;
//                 $club2->points += 3;
//             }
    
//             // Update statistik gol
//             $club1->matches_played += 1;
//             $club1->goals_scored += $match->score1;
//             $club1->goals_conceded += $match->score2;
    
//             $club2->matches_played += 1;
//             $club2->goals_scored += $match->score2;
//             $club2->goals_conceded += $match->score1;
    
//             // Simpan perubahan
//             $club1->save();
//             $club2->save();
    //    }

        
public function index()
{
    $clubs = Club::all();
    return view('clubs.index', compact('clubs'));
}

// public function create()
// {
//     // Lakukan tindakan yang diperlukan untuk menampilkan formulir atau persiapkan halaman pembuatan
//     return view('matches.create');
// }
public function create()
{
    // Mendapatkan daftar tim dari database
    $teams = Club::all(); 

    // Mengirimkan variabel $teams ke tampilan
    return view('matches.create', compact('teams'));
}

public function store(Request $request)
{
    $request->validate([
        'team1_id' => 'required',
        'team2_id' => 'required',
        'score1' => 'required|integer',
        'score2' => 'required|integer',
    ]);

    $match = new FootballMatch([
        'team1_id' => $request->team1_id,
        'team2_id' => $request->team2_id,
        'score1' => $request->score1,
        'score2' => $request->score2,
    ]);

    $match->save();

    return redirect()->route('matches.create')->with('success', 'Skor pertandingan berhasil disimpan.');
}



}




