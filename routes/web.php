<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/qr', function () {
    return view('qr');
});

Route::get('/topup', function () {
    return view('topup');
});

Route::get('/reports', function () {
    return view('reports');
});

Route::get('/admin', function () {
    return view('admin');
});

