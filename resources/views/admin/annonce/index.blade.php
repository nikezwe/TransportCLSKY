<!-- resources/views/admin/annonces/index.blade.php -->
@extends('layouts.admin')
@section('title', 'Annonces - Administration')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Gestion des Annonces</h2>
        <a href="{{ route('admin.annonces.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nouvelle annonce
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Lien</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($annonces as $annonce)
                    <tr>
                        <td>
                            @if($annonce->image)
                                <img src="{{ asset('storage/' . $annonce->image) }}" alt="{{ $annonce->title }}" class="table-image">
                            @else
                                <div style="width: 60px; height: 60px; background: #e2e8f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image" style="color: #94a3b8;"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $annonce->title }}</td>
                        <td>{{ Str::limit($annonce->description, 60) }}</td>
                        <td>
                            @if($annonce->link)
                                <a href="{{ $annonce->link }}" target="_blank" style="color: var(--primary-color);">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $annonce->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.annonces.edit', $annonce) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.annonces.destroy', $annonce) }}" method="POST" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: #64748b; padding: 40px;">
                            Aucune annonce trouvée
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $annonces->links() }}
    </div>
</div>
@endsection
