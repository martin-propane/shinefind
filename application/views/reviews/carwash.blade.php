    <div id="container2" class="container_12">
      <div class="grid_12" id="body_topbreak">
      </div>
      <div class="gird_12" id="top_ad_long">
        <a href="#"><img src="{{ URL::to_asset('images/ad_728x90.jpg'); }}" width="728" height="90" /></a>
      </div>
      <div class="grid_3">
	    {{ render('partials.carwash_location_box', array('carwash'=>$carwash)); }}
        <div class="lt_col_ad2">
          <a href="#"><img src="{{ URL::to_asset('images/ad_180x150.jpg'); }}" width="180" height="150" /></a>
        </div><!--180x150 ad-->
        <div class="lt_col_ad2">
          <a href="#"><img src="{{ URL::to_asset('images/ad_180x150.jpg'); }}" width="180" height="150" /></a>
        </div><!--180x150 ad-->
      </div><!--left column-->
      <div class="grid_6">
          <div class="grid_6 alpha omega">
            <img src="{{ URL::to_asset('images/space_divider.jpg'); }}" width="450" height="1" />
          </div>
          <div class="grid_6 alpha omega">
		  <h3>{{$carwash->name}} Review</h3>
          </div>
          <div id="reviews">
            <div class="grid_2 alpha omega"><img src="{{ URL::to_asset('images/' . round($review->rating) . 'star.jpg'); }}" width="102" height="17" border="0" align="left"  class="star_align" />
            </div> 
            <div class="grid_4 alpha omega">
              <p class="review_info height17">{{ $review->review }}<br /><br />{{ HTML::link('carwashes/'.$carwash->id, '&laquo;Car Wash Page'); }}</p>
            </div>
          </div><!--results1-->
      </div><!--middle column-->
      <div class="grid_3 alpha omega">
	  {{ render('partials.diy_box'); }}
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

