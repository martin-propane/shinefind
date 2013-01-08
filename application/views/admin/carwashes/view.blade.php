<?php
$state_list = array(
	'All'=>'All',
	'AL'=>"Alabama",  
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
<table class="table table-hover">
	{{ Form::open(URI::current(), 'GET', array('class'=>'form-inline', 'id'=>'view_form')) }}
		{{ Form::select('state', $state_list, $params['state']) }}
		{{ Form::text('name', $params['name'], array('class'=>'input-small', 'placeholder'=>'Name')) }}
		{{ Form::text('city', $params['city'], array('class'=>'input-small', 'placeholder'=>'City')) }}
		{{ Form::text('phone', $params['phone'], array('placeholder'=>'(000) 000 - 000')) }}
		{{ Form::hidden('page', $params['page'], array('id'=>'page')) }}
		{{ Form::submit('Go', array('class'=>'btn')) }}
	{{ Form::close() }}
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Address</td>
			<td>City</td>
			<td>State</td>
			<td>Zip</td>
			<td>Phone</td>
			<td>Email</td>
			<td>Website</td>
			<td>Corporate Address</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
	</thead>
	<?php foreach ($carwashes as $c): ?>
	<tbody>
		<tr>
			<td><?php echo $c->id ?></td>
			<td><?php echo $c->name ?></td>
			<td><?php echo $c->busi_ad ?></td>
			<td><?php echo $c->city ?></td>
			<td><?php echo $c->state ?></td>
			<td><?php echo $c->zip ?></td>
			<td><?php echo $c->phone ?></td>
			<td><?php echo $c->email ?></td>
			<td><?php echo $c->website ?></td>
			<td><?php echo $c->corp_ad ?></td>
			<td><?php echo HTML::link_to_action('admin.carwashes@edit', 'Edit', array($c->id), array('class'=>'btn')) ?></td>
			<td><a href="javascript:void(0)" onClick="deleteItem(<?php echo $c->id ?>)" class = "btn">Delete</a></td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>
@for ($i = 1; $i <= $count; $i++)
	{{ $i === $params['page'] ? $i : '<a href="javascript:void(0)" onClick="submitPage('.$i.')">'.$i.' </a>' }}
@endfor
<script type = "text/javascript">
function deleteItem(id)
{
	var conf = confirm('Do you really want to delete this carwash?');
	if (conf)
		window.location = '<?php echo URL::to_action('admin.carwashes@delete')?>/' + id;
}

function submitPage(page)
{
	$('#page').val(page);
	$('#view_form').submit();
}
</script>

