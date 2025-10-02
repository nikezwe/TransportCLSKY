<!-- resources/views/annonce-detail.blade.php -->
@extends('layouts.user')
@section('title', $annonce->title . ' - CL SKY Transport')
@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); padding: 80px 0; text-align: center; color: white;">
    <div class="container">
        <h1 style="font-size: 48px; margin-bottom: 15px;">{{ $annonce->title }}</h1>
        <div style="display: flex; align-items: center; justify-content: center; gap: 20px; font-size: 16px; margin-top: 20px;">
            <span><i class="fas fa-calendar"></i> {{ $annonce->created_at->format('d M Y') }}</span>
            <span><i class="fas fa-user"></i> Par Admin</span>
        </div>
    </div>
</section>

<!-- Article Content -->
<section style="padding: 80px 0; background: #f8f9fa;">
    <div class="container">
        <div style="max-width: 900px; margin: 0 auto;">
            <!-- Article Card -->
            <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-bottom: 40px;">
                
                <!-- Featured Image -->
                @if($annonce->image)
                <div style="width: 100%; height: 500px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $annonce->image) }}" alt="{{ $annonce->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                @else
                <div style="width: 100%; height: 500px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-bullhorn" style="font-size: 120px; color: rgba(255,255,255,0.3);"></i>
                </div>
                @endif

                <!-- Article Body -->
                <div style="padding: 50px;">
                    <!-- Meta Info -->
                    <div style="display: flex; align-items: center; gap: 30px; padding-bottom: 20px; border-bottom: 2px solid #e2e8f0; margin-bottom: 30px;">
                        <div style="display: flex; align-items: center; gap: 10px; color: #64748b;">
                            <i class="fas fa-calendar-alt"></i>
                            <span>{{ $annonce->created_at->format('d F Y') }}</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 10px; color: #64748b;">
                            <i class="fas fa-clock"></i>
                            <span>{{ $annonce->created_at->format('H:i') }}</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 10px; color: #64748b;">
                            <i class="fas fa-user"></i>
                            <span>Admin CLSKY</span>
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div style="font-size: 18px; line-height: 1.8; color: #334155;">
                        {!! nl2br(e($annonce->description)) !!}
                    </div>

                    <!-- External Link (if exists) -->
                    @if($annonce->link)
                    <div style="margin-top: 40px; padding: 30px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 12px; text-align: center;">
                        <h3 style="color: white; margin-bottom: 15px; font-size: 22px;">En savoir plus</h3>
                        <a href="{{ $annonce->link }}" target="_blank" style="display: inline-block; padding: 12px 30px; background: white; color: #667eea; border-radius: 50px; text-decoration: none; font-weight: 600;">
                            Visitez le lien externe <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                    @endif

                    <!-- Share Section -->
                    <div style="margin-top: 40px; padding-top: 30px; border-top: 2px solid #e2e8f0;">
                        <h4 style="margin-bottom: 15px; color: #1e293b;">Partager cet article</h4>
                        <div style="display: flex; gap: 10px;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" style="width: 40px; height: 40px; background: #1877f2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; font-size: 18px;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $annonce->title }}" target="_blank" style="width: 40px; height: 40px; background: #1da1f2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; font-size: 18px;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $annonce->title }}" target="_blank" style="width: 40px; height: 40px; background: #0077b5; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; font-size: 18px;">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://wa.me/?text={{ $annonce->title }} {{ url()->current() }}" target="_blank" style="width: 40px; height: 40px; background: #25d366; color: white; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none; font-size: 18px;">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 60px;">
                <a href="{{ route('annonce') }}" style="display: inline-flex; align-items: center; gap: 10px; padding: 12px 25px; background: white; color: #667eea; border-radius: 50px; text-decoration: none; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <i class="fas fa-arrow-left"></i> Retour aux actualités
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related Articles -->
@if($autresAnnonces->count() > 0)
<section style="padding: 80px 0; background: white;">
    <div class="container">
        <div class="section-title">
            <h2>Autres <span>Actualités</span></h2>
            <p>Découvrez nos autres publications</p>
        </div>

        <div class="news-grid" style="margin-top: 50px;">
            @foreach($autresAnnonces as $index => $autre)
            @php
                $gradients = [
                    'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                    'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                    'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                ];
                $gradient = $gradients[$index % count($gradients)];
            @endphp
            
            <div class="news-card">
                @if($autre->image)
                    <div class="news-image" style="background: url('{{ asset('storage/' . $autre->image) }}') center/cover; height: 250px; position: relative;">
                        <div class="news-date">
                            <span class="day">{{ $autre->created_at->format('d') }}</span>
                            <span class="month">{{ $autre->created_at->format('M') }}</span>
                        </div>
                    </div>
                @else
                    <div class="news-image" style="background: {{ $gradient }}; height: 250px; position: relative;">
                        <div class="news-date">
                            <span class="day">{{ $autre->created_at->format('d') }}</span>
                            <span class="month">{{ $autre->created_at->format('M') }}</span>
                        </div>
                    </div>
                @endif
                
                <div class="news-content">
                    <div class="news-meta">
                        <span><i class="fas fa-user"></i> Par Admin</span>
                        <span><i class="fas fa-calendar"></i> {{ $autre->created_at->format('d/m/Y') }}</span>
                    </div>
                    <h3>{{ $autre->title }}</h3>
                    <p>{{ Str::limit($autre->description, 100) }}</p>
                    <a href="{{ route('annonce.show', $autre->id) }}" class="read-more">
                        Lire plus <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('annonce') }}" class="btn btn-primary">
                Voir toutes les actualités <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section style="padding: 80px 0; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); text-align: center; color: white;">
    <div class="container">
        <h2 style="font-size: 36px; margin-bottom: 20px;">Restez Informé</h2>
        <p style="font-size: 18px; margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto;">
            Abonnez-vous à notre newsletter pour recevoir nos dernières actualités et offres spéciales.
        </p>
        <form onsubmit="handleNewsletter(event)" style="max-width: 500px; margin: 0 auto; display: flex; gap: 10px;">
            <input type="email" placeholder="Votre adresse email" required style="flex: 1; padding: 15px 20px; border-radius: 50px; border: none; font-size: 16px;">
            <button type="submit" style="background: white; color: #667eea; padding: 15px 30px; border-radius: 50px; border: none; font-weight: 600; cursor: pointer; white-space: nowrap;">
                S'abonner <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</section>

@endsection