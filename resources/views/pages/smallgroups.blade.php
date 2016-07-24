
@extends('layouts.app')
@section('content')
@include('partials.smallgroup-modal')
<div class="jumbotron smallgroups-jumbotron">
	<div class="container">
		<h1>Small Groups</h1>
		<p></p>
	</div>
</div>
<div class="container-fluid">
	<div class="row text-center smallgroups-wrapper">
		@foreach($smallgroups as $smallgroup)
		<div class="col-md-4 col-sm-12 text-center">
			<div class="smallgroup" type="button" data-toggle="modal" data-target="#myModal" data-name="{!! $smallgroup->name !!}" data-mt="{!! $smallgroup->meeting_time !!}" data-leader="{!! $smallgroup->leader !!}" data-description="{!! $smallgroup->description !!}" data-cell="{!! $smallgroup->cell !!}" data-email="{!! $smallgroup->email !!}">
				<h1>{{ $smallgroup->name }}</h1>
				<div>{{ $smallgroup->meeting_time }}</div>
				<div>{{ $smallgroup->meeting_location}}</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@stop

@section('footer')
<script type="text/javascript">
$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var name = button.data('name');
  var mt = button.data('mt');
  var leader = button.data('leader');
  var description = button.data('description');
  var cell = button.data('cell');
  var email = button.data('email');

  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text(name);
  modal.find('#sg-d').text(description);
  modal.find('#leader').text(leader);
  modal.find('#cell').text(cell);
  modal.find('#email').text(email);
});
</script>
@endsection