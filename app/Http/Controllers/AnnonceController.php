<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('annonce');
    }
}
