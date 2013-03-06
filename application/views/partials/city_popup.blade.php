	<div id="city_popup_holder">
		<div id="city_popup">
			<h2>Choose a City</h2>
			<p>Choose from our currently supported cities.</p>
			<br>
			{{ Form::open('home/city', 'POST', array('id'=>'city_form')); }}
			{{ Form::hidden('city', null, array('id'=>'city_val')); }}
			{{ Form::hidden('state', null, array('id'=>'state_val')); }}
			<div id="cities_left">
				<ul>
				<?php
				for ($i = 0; $i < 25; $i++)
				{
					$city = $cities[$i]['city'];
					$state = $cities[$i]['state'];
					echo '<li>';
					echo '<a href="javascript:void(0)" onClick="chooseCity(\''.$city.'\', \''.$state.'\')">'.$city.', '.$state.'</a> ';
					echo '</li>';
				}
				?>
				</ul>
			</div>
			<div id="cities_right">
				<ul>
				<?php
				for ($i = 25; $i < 50; $i++)
				{
					$city = $cities[$i]['city'];
					$state = $cities[$i]['state'];
					echo '<li>';
					echo '<a href="javascript:void(0)" onClick="chooseCity(\''.$city.'\', \''.$state.'\')">'.$city.', '.$state.'</a> ';
					echo '</li>';
				}
				?>
				</ul>
			</div>
			{{ Form::close(); }}
		</div>
	</div>
<script type = "text/javascript">
function chooseCity(city, state)
{
	$('#city_val').val(city);
	$('#state_val').val(state);
	$('#city_form').submit();
}

function showCityPopup()
{
	$('#city_popup_holder').show();
}
$(function() {
@if ($current_city === null || $current_state === null)
showCityPopup();
@endif
});
</script>

