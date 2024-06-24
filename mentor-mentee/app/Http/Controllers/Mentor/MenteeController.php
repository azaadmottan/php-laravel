<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentee;

class MenteeController extends Controller
{
    function getAllMentees(Request $request) {

        $allMentees = DB::table('mentees')
            ->whereNull('mentor')
            ->orWhere('mentor', '!=', Auth::guard('mentor')->user()->id)
            ->get();
        
        return response()->json($allMentees);
    }

    function getMentorMentees(Request $request) {

        $mentees = DB::table('mentees')
            ->where('mentor', Auth::guard('mentor')->user()->id)
            ->get();

        return response()->json($mentees);
    }

    function getMenteeProfileData(Request $request) {

        if ($request["id"]) {

            $menteeData = DB::table('mentees')
                ->where('id', $request["id"])
                ->first();
            
            return response()->json($menteeData);
        }

        return response()->json(['error' => 'User profile data not found']);
    }

    function addMentee(Request $request) {

        $mentee = Mentee::findOrFail($request["id"]);

        if ($mentee) {
            $mentee->mentor = (int)Auth::guard('mentor')->user()->id;

            $mentee->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => true]);
    }

    function removeMentee(Request $request) {

        $mentee = Mentee::findOrFail($request["id"]);
        
        if ($mentee) {
            
            $mentee->mentor = null;
            $mentee->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => true]);
    }
}
