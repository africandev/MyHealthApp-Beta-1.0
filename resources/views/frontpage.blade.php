
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
    <link rel="shortcut icon" type="image/png" href="assets/img/icon/favicon.ico">
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
                        <h4><i class="fas fa-arrow-right"></i> Perdez du poids</h5>
                        <h4><i class="fas fa-arrow-right"></i> Magex mieux</h5>
                        <h4><i class="fas fa-arrow-right"></i> Vivez mieux</h5><br>
                        <a class="expand-video" href="https://www.youtube.com/watch?v=8qs2dZO6wcc"><i class="fa fa-play"></i>Watch the video</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 hidden-xs">
                <div class="row">
                    <div class="slider-img">
                        <img src="assets/img/mobile/slider-left-img.png" alt="slider image">
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
                            <img src="assets/img/icon/feature/1.png" alt="icon">
                            <div class="meta-content">
                                <h2>Recettes</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, iumod tempor incididunt</p>
                            </div>
                        </div>
                        <div class="ft-single">
                            <img src="assets/img/icon/feature/2.png" alt="icon">
                            <div class="meta-content">
                                <h2>Unique Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, iumod tempor incididunt</p>
                            </div>
                        </div>
                        <div class="ft-single">
                            <img src="assets/img/icon/feature/3.png" alt="icon">
                            <div class="meta-content">
                                <h2>Voice Maker</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, iumod tempor incididunt</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm col-xs-12">
                    <div class="ft-screen-img">
                        <img src="assets/img/mobile/ft-screen-img.png" alt="image">
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="ft-content">
                        <div class="ft-single">
                            <img src="assets/img/icon/feature/4.png" alt="icon">
                            <div class="meta-content">
                                <h2>Easy Settings</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, iumod tempor incididunt</p>
                            </div>
                        </div>
                        <div class="ft-single">
                            <img src="assets/img/icon/feature/5.png" alt="icon">
                            <div class="meta-content">
                                <h2>Flat Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, iumod tempor incididunt</p>
                            </div>
                        </div>
                        <div class="ft-single">
                            <img src="assets/img/icon/feature/6.png" alt="icon">
                            <div class="meta-content">
                                <h2>Easy Download</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, iumod tempor incididunt</p>
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
                <h2>Client Says</h2>
                <p>Nemo enim ipsam voluptatem quia voluptas sit</p>
            </div>
            <div class="testimonial-slider owl-carousel">
                <div class="single-tst">
                    <img src="assets/img/author/tst-author1.jpg" alt="author">
                    <h4>John Doe</h4>
                    <span>Founder</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                    <ul class="tst-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-ponterest"></i></a></li>
                    </ul>
                </div>
                <div class="single-tst">
                    <img src="assets/img/author/tst-author2.jpg" alt="author">
                    <h4>John Doe</h4>
                    <span>CEO</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                    <ul class="tst-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-ponterest"></i></a></li>
                    </ul>
                </div>
                <div class="single-tst">
                    <img src="assets/img/author/tst-author1.jpg" alt="author">
                    <h4>John Doe</h4>
                    <span>CEO</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                    <ul class="tst-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-ponterest"></i></a></li>
                    </ul>
                </div>
                <div class="single-tst">
                    <img src="assets/img/author/tst-author2.jpg" alt="author">
                    <h4>John Doe</h4>
                    <span>CEO</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>
                    <ul class="tst-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-ponterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="achivement-area ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="ach-single">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <p><span class="counter">10</span>k</p>
                        <h5>Happy Clients</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="ach-single">
                        <div class="icon"><i class="fa fa-book"></i></div>
                        <span class="counter">978</span>
                        <h5>Projects complet</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="ach-single">
                        <div class="icon"><i class="fa fa-coffee"></i></div>
                        <p><span class="counter">150</span>k</p>
                        <h5>Cups of coffee</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="ach-single">
                        <div class="icon"><i class="fa fa-trophy"></i></div>
                        <span class="counter">100</span>
                        <h5>Winning awards</h5>
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