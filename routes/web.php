<?php

use Illuminate\Support\Facades\Route;

Route::get('/platoon-leader/dashboard', function () {
    return view('platoon-leader.dashboard');
});

Route::get('/platoon-leader/attendance', function () {
    return view('platoon-leader.attendance');
});

Route::get('/platoon-leader/merit-demerit', function () {
    return view('platoon-leader.merit-demerit');
});

Route::get('/platoon-leader/training-schedule', function () {
    return view('platoon-leader.training-schedule');
});
