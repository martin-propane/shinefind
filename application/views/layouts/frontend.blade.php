<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="{{ URL::to_asset('css/960.css'); }}" />
<link rel="stylesheet" href="{{ URL::to_asset('css/text.css'); }}" />
<link rel="stylesheet" href="{{ URL::to_asset('css/reset.css'); }}" />
<link rel="stylesheet" href="{{ URL::to_asset('css/shinefind_main.css'); }}" />
<script type="text/javascript" src="{{ URL::to_asset('js/jquery-1.8.2.min.js'); }}"></script>
<script type="text/javascript" src="{{ URL::to_asset('js/shinefind.js'); }}"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ $title }}</title>
</head>

<body>
  <div id="bg_wrapper1">
  <div id="bg_wrapper2">
  
    <div id="header">
      <div id="logo">
        <a href="{{ URL::base(); }}"><h1>Shinefind</h1></a>
      </div> <!--end logo-->
      <div id="facebook">
        <a href="#"><img src="{{ URL::to_asset('images/facebook.png'); }}" width="302" height="33" /></a><p><a href="#">or create a login</a></p>
      </div> <!--end facebook-->
    </div> <!--end header-->
    
    <div id="menu">
      <ul>
        <li><a href="javascript:void(0)" onClick="showCityPopup();"><img src="{{ URL::to_asset('images/nav_city.jpg'); }}" width="160" height="44" border="0" /></a></li>
        <li><a href="{{ URL::to_action('search/carwashes@index'); }}"><img src="{{ URL::to_asset('images/nav_detailers.jpg'); }}" width="123" height="44" border="0" /></a></li>
        <li><a href="#"><img src="{{ URL::to_asset('images/nav_diyprod.jpg'); }}" width="153" height="44" border="0" /></a></li>
        <li><a href="#"><img src="{{ URL::to_asset('images/nav_diyres.jpg'); }}" width="162" height="44" border="0" /></a></li>
        <li><a href="#"><img src="{{ URL::to_asset('images/nav_review.jpg'); }}" width="169" height="44" border="0" /></a></li>
        <li><div id="search_box"><input id="site_search" type="text" name="search" size="17" placeholder="Site Search"><a href="#"><img src="{{ URL::to_asset('images/search_button.png'); }}" align="right" /></a></div></li>
      </ul>      
    </div> <!--end menu-->
    
{{ $content }}
  
{{ $iphone_app_link }} 
    
    <div id="footer">
      <div id="footer_container">
        <div id="footer_info">
          <img src="{{ URL::to_asset('images/footer_copyright.png'); }}" width="220" height="25" />
          <p>THE authorative force for all things detail-oriented. We pride ourselves with providing our users with accurate and relevant reviews and information to keep their cars looking their best.</p>
		</div> <!--end footer_info-->
        <div id="sitemap">
          <p>SITEMAP</p>
          <ul>
            <li><a href="#">&raquo;Wash Reviews</a></li>
            <li><a href="#">&raquo;Detailer Reviews</a></li>
            <li><a href="#">&raquo;Privacy Policy</a></li>
            <li><a href="#">&raquo;Product Reviews</a></li>
            <li>{{ HTML::link_to_action('login@index', '&raquo;Member Login'); }}</li>
            <li><a href="#">&raquo;Advertise</a></li>
            <li><a href="#">&raquo;Information Articles</a></li>
            <li><a href="#">&raquo;Company Info</a></li>
            <li><a href="#">&raquo;Get your Product or Company Listed</a></li>
          </ul>
        </div> <!--end sitemap-->
      </div> <!--end footer_container-->
    </div> <!--end footer-->
  </div> <!--end bg_wrapper2-->
 </div> <!--end bg_wrapper1-->
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
</body>
</html>
