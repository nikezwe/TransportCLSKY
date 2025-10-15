@extends('layouts.user')
@section('title', 'Our Services')
@section('content')
    <!-- Banner Section -->
    <section class="banner">
        <div class="container">
            <div class="banner-content">
                <h2>Our Services</h2>
            </div>
        </div>
    </section>
    <section class="gallery">
        <div class="container">
            <div class="section-title">
                {{-- <h2>Découvrez nos services.</h2> --}}
                <p>Découvrez nos services.</p>
            </div>

            <div class="gallery-grid">
                @if ($services && $services->count() > 0)
                    {{-- Afficher les services depuis la base de données --}}
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
                            @if ($service->image)
                                {{-- Si le service a une image, l'afficher --}}
                                <div class="gallery-image"
                                    style="background: url('{{ asset('storage/' . $service->image) }}') center/cover;">
                                    <div class="gallery-overlay">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                            @else
                                {{-- Sinon afficher un gradient --}}
                                <div class="gallery-image" style="background: {{ $gradient }};">
                                    <div class="gallery-overlay">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                            @endif

                            <div class="gallery-info">
                                <h3>{{ $service->title }}</h3>
                                @if ($service->description)
                                    <p>{{ Str::limit($service->description, 80) }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Services par défaut si la base de données est vide --}}
                    <div class="gallery-item">
                        <div class="gallery-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <div class="gallery-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="gallery-info">
                            <h3>Transport Chine-Burundi</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="gallery-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <div class="gallery-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="gallery-info">
                            <h3>Importation et Exportation</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="gallery-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <div class="gallery-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="gallery-info">
                            <h3>Dedouanement</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="gallery-image" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                            <div class="gallery-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="gallery-info">
                            <h3>paiement des fournisseur en chine</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="gallery-image" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                            <div class="gallery-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="gallery-info">
                            <h3>service des visas</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <div class="gallery-image" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                            <div class="gallery-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="gallery-info">
                            <h3>Billets d'avion</h3>
                            <p></p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
