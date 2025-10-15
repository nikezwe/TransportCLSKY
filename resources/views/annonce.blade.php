@extends('layouts.user')
@section('title', 'Annonces')
@section('content')
    <!-- Banner Section -->
    <section class="banner">
        <div class="container">
            <div class="banner-content">
                <h2>Nos Actualités</h2>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="container">
            <div class="section-title">
                {{-- <h2>Actualités & <span>Annonces</span></h2> --}}
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
                                    <span><i class="fas fa-calendar"></i> {{ $annonce->created_at->format('d/m/Y') }}</span>
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
                            <p>CLSKY continue d'offrir des services de transport fiables et sécurisés entre la Chine et le
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
                            <p>CLSKY renforce ses partenariats avec les principaux ports chinois pour un service encore plus
                                efficace...</p>
                            <a href="{{ route('annonce') }}" class="read-more">Lire plus <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Bouton pour voir toutes les annonces si plus de 3 --}}
            {{-- @if ($annonces && $annonces->count() > 3)
                <div style="text-align: center; margin-top: 40px;">
                    <a href="{{ route('annonce') }}" class="btn btn-primary">
                        Voir toutes les actualités <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endif --}}
        </div>
    </section>
@endsection
