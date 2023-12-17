<?php

namespace App\Models;

use App\Http\Controllers\ClubController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FootballMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'score1', 
        'score2', 
        'team1_id', 
        'team2_id'
    ];

    public function team1()
    {
        return $this->belongsTo(Club::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Club::class, 'team2_id');
    }
}


