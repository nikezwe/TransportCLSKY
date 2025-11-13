@extends('layouts.user')
@section('title', 'Our Services')

@section('content')
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

                        <div class="gallery-item service-item">
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
@endsection
