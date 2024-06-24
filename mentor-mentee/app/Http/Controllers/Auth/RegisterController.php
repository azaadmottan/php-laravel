<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Mentee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    function index() {
        
        $mentors = DB::table('mentors')->pluck('id', 'mentorName');
        
        return view('pages.signup', ['mentors' => $mentors]);
    }

    function MentorRegisterController(Request $req) {

        $req->validate([
            'mentorName' => 'required',
            'empId' => 'required|alpha_num|unique:mentors',
            'department' => 'required',
            'mentorPhone' => 'required|numeric|digits:10',
            'mentorEmail' => 'required|email|unique:mentors',
            'mentorAddress' => 'required',
            'mentorPassword' => 'required|min:8',
            'mentorConfirmPassword' => 'required|same:mentorPassword',
        ]);

        $mentor = new Mentor();

        $mentor->mentorName = $req->input('mentorName');
        $mentor->empId = $req->input('empId');
        $mentor->department = $req->input('department');
        $mentor->phone = $req->input('mentorPhone');
        $mentor->email = $req->input('mentorEmail');
        $mentor->address = $req->input('mentorAddress');
        $mentor->password = Hash::make($req->input('mentorPassword'));

        if ($mentor->save()) {
            
            return redirect('login')->with('successRegister', 'Congratulations ! You have registered successfully.');
        }
    }

    function MenteeRegisterController(Request $req) {

        $req->validate([
            'menteeName' => 'required',
            'rollNo' => 'required|numeric|unique:mentees',
            'course' => 'required',
            'branch' => 'required',
            'semester' => 'required',
            'mentor' => 'required',
            'menteePhone' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:mentees',
            'fatherName' => 'required',
            'fatherPhone' => 'required',
            'fatherProfession' => 'required',
            'address' => 'required',
            'profilePicture' => 'required',
            'menteePassword' => 'required|min:8',
        ]);

        $mentee = new Mentee();

        $mentee->menteeName = $req->input('menteeName');
        $mentee->rollNo = $req->input('rollNo');
        $mentee->course = $req->input('course');
        $mentee->branch = $req->input('branch');
        $mentee->semester = $req->input('semester');
        $mentee->mentor = (int)$req->input('mentor');
        $mentee->phone = $req->input('menteePhone');
        $mentee->email = $req->input('email');
        $mentee->fatherName = $req->input('fatherName');
        $mentee->fatherPhone = $req->input('fatherPhone');
        $mentee->fatherProfession = $req->input('fatherProfession');
        $mentee->address = $req->input('address');
        $mentee->profilePicture = Str::random(20). ".".$req->file('profilePicture')->getClientOriginalExtension();
        $req->file('profilePicture')->move('uploads/profiles', $mentee->profilePicture);
        $mentee->password = Hash::make($req->input('menteePassword'));

        if ($mentee->save()) {
            return redirect('login')->with('successRegister', 'Congratulations ! You have registered successfully.'); 
        }
        
        return redirect(route('signUp'))->with('errorRegister', 'Error ! Something went wrong while register.'); 
    }
}
