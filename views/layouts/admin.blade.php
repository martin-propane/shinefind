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
					<li><?php echo HTML::Link('admin/panel/view_all', 'View All') ?></li>
					<li><?php echo HTML::Link('admin/panel/add_location', 'Add Location'); ?></li>
				</ul>
			</div>
			<div class="span10">
				{{ $content }}
			</div>
		</div>
	</div>
</body>
</html>

