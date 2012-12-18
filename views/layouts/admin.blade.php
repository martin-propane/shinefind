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
				<ul class="nav nav-tabs nav-stacked">
					<li><?php echo HTML::Link('admin/carwashes/view_all', 'View Carwashes') ?></li>
					<li><?php echo HTML::Link('admin/carwashes/add', 'Add Location'); ?></li>
				</ul>
			</div>
			<div class="span10">
				{{ $content }}
			</div>
		</div>
	</div>
</body>
</html>

