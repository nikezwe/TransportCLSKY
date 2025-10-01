@extends('layouts.user')
@section('title', 'Contact Us')
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>CLSKY TRANSPORTATION</h2>
                <h1>SHIPPING SHINE FROM CHINA-BURUNDI</h1>
                <p>Contact Us</p>
                <div class="hero-buttons">
                    <button class="btn btn-primary">LEARN MORE</button>
                    <button class="btn btn-secondary">OUR SERVICES</button>
                </div>
            </div>
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
                        <p>10005, Battery Park<br>New York, NY, USA</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3>Téléphone</h3>
                        <p>(+888) 567-290-456<br>(+888) 567-290-457</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Email</h3>
                        <p>info@davana.com<br>contact@davana.com</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Horaires</h3>
                        <p>Lun - Sam: 9AM - 5PM<br>Dimanche: Fermé</p>
                    </div>
                </div>

                <div class="contact-form-wrapper">
                    <form class="contact-form" onsubmit="handleSubmit(event)">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" placeholder="Votre Nom *" required>
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Votre Email *" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="tel" placeholder="Votre Téléphone *" required>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Sujet">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea rows="6" placeholder="Votre Message *" required></textarea>
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
