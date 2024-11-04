<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/price-range.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">


    @yield('header')
</head>

<body>
    <header>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="">
            <title>Shop | Shopper</title>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/font-awesome.min.css" rel="stylesheet">
            <link href="css/prettyPhoto.css" rel="stylesheet">
            <link href="css/price-range.css" rel="stylesheet">
            <link href="css/animate.css" rel="stylesheet">
            <link href="css/main.css" rel="stylesheet">
            <link href="css/responsive.css" rel="stylesheet">
            <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
            <![endif]-->
            <link rel="shortcut icon" href="images/ico/favicon.ico">
            <link rel="apple-touch-icon-precomposed" sizes="144x144"
                href="images/ico/apple-touch-icon-144-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="114x114"
                href="images/ico/apple-touch-icon-114-precomposed.png">
            <link rel="apple-touch-icon-precomposed" sizes="72x72"
                href="images/ico/apple-touch-icon-72-precomposed.png">
            <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        </head><!--/head-->

        <body>
            <header id="header"><!--header-->
                <div class="header_top"><!--header_top-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 ">
                                <div class="contactinfo">
                                    <ul class="nav nav-pills">
                                        <li><a href=""><i class="fa fa-phone"></i> +111111111</a></li>
                                        <li><a href=""><i class="fa fa-envelope"></i> Thien@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="social-icons pull-right">
                                    <ul class="nav navbar-nav">
                                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div><!--/header_top-->

                <div class="header-middle"><!--header-middle-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="logo pull-left">
                                    {{-- <a href="index.html"><img src="images/home/logo.png" alt="" /></a> --}}
                                    <h1>LOGO</h1>
                                </div>

                            </div>
                            <div class="col-sm-8">
                                <div class="shop-menu pull-right">
                                    <ul class="nav navbar-nav1">
                                        <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                                        <li><a href="gio-hang"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                        <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header-middle-->

                <div class="header-bottom"><!--header-bottom-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <x-main-menu/>
                                <div class="col-sm-3">
                                    <div class="search_box pull-right">
                                        <input type="text" placeholder="Search"/>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </header>
    </header>




    <main>
        @yield('content')
    </main>




    <footer>
        <footer id="footer"><!--Footer-->
           

            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>AAAAAAA</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="">aaaaa</a></li>
                                    <li><a href="lien-he">Contact</a></li>
                                    <li><a href="">aaaaaa</a></li>
                                    <li><a href="">aaaaaaa</a></li>
                                    <li><a href="">aaaaaaaa</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>AAAAAAA</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="">aaaaa</a></li>
                                    <li><a href="lien-he">Contact</a></li>
                                    <li><a href="">aaaaaa</a></li>
                                    <li><a href="">aaaaaaa</a></li>
                                    <li><a href="">aaaaaaaa</a></li>
                                </ul>
                            </div>
                        </div><div class="col-sm-2">
                            <div class="single-widget">
                                <h2>AAAAAAA</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="">aaaaa</a></li>
                                    <li><a href="lien-he">Contact</a></li>
                                    <li><a href="">aaaaaa</a></li>
                                    <li><a href="">aaaaaaa</a></li>
                                    <li><a href="">aaaaaaaa</a></li>
                                </ul>
                            </div>
                        </div><div class="col-sm-2">
                            <div class="single-widget">
                                <h2>AAAAAAA</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="">aaaaa</a></li>
                                    <li><a href="lien-he">Contact</a></li>
                                    <li><a href="">aaaaaa</a></li>
                                    <li><a href="">aaaaaaa</a></li>
                                    <li><a href="">aaaaaaaa</a></li>
                                </ul>
                            </div>
                        </div><div class="col-sm-2">
                            <div class="single-widget">
                                <h2>AAAAAAA</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="">aaaaa</a></li>
                                    <li><a href="lien-he">Contact</a></li>
                                    <li><a href="">aaaaaa</a></li>
                                    <li><a href="">aaaaaaa</a></li>
                                    <li><a href="">aaaaaaaa</a></li>
                                </ul>
                            </div>
                        </div><div class="col-sm-2">
                            <div class="single-widget">
                                <h2>AAAAAAA</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="">aaaaa</a></li>
                                    <li><a href="lien-he">Contact</a></li>
                                    <li><a href="">aaaaaa</a></li>
                                    <li><a href="">aaaaaaa</a></li>
                                    <li><a href="">aaaaaaaa</a></li>
                                </ul>
                            </div>
                        </div>
  

                    </div>
                </div>
            </div>

            <div class="footer-bottom">

            </div>

        </footer><!--/Footer-->





    </footer>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    @yield('footer')
    


</body>

</html>
