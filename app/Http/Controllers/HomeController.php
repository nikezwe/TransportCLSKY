<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Annonce;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::latest()->take(6)->get();
        $annonces = Annonce::latest()->take(3)->get();
        return view('user', compact('services', 'annonces'));
    }
}
