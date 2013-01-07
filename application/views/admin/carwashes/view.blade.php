<?php
$state_list = array('All', 'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD','TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY');
?>
<table class="table table-hover">
	<?php
		$cur_state = $params['state'];
		for ($i = 0; $i < count($state_list); $i++)
		{
			$state = $state_list[$i];
			$params['state'] = $state;
			$link = HTML::link(URL::current_query($params), $state);

			if ($cur_state === $state)
				echo '<b>'.$link.'</b>';
			else
				echo $link;
			if ($i !== count($state_list) - 1)
				echo ' | ';
		}
	?>
	{{ Form::open(URI::current(), 'POST', array('class'=>'form-inline')) }}
	{{ Form::close() }}
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Address</td>
			<td>City</td>
			<td>State</td>
			<td>Zip</td>
			<td>Phone</td>
			<td>Email</td>
			<td>Website</td>
			<td>Corporate Address</td>
			<td>Edit</td>
		</tr>
	</thead>
	<?php foreach ($carwashes as $c): ?>
	<tbody>
		<tr>
			<td><?php echo $c->id ?></td>
			<td><?php echo $c->name ?></td>
			<td><?php echo $c->busi_ad ?></td>
			<td><?php echo $c->city ?></td>
			<td><?php echo $c->state ?></td>
			<td><?php echo $c->zip ?></td>
			<td><?php echo $c->phone ?></td>
			<td><?php echo $c->email ?></td>
			<td><?php echo $c->website ?></td>
			<td><?php echo $c->corp_ad ?></td>
			<td><?php echo HTML::link_to_action('admin.carwashes@edit', 'Edit', array($c->id), array('class'=>'btn')) ?></td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>
