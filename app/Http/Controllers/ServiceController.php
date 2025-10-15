<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->take(6)->get();

        return view('service', compact('services'));
    }
}
