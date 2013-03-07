<?php unset($query['page']); ?>
            <ul>
	      <?php if ($type === 'all'): ?>
	      <li>&raquo;All(<?php echo $counts['all'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'all'; echo URL::current_query($query);?>">&raquo;All(<?php echo $counts['all'];?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'wash'): ?>
              <li>&raquo;Wash(<?php echo $counts['wash'];?>)</li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'wash'; echo URL::current_query($query);?>">&raquo;Wash(<?php echo $counts['wash'];?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'wax'): ?>
	      <li>&raquo;Wax(<?php echo $counts['wax'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'wax'; echo URL::current_query($query);?>">&raquo;Wax(<?php echo $counts['wax']; ?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'trim'): ?>
	      <li>&raquo;Trim(<?php echo $counts['trim'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'trim'; echo URL::current_query($query);?>">&raquo;Trim(<?php echo $counts['trim'];?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'wheels'): ?>
	      <li>&raquo;Towels(<?php echo $counts['wheels'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'wheels'; echo URL::current_query($query);?>">&raquo;Wheels(<?php echo $counts['wheels'];?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'leather'): ?>
	      <li>&raquo;Leather(<?php echo $counts['leather'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'leather'; echo URL::current_query($query);?>">&raquo;Leather(<?php echo $counts['leather'];?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'wheels'): ?>
	      <li>&raquo;Wheels(<?php echo $counts['wheels'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'wheels'; echo URL::current_query($query);?>">&raquo;Wheels(<?php echo $counts['wheels'];?>)</a></li>
	      <?php endif; ?>
            </ul>
