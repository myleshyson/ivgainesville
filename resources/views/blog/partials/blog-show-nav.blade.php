<nav class="navbar navbar-default navbar-static-top blog-show-nav">
  <div class="container text-center">
     <!-- Brand -->
    <div class="pull-left">
      <a class="btn btn-primary" href="/blog?{{ $queryString }}">
      Back
      </a>
    </div>
      <div class="image-icon hidden-xs">
        <img src="/images/iv-social.png" class="text-center">
      </div>
    <div class="pull-right">
      <p href="">{{ $user->name }}</p>
      @if($user->photo != null)
      <div class="image-icon">
        <img src="/{{ $user->photo->path }}">
      </div>
      @endif
    </div>
  </div>
</nav>