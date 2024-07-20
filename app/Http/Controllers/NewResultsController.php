<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewResultsController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'polling_unit_number' => 'required|string',
            'polling_unit_name' => 'required|string',
            'polling_unit_description' => 'required|string',
            'ward_id' => 'required',
            'lga_id' => 'required',
            'entered_by_user' => 'required',
        ]);

        // Add validation for party scores
        $parties = DB::table('party')->pluck('partyname')->toArray();
        foreach ($parties as $party) {
            $validatedData[$party] = $request->validate([
                $party => 'required|integer|min:0',
            ])[$party];
        }

        // Create Polling Unit and Results in a Transaction
        DB::transaction(function () use ($validatedData, $request) {
            // Fetch parties
            $parties = DB::table('party')->pluck('partyname')->toArray();

            // Prepare data for polling unit insertion
            $pollingUnitData = [
                'polling_unit_id' => $validatedData['polling_unit_number'],
                'ward_id' => $validatedData['ward_id'],
                'lga_id' => $validatedData['lga_id'],
                'polling_unit_number' => $validatedData['polling_unit_number'],
                'polling_unit_name' => $validatedData['polling_unit_name'],
                'polling_unit_description' => $validatedData['polling_unit_description'],
                'entered_by_user' => $validatedData['entered_by_user'],
                'date_entered' => now(),
                'user_ip_address' => $request->ip()
            ];

            // Insert polling unit and get its ID
            $pollingUnitUniqueId = DB::table('polling_unit')->insertGetId($pollingUnitData);

            // Prepare data for result insertion
            $announcedPuResultsData = [];
            foreach ($parties as $party) {
                $announcedPuResultsData[] = [
                    'polling_unit_uniqueid' => $pollingUnitUniqueId,
                    'party_abbreviation' => substr($party, 0, 4),
                    'party_score' => $validatedData[$party],
                    'entered_by_user' => $validatedData['entered_by_user'],
                    'date_entered' => now(),
                    'user_ip_address' => $request->ip()
                ];
            }

            // Insert results
            DB::table('announced_pu_results')->insert($announcedPuResultsData);
        });

        // dd($request->all());

        return response()->json(['success' => 'Results stored successfully.']);
    }
}