<div class="form-group">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('leader', 'Leader:' )!!}
	{!! Form::text('leader', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('cell', 'Leader Cell:' )!!}
	{!! Form::text('cell', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('email', 'Leader Email:' )!!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('meeting_time', 'Meeting Time:' )!!}
	{!! Form::text('meeting_time', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('meeting_location', 'Meeting Location:' )!!}
	{!! Form::text('meeting_location', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control hidden', 'id' => 'submit-form']) !!}
</div>