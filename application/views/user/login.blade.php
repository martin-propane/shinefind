{{ Form::open('login', 'POST', array('class'=>'form-horizontal')) }}
	<fieldset>
	<div class="control-group">
		{{ Form::label('email', 'Email', array('class'=>'control-label')) }}
		<div class="controls">
			{{ Form::text('email') }}
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('password', 'Password', array('class'=>'control-label')) }}
		<div class="controls">
			{{ Form::password('password') }}
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			{{ Form::submit('Login', array('class'=>'btn')) }}
		</div>
	</div>
	</fieldset>
{{ Form::close() }}

<p>
Don't have an account? Click <a href="{{URL::to('register');}}">here</a> to create one.
</p>

