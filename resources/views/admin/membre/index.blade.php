<!-- resources/views/admin/membres/index.blade.php -->
@extends('layouts.admin')
@section('title', 'Membres - Administration')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Gestion des Membres de l'Équipe</h2>
        <a href="{{ route('admin.membres.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter un membre
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Désignation</th>
                        <th>Réseaux sociaux</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($membres as $membre)
                    <tr>
                        <td>
                            @if($membre->image)
                                <img src="{{ asset('storage/' . $membre->image) }}" alt="{{ $membre->nom }}" class="table-image">
                            @else
                                <div style="width: 60px; height: 60px; background: #e2e8f0; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-user" style="color: #94a3b8;"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $membre->nom }}</td>
                        <td>{{ $membre->prenom }}</td>
                        <td>{{ $membre->designation ?? 'N/A' }}</td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                @if($membre->fb_link)
                                    <a href="{{ $membre->fb_link }}" target="_blank" style="color: #1877f2;">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                @endif
                                @if($membre->tw_link)
                                    <a href="{{ $membre->tw_link }}" target="_blank" style="color: #1da1f2;">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @endif
                                @if($membre->ig_link)
                                    <a href="{{ $membre->ig_link }}" target="_blank" style="color: #e4405f;">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                @endif
                                @if(!$membre->fb_link && !$membre->tw_link && !$membre->ig_link)
                                    -
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.membres.edit', $membre) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.membres.destroy', $membre) }}" method="POST" onsubmit="return confirmDelete()">
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
                            Aucun membre trouvé
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $membres->links() }}
    </div>
</div>
@endsection