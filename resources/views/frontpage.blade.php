
<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>Zeedapp || App Landing Html Template</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/magnificpopup.css">
    <link rel="stylesheet" href="assets/css/jquery.mb.YTPlayer.min.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" 
    crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="https://maghnet.tk/favicon.png">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- preloader area end -->
    <!-- header area start -->
    <header id="header">
        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="menu-area">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="logo">
                                <h1>MyHealthApp</h1>
                            </div>
                        </div>
                        <div class="col-md-9 hidden-xs hidden-sm">
                            <div class="main-menu">
                                <nav class="nav-menu">
                                    <ul>
                                        <li class="active"><a href="#feature">Fonctionnalités</a></li>
                                        <li><a href="{{ env('APP_URL') }}/login">Compte</a></li>
                                        <li><a href="{{ env('APP_URL') }}/register">Vous Inscrire</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12 visible-sm visible-xs">
                            <div class="mobile_menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    <!-- slider area start -->
    <section id="home" class="slider-area with-gradiant parallax" data-speed="3" data-bg-image="assets/img/header.jpg">
        <div class="container">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <div class="slider-inner text-left">
                        <h2><i class="fas fa-stethoscope"></i> MyHealthApp</h2><br>
                        <h4><i class="fas fa-check"></i> Perdez du poids</h5>
                        <h4><i class="fas fa-check"></i> Magez mieux</h5>
                        <h4><i class="fas fa-check"></i> Vivez mieux</h5><br>
                        <img width="50%" src="https://play.google.com/intl/en_us/badges/images/generic/fr_badge_web_generic.png" />
                        <img width="44%" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Download_on_the_App_Store_Badge.svg/1280px-Download_on_the_App_Store_Badge.svg.png" />
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 hidden-xs">
                <div class="row">
                    <div class="slider-img">
                        <img src="assets/img/mobile/slider.png" alt="slider image">
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    
    <div class="service-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service-single">
                        <img src="assets/img/service/service-img1.png" alt="service image">
                        <h2>Rapide</h2>
                        <p>Nos serveurs sont à la pointe <br>de la technologie</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-6">
                    <div class="service-single">
                        <img src="assets/img/service/service-img3.png" alt="service image">
                        <h2>Organisé</h2>
                        <p>Tout est clair & net !</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 col-6">
                    <div class="service-single">
                        <img src="assets/img/service/service-img2.png" alt="service image">
                        <h2>Suivi</h2>
                        <p>Nos systèmes suivent en temps réel <br>vos paramètres</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end -->
    <!-- about area start -->
    
    <!-- about area end -->
    <!-- feature area start -->
    <section class="feature-area bg-gray ptb--100" id="feature">
        <div class="container">
            <div class="section-title">
                <h2>Fonctionnalités</h2>
                <p>Hautes performances pour une santé Premium</p>
                <p></p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="ft-content rtl">
                        <div class="ft-single">
                            <img src="https://lifesum.com/media/usps/food.52f1575f.png" width="15%" alt="icon">
                            <div class="meta-content">
                                <h2>Recettes</h2>
                                <p>Miammmmmmmm — nous avons de délicieuses recettes pour tous les goûts et toutes les occasions ! Et elles sont bonnes. VRAIMENT bonnes !</p>
                            </div>
                        </div>
                        <div class="ft-single">
                            <img src="https://lifesum.com/media/usps/scale.324d2522.png" width="15%" alt="icon">
                            <div class="meta-content">
                                <h2>Détection de la progression du poids</h2>
                                <p>Aucun glucide n'échappera à nos fonctions de détection.</p>
                            </div>
                        </div>
                        <div class="ft-single">
                            <img src="assets/img/icon/icons/all.png" width="15%" alt="icon">
                            <div class="meta-content">
                                <h2>Android, IOS et Web</h2>
                                <p>Accedez à vos données sur tous vos appareils</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm col-xs-12">
                    <div class="ft-screen-img">
                        <img src="assets/img/mobile/phone.png" alt="image">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="ft-content">
                        <div class="ft-single">
                            <img src="https://lifesum.com/media/usps/rocket.4a0b9992.png" width="15%" alt="icon">
                            <div class="meta-content">
                                <h2>Régime 5kilos-2</h2>
                                <p>Perte de poids importante avec notre régime de 2 semaines, complété par des listes de courses et la planification des repas.</p>
                            </div>
                        </div>
                        <div class="ft-single">
                            <img src="assets/img/icon/icons/secure.png" width="15%"alt="icon">
                            <div class="meta-content">
                                <h2>Sécurisé</h2>
                                <p>Nos systèmes sont à la pointe de la technologie. Vos données personnelles doivent être protégées.</p>
                            </div>
                        </div>
                        <div class="ft-single">
                            <img src="https://lifesum.com/media/usps/sync.de882bcd.png" width="15%" alt="icon">
                            <div class="meta-content">
                                <h2>Gratuit</h2>
                                <p>Simple, facile et gratuit, pour la vie</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature area end -->
    <!-- achivement area start -->
    <div class="testimonial-area ptb--100">
        <div class="container">
            <div class="section-title">
                <h2>Ce que disent nos utilisateurs</h2>
                <p>Votre avis est important</p>
            </div>
            <div class="testimonial-slider owl-carousel">
                <div class="single-tst">
                    <img src="assets/img/author/tst-author1.jpg" alt="author">
                    <h4>Mostafa</h4>
                    <p>Avec le régime 5kilos-2 de MyHealthApp, j'ai appris qu'on a pas besoin de souffrir pour perdre du poids. </p>
                </div>
                <div class="single-tst">
                    <img src="assets/img/author/tst-author2.jpg" alt="author">
                    <h4>Fatima</h4>
                    <p>Avec les recettes que j'ai trouvé sur MyHealthApp, j'ai pu équilibrer ma nutrition, avec des repas succulents.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="achivement-area ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="ach-single">
                        <div class="icon"><i class="fa fa-book"></i></div>
                        <span class="counter">3</span>
                        <h5>Regimes</h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="ach-single">
                        <div class="icon"><i class="fa fa-trophy"></i></div>
                        <span class="counter">1</span>
                        <h5>Application de folie !!!</h5>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="ach-single">
                        <div class="icon"><i class="fa fa-coffee"></i></div>
                        <p><span class="counter">250</p>
                        <h5>Recettes</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- achivement area end -->
    <!-- screen slider area start -->
    <!--<section class="screen-area bg-gray ptb--100" id="screenshot">
        <div class="container">
            <div class="section-title">
                <h2>Screenshot</h2>
                <p>Nemo enim ipsam voluptatem quia voluptas sit</p>
            </div>
            <img class="screen-img" src="assets/img/mobile/screen-slider.png" alt="mobile screen">
            <div class="screen-slider owl-carousel">
                <div class="single-screen">
                    <img src="assets/img/mobile/screen-slider/screen1.jpg" alt="mobile screen">
                </div>
                <div class="single-screen">
                    <img src="assets/img/mobile/screen-slider/screen2.jpg" alt="mobile screen">
                </div>
                <div class="single-screen">
                    <img src="assets/img/mobile/screen-slider/screen3.jpg" alt="mobile screen">
                </div>
                <div class="single-screen">
                    <img src="assets/img/mobile/screen-slider/screen4.jpg" alt="mobile screen">
                </div>
                <div class="single-screen">
                    <img src="assets/img/mobile/screen-slider/screen5.jpg" alt="mobile screen">
                </div>
                <div class="single-screen">
                    <img src="assets/img/mobile/screen-slider/screen3.jpg" alt="mobile screen">
                </div>
                <div class="single-screen">
                    <img src="assets/img/mobile/screen-slider/screen4.jpg" alt="mobile screen">
                </div>
            </div>
        </div>
    </section>-->
    <!-- screen slider area end -->
    <!-- testimonial carousel area start -->
    
    <!-- testimonial carousel area end -->
    <!-- video area start -->

    </div>
    <footer>
        <div class="footer-area">
            <div class="container">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; 2018 - <script>document.write(new Date().getFullYear());</script> Maghnet</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- Scripts -->
    <script src="assets/js/jquery-3.2.0.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/counterup.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>