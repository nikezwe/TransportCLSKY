@extends('layouts.admin')

@section('title', 'Gestion des Services')
@section('page-title', 'Gestion des Services')

@push('styles')
<style>
    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .btn-primary {
        background: #fdb714;
        color: #2c3e50;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        background: #e6a512;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(253, 183, 20, 0.3);
    }

    .table-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead {
        background: #f8f9fa;
    }

    .table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        color: #2c3e50;
        border-bottom: 2px solid #ecf0f1;
    }

    .table td {
        padding: 15px;
        border-bottom: 1px solid #ecf0f1;
        color: #7f8c8d;
    }

    .table tbody tr:hover {
        background: #f8f9fa;
    }

    .service-image {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .btn-edit {
        padding: 8px 15px;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s;
    }

    .btn-edit:hover {
        background: #2980b9;
    }

    .btn-delete {
        padding: 8px 15px;
        background: #e74c3c;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s;
    }

    .btn-delete:hover {
        background: #c0392b;
    }

    .pagination {
        display: flex;
        justify-content: center;
        padding: 20px;
        gap: 5px;
    }

    .pagination a,
    .pagination span {
        padding: 8px 12px;
        border: 1px solid #ecf0f1;
        color: #2c3e50;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .pagination a:hover {
        background: #fdb714;
        color: white;
        border-color: #fdb714;
    }

    .pagination .active {
        background: #fdb714;
        color: white;
        border-color: #fdb714;
    }

    @media (max-width: 768px) {
        .table-container {
            overflow-x: auto;
        }

        .content-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .table {
            min-width: 800px;
        }
    }
</style>
@endpush

@section('content')
<div class="content-header">
    {{-- <h2>Liste des Services ({{ $services->total() }})</h2> --}}
    <a href="{{ route('admin.services.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Ajouter un Service
    </a>
</div>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>
                        @if($service->image)
                            <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="service-image">
                        @else
                            <div class="service-image" style="background: #ecf0f1; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image" style="color: #95a5a6;"></i>
                            </div>
                        @endif
                    </td>
                    <td><strong style="color: #2c3e50;">{{ $service->title }}</strong></td>
                    <td>{{ $service->categorie ?? 'N/A' }}</td>
                    <td>{{ Str::limit($service->description, 50) }}</td>
                    <td>{{ $service->formatted_date }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn-edit">
                                <i class="fas fa-edit"></i>
                                Modifier
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    <i class="fas fa-trash"></i>
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px; color: #7f8c8d;">
                        <i class="fas fa-inbox" style="font-size: 48px; margin-bottom: 15px; display: block;"></i>
                        Aucun service disponible
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

        <div class="pagination">
            {{ $services->links() }}
        </div>
</div>
@endsection