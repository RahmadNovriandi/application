<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\StandingsController;
use GuzzleHttp\Promise\Create;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Rute untuk Input Data Klub
Route::get('/clubs/create', [ClubController::class, 'create'])->name('clubs.create');
Route::post('/clubs/store', [ClubController::class, 'store'])->name('clubs.store');
Route::get('/clubs', [ClubController::class, 'index'])->name('clubs.index');

// Rute untuk Input Skor Pertandingan
Route::get('/matches/create', [MatchController::class, 'create'])->name('matches.create');
Route::post('/matches/store', [MatchController::class, 'store'])->name('matches.store');

// Rute untuk Tampilan Klasemen
Route::get('/standings/create', [ClubController::class, 'create'])->name('standings.create');
Route::get('/standings.create', [StandingsController::class, 'create'])->name('Standings.create');

// Rute untuk Input Multiple Matches
Route::get('/matches/create-multiple', [MatchController::class, 'createMultiple'])->name('matches.createMultiple');
Route::post('/matches/store-multiple', [MatchController::class, 'storeMultiple'])->name('matches.storeMultiple');

