{{-- resources/views/admin/membres/index.blade.php --}}
@extends('admin.layout')
@section('title', 'Membres')
@section('page-title', 'Gestion des Membres')
@section('content')
<div class="mb-4">
    {{-- <a href="{{ route('admin.membres.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        <i class="fas fa-plus mr-2"></i> Nouveau Membre
    </a> --}}
</div>
<div class="bg-white rounded shadow overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Photo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prénom</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Désignation</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($membres as $membre)
            <tr>
                <td class="px-6 py-4">
                    @if($membre->image)
                        <img src="{{ asset('storage/'.$membre->image) }}" alt="{{ $membre->nom }}" class="h-12 w-12 object-cover rounded-full">
                    @else
                        <div class="h-12 w-12 bg-gray-200 rounded-full"></div>
                    @endif
                </td>
                <td class="px-6 py-4">{{ $membre->nom }}</td>
                <td class="px-6 py-4">{{ $membre->prenom }}</td>
                <td class="px-6 py-4">{{ $membre->designation ?? '-' }}</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('admin.membres.edit', $membre) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.membres.destroy', $membre) }}" method="POST" class="inline" onsubmit="return confirm('Confirmer la suppression ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Aucun membre trouvé</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $membres->links() }}</div>
@endsection

{{-- resources/views/admin/membres/create.blade.php --}}
@extends('admin.layout')
@section('title', 'Nouveau Membre')
@section('page-title', 'Créer un Membre')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.membres.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded shadow p-6">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nom *</label>
                <input type="text" name="nom" value="{{ old('nom') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Prénom *</label>
                <input type="text" name="prenom" value="{{ old('prenom') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Désignation</label>
            <input type="text" name="designation" value="{{ old('designation') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ex: Directeur, Développeur...">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Photo</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Lien Facebook</label>
            <input type="url" name="fb_link" value="{{ old('fb_link') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://facebook.com/...">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Lien Twitter</label>
            <input type="url" name="tw_link" value="{{ old('tw_link') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://twitter.com/...">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Lien Instagram</label>
            <input type="url" name="ig_link" value="{{ old('ig_link') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://instagram.com/...">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i> Enregistrer
            </button>
            {{-- <a href="{{ route('admin.membres.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Annuler</a> --}}
        </div>
    </form>
</div>
@endsection

{{-- resources/views/admin/membres/edit.blade.php --}}
@extends('admin.layout')
@section('title', 'Modifier Membre')
@section('page-title', 'Modifier le Membre')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.membres.update', $membre) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded shadow p-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nom *</label>
                <input type="text" name="nom" value="{{ old('nom', $membre->nom) }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Prénom *</label>
                <input type="text" name="prenom" value="{{ old('prenom', $membre->prenom) }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Désignation</label>
            <input type="text" name="designation" value="{{ old('designation', $membre->designation) }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        @if($membre->image)
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Photo actuelle</label>
            <img src="{{ asset('storage/'.$membre->image) }}" alt="{{ $membre->nom }}" class="h-32 w-32 object-cover rounded-full">
        </div>
        @endif
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nouvelle photo</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Lien Facebook</label>
            <input type="url" name="fb_link" value="{{ old('fb_link', $membre->fb_link) }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Lien Twitter</label>
            <input type="url" name="tw_link" value="{{ old('tw_link', $membre->tw_link) }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Lien Instagram</label>
            <input type="url" name="ig_link" value="{{ old('ig_link', $membre->ig_link) }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i> Mettre à jour
            </button>
            {{-- <a href="{{ route('admin.membres.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Annuler</a> --}}
        </div>
    </form>
</div>
@endsection