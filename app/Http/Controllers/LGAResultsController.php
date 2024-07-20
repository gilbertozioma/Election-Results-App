<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LGAResultsController extends Controller
{
    public function show(Request $request)
    {
        $lgaId = $request->input('lga_id');

        // Fetch all polling units within the selected LGA
        $pollingUnits = DB::table('polling_unit')->where('lga_id', $lgaId)->get();

        $results = [];

        // Get results for each polling unit
        foreach ($pollingUnits as $pollingUnit) {
            $unitResults = DB::table('announced_pu_results')
            ->where('polling_unit_uniqueid', $pollingUnit->uniqueid)
                ->select('party_abbreviation', 'party_score')
                ->get();

            $results[$pollingUnit->polling_unit_name] = $unitResults;
        }

        // dd($results);
        return response()->json($results);
    }
}
