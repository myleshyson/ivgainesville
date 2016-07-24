@extends('layouts.editor')

@section('content')
	{!! Form::open([ 'url' => '/home/posts' ]) !!}
    @include('partials.editor-nav')
        <div class="container post-container">
        @include('errors.ajax')
    		<div class="title-editable" id="post-title"></div>
            <hr>
            <div class="body-editable" id="post-body"></div>
            
        </div>
	{!! Form::close() !!}
@endsection
@section('footer')
@include('editor.create')
@endsection