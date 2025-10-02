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
    public function index()
    {
        $annonces = Annonce::latest()->paginate(9);
        return view('annonce', compact('annonces'));
    }

    /**
     * Afficher une annonce spécifique
     */
    public function show($id)
    {
        $annonce = Annonce::findOrFail($id);
        
        // Récupérer les 3 dernières annonces (sauf celle en cours)
        $autresAnnonces = Annonce::where('id', '!=', $id)
                                 ->latest()
                                 ->take(3)
                                 ->get();
        
        return view('annonce-detail', compact('annonce', 'autresAnnonces'));
    }
}
