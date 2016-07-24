@extends('layouts.blog')
@include('blog.partials.blog-show-nav')
@section('content')
<div class="container-fluid show">
	@if($photos === 1)
	<!-- If there is only 1 photo -->
	@foreach($article->photos as $photo)
	<div class="row">
		<div class="blog-hero" id="article-img" style="background-image: linear-gradient(rgba(37, 34, 27, .5), rgba(37, 34, 27, .5)), url('/{{ $photo->path }}')">
			<div class="title-wrapper" id="title">
				<h1 class="article-title">{{ strip_tags($article->title) }}</h1>
			</div>
		</div>
	</div>
	@endforeach
	<!-- If there are more than one photo, make them fit in banner -->
	@elseif($photos > 1)
	<div class="row hero-multiple-wrapper">
		@foreach($article->photos as $i => $photo)
		<div  class="col-sm-{{ 12/$photos }} @if($i != 0) hidden-xs @endif img-wrapper">
			<div style="background-image: linear-gradient(rgba(37, 34, 27, .5), rgba(37, 34, 27, .5)), url('/{{ $photo->path }}');" class="article-img-multiple"></div>
		</div>
		
		@endforeach
		<div class="blog-title-wrapper">
			<h1 class="article-title" id="title">{{ strip_tags($article->title)  }}</h1>
		</div>
	</div>
	<!-- If there is no image, just show title and body -->
	@else
	<div class="row">
		<div class="col-md-12 no-photo">
			<h1 class="text-center">{{ strip_tags($article->title)  }}</h1>
			<hr>
		</div>
	</div>
	
	@endif
	<div class="row article-body">
		<div class="col-md-8 col-md-offset-2">
			<div class="body">{!! $article->body !!}</div>
			@if(Auth::user())
			{{ link_to_action('BlogController@edit', 'Edit This Article', $article->id, ['class' => 'btn btn-success btn-lg']) }}
			@endif
		</div>
	</div>
	<div class="row after">
	<div class="col-md-8 col-md-offset-2">
	<hr>
		<div class="col-sm-6">
		@if($user->photo)
			<div class="user-photo" style="background-image: url('/{{ $user->photo->path }}')"></div>
		@endif
		</div>
		<div class="col-sm-6">
			<h2>Thanks For Reading!</h2>
			<p class="lead">None of this could be possible without your prayers and support!</p>
			<p class="lead">If you would like to make a donation towards what God's doing here, click below.</p>
				<a href="https://donate.intervarsity.org/donate#17064" class="btn btn-primary btn-lg" target="_blank">Donate</a>
			
		</div>
	</div>
		
	</div>
</div>
<div class="row">
<div id="disqus_thread" class="col-md-8 col-md-offset-2"></div>
</div>
@include('partials.parallax')

<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configurationrvariables
     */
   
    var disqus_config = function () {
        this.page.url = "{{ action("SiteController@blogShow", ['id' => $article->id]) }}";  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = {{ $article->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
  
    (function() {  // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        
        s.src = '//intervarsitygainesville.disqus.com/embed.js';
        
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
@endsection
