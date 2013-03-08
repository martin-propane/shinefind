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
		  <h4>Types</h4>
	    {{ $top_menu }}
          </div>
        </div><!--refine search-->
        <div class="lt_col_ad">
          {{ render('partials.dfp_wide_skyscraper'); }}
        </div><!--160x600 ad-->
      </div><!--left column-->
      <div class="grid_6 alpha">
        <div class="grid_6 alpha omega" id="results_box">
	  {{ $results }}
        </div><!--results-->
      </div><!--middle column-->
      <div class="grid_3 alpha omega">
	  {{ render('partials.diy_box'); }}
        <div id="rt_col_ad">
          <a href="#"><img src="<?php echo asset('images/ad_180x150.jpg'); ?>" width="180" height="150" border="0" /></a>
        </div><!--180x150 ad-->
        <div id="get_listed_box">
          <p>Are you a detailer or product maker?<br />
          <a href="{{URL::to('listing')}}">&raquo;Get listed or claim your listing</a></p>
        </div><!--get listed-->
        <div class="grid_3 alpha omega" id="iphone_space2">
        </div>
      </div><!--right column-->
    </div> <!--end container-->

