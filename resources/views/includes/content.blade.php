<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <title>MyHealthApp</title>
    <link rel="icon" href="https://maghnet.tk/favicon.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Achraf Ghellach">
    <meta name="keywords" content="maghnet, maghnet.tk, lifesum, php, laravel, application, myhealthapp, MyHealthApp, mYhEALTHaPP, MYHEALTHAPP, LifeSum, Lifesum ,
    Myhealthapp, health.maghnet.tk">

    <!-- Title Page-->
    

    <!-- Fontfaces CSS-->
    <link href="{{ env('APP_URL') }}/panel/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ env('APP_URL') }}/panel/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ env('APP_URL') }}/panel/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ env('APP_URL') }}/panel/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Bootstrap CSS-->
    <link href="{{ env('APP_URL') }}/panel/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ env('APP_URL') }}/panel/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{ env('APP_URL') }}/panel/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{ env('APP_URL') }}/panel/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{ env('APP_URL') }}/panel/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{ env('APP_URL') }}/panel/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{ env('APP_URL') }}/panel/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{ env('APP_URL') }}/panel/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ env('APP_URL') }}/panel/css/theme.css" rel="stylesheet" media="all">
    

</head>

<body class="animsition">
    @auth
        <div class="page-wrapper">
            @include('includes.header')
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @include('includes.messages')
                        @yield('content')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Achraf Ghellach. Tous droit réservés</p>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
            @include('includes.modals')
        </div>
    @endauth
    @guest
        <div class="page-wrapper">
            @yield('authentification')
        </div>
    @endguest


    <!-- Jquery JS-->
    <script src="{{ env('APP_URL') }}/panel/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{ env('APP_URL') }}/panel/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="{{ env('APP_URL') }}/panel/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="{{ env('APP_URL') }}/panel/vendor/slick/slick.min.js">
    </script>
    <script src="{{ env('APP_URL') }}/panel/vendor/wow/wow.min.js"></script>
    <script src="{{ env('APP_URL') }}/panel/vendor/animsition/animsition.min.js"></script>
    <script src="{{ env('APP_URL') }}/panel/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="{{ env('APP_URL') }}/panel/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{ env('APP_URL') }}/panel/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{ env('APP_URL') }}/panel/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{ env('APP_URL') }}/panel/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script src="{{ env('APP_URL') }}/panel/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="{{ env('APP_URL') }}/panel/js/main.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

</body>

</html>
<!-- end document-->
