<!DOCTYPE html>
<html>
  <head>
    <title>InterVarsity Gainesville</title>
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans:400,700,800|Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/libs.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body>
        @yield('content')

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/js/libs.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    @include('partials.flash')
    @yield('footer')
  </body>
</html>
