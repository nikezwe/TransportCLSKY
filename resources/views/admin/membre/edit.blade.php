<!-- resources/views/admin/membres/edit.blade.php -->
@extends('layouts.admin')
@section('title', 'Modifier le Membre')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Modifier le membre</h2>
        <a href="{{ route('admin.membres.index') }}" class="btn btn-sm btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.membres.update', $membre) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label for="nom">Nom *</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $membre->nom) }}" required>
                    @error('nom')
                        <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom *</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom', $membre->prenom) }}" required>
                    @error('prenom')
                        <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="designation">Désignation/Poste</label>
                <input type="text" name="designation" id="designation" class="form-control" value="{{ old('designation', $membre->designation) }}" placeholder="Ex: Directeur Général">
                @error('designation')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Photo</label>
                @if($membre->image)
                    <img src="{{ asset('storage/' . $membre->image) }}" id="preview" style="max-width: 200px; margin-bottom: 10px; border-radius: 8px; display: block;">
                @else
                    <img id="preview" src="" style="max-width: 200px; margin-bottom: 10px; display: none; border-radius: 8px;">
                @endif
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                @error('image')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <h3 style="margin: 30px 0 15px; font-size: 18px; color: var(--dark);">Réseaux sociaux</h3>
            
            <div class="form-group">
                <label for="fb_link">
                    <i class="fab fa-facebook" style="color: #1877f2;"></i> Lien Facebook
                </label>
                <input type="url" name="fb_link" id="fb_link" class="form-control" value="{{ old('fb_link', $membre->fb_link) }}" placeholder="https://facebook.com/...">
                @error('fb_link')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tw_link">
                    <i class="fab fa-twitter" style="color: #1da1f2;"></i> Lien Twitter
                </label>
                <input type="url" name="tw_link" id="tw_link" class="form-control" value="{{ old('tw_link', $membre->tw_link) }}" placeholder="https://twitter.com/...">
                @error('tw_link')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="ig_link">
                    <i class="fab fa-instagram" style="color: #e4405f;"></i> Lien Instagram
                </label>
                <input type="url" name="ig_link" id="ig_link" class="form-control" value="{{ old('ig_link', $membre->ig_link) }}" placeholder="https://instagram.com/...">
                @error('ig_link')
                    <span style="color: #ef4444; font-size: 13px;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: flex; gap: 10px; margin-top: 30px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Mettre à jour
                </button>
                <a href="{{ route('admin.membres.index') }}" class="btn btn-secondary">
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