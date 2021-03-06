<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
echo Asset::container('front-header')->styles();
echo Asset::container('front-header')->scripts();
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shinefind</title>
</head>

<body>
  <div id="bg_wrapper1">
  <div id="bg_wrapper2">
  
    <div id="header">
      <div id="logo">
        <a href="#"><h1>Shinefind</h1></a>
      </div> <!--end logo-->
{{ render('partials.facebook'); }}
    </div> <!--end header-->
    
    <div id="menu">
      <ul>
        <li><a href="#"><img src="<?php echo asset('images/nav_city.jpg'); ?>" width="160" height="44" border="0" /></a></li>
        <li><a href="#"><img src="<?php echo asset('images/nav_detailers.jpg'); ?>" width="123" height="44" border="0" /></a></li>
        <li><a href="#"><img src="<?php echo asset('images/nav_diyprod.jpg'); ?>" width="153" height="44" border="0" /></a></li>
        <li><a href="#"><img src="<?php echo asset('images/nav_diyres.jpg'); ?>" width="162" height="44" border="0" /></a></li>
        <li><a href="#"><img src="<?php echo asset('images/nav_review.jpg'); ?>" width="169" height="44" border="0" /></a></li>
        <li>
	  <div id="search_box">
	    <?php echo Form::open('search/carwashes', 'GET', array('id' => 'search_form')); ?>
	      <input type="text" name="city" size="17" placeholder="Site Search">
	      <a href="javascript:void(0)" onclick="postForm()"><img src="<?php echo asset('images/search_button.png'); ?>" align="right" /></a>
	    <?php echo Form::close(); ?>
	  </div>
	</li>
      </ul>      
    </div> <!--end menu-->
    
    <div id="container2" class="container_12">
      <div class="grid_12" id="body_topbreak">
      </div>
      <div class="gird_12" id="top_ad_long">
          {{ render('partials.dfp_leaderboard'); }}
      </div>
      <div class="grid_3">
        <div id="refine_box_top">
        </div>
        <div id="refine_box">
          <div id="refine_box_info">
            <h4><?php echo $city . ', ' . $state; ?></h4>
            <a href="#" class="small_link">(change city)</a>
	    {{ $top_menu }}
          </div>
        </div><!--refine search-->
        <div class="lt_col_ad">
          {{ render('partials.dfp_wide_skyscraper'); }}
        </div><!--160x600 ad-->
      </div><!--left column-->
      <div class="grid_6 alpha">
        <div id="sponsored_listing" class="grid_6 alpha omega">
          <h5>Sponsored Listings</h5>
          <img src="<?php echo asset('images/white_divider.jpg'); ?>" width="460" height="1" />
          <div class="sponsor_listing">
            <div class="sponsor_image">
              <img src="<?php echo asset('images/pride_carwash_logo.png'); ?>" width="103" height="103" />
            </div>
            <div class="sponsor_info">
              <h6>Mr. Pride Car Wash</h6><p class="sponsor_red">2019 Union Avenue, Memphis, TN<br />901-725-6240</p>
              <p>We've built 10 express washes in TN in 5 years.<br /><a href="#">&raquo;Read Review</a></p>
            </div>
          </div><!--listing1-->
          <div class="grid_6 alpha omega spacer10"></div>
          <img src="<?php echo asset('images/white_divider.jpg'); ?>" width="460" height="1" />
          <div class="sponsor_listing">
            <div class="sponsor_image">
              <img src="<?php echo asset('images/enfields_logo.png'); ?>" width="103" height="103" border="0" />
            </div>
            <div class="sponsor_info">
              <h6>Enfield's Detail</h6><p class="sponsor_red">2370 Covington Cv, Memphis, TN<br />901-372-1560</p>
              <p>Serving the greater east Memphis area. Serving the greater east Memphis area. Serving the greater east Memphis area.<br /><a href="#">&raquo;Read Review</a></p>
            </div>
          </div><!--listing2-->
          <div class="grid_6 alpha omega spacer10"></div>
        </div><!--sponsored listings-->
        <div class="grid_6 alpha omega" id="results_box">
	  {{ $results }}
        </div><!--results-->
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
          <a href="#"><img src="<?php echo asset('images/ad_180x150.jpg'); ?>" width="180" height="150" border="0" /></a>
        </div><!--180x150 ad-->
        <div id="get_listed_box">
          <p>Are you a detailer or product maker?<br />
          <a href="#">&raquo;Get listed or claim your listing</a></p>
        </div><!--get listed-->
        <div class="grid_3 alpha omega" id="iphone_space2">
        </div>
      </div><!--right column-->
    </div> <!--end container-->
    
    {{ render('partials.iphone_add_link2'); }} 
    
    <div id="footer">
      <div id="footer_container">
        <div id="footer_info">
          <img src="<?php echo asset('images/footer_copyright.png'); ?>" width="220" height="25" border="0" />
          <p>THE authorative force for all things detail-oriented. We pride ourselves with providing our users with accurate and relevant reviews and information to keep their cars looking their best.</p>
		</div> <!--end footer_info-->
        <div id="sitemap">
          <p>SITEMAP</p>
          <ul>
            <li><a href="#">&raquo;Wash Reviews</a></li>
            <li><a href="#">&raquo;Detailer Reviews</a></li>
            <li><a href="#">&raquo;Privacy Policy</a></li>
            <li><a href="#">&raquo;Product Reviews</a></li>
            <li><a href="#">&raquo;Member Login</a></li>
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

    <!-- Javascript -->
  <script type="text/javascript">
   function postForm() {
     $('#search_form').submit();
   }
  </script>

</body>
</html>

