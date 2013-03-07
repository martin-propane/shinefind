<?php if ($num_pages > 0): ?>
	      <a href="<?php $params['page']=$prev_page; echo URL::current_query($params); ?>"><img src="<?php echo asset('images/arrow_left.jpg'); ?>" width="9" height="13" border="0" align="left" /></a>
	      <?php for ($i = 1; $i <= $num_pages; $i++): ?>
	      <a href="<?php $params['page']=$i; echo URL::current_query($params); ?>" <?php if ($page == $i): ?>class="active"<?php endif; ?>><?php echo $i; ?></a>
	      <?php endfor; ?>
	      <a href="<?php $params['page']=$next_page; echo URL::current_query($params); ?>"><img src="<?php echo asset('images/arrow-right.jpg'); ?>" width="9" height="13" border="0" /></a>
<?php endif; ?>
