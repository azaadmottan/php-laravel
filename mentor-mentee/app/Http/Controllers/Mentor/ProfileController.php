<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mentor;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    function updateProfile(Request $request) {
        
        $request->validate([
            'mentorName' =>'required|string|max:255',
            'department' =>'required|string|max:255',
            'phone' =>'required|max:13',
            'email' =>[
                'required',
                'email',
                Rule::unique('mentors')->ignore(Auth::guard('mentor')->id()),
            ],
            'address' =>'required|max:255',
        ]);
        
        $mentor = Mentor::findOrFail(Auth::guard('mentor')->user()->id);

        if ($mentor) {

            $mentor->mentorName = $request->input('mentorName');
            $mentor->department = $request->input('department');
            $mentor->phone = $request->input('phone');
            $mentor->email = $request->input('email');
            $mentor->address = $request->input('address');

            if ($mentor->save()) {
                return response()->json(['success' => true]);
            }
            else {
                return response()->json(['error' => true]);
            }
        }
        return response()->json(['error' => true]);
    }
}
