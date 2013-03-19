<?php
	$city_list = array();
	$selected_city = 0;
	$i = 0;
	foreach ($cities as $tuple)
	{
		if ($city === $tuple['city'] && $state === $tuple['state'])
			$selected_city = $i;
		$city_list[$i] = $tuple['city'].', '.$tuple['state'];
		$i++;
	}
?>

{{ HTML::link('user/home', '&laquo;Back') }}

{{ Form::open('user/settings', 'POST', array('class'=>'form-horizontal')) }}	
{{ Form::hidden('city', $cities[$selected_city]['city'], array('id'=>'city')) }}
{{ Form::hidden('state', $cities[$selected_city]['state'], array('id'=>'state')) }}
	<div class="control-group">
		{{ Form::label('email', 'Email', array('class'=>'control-label')) }}
		<div class="controls">
			{{ Form::text('email', $user->email) }}
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('password', 'Password', array('class'=>'control-label')) }}
		<div class="controls">
			{{ Form::password('password') }}
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('cities', 'Default City', array('class'=>'control-label')) }}
		<div class="controls">
			{{ Form::select('cities', $city_list, $selected_city) }}
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('zip', 'Zipcode', array('class'=>'control-label')) }}
		<div class="controls">
			{{ Form::text('zip', $user->zip) }}
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('newsletter', 'Subscribe to newsletter', array('class'=>'control-label')) }}
		<div class="controls">
			{{ Form::checkbox('newsletter', 1, $user->newsletter) }}
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			{{ Form::submit('Login', array('class'=>'btn')) }}
		</div>
	</div>
	</fieldset>
{{ Form::close() }}
<script type = "text/javascript">
var cities = new Array(
@foreach ($cities as $i=>$city)
@if ($i !== 0)
, "{{$city['city']}}"
@else
"{{$city['city']}}"
@endif
@endforeach
);

var states = new Array(
@foreach ($cities as $i=>$city)
@if ($i !== 0)
, "{{$city['state']}}"
@else
"{{$city['state']}}"
@endif
@endforeach
);

$("#cities").change(function() {
	var id = $("#cities").val();
	$("#city").val(cities[id]);
	$("#state").val(states[id]);
});
</script>

