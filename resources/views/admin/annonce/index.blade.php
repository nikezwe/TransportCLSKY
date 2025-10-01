{{-- resources/views/admin/annonces/index.blade.php --}}
@extends('admin.layout')
@section('title', 'Annonces')
@section('page-title', 'Gestion des Annonces')
@section('content')
<div class="mb-4">
    <a href="{{ route('admin.annonces.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        <i class="fas fa-plus mr-2"></i> Nouvelle Annonce
    </a>
</div>
<div class="bg-white rounded shadow overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lien</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($annonces as $annonce)
            <tr>
                <td class="px-6 py-4">
                    @if($annonce->image)
                        <img src="{{ asset('storage/'.$annonce->image) }}" alt="{{ $annonce->title }}" class="h-12 w-12 object-cover rounded">
                    @else
                        <div class="h-12 w-12 bg-gray-200 rounded"></div>
                    @endif
                </td>
                <td class="px-6 py-4">{{ $annonce->title }}</td>
                <td class="px-6 py-4">
                    @if($annonce->link)
                        <a href="{{ $annonce->link }}" target="_blank" class="text-blue-600 hover:underline">Voir</a>
                    @else
                        -
                    @endif
                </td>
                <td class="px-6 py-4">{{ $annonce->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('admin.annonces.edit', $annonce) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.annonces.destroy', $annonce) }}" method="POST" class="inline" onsubmit="return confirm('Confirmer la suppression ?')">
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
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Aucune annonce trouvée</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $annonces->links() }}</div>
@endsection

{{-- resources/views/admin/annonces/create.blade.php --}}
@extends('admin.layout')
@section('title', 'Nouvelle Annonce')
@section('page-title', 'Créer une Annonce')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.annonces.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded shadow p-6">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Titre *</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Description *</label>
            <textarea name="description" rows="5" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Lien</label>
            <input type="url" name="link" value="{{ old('link') }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://example.com">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Image</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i> Enregistrer
            </button>
            <a href="{{ route('admin.annonces.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Annuler</a>
        </div>
    </form>
</div>
@endsection

{{-- resources/views/admin/annonces/edit.blade.php --}}
@extends('admin.layout')
@section('title', 'Modifier Annonce')
@section('page-title', 'Modifier l\'Annonce')
@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.annonces.update', $annonce) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded shadow p-6">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Titre *</label>
            <input type="text" name="title" value="{{ old('title', $annonce->title) }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Description *</label>
            <textarea name="description" rows="5" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description', $annonce->description) }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Lien</label>
            <input type="url" name="link" value="{{ old('link', $annonce->link) }}" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        @if($annonce->image)
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Image actuelle</label>
            <img src="{{ asset('storage/'.$annonce->image) }}" alt="{{ $annonce->title }}" class="h-32 w-32 object-cover rounded">
        </div>
        @endif
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Nouvelle image</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i> Mettre à jour
            </button>
            <a href="{{ route('admin.annonces.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Annuler</a>
        </div>
    </form>
</div>
@endsection