<!-- resources/views/admin/annonces/edit.blade.php -->
@extends('layouts.admin')
@section('title', 'Modifier l\'Annonce')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Modifier l'annonce</h2>
        <a href="{{ route('admin.annonces.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.annonces.update', $annonce) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Titre *</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $annonce->title) }}" required>
                @error('title')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description *</label>
                <textarea name="description" id="description" class="form-control" required>{{ old('description', $annonce->description) }}</textarea>
                @error('description')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="link">Lien externe (optionnel)</label>
                <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $annonce->link) }}" placeholder="https://exemple.com">
                @error('link')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                @if($annonce->image)
                    <img src="{{ asset('storage/' . $annonce->image) }}" id="preview" style="max-width: 200px; margin-bottom: 10px; border-radius: 8px; display: block;">
                @else
                    <img id="preview" src="" style="max-width: 200px; margin-bottom: 10px; display: none; border-radius: 8px;">
                @endif
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                @error('image')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Mettre à jour
                </button>
                <a href="{{ route('admin.annonces.index') }}" class="btn btn-secondary">
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