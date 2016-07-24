<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InterVarsity Gainesville</title>
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans:400,700,800|Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/libs.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body class="animsition">
    @include('partials/nav')
       @yield('content')
    @if($footer == 'false')

    @else
    <footer class="footer">
      <div class="row">
        <div class="col-sm-4">
          <h1 class="text-center"><span>InterVarsity USA</span></h1>
          <ul class="iv-usa text-center list-unstyled">
            <li><a href="https://intervarsity.org/about/our/our-purpose" title="About who we are.">About Us</a></li>
            <li><a href="https://intervarsity.org/about/our/our-doctrinal-basis" title="Our Doctrinal Basis">Doctrinal Statement</a></li>
            <li><a href="https://intervarsity.org/about/our/our-core-values" title="Core Values">Core Values</a></li>
            <li><a href="https://intervarsity.org/about/our/vital-statistics" title="Vital Stats">Vital Statistics</a></li>
          </ul>
        </div>
        <div class="col-sm-4 text-center">
          <img src="/images/Gainesville_logo_blue_FINAL5.png" class="footer-image text-center">
        </div>
        <div class="col-sm-4">
          <h1 class="text-center"><span>Connect With Us!</span></h1>
          <ul class="list-inline text-center social">
            <li class="col-sm-2 col-sm-offset-1"><a href="https://www.facebook.com/intervarsitygainesville/?ref=aymt_homepage_panel" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li class="col-sm-2"><a href="https://twitter.com/IVGainesville" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li class="col-sm-2"><a href="https://www.instagram.com/ivgville/" target="_top"><i class="fa fa-instagram"></i></a></li>
            <li class="col-sm-2"><a href="mailto:myles.hyson&#64;intervarsity.org" target="_top"><i class="fa fa-envelope-o"></i></a></li>
            <li class="col-sm-2"><a href="tel:407-803-1209"><i class="fa fa-mobile"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
    @endif
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/js/libs.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    @yield('footer')
    @include('partials.flash')
  </body>
</html>
