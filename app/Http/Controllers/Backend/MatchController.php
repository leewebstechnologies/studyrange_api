<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Studymatch;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function ApiMatch(Request $request)
    {
        $request->validate([
            'studyLevel' => 'required',
            'subjectArea' => 'required',
            'budgetRange' => 'required',
            'academicScore' => 'required',
        ]);

        $universities = [
            'Aston University',
            'Bangor University',
            'Bournemouth University',
            'BPP University',
            'De Mont Fort University',
            'Edinburg Napier University International College',
            'Imperial College',
            'Newcastle University',
            'Northumbria University',
            'Ravensbourne University',
            'Southampton Solent University',
            'Ulster University',
            'University College London',
            'University of Birmingham',
            'University of Bradford',
            'University of Bradford International College (UBIC)',
            'University of Bristol',
            'University of Brunel',
            'University of Cambridge',
            'University of Dundee International College (UDIC)',
            'University of Edinburgh',
            'University of Glasgow',
            'University of Greenwich International College',
            'University of Hertfordshire',
            'University of Huddersfield',
            'University of Kent International College',
            'University of Leeds',
            'University of Manchester',
            'University of Nottingham',
            'University of Oxford',
            'University of Roehampton',
            'University of Sheffield',
            'University of Southampton',
            'University of South Wales',
            'University of Warwick',
            'University of Winchester',
        ];

        // Simple matching logic
        $score = (float)$request->academicScore;
        $budget = $request->budgetRange;

        if ($score >= 3.8 || str_contains(strtolower($request->academicScore), 'first')) {

            $matched = [
                'University of Oxford',
                'University of Cambridge',
                'Imperial College',
                'University College London',
                'University of Warwick',
                'University of Edinburgh',
            ];

        } elseif ($score >= 3.2 || str_contains(strtolower($request->academicScore), '2:1')) {

            $matched = [
                'University of Bristol',
                'University of Manchester',
                'University of Glasgow',
                'University of Birmingham',
                'University of Leeds',
                'University of Sheffield',
                'University of Nottingham',
                'University of Southampton',
                'Newcastle University',
                'Durham University',
                'Northumbria University',
                'University of Huddersfield',
                'University of Roehampton',
                'Bangor University',
            ];

        } else {

            $matched = [
                'Aston University',
                'Bournemouth University',
                'University of Bradford',
                'University of Brunel',
                'University of Hertfordshire',
                'Ulster University',
                'University of Winchester',
                'BPP University',
                'Ravensbourne University',
                'University of Kent International College',
                'University of Greenwich International College',
                'Edinburg Napier University International College',
                'University of Dundee International College (UDIC)',
                'University of Bradford International College (UBIC)',
                'Southampton Solent University',
                'De Mont Fort University',
                'University of South Wales',
            ];
        }

        // Randomly pick one from the matched category
        $universityName = $matched[array_rand($matched)];

        // Try to find the school in the database for more details
        $school = \App\Models\School::where('name', 'like', '%' . $universityName . '%')->first();

        // Save to database
        Studymatch::create([
            'name' => $universityName,
            'studyLevel' => $request->studyLevel,
            'subjectArea' => $request->subjectArea,
            'budgetRange' => $request->budgetRange,
            'academicScore' => $request->academicScore,
        ]);

        return response()->json([
            'success' => true,
            'university' => $universityName,
            'school_details' => $school,
            'message' => 'Match found successfully!'
        ]);
    }
}