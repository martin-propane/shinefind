<table class="table table-hover">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Address</td>
			<td>City</td>
			<td>State</td>
			<td>Zip</td>
			<td>Email</td>
			<td>Website</td>
			<td>Phone</td>
			<td>Fax</td>
			<td>Fee</td>
			<td>Edit</td>
		</tr>
	</thead>
	<?php foreach ($associations as $a): ?>
	<tbody>
		<tr>
			<td><?php echo $a->id ?></td>
			<td><?php echo $a->name ?></td>
			<td><?php echo $a->address ?></td>
			<td><?php echo $a->city ?></td>
			<td><?php echo $a->state ?></td>
			<td><?php echo $a->zip ?></td>
			<td><?php echo $a->email ?></td>
			<td><?php echo $a->website ?></td>
			<td><?php echo $a->phone ?></td>
			<td><?php echo $a->fax ?></td>
			<td><?php echo $a->fee ?></td>
			<td><?php echo HTML::link_to_action('admin.associations@edit', 'Edit', array($a->id), array('class'=>'btn')) ?></td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>
