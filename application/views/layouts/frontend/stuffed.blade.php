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
    
{{ render('partials.top_menu'); }}
    
    <div id="container2" class="container_12">
      <div class="grid_12" id="body_topbreak">
      </div>
      <div class="gird_12" id="top_ad_long">
          {{ render('partials.dfp_leaderboard'); }}
      </div>
      <div class="grid_3">
        <div class="lt_col_ad">
          {{ render('partials.dfp_wide_skyscraper'); }}
        </div><!--160x600 ad-->
      </div><!--left column-->
      <div class="grid_6">
	  {{ $content }}
      </div><!--middle column-->
      <div class="grid_3 alpha omega">
        <div id="diy_box">
          <p>Driveway detailer? Decide you want to do it yourself? Make sure you have the right products in hand. Read ratings and reviews on the over-the-counter products.<br /><br /><a href="#">&raquo;Wash</a><br />
          <a href="#">&raquo;Wax</a><br />
          <a href="#">&raquo;Trim</a><br />
          <a href="#">&raquo;Towels</a><br />
          <a href="#">&raquo;Leather</a><br />
          <a href="#">&raquo;Wheels</a><br />
          <a href="#">&raquo;More</a><br /></p>
        </div>
        <div id="rt_col_ad">
          <a href="#"><img src="{{ URL::to_asset('images/ad_180x150.jpg'); }}" width="180" height="150" border="0" /></a>
        </div><!--180x150 ad-->
        <div id="get_listed_box">
          <p>Are you a detailer or product maker?<br />
          <a href="{{URL::to('listing')}}">&raquo;Get listed or claim your listing</a></p>
        </div><!--get listed-->
        <div class="grid_3 alpha omega" id="iphone_space2">
        </div>
      </div><!--right column-->
    </div> <!--end container-->
 
    {{ render('partials.iphone_add_link2'); }} 
    {{ render('partials.footer'); }} 
  </div> <!--end bg_wrapper2-->
 </div> <!--end bg_wrapper1-->
 {{ render('partials.city_popup'); }}
</body>
</html>
