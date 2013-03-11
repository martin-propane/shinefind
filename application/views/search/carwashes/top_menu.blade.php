<?php unset($query['page']); ?>
            <ul>
	      <?php if ($type === 'all'): ?>
	      <li>&raquo;All(<?php echo $counts['all'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'all'; echo URL::current_query($query);?>">&raquo;All(<?php echo $counts['all'];?>)</a></li>
	      <?php endif; ?>

              <li>&raquo;Full Service</li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'fullservice'; echo URL::current_query($query);?>">&raquo;Full Service</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'tunnel'): ?>
	      <li>&raquo;Drive Through Tunnels</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'tunnel'; echo URL::current_query($query);?>">&raquo;Drive Through Tunnels</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'handwash'): ?>
	      <li>&raquo;Manual Wash</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'handwash'; echo URL::current_query($query);?>">&raquo;Manual Wash</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'mobile'): ?>
	      <li>&raquo;Mobile Detail</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'mobile'; echo URL::current_query($query);?>">&raquo;Mobile Detail</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'detailing'): ?>
	      <li>&raquo;Advanced Detail</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'detailing'; echo URL::current_query($query);?>">&raquo;Advanced Detail</a></li>
	      <?php endif; ?>
            </ul>
