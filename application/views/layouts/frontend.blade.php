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
        <a href="#"><h1>Shinefind</h1></a>
      </div> <!--end logo-->
      <div id="facebook">
        <a href="#"><img src="{{ URL::to_asset('images/facebook.png'); }}" width="302" height="33" /></a><p><a href="#">or create a login</a></p>
      </div> <!--end facebook-->
    </div> <!--end header-->
    
    <div id="menu">
      <ul>
        <li><a href="#"><img src="{{ URL::to_asset('images/nav_city.jpg'); }}" width="160" height="44" border="0" /></a></li>
        <li><a href="#"><img src="{{ URL::to_asset('images/nav_detailers.jpg'); }}" width="123" height="44" border="0" /></a></li>
        <li><a href="#"><img src="{{ URL::to_asset('images/nav_diyprod.jpg'); }}" width="153" height="44" border="0" /></a></li>
        <li><a href="#"><img src="{{ URL::to_asset('images/nav_diyres.jpg'); }}" width="162" height="44" border="0" /></a></li>
        <li><a href="#"><img src="{{ URL::to_asset('images/nav_review.jpg'); }}" width="169" height="44" border="0" /></a></li>
        <li><div id="search_box"><input type="text" name="search" size="17" placeholder="Site Search"><a href="#"><img src="{{ URL::to_asset('images/search_button.png'); }}" align="right" /></a></div></li>
      </ul>      
    </div> <!--end menu-->
    
    <div id="container" class="container_12">
{{ $content }}
    </div> <!--end container-->
   
  	<div id="iphone_app_link">
         <h3>Get the iPhone App!</h3>
            <a href="#">Click Here to go to the App store</a>
    </div><!--iphone app-->  
    
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
</body>
</html>
