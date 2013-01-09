<legend>Products</legend>
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
			<td>Delete</td>
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
			<td><a href="javascript:void(0)" onClick="deleteItem({{ $p->id }}, '{{ $p->name }}')" class = "btn">Delete</a></td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>

<script type = "text/javascript">
function deleteItem(id, name)
{
	var conf = confirm('Do you really want to delete "' + name + '?"');
	if (conf)
		window.location = '<?php echo URL::to_action('admin.products@delete')?>/' + id;
}
</script>
