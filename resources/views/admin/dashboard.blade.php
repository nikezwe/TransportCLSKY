@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fas fa-concierge-bell"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['services'] }}</h3>
            <p>Total Services</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fas fa-bullhorn"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['annonces'] }}</h3>
            <p>Total Annonces</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon orange">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $stats['membres'] }}</h3>
            <p>Total Membres</p>
        </div>
    </div>
</div>

<!-- Recent Content -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
    <!-- Recent Annonces -->
    <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="font-size: 20px; margin-bottom: 20px; color: #2c3e50;">Dernières Annonces</h2>
        @forelse($stats['recent_annonces'] as $annonce)
            <div style="padding: 15px; border-bottom: 1px solid #ecf0f1; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h4 style="color: #2c3e50; margin-bottom: 5px;">{{ Str::limit($annonce->title, 30) }}</h4>
                    <small style="color: #7f8c8d;">{{ $annonce->formatted_date }}</small>
                </div>
                <a href="{{ route('admin.annonces.edit', $annonce) }}" style="color: #fdb714; text-decoration: none;">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
        @empty
            <p style="color: #7f8c8d; text-align: center; padding: 20px;">Aucune annonce disponible</p>
        @endforelse
        {{-- <a href="{{ route('admin.annonces.index') }}" style="display: block; text-align: center; margin-top: 15px; color: #fdb714; text-decoration: none; font-weight: 600;">
            Voir tout <i class="fas fa-arrow-right"></i>
        </a> --}}
    </div>

    <!-- Recent Services -->
    <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h2 style="font-size: 20px; margin-bottom: 20px; color: #2c3e50;">Derniers Services</h2>
        @forelse($stats['recent_services'] as $service)
            <div style="padding: 15px; border-bottom: 1px solid #ecf0f1; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h4 style="color: #2c3e50; margin-bottom: 5px;">{{ Str::limit($service->title, 30) }}</h4>
                    <small style="color: #7f8c8d;">{{ $service->categorie ?? 'Non catégorisé' }}</small>
                </div>
                <a href="{{ route('admin.services.edit', $service) }}" style="color: #fdb714; text-decoration: none;">
                    <i class="fas fa-edit"></i>
                </a>
            </div>
        @empty
            <p style="color: #7f8c8d; text-align: center; padding: 20px;">Aucun service disponible</p>
        @endforelse
        {{-- <a href="{{ route('admin.services.index') }}" style="display: block; text-align: center; margin-top: 15px; color: #fdb714; text-decoration: none; font-weight: 600;">
            Voir tout <i class="fas fa-arrow-right"></i>
        </a> --}}
    </div>
</div>

<!-- Quick Actions -->
<div style="margin-top: 30px;">
    <h2 style="font-size: 22px; margin-bottom: 20px; color: #2c3e50;">Actions Rapides</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
        <a href="{{ route('admin.services.create') }}" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center; transition: all 0.3s;">
            <i class="fas fa-plus-circle" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
            <span style="font-weight: 600;">Nouveau Service</span>
        </a>
        <a href="{{ route('admin.annonces.create') }}" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center; transition: all 0.3s;">
            <i class="fas fa-plus-circle" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
            <span style="font-weight: 600;">Nouvelle Annonce</span>
        </a>
        {{-- <a href="{{ route('admin.membres.create') }}" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 20px; border-radius: 10px; text-decoration: none; text-align: center; transition: all 0.3s;">
            <i class="fas fa-plus-circle" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
            <span style="font-weight: 600;">Nouveau Membre</span>
        </a> --}}
    </div>
</div>
@endsection