<?php if ($carwashes && $carwashes != null): ?>
<?php
	$num_pages = (int) ceil($carwashes->count / $carwashes->per_page);
	$prev_page = $page - 1;
	if ($prev_page < 1)
		$prev_page = 1;
	$next_page = $page + 1;
	if ($next_page > $num_pages)
		$next_page = $num_pages;
	$params = array();
	$params['city'] = $city . ', ' . $state;
	if (isset($type))
		$params['type'] = $type;
	if (isset($sort))
		$params['sort'] = $sort;
?>
	<div class="grid_4">
            <h3>Full Service Car Washes <font>(<?php echo $carwashes->count; ?> results)</font></h3>
          </div>
          <div class="grid_2 alpha omega page_link">
	    <?php echo render('search/carwashes/results_pages', array('page' => $page, 'num_pages' => $num_pages, 'prev_page' => $prev_page, 'next_page' => $next_page, 'params' => $params)); ?>
          </div><!--results pages top-->
          <div class="grid_6" id="sort_by">
            <p>Sort by</p>
          </div> 
          <div class="grid_2 omega">
            <a href="#">Star Rating</a>&nbsp;<img src="<?php echo asset('images/arrow-right.jpg'); ?>" width="9" height="13" border="0"/>
          </div>
          <div class="grid_2 alpha omega">
            <a href="#">Alphabetical</a>&nbsp;<img src="<?php echo asset('images/arrow-right.jpg'); ?>" width="9" height="13" border="0"/>
          </div>
          <div class="grid_2 omega" id="certified_sort">
            <a href="#">Certified</a>&nbsp;<img src="<?php echo asset('images/arrow-right.jpg'); ?>" width="9" height="13" border="0"/>
          </div><!--sorting-->
	  <?php if ($carwashes): ?>
	<?php foreach ($carwashes->page as $c): ?>
          <div class="grid_6 omega" id="results_divider"><!--This div apparently has id="results_divider2" for the first result??-->
            <img src="<?php echo asset('images/results_divider.jpg'); ?>" width="450" height="1" />
          </div>
          <div class="grid_6 alpha omega">
            <div class="grid_2 omega"><img src="<?php echo asset('images/4star.jpg'); ?>" width="102" height="17" align="left" /><img src="<?php echo asset('images/certification_logo.jpg'); ?>" width="75" height="83" class="certified_align" />
            </div>
            <div class="grid_4 alpha omega">
              <h6><?php echo $c->name; ?></h6><p class="ital_caption">[CAPTION]Servicing Memphis and the surrounding areas</p>
              <p class="height17"><?php echo $c->notes; ?><br /><br /><a href="#">&raquo;Read Review</a></p>
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
<?php endif; ?>

