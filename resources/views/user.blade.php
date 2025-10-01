@extends('layouts.user')
@section('title', 'Accueil - CL SKY Transport Chine-Burundi')
@section('content')
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>CLSKY TRANSPORTATION</h2>
                <h1>SHIPPING SHINE FROM CHINA-BURUNDI</h1>
                <p>GURA, RANGURA MUR CHINE</p>
                <div class="hero-buttons">
                    <button class="btn btn-primary">LEARN MORE</button>
                    <button class="btn btn-secondary">OUR SERVICES</button>
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
                        <i class="fas fa-hard-hat"></i>
                        <div>
                            <h3>Home Service</h3>
                            <p>CLSKY Company vous offre un service d'expedition de vos marchandises depuis la Chine au Burundi par la voie martime et aerienne.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <i class="fas fa-users"></i>
                        <div>
                            <h3>Excellence Workers</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h3>Quick Response</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do.</p>
                        </div>
                    </div>
                    <div class="feature">
                        <i class="fas fa-tools"></i>
                        <div>
                            <h3>Quality Instrument</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-image">
                <img src="img/img1.png" style="width: 100%; height: 500px"></img>
            </div>
        </div>
    </section>

    {{-- <!-- Services Section -->
    <section class="services">
        <div class="container">
            <div class="section-title">
                <h2>Our <span>Services</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="service-grid">
                <div class="service-card">
                    <div class="service-image"></div>
                </div>
                <div class="service-card">
                    <div class="service-image"></div>
                </div>
                <div class="service-card">
                    <div class="service-image"></div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Gallery Section -->
    <section class="gallery">
        <div class="container">
            <div class="section-title">
                <h2>OUR SERVICES</h2>
                <p>Découvrez nos services.</p>
            </div>

            <div class="gallery-grid">
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
            </div>
        </div>
    </section>

    <!-- News/Announcements Section -->
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
                        </div>
                        <h3>Nouveau projet de construction durable lancé</h3>
                        <p>Nous sommes fiers d'annoncer le lancement de notre nouveau projet de construction écologique qui intègre les dernières technologies vertes...</p>
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
                        </div>
                        <h3>CLSKY remporte le prix de l'excellence</h3>
                        <p>Notre entreprise a été récompensée pour son excellence dans le domaine de la construction et son engagement envers la qualité...</p>
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
                        </div>
                        <h3>Nouvelles techniques de construction innovantes</h3>
                        <p>Découvrez les dernières innovations technologiques que nous avons intégrées dans nos processus de construction pour améliorer l'efficacité...</p>
                        <a href="#" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Contactez <span>Nous</span></h2>
                <p>N'hésitez pas à nous contacter pour toute question ou demande de devis. Notre équipe est à votre disposition.</p>
            </div>

            <div class="contact-wrapper">
                <div class="contact-info-cards">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>Notre Adresse</h3>
                        <p>Bujumbura mairie,Rohero1<br>Avenue de Croix Rouge  Num2</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3>Téléphone</h3>
                        <p>(+257) 67 150 000<br>(+257)67 250 000</p>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Email</h3>
                        <p>info@clsky.com<br>contact@clsky.com</p>
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