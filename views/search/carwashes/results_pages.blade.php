	      <a href="<?php echo URL::current_query(array_merge($params, array('page'=>$prev_page))); ?>"><img src="<?php echo asset('images/arrow_left.jpg'); ?>" width="9" height="13" border="0" align="left" /></a>
	      <?php for ($i = 1; $i <= $num_pages; $i++): ?>
	      <a href="<?php echo URL::current_query(array_merge($params, array('page'=>$i))); ?>" <?php if ($page == $i): ?>class="active"<?php endif; ?>><?php echo $i; ?></a>
	      <?php endfor; ?>
	      <a href="<?php echo URL::current_query(array_merge($params, array('page'=>$next_page))); ?>"><img src="<?php echo asset('images/arrow-right.jpg'); ?>" width="9" height="13" border="0" /></a>
