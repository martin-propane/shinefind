<?php
	$prev_page = $page - 1;
	if ($prev_page < 1)
		$prev_page = 1;
	$next_page = $page + 1;
	if ($next_page > $pages)
		$next_page = $pages;

	function get_order($params, $sort)
	{
		if ($params['sort'] === $sort)
			return $params['order'] === 'asc' ? 'desc' : 'asc';
		else
			return 'desc';
	}
	
	function get_sort_url($params, $sort)
	{
		return URL::current_query(array('sort'=>$sort, 'order'=>get_order($params, $sort)) + $params);
	}

	function get_arrow($params, $sort)
	{
		if ($params['sort'] === $sort)
		{
			if ($params['order'] === 'desc')
				return '<img src="'.asset('images/arrow-down.jpg').'" width="13" height="9" border="0"/>';
			else
				return '<img src="'.asset('images/arrow-up.jpg').'" width="13" height="9" border="0"/>';
		}
		else
			return '<img src="'.asset('images/arrow-right.jpg').'" width="9" height="13" border="0"/>';
	}
?>
    <div id="container2" class="container_12">
      <div class="grid_12" id="body_topbreak">
      </div>
      <div class="gird_12" id="top_ad_long">
          {{ render('partials.dfp_leaderboard'); }}
      </div>
      <div class="grid_3">
        <div class="lt_col_ad">
          {{ render('partials.dfp_wide_skyscraper'); }}
        </div>
      </div><!--left column-->
      <div class="grid_6">
        <div class="grid_6 alpha omega">
          <div id="title_with_sub">
		  @if ($count == 1)
            <h3>{{ $product->name }} <font>({{ $count }} review)</font></h3>
		  @else
		    <h3>{{ $product->name }} <font>({{ $count }} reviews)</font></h3>
		  @endif
          </div>
          <div class="spacer10"></div>
          <div>
            <div class="grid_2 alpha omega"><img src="{{ URL::to_asset('images/' . round($product->rating) . 'star.jpg'); }}" width="102" height="17" align="left" class="star_align" />
            </div>
            <div class="grid_4 alpha omega" id="addess">
              <p>
			  @if ($product->company !== null)
			  {{ $product->company }}<br />
			  @endif
			  @if ($product->phone !== null)
			  {{$product->phone}}<br />
			  @endif
			  @if ($product->website !== null)
			  <a href="{{$product->website}}" target="_blank">&raquo;{{$product->website}}</a>
			  @endif
			  </p>
            </div>
          </div><!--company details-->
          <img src="{{ URL::to_asset('images/white_divider.jpg'); }}" width="460" height="1" />
          <div class="grid_6 alpha" id="company_page_desc">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
          </div>
        </div><!--company info-->
        <div>
          <div class="grid_2 omega">
            <p>Own this product?<br /><a href="{{URL::to('listing')}}">&raquo;Claim it</a></p>
          </div>
        </div><!--map-->
        <div class="grid_6 alpha" id="user_reviews">
          <div>
		  @if ($count == 1)
            <h3>{{ $product->name }} <font>({{ $count }} review)</font></h3>
		  @else
		    <h3>{{ $product->name }} <font>({{ $count }} reviews)</font></h3>
		  @endif
          </div>
          <div class="grid_6 alpha" id="sort_by">
            <p>Sort by</p>
          </div>
          <div class="grid_2 alpha omega">
            <a href="{{ get_sort_url($query, 'rating'); }}">Star Rating</a>&nbsp;{{ get_arrow($query, 'rating'); }}
          </div>
          <div class="grid_3 alpha omega">
            <a href="{{ get_sort_url($query, 'date'); }}">Post Date</a>&nbsp;{{ get_arrow($query, 'date'); }}
          </div>
		  @if (count($reviews > 0))
		  @foreach ($reviews as $i=>$review)
		  @if ($i === 0)
          <div class="grid_6 alpha omega results_divider2">
		  @else
          <div class="grid_6 alpha omega results_divider">
		  @endif
            <img src="{{ URL::to_asset('images/results_divider.jpg'); }}" width="450" height="1" />
          </div>
          <div id="reviews">
            <div class="grid_2 alpha omega"><img src="{{ URL::to_asset('images/' . round($review->rating) . 'star.jpg'); }}" width="102" height="17" border="0" align="left"  class="star_align" />
            </div> 
            <div class="grid_4 alpha omega">
              <h6>{{ $review->title }}</h6><p class="ital_caption">Servicing Memphis and the surrounding areas</p>
              <p class="review_info height17">{{ $review->review }}<br /><br /><a href="#">&raquo;Read Review</a></p>
            </div>
          </div><!--results1-->
		  @endforeach
		  @else
		  There are no reviews for this location yet! Click <a href="{{URL::to_action('review@product', array($c->id))}}">here</a> to write a review.
		  @endif
          <div class="grid_2 alpha omega page_link2">
          {{ render('search/products/results_pages', array('page' => $page, 'num_pages' => $pages, 'prev_page' => $prev_page, 'next_page' => $next_page, 'params' => $query)) }}
          </div><!--results pages bottom-->
        </div><!--reviews-->
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
