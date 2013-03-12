        @if (count($sponsored) > 0)
		<div id="sponsored_listing" class="grid_6 alpha omega">
          <h5>Sponsored Listings</h5>
		  @foreach ($sponsored as $s)
          <img src="<?php echo asset('images/white_divider.jpg'); ?>" width="460" height="1" />
          <div class="sponsor_listing">
            <div class="sponsor_image">
              <img src="<?php echo asset('images/pride_carwash_logo.png'); ?>" width="103" height="103" />
            </div>
            <div class="sponsor_info">
              <h6>{{$s->name}}</h6><p class="sponsor_red">{{$s->busi_ad}}, {{$s->city}}, {{$s->state}}<br />{{$s->phone}}</p>
              <p>{{$s->sponsor_description}}<br /><a href="{{ URL::to('carwashes/' . $s->id); }}">&raquo;Read Review</a></p>
            </div>
          </div><!--listing1-->
          <div class="grid_6 alpha omega spacer10"></div>
		  @endforeach
        </div><!--sponsored listings-->
		@endif
        <div class="grid_6 alpha omega" id="results_box">
<?php if ($carwashes && $carwashes != null): ?>
<?php
	$num_pages = (int) ceil($count / $per_page);
	$prev_page = $page - 1;
	if ($prev_page < 1)
		$prev_page = 1;
	$next_page = $page + 1;
	if ($next_page > $num_pages)
		$next_page = $num_pages;
	$params = $query;

	function get_order($params, $sort)
	{
		if ($params['sort'] === $sort)
			return $params['order'] === 'asc' ? 'desc' : 'asc';
		else
		{
			if ($sort === 'rating')
				return 'desc';
			else if ($sort === 'alpha')
				return 'asc';
			else
				return 'desc';
		}
	}
	
	function get_sort_url($params, $sort)
	{
		return URL::current_query(array('sort'=>$sort, 'order'=>get_order($params, $sort)) + $params);
	}

	function get_arrow($params, $sort)
	{
		if ($params['sort'] === $sort)
		{
			if ($params['order'] === 'asc')
				return '<img src="'.asset('images/arrow-down.jpg').'" width="13" height="9" border="0"/>';
			else
				return '<img src="'.asset('images/arrow-up.jpg').'" width="13" height="9" border="0"/>';
		}
		else
			return '<img src="'.asset('images/arrow-right.jpg').'" width="9" height="13" border="0"/>';
	}

	$TYPE_NAMES = array('all'=>'All', 'fullservice'=>'Full Service', 'tunnel'=>'Drive Through Tunnels', 'handwash'=>'Manual Wash', 'mobile'=>'Mobile Detail', 'detailing'=>'Advanced Detailing');
?>
	<div class="grid_4">
            <h3><?php echo $TYPE_NAMES[$type];?> <font>(<?php echo $count; ?> results)</font></h3>
          </div>
          <div class="grid_2 alpha omega page_link">
	    <?php echo render('search/carwashes/results_pages', array('page' => $page, 'num_pages' => $num_pages, 'prev_page' => $prev_page, 'next_page' => $next_page, 'params' => $params)); ?>
          </div><!--results pages top-->
	  @if ($count > 0)
          <div class="grid_6" id="sort_by">
            <p>Sort by</p>
          </div> 
          <div class="grid_2 omega">
            <a href="{{ get_sort_url($params, 'rating'); }}">Star Rating</a>&nbsp;{{ get_arrow($params, 'rating'); }}
          </div>
          <div class="grid_2 alpha omega">
            <a href="{{ get_sort_url($params, 'alpha'); }}">Alphabetical</a>&nbsp;{{ get_arrow($params, 'alpha'); }}
          </div>
          <div class="grid_2 omega" id="certified_sort">
            <a href="{{ get_sort_url($params, 'certified'); }}">Certified</a>&nbsp;{{ get_arrow($params, 'certified'); }}
          </div>
	  @endif
	  <?php if ($carwashes): ?>
	<?php foreach ($carwashes as $c): ?>
          <div class="grid_6 omega" id="results_divider"><!--This div apparently has id="results_divider2" for the first result??-->
            <img src="<?php echo asset('images/results_divider.jpg'); ?>" width="450" height="1" />
          </div>
          <div class="grid_6 alpha omega">
            <div class="grid_2 omega"><img src="<?php echo asset('images/' . round($c->rating) . 'star.jpg'); ?>" width="102" height="17" align="left" />
	    <?php if ($c->certified): ?>
	    <img src="<?php echo asset('images/certification_logo.jpg'); ?>" width="75" height="83" class="certified_align" />
	    <?php endif; ?>
            </div>
            <div class="grid_4 alpha omega">
              <h6><a href="{{ URL::to('carwashes/' . $c->id); }}"><?php echo $c->name; ?></a></h6><p class="ital_caption">{{$c->caption}}&nbsp;</p>
              <p class="height17">
			  @if (count($c->reviews) > 0)
			  {{ $c->reviews[0]->review }}
			  <br /><br /><a href="{{ URL::to('carwashes/' . $c->id); }}">&raquo;Read Review</a></p>
			  @else
			  There are no reviews for this location yet! Click <a href="{{URL::to_action('review@carwash', array($c->id))}}">here</a> to write a review.
			  <br /><br /></p>
			  @endif
            </div>
          </div><!--results2-->
	<?php endforeach; ?>
	  <?php else: ?>
	  <div class="grid_6 omega">
	    <p>No results found!</p>
	  </div>
	  <?php endif; ?>
          <div class="grid_2 alpha omega page_link2">
	    <?php echo render('search/carwashes/results_pages', array('page' => $page, 'num_pages' => $num_pages, 'prev_page' => $prev_page, 'next_page' => $next_page, 'params' => $params)); ?>
          </div><!--results pages bottom-->
<?php else: ?>
	    <div class="grid_6">
	  	<p>Please click <a href="{{ URL::to('search/carwashes'); }}">here</a> to go back to the main {{ $city }} list.
		</p>
		</div>
<?php endif; ?>
        </div><!--results-->
