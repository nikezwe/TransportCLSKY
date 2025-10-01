<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonce;

class AnnoncesController extends Controller
{
    public function index()
    {
        $annonce = Annonce::paginate(5); // Remplacez par la récupération réelle des annonces
        return view('admin.annonce.index', compact('annonces'));
    }

    public function create()
    {
        return view('admin.annonce.create');
    }
    public function store(Request $request)
    {
        // Validation et stockage de l'annonce
        return redirect()->route('admin.annonces.index')->with('success', 'Annonce créée avec succès.');
    }

    public function edit($id)
    {
        return view('admin.annonce.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Validation et mise à jour de l'annonce
        return redirect()->route('admin.annonces.index')->with('success', 'Annonce mise à jour avec succès.');
    }

    public function destroy($id)
    {
        // Suppression de l'annonce
        return redirect()->route('admin.annonces.index')->with('success', 'Annonce supprimée avec succès.');
    }
}