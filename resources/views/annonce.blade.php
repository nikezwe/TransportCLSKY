@extends('layouts.user')
@section('title', 'Annonces')
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>CLSKY TRANSPORTATION</h2>
                <h1>SHIPPING SHINE FROM CHINA-BURUNDI</h1>
                <p>Actualites</p>
                <div class="hero-buttons">
                    <button class="btn btn-primary">LEARN MORE</button>
                    <button class="btn btn-secondary">OUR SERVICES</button>
                </div>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="container">
            <div class="section-title">
                <h2>Actualités & <span>Annonces</span></h2>
                <p>Restez informés de nos dernières nouvelles, projets et actualités du secteur de la construction.</p>
            </div>

            <div class="news-grid">
                <div class="news-card">
                    <div class="news-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <div class="news-date">
                            <span class="day">25</span>
                            <span class="month">Sept</span>
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="fas fa-user"></i> Par Admin</span>
                            <span><i class="fas fa-comments"></i> 15 Commentaires</span>
                        </div>
                        <h3>Nouveau projet de construction durable lancé</h3>
                        <p>Nous sommes fiers d'annoncer le lancement de notre nouveau projet de construction écologique qui
                            intègre les dernières technologies vertes...</p>
                        <a href="#" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="news-card">
                    <div class="news-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="news-date">
                            <span class="day">20</span>
                            <span class="month">Sept</span>
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="fas fa-user"></i> Par Admin</span>
                            <span><i class="fas fa-comments"></i> 23 Commentaires</span>
                        </div>
                        <h3>Davana remporte le prix de l'excellence</h3>
                        <p>Notre entreprise a été récompensée pour son excellence dans le domaine de la construction et son
                            engagement envers la qualité...</p>
                        <a href="#" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="news-card">
                    <div class="news-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="news-date">
                            <span class="day">15</span>
                            <span class="month">Sept</span>
                        </div>
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="fas fa-user"></i> Par Admin</span>
                            <span><i class="fas fa-comments"></i> 8 Commentaires</span>
                        </div>
                        <h3>Nouvelles techniques de construction innovantes</h3>
                        <p>Découvrez les dernières innovations technologiques que nous avons intégrées dans nos processus de
                            construction pour améliorer l'efficacité...</p>
                        <a href="#" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
