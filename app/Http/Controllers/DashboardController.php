<?php

namespace App\Http\Controllers;

use App\Models\Workorder;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        // Dashboard by role operator accounts
        if (auth()->user()->role == 'peserta') {
            $countWorkOrdersByPending = Workorder::countWorkOrderByStatusAssigned('terjadwal', auth()->id());
            $countWorkOrdersByProgress = Workorder::countWorkOrderByStatusAssigned('selesai', auth()->id());
            $countWorkOrdersByCompleted = Workorder::countWorkOrderByStatusAssigned('Dibatalkan', auth()->id()); // Tidak digunakan
            $countWorkOrdersByCanceled = Workorder::countWorkOrderByStatusAssigned('Dibatalkan', auth()->id()); // Tidak digunakan

            return view('dashboard', compact(
                'countWorkOrdersByPending',
                'countWorkOrdersByProgress',
                'countWorkOrdersByCompleted',
                'countWorkOrdersByCanceled'
            ));
        }

        $countWorkOrdersByPending = Workorder::countWorkOrderByStatus('terjadwal');
        $countWorkOrdersByProgress = Workorder::countWorkOrderByStatus('selesai');
        $countWorkOrdersByCompleted = Workorder::countWorkOrderByStatus('Dibatalkan'); // Tidak digunakan
        $countWorkOrdersByCanceled = Workorder::countWorkOrderByStatus('Dibatalkan'); // Tidak digunakan

        return view('dashboard', compact(
            'countWorkOrdersByPending',
            'countWorkOrdersByProgress',
            'countWorkOrdersByCompleted', 
            'countWorkOrdersByCanceled'
        ));
    }
}