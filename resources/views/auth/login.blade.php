<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DBD | Iniciar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
        <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
        <meta name="author" content="FREEHTML5.CO" />

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
        <!-- Animate.css -->
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <!-- Superfish -->
        <link rel="stylesheet" href="{{asset('css/superfish.css')}}">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
        <!-- CS Select -->
        <link rel="stylesheet" href="{{asset('css/cs-select.css')}}">
        <link rel="stylesheet" href="{{asset('css/cs-skin-border.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!-- Modernizr JS -->
        <script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
    </head>
    <body>
        <div id="fh5co-wrapper">
        <div id="fh5co-page">
        <header id="fh5co-header-section" class="sticky-banner">
            <div class="container">
                <div class="nav-header">
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                    <h1 id="fh5co-logo"><a href="index.html"><i class="icon-airplane"></i>Travel</a></h1>
                    <!-- START #fh5co-menu-wrap -->
                    <nav id="fh5co-menu-wrap" role="navigation">
                        <ul class="sf-menu" id="fh5co-primary-menu">
                            <li><a href="alojamientos">Alojamientos</a></li>
                            <li>
                                <a href="actividades" class="fh5co-sub-ddown">Actividades</a>
                            </li>
                            <li><a href="vuelos">Vuelos</a></li>
                            <li>
                                <a href="autos">Autos</a>
                                <ul class="fh5co-sub-menu">
                                    <li><a href="#">Arriendo</a></li>
                                    <li><a href="#">Traslado</a></li>
                                </ul>
                            </li>
                            <li><a href="paquetes">Paquetes</a></li>
                            <li><a href="register">Registro</a></li>
                            <li><a href="login">Iniciar sesión</a></li>
                            <!--<li><a href="contact.html">Añadir Fondos</a></li>-->
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div class="fh5co-hero">
            <div class="fh5co-overlay"></div>
            <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_3.jpg);">
                <div class="desc">
                     <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8" style="margin-top: -110px; margin-left: 100px">
                                <div class="card">
                                    <div class="card-header">{{ __('Inicio sesión') }}</div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recordar') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Ingresar') }}
                                                    </button>

                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('¿Olvido su contraseña?') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <!-- jQuery Easing -->
        <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('js/sticky.js')}}"></script>
        <!-- Stellar -->
        <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
        <!-- Superfish -->
        <script src="{{asset('js/hoverIntent.js')}}"></script>
        <script src="{{asset('js/superfish.js')}}"></script>
        <!-- Magnific Popup -->
        <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/magnific-popup-options.js')}}"></script>
        <!-- Date Picker -->
        <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
        <!-- CS Select -->
        <script src="{{asset('js/classie.js')}}"></script>
        <script src="{{asset('js/selectFx.js')}}"></script>
        <!-- Main JS -->
        <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>