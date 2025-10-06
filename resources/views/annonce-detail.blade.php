@extends('layouts.user')
@section('title', $annonce->title . ' - CL SKY Transport')
@section('content')

<!-- Page Header -->
<section class="page-header" style="background: linear-gradient(90deg, #2c3e50 0%, #34495e 100%); padding: 60px 0; text-align: center; color: white;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <h1 style="font-size: 42px; margin-bottom: 15px; font-weight: 700;">{{ $annonce->title }}</h1>
        <div style="display: flex; align-items: center; justify-content: center; gap: 25px; font-size: 15px; margin-top: 20px; flex-wrap: wrap;">
            <span style="display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-calendar" style="color: #fdb714;"></i> 
                {{ $annonce->created_at->format('d M Y') }}
            </span>
            <span style="display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-user" style="color: #fdb714;"></i> 
                Par Admin CLSKY
            </span>
        </div>
    </div>
</section>

<!-- Article Content -->
<section style="padding: 60px 0; background: #f8f9fa;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div style="max-width: 900px; margin: 0 auto;">
            
            <!-- Article Card -->
            <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 3px 10px rgba(0,0,0,0.1); margin-bottom: 40px;">
                
                <!-- Featured Image -->
                @if($annonce->image)
                <div style="width: 100%; height: 450px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $annonce->image) }}" 
                         alt="{{ $annonce->title }}" 
                         style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                @else
                <div style="width: 100%; height: 450px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-bullhorn" style="font-size: 100px; color: rgba(255,255,255,0.3);"></i>
                </div>
                @endif

                <!-- Article Body -->
                <div style="padding: 40px;">
                    
                    <!-- Meta Info -->
                    <div style="display: flex; align-items: center; gap: 25px; padding-bottom: 20px; border-bottom: 2px solid #e0e0e0; margin-bottom: 30px; flex-wrap: wrap;">
                        <div style="display: flex; align-items: center; gap: 8px; color: #7f8c8d;">
                            <i class="fas fa-calendar-alt" style="color: #fdb714;"></i>
                            <span>{{ $annonce->created_at->format('d F Y') }}</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 8px; color: #7f8c8d;">
                            <i class="fas fa-clock" style="color: #fdb714;"></i>
                            <span>{{ $annonce->created_at->format('H:i') }}</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 8px; color: #7f8c8d;">
                            <i class="fas fa-user" style="color: #fdb714;"></i>
                            <span>Admin CLSKY</span>
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div style="font-size: 16px; line-height: 1.8; color: #333;">
                        {!! nl2br(e($annonce->description)) !!}
                    </div>

                    <!-- External Link (if exists) -->
                    @if($annonce->link)
                    <div style="margin-top: 40px; padding: 30px; background: linear-gradient(90deg, #2c3e50 0%, #34495e 100%); border-radius: 10px; text-align: center;">
                        <h3 style="color: white; margin-bottom: 15px; font-size: 20px; font-weight: 600;">En savoir plus</h3>
                        {{-- <a href="{{ $annonce->link }}" 
                           target="_blank" 
                           style="display: inline-flex; align-items: center; gap: 10px; padding: 12px 30px; background: #fdb714; color: #2c3e50; border-radius: 5px; text-decoration: none; font-weight: 600; transition: all 0.3s;">
                            Visitez le lien externe <i class="fas fa-external-link-alt"></i>
                        </a> --}}
                    </div>
                    @endif

                    <!-- Share Section -->
                    <div style="margin-top: 40px; padding-top: 30px; border-top: 2px solid #e0e0e0;">
                        <h4 style="margin-bottom: 20px; color: #2c3e50; font-size: 18px;">Partager cet article</h4>
                        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" 
                               target="_blank" 
                               style="width: 45px; height: 45px; background: #1877f2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 5px; text-decoration: none; font-size: 18px; transition: all 0.3s;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $annonce->title }}" 
                               target="_blank" 
                               style="width: 45px; height: 45px; background: #1da1f2; color: white; display: flex; align-items: center; justify-content: center; border-radius: 5px; text-decoration: none; font-size: 18px; transition: all 0.3s;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $annonce->title }}" 
                               target="_blank" 
                               style="width: 45px; height: 45px; background: #0077b5; color: white; display: flex; align-items: center; justify-content: center; border-radius: 5px; text-decoration: none; font-size: 18px; transition: all 0.3s;">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://wa.me/?text={{ $annonce->title }} {{ url()->current() }}" 
                               target="_blank" 
                               style="width: 45px; height: 45px; background: #25d366; color: white; display: flex; align-items: center; justify-content: center; border-radius: 5px; text-decoration: none; font-size: 18px; transition: all 0.3s;">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px; gap: 15px; flex-wrap: wrap;">
                <a href="{{ route('annonce') }}" 
                   style="display: inline-flex; align-items: center; gap: 10px; padding: 12px 25px; background: white; color: #2c3e50; border-radius: 5px; text-decoration: none; font-weight: 600; box-shadow: 0 3px 10px rgba(0,0,0,0.1); transition: all 0.3s;">
                    <i class="fas fa-arrow-left"></i> Retour aux actualités
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related Articles -->
@if($autresAnnonces->count() > 0)
<section style="padding: 60px 0; background: white;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <div class="section-title">
            <h2>Autres <span style="font-weight: 300;">Actualités</span></h2>
            <p>Découvrez nos autres publications</p>
        </div>

        <div class="news-grid" style="margin-top: 40px;">
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
<section style="padding: 60px 0; background: linear-gradient(90deg, #2c3e50 0%, #34495e 100%); text-align: center; color: white;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <h2 style="font-size: 32px; margin-bottom: 15px; font-weight: 700;">Restez Informé</h2>
        <p style="font-size: 16px; margin-bottom: 30px; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6; color: #95a5a6;">
            Abonnez-vous à notre newsletter pour recevoir nos dernières actualités et offres spéciales.
        </p>
        <form onsubmit="handleNewsletter(event)" style="max-width: 500px; margin: 0 auto; display: flex; gap: 10px; flex-wrap: wrap;">
            <input type="email" 
                   placeholder="Votre adresse email" 
                   required 
                   style="flex: 1; min-width: 250px; padding: 15px 20px; border-radius: 5px; border: none; font-size: 15px;">
            <button type="submit" 
                    class="btn btn-primary" 
                    style="padding: 15px 30px; white-space: nowrap;">
                S'abonner <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</section>

@endsection