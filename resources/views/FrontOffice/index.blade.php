<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $seo_title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $seo_description }}">
    <meta name="keywords" content="{{ $seo_keywords }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/animate.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/aos.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/ionicons.min.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/flaticon.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/icomoon.css">
    <link rel="stylesheet" href="https://evalbtp-production.up.railway.app/clients_assets/css/style.css">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T5ZHDVNX');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-65KF96TJSN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-65KF96TJSN');
    </script>
    <!-- End Google Analytics -->

</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5ZHDVNX"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="">Home<small>Renovation</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="" class="nav-link">Accueil</a></li>
                <li class="nav-item"><a href="/client" class="nav-link">Devis</a></li>
                <li class="nav-item"><a href="" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<section class="home-slider owl-carousel">
    @foreach ($sliders as $slider)
    <div class="slider-item" style="background-image: url({{ $slider->image_url }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-4">{{ $slider->title }}</h1>
                    <p class="mb-4 mb-md-5">{{ $slider->description }}</p>
                    <p><a href="/client" class="btn btn-primary p-3 px-xl-4 py-xl-3">Faire un devis</a></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>

<section class="ftco-intro">
    <div class="container-wrap">
        <div class="wrap d-md-flex align-items-xl-end">
            <div class="info">
                <div class="row no-gutters">
                    @foreach ($contact_infos as $contact_info)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="{{ $contact_info->icon }}"></span></div>
                        <div class="text">
                            <h3>{{ $contact_info->value }}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="book p-4">
                <h3>Prendre rendez-vous</h3>
                <form action="" class="appointment-form">
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Prénom">
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" class="form-control" placeholder="Nom">
                        </div>
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-md-calendar"></span></div>
                                <input type="text" class="form-control appointment_date" placeholder="Date">
                            </div>
                        </div>
                        <div class="form-group ml-md-4">
                            <div class="input-wrap">
                                <div class="icon"><span class="ion-ios-clock"></span></div>
                                <input type="text" class="form-control appointment_time" placeholder="Heure">
                            </div>
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" class="form-control" placeholder="Téléphone">
                        </div>
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="2" class="form-control"
                                      placeholder="Message"></textarea>
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="submit" value="Prendre rendez-vous" class="btn btn-white py-3 px-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="ftco-menu">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Les types de maisons</h2>
                <p>Explorez notre gamme diversifiée de maisons, de l'élégance standard aux finitions premium. Chaque type de maison est accompagné d'une durée de construction préétablie.</p>
            </div>
        </div>
        <div class="row d-md-flex">
            <div class="col-lg-12 ftco-animate p-md-5">
                <div class="row">
                    @foreach ($types_maisons as $type_maison)
                    <div class="col-md-4 text-center">
                        <div class="menu-wrap">
                            <a href="" class="menu-img img mb-4" style="background-image: url({{ $type_maison->image_url }});"></a>
                            <div class="text">
                                <h3><a href="">{{ $type_maison->title }}</a></h3>
                                <p>{{ $type_maison->description }}</p>
                                <p class="price"><span>{{ $type_maison->price }}</span></p>
                                <p><a href="" class="btn btn-primary btn-outline-primary">Détails</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">HomeRenovation</h2>
                    <p>Une équipe passionnée et dévouée à rendre votre maison plus que parfaite.</p>
                    <ul class="ftco-footer-social list-unstyled mt-2">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Liens rapides</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Accueil</a></li>
                        <li><a href="#" class="py-2 d-block">Devis</a></li>
                        <li><a href="#" class="py-2 d-block">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Services</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Rénovation</a></li>
                        <li><a href="#" class="py-2 d-block">Réhabilitation</a></li>
                        <li><a href="#" class="py-2 d-block">Construction</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Avez-vous des questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            @foreach ($contact_infos as $contact_info)
                            <li><span class="icon icon-map-marker"></span><span class="text">{{ $contact_info->value }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Créé avec <i class="icon-heart" aria-hidden="true"></i> par <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>

<!-- JS Libraries -->
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/jquery.min.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/popper.min.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/bootstrap.min.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/jquery.easing.1.3.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/jquery.waypoints.min.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/jquery.stellar.min.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/owl.carousel.min.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/jquery.magnific-popup.min.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/aos.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/jquery.animateNumber.min.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/bootstrap-datepicker.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/scrollax.min.js"></script>
<script src="https://evalbtp-production.up.railway.app/clients_assets/js/main.js"></script>

</body>
</html>
