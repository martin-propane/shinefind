<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Laravel: A Framework For Web Artisans</title>
	<meta name="viewport" content="width=device-width">
	{{ HTML::style('laravel/css/style.css') }}
</head>
<body>
foo     
<?php echo Form::open('search', 'GET');
//TODO: insert csrf token
echo 'Name: ';
echo Form::text('name');
echo '<br>City: ';
echo Form::text('city');
echo '<br>';
echo 'Type<br>Detailing: ';
echo Form::radio('wash_type', 'detailing');
echo '<br>Free Facuums: ';
echo Form::radio('wash_type', 'freevac');
echo '<br>Full Service: ';
echo Form::radio('wash_type', 'fullservice');
echo '<br>Hand Wash: ';
echo Form::radio('wash_type', 'handwash');
echo '<br>Mobile: ';
echo Form::radio('wash_type', 'mobile');
echo '<br>Self Serve: ';
echo Form::radio('wash_type', 'selfserve');
echo '<br>Soft Touch: ';
echo Form::radio('wash_type', 'softtouch');
echo '<br>Touch Free: ';
echo Form::radio('wash_type', 'touchfree');
echo '<br>Tunnel: ';
echo Form::radio('wash_type', 'tunnel');
echo '<br>Xpress: ';
echo Form::radio('wash_type', 'xpress');
echo '<br><br>Options<br>Credit Cards: ';
echo Form::checkbox('other_type', 'creditcards');
echo '<br>Convenience Store: ';
echo Form::checkbox('other_type', 'conveniencestore');
echo '<br>Fuel: ';
echo Form::checkbox('other_type', 'fuel');
echo '<br>Gift Cards: ';
echo Form::checkbox('other_type', 'giftcards');
echo '<br>Oil Change: ';
echo Form::checkbox('other_type', 'oilchange');
echo '<br>Other: ';
echo Form::checkbox('other_type', 'other_other');
echo '<br>Pet Wash: ';
echo Form::checkbox('other_type', 'petwash');
echo '<br>Salon: ';
echo Form::checkbox('other_type', 'salon');
echo '<br>';
echo Form::submit('Foo!');
echo $foo;
echo Form::close();
echo HTML::mailto('example@gmail.com', 'E-Mail Me!');
?>
</body>
</html>
