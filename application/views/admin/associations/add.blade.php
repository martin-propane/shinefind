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
echo Form::open('admin/associations/add', 'POST', array('id' => 'addForm', 'class' => 'form-horizontal'));
echo '<legend>Add association</legend>';

echo '<div class = "control-group">';
echo Form::label('name', 'Name', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('name', null, array('class' => 'required'));
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('address', 'Address', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('address');
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('city', 'City', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('city');
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('state', 'State', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::select('state', $state_list);
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('zip', 'Zip', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('zip');
echo '</div></div>';

echo '<div class = "control-group" id = "phoneControl">';
echo Form::label('phone1', 'Phone', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('phone', null, array('id' => 'phone', 'placeholder' => '123-456-7890'));
echo '<span class = "help-inline" id = "phoneError"></span>';
echo '</div></div>';

echo '<div class = "control-group" id = "faxControl">';
echo Form::label('fax', 'Fax', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('fax', null, array('id' => 'fax', 'placeholder' => '123-456-7890'));
echo '<span class = "help-inline" id = "faxError"></span>';
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('notes', 'Notes', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::textarea('notes', null, array('rows' => '3'));
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('email', 'Email', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('email');
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('website', 'Website', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('website', null, array('class' => 'url', 'placeholder' => 'http://www.shinefind.com'));
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('fee', 'Fee', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('fee', null, array('placeholder' => '$1.00'));
echo '</div></div>';

echo '<div class = "control-group">';
echo '<div class = "controls">';
echo Form::submit('Submit', array('class' => 'submit', 'id' => 'addSubmit', 'class' => 'btn'));
echo '</div></div>';
echo Form::close();

?>
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
			},
			fax: {
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

	$('input[name=phone], input[name=fax]').change(function() {
		var txtbox = $(this);
		var num = txtbox.val().replace(/[^\d.]/g, '');
		var newval = '';
		if (num.length == 0) {
			newval = '';
		}
		else if (num.length < 4) {
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

