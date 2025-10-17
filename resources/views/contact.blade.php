@extends('layouts.user')
@section('title', 'Contact Us')
@section('content')
    <!-- Banner Section -->
    <section class="banner">
        <div class="container">
            <div class="banner-content">
                <h2>Contactez-nous</h2>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section class="contact">
        <div class="container">
            <div class="section-title">
                {{-- <h2>Contactez <span>Nous</span></h2> --}}
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
                        <p>Bujumbura mairie, Rohero 1 <br>
                            Avenue de Croix Rouge Num 2</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>Téléphone</h3>
                        <p>(+257) 65 150 000 <br>
                            (+257) 65 250 000</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Email</h3>
                        <p>info@clsky.com <br>
                            contact@clsky.com </p>
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
                    <form class="contact-form" onsubmit="handleSubmit(event)"method="post">
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
