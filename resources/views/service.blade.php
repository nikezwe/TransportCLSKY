@extends('layouts.user')
@section('title', 'Our Services')
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>CLSKY TRANSPORTATION</h2>
                <h1>SHIPPING SHINE FROM CHINA-BURUNDI</h1>
                <p>Our Services</p>
                <div class="hero-buttons">
                    <a href="{{ route('about') }}" class="btn btn-primary">LEARN MORE</a>
                    <a href="{{ route('service') }}" class="btn btn-secondary">OUR SERVICES</a>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery">
        <div class="container">
            <div class="section-title">
                <h2>OUR SERVICES</h2>
                <p>Découvrez nos services.</p>
            </div>

            <div class="gallery-grid">
                <div class="gallery-item">
                    <div class="gallery-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h3>Construction Résidentielle</h3>
                        <p>Projet Villa Moderne</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h3>Bâtiment Commercial</h3>
                        <p>Centre Commercial</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h3>Infrastructure</h3>
                        <p>Pont Autoroutier</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-image" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h3>Rénovation</h3>
                        <p>Immeuble Historique</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-image" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h3>Projet Industriel</h3>
                        <p>Usine de Production</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-image" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h3>Architecture Moderne</h3>
                        <p>Tour de Bureaux</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
