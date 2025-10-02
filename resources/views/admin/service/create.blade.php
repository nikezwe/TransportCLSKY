<!-- resources/views/admin/services/create.blade.php -->
@extends('layouts.admin')
@section('title', 'Ajouter un Service')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Ajouter un nouveau service</h2>
        <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Titre *</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="categorie">Catégorie</label>
                <input type="text" name="categorie" id="categorie" class="form-control" value="{{ old('categorie') }}">
                @error('categorie')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                @error('description')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(this, 'preview')">
                <img id="preview" src="" style="max-width: 200px; margin-top: 10px; display: none; border-radius: 8px;">
                @error('image')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Enregistrer
                </button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const preview = document.getElementById('preview');
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endpush
@endsection