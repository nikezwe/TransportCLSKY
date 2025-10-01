<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Annonce;
use App\Models\Membre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'annonces' => Annonce::count(),
            'membres' => Membre::count(),
            'recent_annonces' => Annonce::latest()->take(5)->get(),
            'recent_services' => Service::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}