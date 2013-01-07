<table class="table table-hover">
	<thead>
		<tr>
			<td>ID</td>
			<td>Email</td>
			<td>Admin Level</td>
			<td>Edit</td>
		</tr>
	</thead>
	<?php foreach ($users as $user): ?>
	<tbody>
		<tr>
			<td><?php echo $user->id ?></td>
			<td><?php echo $user->email ?></td>
			<td><?php 
				switch ($user->admin)
				{
					case 0:
						echo 'User';
						break;
					case 1:
						echo 'Manager';
						break;
					case 2:
						echo 'Admin';
						break;
				}
			?></td>
			<td><?php echo HTML::link_to_action('admin.users@edit', 'Edit', array($user->id), array('class'=>'btn')) ?></td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>
