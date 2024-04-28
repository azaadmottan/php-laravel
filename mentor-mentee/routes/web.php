<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

    Route::get('/mentorDashboard', function () {
        return view('layouts.mentorDashboard');
    })->name('mentorDashboard');
    Route::get('/logout/mentor', [LoginController::class, 'logout'])->name('logoutMentor');
});

Route::group(['middleware' => 'isMentee'], function() {

    Route::get('/menteeDashboard', function() {
        return view('layouts.menteeDashboard');
    })->name('menteeDashboard');
    Route::get('/logout/mentee', [LoginController::class, 'logout'])->name('logoutMentee');
});