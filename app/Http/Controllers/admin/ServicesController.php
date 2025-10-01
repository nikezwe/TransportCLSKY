<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::paginate(5);
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        // Validation et stockage du service
        return redirect()->route('admin.services.index')->with('success', 'Service créé avec succès.');
    }

    public function edit($id)
    {
        return view('admin.service.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Validation et mise à jour du service
        return redirect()->route('admin.services.index')->with('success', 'Service mis à jour avec succès.');
    }
    public function destroy($id)
    {
        // Suppression du service
        return redirect()->route('admin.services.index')->with('success', 'Service supprimé avec succès.');
    }
}
