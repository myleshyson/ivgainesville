@extends('layouts.form')

@include('partials.nav', ['menuButton' => 'Dashboard', 'submitButton' => 'Submit'])
@section('content')
<div class="container post-container">

	<hr/>
<div class="col-sm-6">
	{!! Form::open([ 'url' => '/home/smallgroups', 'method' => 'POST', 'files' => 'true', 'class' => 'blog-form' ]) !!}
		{{ csrf_field() }}
		@include('dashboard.smallgroups._form', ['submitButtonText' => 'Add Smallgroup'])
	{!! Form::close() !!}
</div>
<div class="col-sm-6">
	@include('errors.list')
</div>
	
</div>
@endsection