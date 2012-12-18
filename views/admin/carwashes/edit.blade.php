<!DOCTYPE html>
<html>
<head>
<title>Edit Location</title>
<?php echo Asset::scripts(); ?>
<?php echo Asset::styles(); ?>
<?php echo HTML::script('js/jquery.validate.min.js'); ?>
<script type = "text/javascript">
$(document).ready(function()
{
	jQuery.validator.addMethod('validPhone', function (value, element) {
		var num = value.replace(/[^\d.]/g, '');
		return this.optional(element) || (num.length === 10);
	}, 'Enter a valid phone number (123-456-7890).');

	$('#addForm').validate({
		onkeyup: false,
		rules: {
			name: 'required',
			phone: {
				validPhone: true
			}
		},
		errorPlacement: function(error, element) {
			error.insertAfter($(element));
		},
		highlight: function(element, errorClass, validClass) {
			var con = $(element).parent().parent();
			con.addClass(errorClass);

		},
		unhighlight: function(element, errorClass, validClass) {
			var con = $(element).parent().parent();
			con.removeClass(errorClass);
		},
		errorElement: 'span'
	});

	$('input[name=phone]').change(function() {
		var txtbox = $(this);
		var num = txtbox.val().replace(/[^\d.]/g, '');
		var newval = '';
		if (num.length < 4) {
			newval = '(' + num;
			if (num.length === 3)
				newval = newval + ') ';
		}
		else if (num.length > 3 && num.length < 7) {
			newval = '(' + num.substring(0, 3) + ') ' + num.substring(3);
			if (num.length === 6)
				newval = newval + ' - ';
		}
		else
			newval = '(' + num.substring(0, 3) + ') ' + num.substring(3, 6) + ' - ' + num.substring(6);

		txtbox.val(newval);
	});

});
</script>
</head>
<body>
<?php

$state_list = array('AL'=>"Alabama",  
			'AK'=>"Alaska",  
			'AZ'=>"Arizona",  
			'AR'=>"Arkansas",  
			'CA'=>"California",  
			'CO'=>"Colorado",  
			'CT'=>"Connecticut",  
			'DE'=>"Delaware",  
			'DC'=>"District Of Columbia",  
			'FL'=>"Florida",  
			'GA'=>"Georgia",  
			'HI'=>"Hawaii",  
			'ID'=>"Idaho",  
			'IL'=>"Illinois",  
			'IN'=>"Indiana",  
			'IA'=>"Iowa",  
			'KS'=>"Kansas",  
			'KY'=>"Kentucky",  
			'LA'=>"Louisiana",  
			'ME'=>"Maine",  
			'MD'=>"Maryland",  
			'MA'=>"Massachusetts",  
			'MI'=>"Michigan",  
			'MN'=>"Minnesota",  
			'MS'=>"Mississippi",  
			'MO'=>"Missouri",  
			'MT'=>"Montana",
			'NE'=>"Nebraska",
			'NV'=>"Nevada",
			'NH'=>"New Hampshire",
			'NJ'=>"New Jersey",
			'NM'=>"New Mexico",
			'NY'=>"New York",
			'NC'=>"North Carolina",
			'ND'=>"North Dakota",
			'OH'=>"Ohio",  
			'OK'=>"Oklahoma",  
			'OR'=>"Oregon",  
			'PA'=>"Pennsylvania",  
			'RI'=>"Rhode Island",  
			'SC'=>"South Carolina",  
			'SD'=>"South Dakota",
			'TN'=>"Tennessee",  
			'TX'=>"Texas",  
			'UT'=>"Utah",  
			'VT'=>"Vermont",  
			'VA'=>"Virginia",  
			'WA'=>"Washington",  
			'WV'=>"West Virginia",  
			'WI'=>"Wisconsin",  
			'WY'=>"Wyoming");
?>
<?php
echo Form::open('admin/carwashes/edit/' . $id, 'POST', array('id' => 'addForm', 'class' => 'form-horizontal'));
echo Form::hidden('id', $id);
echo '<legend>Edit location</legend>';
echo '<div class = "control-group">';
echo Form::label('name', 'Name', array('class' => 'control-label'), 'test');
echo '<div class = "controls">';
echo Form::text('name', $name, array('class' => 'required'));
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('busi_ad', 'Address', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('busi_ad', $busi_ad);
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('city', 'City', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('city', $city);
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('state', 'State', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::select('state', $state_list, $state);
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('zip', 'Zip', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('zip', $zip);
echo '</div></div>';

echo '<div class = "control-group" id = "phoneControl">';
echo Form::label('phone', 'Phone', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('phone', $phone, array('id' => 'phone', 'placeholder' => '123-456-7890'));
echo '<span class = "help-inline" id = "phoneError"></span>';
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('notes', 'Notes', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::textarea('notes', $notes, array('rows' => '3'));
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('email', 'Email', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('email', $email);
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('website', 'Website', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('website', $website, array('class' => 'url', 'placeholder' => 'http://www.shinefind.com'));
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('corp_ad', 'Corporate Address', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('corp_ad', $corp_ad);
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('type', 'Type', array('class' => 'control-label'));
echo '<div class = "controls">';
echo '<div>';
echo Form::checkbox('detailing', TRUE, $types['Detailing'], array('class' => 'checkbox'));
echo Form::label('detailing', 'Detailing', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('freevac', TRUE, $types['FreeVacuums'], array('class' => 'checkbox'));
echo Form::label('freevac', 'Free Vacuums', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('fullservice', TRUE, $types['FullService'], array('class' => 'checkbox'));
echo Form::label('fullservice', 'Full Service', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('handwash', TRUE, $types['HandWash'], array('class' => 'checkbox'));
echo Form::label('handwash', 'Hand Wash', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('mobile', TRUE, $types['Mobile'], array('class' => 'checkbox'));
echo Form::label('mobile', 'Mobile', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('selfserve', TRUE, $types['SelfServe'], array('class' => 'checkbox'));
echo Form::label('selfserve', 'Self Serve', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('softtouch', TRUE, $types['SoftTouch'], array('class' => 'checkbox'));
echo Form::label('softtouch', 'Soft Touch', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('touchfree', TRUE, $types['TouchFree'], array('class' => 'checkbox'));
echo Form::label('touchfree', 'Touch Free', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('tunnel', TRUE, $types['Tunnel'], array('class' => 'checkbox'));
echo Form::label('tunnel', 'Tunnel', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('xpress', TRUE, $types['Xpress'], array('class' => 'checkbox'));
echo Form::label('xpress', 'Xpress', array('class' => 'checkbox inline'));
echo '</div>';
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('options', 'Options', array('class' => 'control-label'));
echo '<div class = "controls">';
echo '<div>';
echo Form::checkbox('creditcards', TRUE, $options['CreditCards'], array('class' => 'checkbox'));
echo Form::label('creditcards', 'Credit Cards', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('conveniencestore', TRUE, $options['ConvenienceStore'], array('class' => 'checkbox'));
echo Form::label('conveniencestore', 'Convenience Store', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('fuel', TRUE, $options['Fuel'], array('class' => 'checkbox'));
echo Form::label('fuel', 'Fuel', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('giftcards', TRUE, $options['GiftCards'], array('class' => 'checkbox'));
echo Form::label('giftcards', 'Gift Cards', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('oilchange', TRUE, $options['OilChange'], array('class' => 'checkbox'));
echo Form::label('oilchange', 'Oil Change', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('other_other', TRUE, $options['Other'], array('class' => 'checkbox'));
echo Form::label('other_other', 'Other', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('petwash', TRUE, $options['PetWash'], array('class' => 'checkbox'));
echo Form::label('petwash', 'Pet Wash', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::checkbox('salon', TRUE, $options['Salon'], array('class' => 'checkbox'));
echo Form::label('salon', 'Salon', array('class' => 'checkbox inline'));
echo '</div>';
echo '</div></div>';

echo '<div class = "control-group">';
echo '<div class = "controls">';
echo Form::submit('Submit', array('class' => 'submit', 'id' => 'addSubmit', 'class' => 'btn'));
echo '</div></div>';
echo Form::close();
?>
</body>
</html>

