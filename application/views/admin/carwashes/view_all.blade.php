<table class="table table-hover">
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
