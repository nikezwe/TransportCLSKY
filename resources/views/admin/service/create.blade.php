@extends('layouts.admin')

@section('title', 'Ajouter un Service')
@section('page-title', 'Ajouter un Service')

@push('styles')
<style>
    .form-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 800px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #2c3e50;
        font-weight: 600;
    }

    .form-group input[type="text"],
    .form-group input[type="file"],
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #ecf0f1;
        border-radius: 5px;
        font-size: 14px;
        transition: all 0.3s;
        font-family: inherit;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #fdb714;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .error-message {
        color: #e74c3c;
        font-size: 13px;
        margin-top: 5px;
    }

    .image-preview {
        margin-top: 10px;
        display: none;
    }

    .image-preview img {
        max-width: 200px;
        border-radius: 8px;
        border: 2px solid #ecf0f1;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .btn {
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
    }

    .btn-submit {
        background: #fdb714;
        color: #2c3e50;
    }

    .btn-submit:hover {
        background: #e6a512;
        transform: translateY(-2px);
    }

    .btn-cancel {
        background: #95a5a6;
        color: white;
    }

    .btn-cancel:hover {
        background: #7f8c8d;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<div style="margin-bottom: 20px;">
    <a href="{{ route('admin.services.index') }}" style="color: #fdb714; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
        <i class="fas fa-arrow-left"></i>
        Retour à la liste
    </a>
</div>

<div class="form-container">
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Titre du Service *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="categorie">Catégorie</label>
            <input type="text" id="categorie" name="categorie" value="{{ old('categorie') }}" placeholder="Ex: Transport Maritime, Transport Aérien">
            @error('categorie')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Décrivez le service...">{{ old('description') }}</textarea>
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image du Service</label>
            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
            @error('image')
                <div class="error-message">{{ $message }}</div>
            @enderror
            <div class="image-preview" id="imagePreview">
                <img id="preview" src="" alt="Aperçu">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-submit">
                <i class="fas fa-save"></i>
                Enregistrer
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-cancel">
                <i class="fas fa-times"></i>
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush