<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LGAResultsController;
use App\Http\Controllers\NewResultsController;
use App\Http\Controllers\PollingUnitController;

Route::get('/', function () {
    $lgas = DB::table('lga')->where('state_id', 25)->get();
    $agentnames = DB::table('agentname')->get();
    return view('index', compact('lgas', 'agentnames'));
});

Route::get('/polling-unit/{polling_unit_id}', [PollingUnitController::class, 'show'])->name('polling-unit.show');
Route::post('/lga-results', [LGAResultsController::class, 'show'])->name('lga-results.show');
Route::post('/polling-unit', [NewResultsController::class, 'store'])->name('polling-unit.store');
