@extends('layouts.home')

@section('content')
<div class="row page-header">
  <div class="col-xs-6">
    <h1>SmallGroups</h1>
  </div>
  <div class="col-xs-6">
    {{ link_to_action('SmallgroupsController@create', 'New Smallgroup', null, ['class' => 'btn btn-primary']) }}
  </div>
</div>
@if($smallgroups)
@foreach($smallgroups as $smallgroup)
<div class="row dash-list">
  <div class="col-sm-4">
    <h2>{{ $smallgroup->name }}</h2>
  </div>
  <div class="col-sm-1">
    {{ link_to_action('SmallgroupsController@edit', 'Edit', $smallgroup->id, ['class' => 'btn btn-primary']) }}
  </div>
  <div class="col-sm-1">
    <button class="btn btn-danger" data-toggle="modal" data-target=".delete-modal">Delete</button>
  </div>
</div>
@endforeach
@endif


@if($smallgroups)
<!-- Modal For Deleting Article -->
<div class="modal fade delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
        {!! Form::open(['url' => '/home/smallgroups/'.$smallgroup->id, 'method' => 'POST', 'class' => 'modal-delete' ]) !!}
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <button class="btn-danger btn" type="submit">Delete</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endif
@stop