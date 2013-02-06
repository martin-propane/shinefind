    <div id="container2" class="container_12">
      <div class="grid_12" id="body_topbreak">
      </div>
      <div class="gird_12" id="top_ad_long">
        <a href="#"><img src="<?php echo asset('images/ad_728x90.jpg'); ?>" width="728" height="90" /></a>
      </div>
      <div class="grid_3">
        <div id="refine_box_top">
        </div>
        <div id="refine_box">
          <div id="refine_box_info">
            <h4><?php echo $city . ', ' . $state; ?></h4>
            <a href="javascript:void(0)" class="small_link" onClick="showCityPopup();">(change city)</a>
	    {{ $top_menu }}
          </div>
        </div><!--refine search-->
        <div class="lt_col_ad">
          <a href="#"><img src="<?php echo asset('images/ad_160x600.jpg'); ?>" width="160" height="600" /></a>
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
