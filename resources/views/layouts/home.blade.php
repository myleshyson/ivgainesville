<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>InterVarsity Gainesville</title>
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans:400,700,800|Roboto" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/css/libs.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>

<body>
    @include('dashboard._nav') @include('dashboard._sidebar')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @yield('content')
    </div>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/js/libs.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    @yield('footer') @include('partials.flash')
</body>

</html>
