<!DOCTYPE html>
<html>
<head>
<title>{{ $title }}</title>
<?php echo Asset::scripts(); ?>
<?php echo Asset::styles(); ?>
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2">
				<ul class="nav nav-list nav-stacked">
					<li class="nav-header">Carwashes</li>
					<li><?php echo HTML::Link('admin/carwashes/view_all', 'View All') ?></li>
					<li><?php echo HTML::Link('admin/carwashes/add', 'Add'); ?></li>
					<li class="nav-header">Associations</li>
					<li><?php echo HTML::Link('admin/associations/view_all', 'View All') ?></li>
					<li><?php echo HTML::Link('admin/associations/add', 'Add') ?></li>
					<li class="nav-header">Products</li>
					<li><?php echo HTML::Link('admin/products/view_all', 'View All') ?></li>
					<li><?php echo HTML::Link('admin/products/add', 'Add') ?></li>
				</ul>
				<br>
				{{ $user }}
			</div>
			<div class="span10">
				{{ $content }}
			</div>
		</div>
	</div>
</body>
</html>

