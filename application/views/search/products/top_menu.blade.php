<?php unset($query['page']); ?>
            <ul>
		  <?php if ($type === 'all'): ?>
	      <li>&raquo;All(<?php echo $counts['all'];?>)</a></li>
		  <?php else: ?>
              <li><a href="<?php $query['type'] = 'all'; echo URL::current_query($query);?>">&raquo;All(<?php echo $counts['all'];?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'wash'): ?>
              <li>&raquo;Wash</li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'wash'; echo URL::current_query($query);?>">&raquo;Wash</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'wax'): ?>
	      <li>&raquo;Wax</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'wax'; echo URL::current_query($query);?>">&raquo;Wax</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'trim'): ?>
	      <li>&raquo;Trim</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'trim'; echo URL::current_query($query);?>">&raquo;Trim</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'towels'): ?>
	      <li>&raquo;Towels</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'towels'; echo URL::current_query($query);?>">&raquo;Towels</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'leather'): ?>
	      <li>&raquo;Leather</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'leather'; echo URL::current_query($query);?>">&raquo;Leather</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'wheels'): ?>
	      <li>&raquo;Wheels</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'wheels'; echo URL::current_query($query);?>">&raquo;Wheels</a></li>
	      <?php endif; ?>
            </ul>
