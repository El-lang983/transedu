<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip; // misalnya tabel perjalanan

class DashboardController extends Controller
{
    public function index()
    {
        // hitung total perjalanan minggu ini
        $totalTrips = Trip::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                          ->count();

        // ambil data per hari (Senin - Minggu)
        $dailyTrips = Trip::selectRaw('DAYOFWEEK(created_at) as day, COUNT(*) as total')
                          ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                          ->groupBy('day')
                          ->pluck('total','day');

        return view('dashboard', compact('totalTrips','dailyTrips'));
    }
}
