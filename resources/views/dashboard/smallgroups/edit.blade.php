@extends('layouts.form')
@include('partials.nav', ['menuButton' => 'Dashboard', 'submitButton' => 'Update SG'])
@section('content')
<div class="container post-container">

	<hr/>
<div class="col-sm-6">
	{!! Form::model($smallgroup, ['url' => '/home/smallgroups/' . $smallgroup->id, 'method' => 'PATCH', 'files' => 'true', 'class' => 'blog-form']) !!}
		@include('dashboard.smallgroups._form', ['submitButtonText' => 'Update SG', 'published' => 'Update At'])
	{!! Form::close() !!}
</div>
<div class="col-sm-6">
	@include('errors.list')
</div>
	

	

	
</div>
@endsection