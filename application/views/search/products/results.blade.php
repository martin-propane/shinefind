<?php if ($products && $products != null): ?>
<?php
	$num_pages = (int) ceil($products->count / $products->per_page);
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
			return 'asc';
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

	$TYPE_NAMES = array('all'=>'All', 'wash'=>'Wash', 'wax'=>'Wax', 'trim'=>'Trim', 'towels'=>'Towels', 'leather'=>'Leathers', 'wheels'=>'Wheels');
?>
	<div class="grid_4">
            <h3><?php echo $TYPE_NAMES[$type];?> <font>(<?php echo $products->count; ?> results)</font></h3>
          </div>
          <div class="grid_2 alpha omega page_link">
	    <?php echo render('search/products/results_pages', array('page' => $page, 'num_pages' => $num_pages, 'prev_page' => $prev_page, 'next_page' => $next_page, 'params' => $params)); ?>
          </div><!--results pages top-->
	  <?php if ($products->count > 0): ?>
          <div class="grid_6" id="sort_by">
            <p>Sort by</p>
          </div> 
          <div class="grid_2 omega">
            <a href="{{ get_sort_url($params, 'rating'); }}">Star Rating</a>&nbsp;{{ get_arrow($params, 'rating'); }}
          </div>
          <div class="grid_2 alpha omega">
            <a href="{{ get_sort_url($params, 'alpha'); }}">Alphabetical</a>&nbsp;{{ get_arrow($params, 'alpha'); }}
          </div>
	  <?php endif; ?><!--sorting-->
	  <?php if ($products): ?>
	<?php foreach ($products->page as $c): ?>
          <div class="grid_6 omega" id="results_divider"><!--This div apparently has id="results_divider2" for the first result??-->
            <img src="<?php echo asset('images/results_divider.jpg'); ?>" width="450" height="1" />
          </div>
          <div class="grid_6 alpha omega">
            <div class="grid_2 omega"><img src="<?php echo asset('images/' . round($c->rating) . 'star.jpg'); ?>" width="102" height="17" align="left" />
            </div>
            <div class="grid_4 alpha omega">
              <h6><?php echo $c->name; ?></h6><p class="ital_caption">[CAPTION]Servicing Memphis and the surrounding areas</p>
              <p class="height17">
			  @if (count($c->reviews) > 0)
			  {{ $c->reviews[0]->review }}
			  <br /><br /><a href="{{ URL::to('products/' . $c->id); }}">&raquo;Read Review</a></p>
			  @else
			  There are no reviews for this location yet! Click <a href="{{URL::to_action('review@product', array($c->id))}}">here</a> to write a review.
			  <br /><br /><a href="{{ URL::to('products/' . $c->id); }}">&raquo;Goto Page</a></p>
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
	    <?php echo render('search/products/results_pages', array('page' => $page, 'num_pages' => $num_pages, 'prev_page' => $prev_page, 'next_page' => $next_page, 'params' => $params)); ?>
          </div><!--results pages bottom-->
<?php endif; ?>

