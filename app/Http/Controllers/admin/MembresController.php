<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membre;
use Illuminate\Support\Facades\Storage;

class MembresController extends Controller
{
        public function index()
    {
        $membres = Membre::latest()->paginate(10);
        return view('admin.membres.index', compact('membres'));
    }

    public function create()
    {
        return view('admin.membres.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fb_link' => 'nullable|url',
            'tw_link' => 'nullable|url',
            'ig_link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('membres', 'public');
        }

        Membre::create($validated);

        return redirect()->route('admin.membres.index')->with('success', 'Membre ajouté avec succès.');
    }

    public function edit(Membre $membre)
    {
        return view('admin.membres.edit', compact('membre'));
    }

    public function update(Request $request, Membre $membre)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fb_link' => 'nullable|url',
            'tw_link' => 'nullable|url',
            'ig_link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            if ($membre->image) {
                Storage::disk('public')->delete($membre->image);
            }
            $validated['image'] = $request->file('image')->store('membres', 'public');
        }

        $membre->update($validated);

        return redirect()->route('admin.membres.index')->with('success', 'Membre modifié avec succès.');
    }

    public function destroy(Membre $membre)
    {
        if ($membre->image) {
            Storage::disk('public')->delete($membre->image);
        }
        $membre->delete();

        return redirect()->route('admin.membres.index')->with('success', 'Membre supprimé avec succès.');
    }

}
