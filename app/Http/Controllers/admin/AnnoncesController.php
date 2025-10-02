<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Storage;


class AnnoncesController extends Controller
{
    public function index()
    {
        $annonces = Annonce::latest()->paginate(10);
        return view('admin.annonce.index', compact('annonces'));
    }

    public function create()
    {
        return view('admin.annonce.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('annonces', 'public');
        }

        Annonce::create($validated);

        return redirect()->route('admin.annonces.index')->with('success', 'Annonce ajoutée avec succès.');
    }

    public function edit(Annonce $annonce)
    {
        return view('admin.annonce.edit', compact('annonce'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            if ($annonce->image) {
                Storage::disk('public')->delete($annonce->image);
            }
            $validated['image'] = $request->file('image')->store('annonces', 'public');
        }

        $annonce->update($validated);

        return redirect()->route('admin.annonces.index')->with('success', 'Annonce modifiée avec succès.');
    }

    public function destroy(Annonce $annonce)
    {
        if ($annonce->image) {
            Storage::disk('public')->delete($annonce->image);
        }
        $annonce->delete();

        return redirect()->route('admin.annonces.index')->with('success', 'Annonce supprimée avec succès.');
    }
}