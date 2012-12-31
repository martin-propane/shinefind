<?php
echo Form::open('admin/products/edit/' . $id, 'POST', array('id' => 'addForm', 'class' => 'form-horizontal'));
echo '<legend>Edit product</legend>';

echo Form::hidden('id', $id);

echo '<div class = "control-group">';
echo Form::label('name', 'Name', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('name', $name, array('class' => 'required'));
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('company', 'Company', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('company', $company, array('class' => 'required'));
echo '</div></div>';

echo '<div class = "control-group" id = "phoneControl">';
echo Form::label('phone1', 'Phone', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('phone', $phone, array('id' => 'phone', 'placeholder' => '123-456-7890'));
echo '<span class = "help-inline" id = "phoneError"></span>';
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('website', 'Website', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('website', $website, array('class' => 'url', 'placeholder' => 'http://www.shinefind.com'));
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('type', 'Type', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('type', $type, array('placeholder' => ''));
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



