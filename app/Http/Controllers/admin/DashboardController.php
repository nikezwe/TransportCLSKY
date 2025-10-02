<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Annonce;
use App\Models\Membre;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        $stats = [
            'membres' => Membre::count(),
            'contacts' => Contact::count(),
            'annonces' => Annonce::count(),
            'services' => Service::count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();
        $recentAnnonces = Annonce::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'recentAnnonces'));
    }
}