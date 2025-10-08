<!-- filepath: resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'CL SKY - Transport Chine-Burundi')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    @stack('head')
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <i class="fas fa-hard-hat"></i>
                <div class="logo-text">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/icon.jpg') }}" alt="Logo" style="height: 50px;">
                    </a>
                    <p>Transportation Chine-Burundi</p>
                </div>
            </div>
            <div class="header-contact">
                <div class="contact-item">
                    <i class="far fa-envelope"></i>
                    <div class="contact-info">
                        <h4>Mail Us</h4>
                        <p>info@clsky.com</p>
                    </div>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <div class="contact-info">
                        <h4>Call Now</h4>
                        <p>(+257) 65-331-185</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="nav">
        <div class="container">
            <div class="mobile-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="nav-menu" id="navMenu">
                <li><a href="{{ route('home') }}" class="active">HOME</a></li>
                <li><a href="{{ route('about') }}">ABOUT</a></li>
                <li><a href="{{ route('service') }}">SERVICES</a></li>
                <li><a href="{{ route('annonce') }}">ACTUALITES</a></li>
                <li><a href="{{ route('contact') }}">CONTACT</a></li>
            </ul>
        </div>
    </nav>
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-column">
                        <div class="footer-logo">
                            <i class="fas fa-hard-hat"></i>
                            <div>
                                <h3>CLSKY</h3>
                                <p>Transportation</p>
                            </div>
                        </div>
                        <p class="footer-desc">Passsionne par votre satisfaction par une personne experimente.Transport
                            de vos marchandise par la voie maritime et aerienne de la CHINE au BURUNDI</p>
                    </div>

                    <div class="footer-column">
                        <h4>Liens Rapides</h4>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fas fa-angle-right"></i> HOME</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i> ABOUT</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i> SERVICES</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i> ACTUALITES</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i> CONTACT</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Nos Services</h4>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fas fa-angle-right"></i> Transport CHINE-BURUNDI</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i> Importation et Exportation</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i> Dedouanement</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i> Paiement des fournisseurs en
                                    chine</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i> Services des visas</a></li>
                            <li><a href="#"><i class="fas fa-angle-right"></i> Les billets d'avion</a></li>
                        </ul>
                    </div>

                    <div class="footer-column">
                        <h4>Suivez-nous</h4>
                        <p>Suivez-nous sur les liens ci-dessous</p>
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="footer-contact-info">
                            <p><i class="fas fa-phone-alt"></i> (+888) 567-290-456</p>
                            <p><i class="fas fa-envelope"></i> info@clsky.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2025 CLSKY BURUNDI. Tous droits réservés. | Développé par
                    AdvancedIT Burundi Team</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/user.js') }}"></script>
    @stack('scripts')
</body>

</html>
