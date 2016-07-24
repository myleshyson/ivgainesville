@inject('excerpt', '\Illuminate\Support\Str')
@extends('layouts.blog')

@section('content')
	<div class="jumbotron blog-jumbotron">
		<div class="container">
			<h1> IV Gainesville Blog </h1>
		</div>
	</div>
	<div class="container blog-home">
		@foreach($articles as $article)
	<div class="row">
		
	
		<a href="/blog/{{ $article->id }}?{{ $queryString }}" class="blog-listing-wrapper">
		<article class=" col-md-8 col-md-offset-2 text-left blog-listing text-center">
			@foreach($article->photos as $photo)
			<div class="col-xs-{{ 12/count($article->photos) }}">
				<div class="bl-photo thumbnail" style="background-image: url('/{{ $photo->path }}')"></div>
			</div>
			@endforeach
			<h2>{{ strip_tags($article->title) }}</h2>
			<small class="published-footer">Posted {{ $article->published_at->toDayDateTimeString() }}</small>
		</article>
		</a>
		</div>
		@endforeach
	</div>
@endsection