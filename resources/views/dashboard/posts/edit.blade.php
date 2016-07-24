@extends('layouts.editor')
@section('content')
{!! Form::model($article, ['url' => '/home/posts/' . $article->id, 'method' => 'PATCH', 'files' => 'true', 'class' => 'blog-form']) !!}
@include('partials.editor-nav')
<div class="container post-container">
@include('errors.ajax')
    <div class="title-editable" id="post-title">{!! $article->title !!}</div>
    <hr>
    <div class="body-editable" id="post-body">{!! $article->body !!}</div>
</div>
{!! Form::close() !!}
@endsection
@section('footer')
@include('editor.update')
@stop