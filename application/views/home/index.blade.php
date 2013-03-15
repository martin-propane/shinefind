    <div id="container" class="container_12">
      <div class="grid_12" id="body_topbreak">
      </div>
      <div class="grid_7">
        <img src="{{ URL::to_asset('images/index_slide_holder.jpg'); }}" width="550" height="293" />
      </div><!--slider-->
      <div class="grid_5 omega" id="tab_washes">
        <div>
          <ul>
            <li><a id="washes_link" href="javascript:void(0)"><img src="{{ URL::to_asset('images/tab_washes.png'); }}" /></a></li>
            <li><a id="products_link" href="javascript:void(0)"><img src="{{ URL::to_asset('images/tab_diy.png'); }}" /></a></li>
          </ul>
        </div>
        <div class="tab_sub_bar">
          <p>Currently Searching: <b>{{$current_city.', '.$current_state}}</b> <a href="" onClick="showCityPopup();" class="small_wlink">(change city)</a></p>
        </div>
        <div class="tab_shadow">
        </div>
        <div class="tab_box">
		  <div id="products_tab">
		    <div class="tab1">
			  <p> Choose a product type:</p>
			  <ul>
			    <li><input type="radio" name="find" value="wax" class="tab_box_adjust" />Wax</li>
			  </ul>
			</div>
			<div class="tab2">
			  <a href="#"><img src="{{ URL::to_asset('images/find_button.png'); }}" /></a>
			</div>
		  </div>
		  <div id="washes_tab">
		    <div class="tab1">
			  <p>Choose a service:</p>
			  <ul>
			    <li><input type="radio" name="find" value="full" class="tab_box_adjust" />Full Service Washes</li>
			    <li><input type="radio" name="find" value="drive" class="tab_box_adjust" />Drive Through Washes</li>
			    <li><input type="radio" name="find" value="manuel" class="tab_box_adjust" />Manuel Washes (aka Jet Spray)</li>
			    <li><input type="radio" name="find" value="mobile" class="tab_box_adjust" />Mobile Wash &amp; Detailers</li>
			  </ul>
		    </div>
		    <div class="tab2">
			  <a href="#"><img src="{{ URL::to_asset('images/find_button.png'); }}" /></a>
		    </div>
		  </div>
        </div>
      </div><!--tabs-->
      <div class="grid_12 spacer10">
      </div><!--10 pixel spacer-->
      <div class="grid_7" id="index_left_col">
        <div class="grid7" id="featured_story">
          <h2>Featured Story Headline</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <br /><br /><a href="{{URL::to('resources')}}">&raquo;Read the full story</a></p>
        </div><!--end featured_story-->
        <div class="spacer10"></div>
        <div class="grid_7 alpha">
          <div id="index_read_more1">
            <h3>How it Works</h3>            
            <p>ShineFind ratings are a combination of consumer reviews, reputation, certification and verifiable information. Find out more about the ratings process here.<br /><br /><a href="{{URL::to('about')}}">&raquo;Learn More</a></p>
          </div><!--read more1-->
          <div id="index_read_more2">
            <h3>Certification</h3>
            <p>When you see our badge next to a listing, it means ShineFind has certified the company. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore<br /><br /><a href="{{URL::to('certification')}}">&raquo;Learn More</a></p>
          </div><!--read more 2-->
        </div><!--left column read more sections-->
        <div class="grid_7 alpha" id="index_bottom_ads">
          <img src="{{ URL::to_asset('images/ad_180x150.jpg'); }}" width="180" height="150" align="left" /><a href="{{ URL::to_action('static@listing'); }}"><img src="{{ URL::to_asset('images/claim_banner.jpg'); }}" width="352" height="151" align="right" /></a>
        </div><!--left bottom ads-->
      </div> <!--left column-->
      <div class="grid_3" id="index_mid_col">
        <h3>Recent Reviews</h3>
		@foreach ($reviews as $review)
		<div class="review_box">
		{{--TODO: Make the image boxes rounded as they were in the design--}}
		@if (isset($review->carwash))
		<?php
		$carwash = $review->carwash;
		$city_str = rawurlencode($carwash->busi_ad.','.$carwash->city.$carwash->state);
		?>
		<img src="http://maps.googleapis.com/maps/api/streetview?size=103x103&location={{$city_str}}&fov=30&sensor=false" width="103" height="103" align="left" />
		@else
        <img src="{{ URL::to_asset('images/product_wheel.png'); }}" width="103" height="103" align="left" />
		@endif
		<p><img src="{{ asset('images/' . round($review->rating) . 'star.jpg'); }}" width="102" height="17" /><br />
          {{ (strlen($review->review) > 53) ? substr($review->review,0,50).'...' : $review->review }}<br />
		  @if (get_class($review) === 'Shinefind\\Entities\\Carwash_Review')
		  <a href="{{ URL::to('carwashes/'.$review->cw_id); }}">&raquo;Read Review</a></p>
		  @else
		  <a href="{{ URL::to('products/'.$review->p_id); }}">&raquo;Read Review</a></p>
		  @endif
        </div><!--recent reviews1-->
		@endforeach
        <div class="grid_3 alpha omega" id="iphone_space">
        </div>
      </div><!--center column-->
      <div class="grid_2 alpha omega" id="rt_ad_main">
        <img src="{{ URL::to_asset('images/ad_120x600.jpg'); }}" width="120" height="600" />
      </div><!--right column-->
    </div> <!--end container-->
<script type = "text/javascript">
$(function() {
	$('#washes_link').click(function(e) {
		$('#washes_tab').css('zIndex', '9999');
		$('#products_tab').css('zIndex', '1');
	});
	$('#products_link').click(function(e) {
		$('#products_tab').css('zIndex', '9999');
		$('#washes_tab').css('zIndex', '1');
	});
});
</script>
