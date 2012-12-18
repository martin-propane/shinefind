<table class="table table-hover">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Company</td>
			<td>Phone</td>
			<td>Website</td>
			<td>Type</td>
			<td>Edit</td>
		</tr>
	</thead>
	<?php foreach ($products as $p): ?>
	<tbody>
		<tr>
			<td><?php echo $p->id ?></td>
			<td><?php echo $p->name ?></td>
			<td><?php echo $p->company ?></td>
			<td><?php echo $p->phone ?></td>
			<td><?php echo $p->website ?></td>
			<td><?php echo $p->type ?></td>
			<td><?php echo HTML::link_to_action('admin.products@edit', 'Edit', array($p->id), array('class'=>'btn')) ?></td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>
