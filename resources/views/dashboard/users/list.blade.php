@extends('layouts.home')
@section('content')
<div class="row page-header">
  <div class="col-xs-6">
    <h1>Staff</h1>
  </div>
  <div class="col-xs-6">
  </div>
</div>
@foreach($users as $user)
<div class="row hb-list">
  <div class="col-xs-6">
  <h2>{{ $user->name }}</h2>
  </div>
  <div class="col-xs-1 text-center">
    <button class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">Delete</button>
  </div>
  <div class="col-xs-1 text-center">
    <button class="btn btn-danger" data-toggle="modal" data-target="#photo-modal"> Photos</button>
  </div>
</div>


<!-- Modal For Deleting Article -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Article</h4>
      </div>
      <div class="modal-body">
        <h1>Are you sure about this?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {!! Form::open(['url' => '/home/posts/'.$user->id, 'method' => 'POST', 'class' => 'modal-delete' ]) !!}
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <button class="btn-danger btn" type="submit">Delete</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<!-- Modal for Adding Photo -->
<div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Photo</h4>
      </div>
      <div class="modal-body">
      <div class="row">
      @if(count($user->photo) > 0 )
        <div class="col-xs-1 text-center photo-list">
            {!! Form::open(['url' => 'home/users/photo/'.$user->photo->id, 'method' => 'POST', 'id' => 'mydropzone']) !!}
            {!! csrf_field() !!}
            {!! method_field('DELETE') !!}
            <button type="submit" class="thumbnail-delete">&times;</button>
            {!! Form::close() !!}
            <img src="/{{ $user->photo->path }}" class="post-thumbnail">
        @endif
        </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
        <form class="dropzone" action="/home/users/{{ $user->id }}/photos" method="POST" id="addPhotosForm">
          {{ csrf_field() }}
        </form>
      </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@stop