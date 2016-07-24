<nav class="navbar navbar-default navbar-static-top editor-nav">

<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="/images/social-iv.png" class="text-center" alt="Brand"></a>
      @if(!$article->is_published)
      <p class="publish-text">Draft</p>
      @else
      <p>Published {{ $article->published_at->toDayDateTimeString() }}</p>
      @endif
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>{!! Form::button('Publish', ['type' => 'submit', 'id' => "save", 'class' => 'navbar-btn btn btn-primary']) !!}</li>
        <li>{{ link_to_action('BlogController@index', 'Back To Posts') }}</li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li>
          <li><!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button></li>
           <li role="separator" class="divider"></li>
          <div class="form-group">
            <label for="time">Set Publish Date/Time</label>
            <input id="time" name="published_at" type="datetime-local" value="{{ $now->format('Y-m-d\TH:i') }}">
          </div>
          </li>
          </ul>
        </li>
        <li class="navbar-brand">@if($user->photo != null)
      <img src="/{{ $user->photo->path }}">
      @endif</li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>