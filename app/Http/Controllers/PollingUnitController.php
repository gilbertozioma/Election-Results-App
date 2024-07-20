<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollingUnitController extends Controller
{
    public function show($polling_unit_uniqueid)
    {
        $results = DB::table('announced_pu_results')
        ->select('party_abbreviation', DB::raw('SUM(party_score) as total_score'))
        ->where('polling_unit_uniqueid', $polling_unit_uniqueid)
        ->groupBy('party_abbreviation')
        ->get();

        return response()->json($results);
    }
}
