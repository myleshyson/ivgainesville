<!DOCTYPE html>
<html>
  <head>
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>InterVarsity Gainesville</title>
<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Open+Sans:400,700,800|Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/medium.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/libs.css">
  </head>
  <body>
        @yield('content')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
      <form action="/file-upload"
      class="dropzone"
      id="photo-modal">
         {{ csrf_field() }}
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
    <script type="text/javascript" src="/js/medium-dep.js"></script>
    <script type="text/javascript" src="/js/medium-insert.js"></script>
    <script type="text/javascript" src="/js/medium-addons.js"></script>
    <script type="text/javascript" src="/js/libs.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript"></script>
   @yield('footer')
  </body>
</html>
