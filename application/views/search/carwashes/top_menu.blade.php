<?php unset($query['page']); ?>
            <ul>
		  @if ($counts['fullservice'] != 0)
	      <?php if ($type === 'fullservice'): ?>
              <li>&raquo;Full Service(<?php echo $counts['fullservice'];?>)</li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'fullservice'; echo URL::current_query($query);?>">&raquo;Full Service(<?php echo $counts['fullservice'];?>)</a></li>
	      <?php endif; ?>
		  @endif

          @if ($counts['tunnel'] != 0)
	      <?php if ($type === 'tunnel'): ?>
	      <li>&raquo;Drive Through Tunnels(<?php echo $counts['tunnel'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'tunnel'; echo URL::current_query($query);?>">&raquo;Drive Through Tunnels(<?php echo $counts['tunnel']; ?>)</a></li>
	      <?php endif; ?>
		  @endif

          @if ($counts['handwash'] != 0)
	      <?php if ($type === 'handwash'): ?>
	      <li>&raquo;Manual Wash(<?php echo $counts['handwash'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'handwash'; echo URL::current_query($query);?>">&raquo;Manual Wash(<?php echo $counts['handwash'];?>)</a></li>
	      <?php endif; ?>
		  @endif

          @if ($counts['mobile'] != 0)
	      <?php if ($type === 'mobile'): ?>
	      <li>&raquo;Mobile Detail(<?php echo $counts['mobile'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'mobile'; echo URL::current_query($query);?>">&raquo;Mobile Detail(<?php echo $counts['mobile'];?>)</a></li>
	      <?php endif; ?>
		  @endif

          @if ($counts['detailing'] != 0)
	      <?php if ($type === 'detailing'): ?>
	      <li>&raquo;Advanced Detail(<?php echo $counts['detailing'];?>)</a></li>
	      <?php else: ?>
              <li><a href="<?php $query['type'] = 'detailing'; echo URL::current_query($query);?>">&raquo;Advanced Detail(<?php echo $counts['detailing'];?>)</a></li>
	      <?php endif; ?>
		  @endif
            </ul>
