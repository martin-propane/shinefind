<?php unset($query['page']); ?>
            <ul>
	      <?php if ($type === 'all'): ?>
	      <li>&raquo;All(<?php echo $counts['all'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'all'; echo URL::current_query($query);?>">&raquo;All(<?php echo $counts['all'];?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'fullservice'): ?>
              <li>&raquo;Full Service(<?php echo $counts['fullservice'];?>)</li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'fullservice'; echo URL::current_query($query);?>">&raquo;Full Service(<?php echo $counts['fullservice'];?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'tunnel'): ?>
	      <li>&raquo;Drive Through Tunnels(<?php echo $counts['tunnel'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'tunnel'; echo URL::current_query($query);?>">&raquo;Drive Through Tunnels(<?php echo $counts['tunnel']; ?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'handwash'): ?>
	      <li>&raquo;Manual Wash(<?php echo $counts['handwash'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'handwash'; echo URL::current_query($query);?>">&raquo;Manual Wash(<?php echo $counts['handwash'];?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'mobile'): ?>
	      <li>&raquo;Mobile Detail(<?php echo $counts['mobile'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'mobile'; echo URL::current_query($query);?>">&raquo;Mobile Detail(<?php echo $counts['mobile'];?>)</a></li>
	      <?php endif; ?>

	      <?php if ($type === 'detailing'): ?>
	      <li>&raquo;Advanced Detail(<?php echo $counts['detailing'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'detailing'; echo URL::current_query($query);?>">&raquo;Advanced Detail(<?php echo $counts['detailing'];?>)</a></li>
	      <?php endif; ?>
            </ul>
