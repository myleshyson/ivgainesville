
<div class="form-group">
			{!! Form::label('title', 'Name:') !!}
	    	{!! Form::text('name', null, ['class' => 'form-control']) !!}
    	</div>
    	<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
	    	{!! Form::text('email', null, ['class' => 'form-control']) !!}
    	</div>
    	<div class="form-group">
			{!! Form::label('cell', 'Phone:') !!}
	    	{!! Form::text('cell', null, ['class' => 'form-control']) !!}
    	</div>
    	<div class="form-group">
    	<label for="campus">Your Campus</label>
    	 <div class="radio">
		  <label>
		    <input type="radio" name="campus" id="uf" value="uf">
		    University of Florida
		  </label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="campus" id="santa_fe" value="santa_fe">
		   Santa Fe College
		  </label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="campus" id="other" value="other">
		   Other
		  </label>
		</div>
    	</div> 
    	<hr>
    	<div class="form-group">
	    	{!! Form::label('comments', 'Comments:') !!}
	    	{!! Form::textarea('comments', null, ['class' => 'form-control']) !!}
    	</div>
    	
    	<div class="form-group">
			{!! Form::button('Send!', ['class' => 'btn btn-primary form-control', 'type' => 'submit']) !!}
    	</div>