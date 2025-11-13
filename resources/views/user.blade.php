@extends('layouts.user')
@section('title', 'Accueil - CL SKY Transport Chine-Burundi')
@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>CL SKY TRANSPORTATION</h2>
                <h1>SHIPPING COMPANY FROM CHINA-BURUNDI</h1>
                <p>GURA, RANGURA MURI CHINE</p>
                <div class="hero-buttons">
                    <a href="{{ route('about') }}" class="btn btn-primary">LEARN MORE</a>
                    <a href="{{ route('service') }}" class="btn btn-secondary">OUR SERVICES</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="welcome">
        <div class="container">
            <div class="welcome-content">
                <h2>Nous assurons le transport des biens de la CHINE au <span>BURUNDI</span></h2>
                <p></p>
                <div class="features">
                    <div class="feature">
                        <i class="fas fa-ship"></i>
                        <div>
                            <h3>Transport Maritime</h3>
                            <p>CL SKY Company vous offre un service d'expédition de vos marchandises depuis la Chine au
                                Burundi par la voie maritime.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <i class="fas fa-plane"></i>
                        <div>
                            <h3>Transport Aérien</h3>
                            <p>Service de transport rapide par voie aérienne pour vos envois urgents et prioritaires.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h3>Livraison Rapide</h3>
                            <p>Délais de livraison garantis avec suivi en temps réel de vos marchandises.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <i class="fas fa-shield-alt"></i>
                        <div>
                            <h3>Sécurité Garantie</h3>
                            <p>Protection complète de vos biens avec assurance transport internationale.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-image">
                <img src="{{ asset('img/img1.png') }}" style="width: 100%; height: 500px; object-fit: cover;">
            </div>
        </div>
    </section>

    <!-- Gallery Section - SERVICES DYNAMIQUES -->
    <section class="gallery">
        <div class="container">
            <div class="section-title">
                <h2>Nos Services</h2>
                <p>Découvrez nos services.</p>
            </div>

            <div class="gallery-grid">
                @if ($services && $services->count() > 0)
                    @foreach ($services as $index => $service)
                        @php
                            $gradients = [
                                'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                                'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                                'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                                'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
                                'linear-gradient(135deg, #30cfd0 0%, #330867 100%)',
                                'linear-gradient(135deg, #a8edea 0%, #fed6e3 100%)',
                            ];
                            $gradient = $gradients[$index % count($gradients)];
                        @endphp

                        <div class="gallery-item">
                            <div class="gallery-image service-item" data-title="{{ $service->title }}"
                                data-description="{{ $service->description }}"
                                data-image="{{ $service->image ? asset('storage/' . $service->image) : '' }}"
                                style="background: {{ $service->image ? 'url(' . asset('storage/' . $service->image) . ') center/cover' : $gradient }};">
                                <div class="gallery-overlay">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                            </div>
                            <div class="gallery-info">
                                <h3>{{ $service->title }}</h3>
                                @if ($service->description)
                                    <p>{{ Str::limit($service->description, 80) }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!--Modal personnalisé -->
    <div id="serviceModal" class="custom-modal">
        <div class="custom-modal-content">
            <span class="close-modal">&times;</span>
            <img id="modalImage" src="" alt="Image du service" class="modal-img">
            <h3 id="modalTitle"></h3>
            <p id="modalDescription"></p>
        </div>
    </div>
    </section>

    <!-- News/Announcements Section - ANNONCES DYNAMIQUES -->
    <section class="news">
        <div class="container">
            <div class="section-title">
                <h2>Actualités & <span>Annonces</span></h2>
                <p>Restez informés de nos dernières nouvelles et actualités.</p>
            </div>

            <div class="news-grid">
                @if ($annonces && $annonces->count() > 0)
                    {{-- Afficher les annonces depuis la base de données --}}
                    @foreach ($annonces as $index => $annonce)
                        @php
                            $gradients = [
                                'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                                'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                                'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                            ];
                            $gradient = $gradients[$index % count($gradients)];
                        @endphp

                        <div class="news-card">
                            @if ($annonce->image)
                                {{-- Si l'annonce a une image --}}
                                <div class="news-image"
                                    style="background: url('{{ asset('storage/' . $annonce->image) }}') center/cover;">
                                    <div class="news-date">
                                        <span class="day">{{ $annonce->created_at->format('d') }}</span>
                                        <span class="month">{{ $annonce->created_at->format('M') }}</span>
                                    </div>
                                </div>
                            @else
                                {{-- Sinon afficher un gradient --}}
                                <div class="news-image" style="background: {{ $gradient }};">
                                    <div class="news-date">
                                        <span class="day">{{ $annonce->created_at->format('d') }}</span>
                                        <span class="month">{{ $annonce->created_at->format('M') }}</span>
                                    </div>
                                </div>
                            @endif

                            <div class="news-content">
                                <div class="news-meta">
                                    <span><i class="fas fa-user"></i> Par Admin</span>
                                    <span><i class="fas fa-calendar"></i>
                                        {{ $annonce->created_at->format('d/m/Y') }}</span>
                                </div>
                                <h3>{{ $annonce->title }}</h3>
                                <p>{{ Str::limit($annonce->description, 120) }}</p>

                                <a href="{{ route('annonce.show', $annonce->id) }}" class="read-more">
                                    Lire plus <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Annonces par défaut si la base de données est vide --}}
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
                            </div>
                            <h3>Service de qualité</h3>
                            <p>CL SKY continue d'offrir des services de transport fiables et sécurisés entre la Chine et le
                                Burundi...</p>
                            <a href="{{ route('annonce') }}" class="read-more">Lire plus <i
                                    class="fas fa-arrow-right"></i></a>
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
                            </div>
                            <h3>Nouveaux services disponibles</h3>
                            <p>Découvrez nos nouveaux services de dédouanement et assistance visa pour faciliter vos
                                démarches...</p>
                            <a href="{{ route('annonce') }}" class="read-more">Lire plus <i
                                    class="fas fa-arrow-right"></i></a>
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
                            </div>
                            <h3>Partenariat stratégique</h3>
                            <p>CL SKY renforce ses partenariats avec les principaux ports chinois pour un service encore
                                plus
                                efficace...</p>
                            <a href="{{ route('annonce') }}" class="read-more">Lire plus <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Bouton pour voir toutes les annonces si plus de 3 --}}
            @if ($annonces && $annonces->count() > 3)
                <div style="text-align: center; margin-top: 40px;">
                    <a href="{{ route('annonce') }}" class="btn btn-primary">
                        Voir toutes les actualités <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contactez <span>Nous</span></h2>
                <p>N'hésitez pas à nous contacter pour toute question ou demande de devis. Notre équipe est à votre
                    disposition.</p>
            </div>

            <div class="contact-wrapper">
                <div class="contact-info-cards">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>Notre Adresse</h3>
                        <p>Bujumbura mairie, Rohero 1<br>Avenue de Croix Rouge Num 2</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>Téléphone</h3>
                        <p>(+257) 65 250 000<br>(+257) 65 280 000<br>(+257) 65 210 000<br>(+257) 65 150
                            000<br>(+257) 65 790 000</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Email</h3>
                        <p>clskycompany@gmail.com<br>clskycompany@gmail.com</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Horaires</h3>
                        <p>Lun - Sam: 9h00 - 17h00<br>Dimanche: Fermé</p>
                    </div>
                </div>

                <div class="contact-form-wrapper">
                    <form class="contact-form" action="" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Votre Nom *" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Votre Email *" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="tel" name="phone" placeholder="Votre Téléphone">
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" placeholder="Sujet *" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="6" name="message" placeholder="Votre Message *" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-submit">
                            Envoyer le Message <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
