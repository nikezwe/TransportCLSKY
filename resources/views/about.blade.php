@extends('layouts.user')
@section('title', 'About Us')
@section('content')
    <!-- Banner Section -->
    <section class="banner">
        <div class="container">
            <div class="banner-content">
                <h2>About Us</h2>
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
@endsection
