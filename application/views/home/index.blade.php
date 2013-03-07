    <div id="container" class="container_12">
      <div class="grid_12" id="body_topbreak">
      </div>
      <div class="grid_7">
        <img src="{{ URL::to_asset('images/index_slide_holder.jpg'); }}" width="550" height="293" />
      </div><!--slider-->
      <div class="grid_5 omega" id="tab_washes">
        <div>
          <ul>
            <li><a href="#"><img src="{{ URL::to_asset('images/tab_washes.png'); }}" /></a></li>
            <li><a href="#"><img src="{{ URL::to_asset('images/tab_diy.png'); }}" /></a></li>
          </ul>
        </div>
        <div class="tab_sub_bar">
          <p>Currently Searching: <b>{{$current_city.', '.$current_state}}</b> <a href="" onClick="showCityPopup();" class="small_wlink">(change city)</a></p>
        </div>
        <div class="tab_shadow">
        </div>
        <div class="tab_box">
          <div class="tab1">
            <p>Choose all that apply:</p>
            <ul>
              <li><input type="checkbox" name="find" value="full" class="tab_box_adjust" />Full Service Washes</li>
              <li><input type="checkbox" name="find" value="drive" class="tab_box_adjust" />Drive Through Washes</li>
              <li><input type="checkbox" name="find" value="manuel" class="tab_box_adjust" />Manuel Washes (aka Jet Spray)</li>
              <li><input type="checkbox" name="find" value="mobile" class="tab_box_adjust" />Mobile Wash &amp; Detailers</li>
            </ul>
          </div>
          <div class="tab2">
            <a href="#"><img src="{{ URL::to_asset('images/find_button.png'); }}" /></a>
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
        <div class="review_box"><img src="{{ URL::to_asset('images/pride_carwash_logo.png'); }}" width="103" height="103" align="left" /><p><img src="{{ URL::to_asset('images/1star.jpg'); }}" width="102" height="17" /><br />
          Lorem ipsum dolor sit amet, consec- tetur adipisicing elit<br /><a href="#">&raquo;Read Review</a></p>
        </div><!--recent reviews1-->
        <div class="review_box"><img src="{{ URL::to_asset('images/minute_wax_logo.png'); }}" width="103" height="103" align="left" /><p><img src="{{ URL::to_asset('images/3star.jpg'); }}" width="102" height="17" /><br />
          Lorem ipsum dolor sit amet, consec- tetur adipisicing elit<br /><a href="#">&raquo;Read Review</a></p>
        </div><!--recent reviews2-->
        <div class="review_box"><img src="{{ URL::to_asset('images/paste_wax_logo.png'); }}" width="103" height="103" align="left" /><p><img src="{{ URL::to_asset('images/3star.jpg'); }}" width="102" height="17" /><br />
          Lorem ipsum dolor sit amet, consec- tetur adipisicing elit<br /><a href="#">&raquo;Read Review</a></p>
        </div><!--recent reviews3-->
        <div class="grid_3 alpha omega" id="iphone_space">
        </div>
      </div><!--center column-->
      <div class="grid_2 alpha omega" id="rt_ad_main">
        <img src="{{ URL::to_asset('images/ad_120x600.jpg'); }}" width="120" height="600" />
      </div><!--right column-->
    </div> <!--end container-->

