@extends('layouts.form')
@include('partials.nav')

@section('content')
	<div class="container post-container">
	<h1 class="text-center">Contact Us</h1>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<hr/>
		{!! Form::open([ 'url' => '/contact', 'method' => 'POST', 'class' => 'contact-form' ]) !!}
		{!! csrf_field() !!}
		@include('pages.contact_form')
		{!! Form::close() !!}

		@include('errors.list')
		</div>
	</div>
</div>
@stop

