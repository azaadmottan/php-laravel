<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Mentor\MenteeController;
use App\Http\Controllers\Mentor\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => 'authUser'], function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'LoginController'])->name('loginUser');
    
    Route::get('/signUp', [RegisterController::class, 'index'])->name('signUp');
    
    Route::post('/signUp/mentor', [RegisterController::class, 'MentorRegisterController'])->name('registerMentor');
    Route::post('/signUp/mentee', [RegisterController::class, 'MenteeRegisterController'])->name('registerMentee');
});

Route::group(['middleware' => 'isAdmin'], function() {
    
    Route::get('/adminDashboard', function () {
        return view('layouts.adminDashboard');
    })->name('adminDashboard');

    Route::get('/logout/admin', [LoginController::class, 'logout'])->name('logoutAdmin');
});


Route::group(['middleware' => 'isMentor'], function() {

    Route::prefix('/mentorDashboard')->group(function() {

        Route::get('/home', function () {
            return view('pages.mentor.home');
        })->name('mentorDashboard.home');

        Route::get('/profile', function () {
            return view('pages.mentor.profile');
        })->name('mentorDashboard.profile');

        Route::post('/profile/updateProfile', [ProfileController::class, 'updateProfile'])->name('mentor.updateProfile');

        Route::get('/mentees', function () {
            return view('pages.mentor.mentees');
        })->name('mentorDashboard.mentees');

        Route::post('/mentees/getAllMentees', [MenteeController::class, 'getAllMentees'])->name('getAllMentees');

        Route::post('/mentees/getProfile', [MenteeController::class, 'getMenteeProfileData'])->name('getMenteeProfileData');

        Route::post('/mentees/getMentees', [MenteeController::class, 'getMentorMentees'])->name('getMentorMentees');

        Route::post('/mentees/addMentee', [MenteeController::class, 'addMentee'])->name('addMentee');

        Route::post('/mentees/removeMentee', [MenteeController::class, 'removeMentee'])->name('removeMentee');
    });

    Route::get('/logout/mentor', [LoginController::class, 'logout'])->name('logoutMentor');
});

Route::group(['middleware' => 'isMentee'], function() {

    Route::get('/menteeDashboard', function() {
        return view('layouts.menteeDashboard');
    })->name('menteeDashboard');

    Route::get('/logout/mentee', [LoginController::class, 'logout'])->name('logoutMentee');
});