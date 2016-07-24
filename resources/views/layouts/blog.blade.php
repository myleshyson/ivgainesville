<!DOCTYPE html>
<html lang = "en">
  <head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InterVarsity Gainesville</title>
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans:400,700,800|Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/libs.css">
    <link rel="stylesheet" type="text/css" href="/css/medium-front.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
  </head>
  <body class="animsition">

  @yield('content')
  <footer class="blog-footer">
    <div class="row text-center">
      <div class="col-md-8 col-md-offset-2">
        <h1>Stay Connected With Us!</h1>
      </div>
    </div>
      <div class="row text-center social">
        <div class="col-sm-2 col-sm-offset-1"><a href="https://www.facebook.com/intervarsitygainesville/?ref=aymt_homepage_panel" target="_blank"><i class="fa fa-facebook-square"></i></a></div>
        <div class="col-sm-2">
          <a href="https://twitter.com/IVGainesville" target="_blank"><i class="fa fa-twitter-square"></i></a>
        </div>
         <div class="col-sm-2">
          <a href="https://www.instagram.com/ivgville/" target="_top"><i class="fa fa-instagram"></i></a>
        </div>
         <div class="col-sm-2">
          <a href="mailto:myles.hyson@intervarsity.org" target="_top"><i class="fa fa-envelope"></i></a>
        </div>
         <div class="col-sm-2">
          <a href="tel:407-803-1209"><i class="fa fa-phone-square"></i></a>
        </div>
      </div>
       
  </footer>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/js/libs.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    @yield('footer')
    @include('partials.flash')
    <script id="dsq-count-scr" src="//intervarsitygainesville.disqus.com/count.js" async></script>
  </body>
</html>
