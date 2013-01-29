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

$attr_list = array(
	'id'=>'ID',
	'name'=>'Name',
	'address'=>'Address',
	'city'=>'City',
	'state'=>'State',
	'zip'=>'Zip',
	'phone'=>'Phone',
	'email'=>'Email',
	'website'=>'Website',
	'corp_ad'=>'Corporate Address');
?>
<style>
</style>
<legend>Carwashes</legend>
	{{ Form::open(URI::current(), 'GET', array('class'=>'form-inline', 'id'=>'view_form')) }}
		{{ Form::select('state', $state_list, $params['state']) }}
		{{ Form::text('name', $params['name'], array('class'=>'input-small', 'placeholder'=>'Name')) }}
		{{ Form::text('city', $params['city'], array('class'=>'input-small', 'placeholder'=>'City')) }}
		{{ Form::text('phone', $params['phone'], array('placeholder'=>'(000) 000 - 000')) }}
		{{ Form::hidden('page', $params['page'], array('id'=>'page')) }}
		{{ Form::hidden('sort', $params['sort'], array('id'=>'sort')) }}
		{{ Form::hidden('order', $params['order'], array('id'=>'order')) }}
		{{ Form::submit('Go', array('class'=>'btn')) }}
		<span class="inline pull-right">
@for ($i = 1; $i <= $count; $i++)
	{{ $i == $params['page'] ? $i : '<a href="javascript:void(0)" onClick="submitPage('.$i.')">'.$i.' </a>' }}
@endfor
		</span>
	{{ Form::close() }}
<table class="table table-hover">
	<thead>
		<tr>
			@foreach ($attr_list as $key=>$text)
			<td style="white-space: nowrap">
				<a href="javascript:void(0)" onClick="submitSort('{{$key}}')">{{$text}}<?php
				if ($params['sort'] === $key)
				{
					if ($params['order'] === 'asc')
						echo '<i class="icon-chevron-down"> </i>';
					else
						echo '<i class="icon-chevron-up"> </i>';
				}
				else
					echo '<i class="icon-chevron-right"> </i>';
				?></a>
			</td>
			@endforeach
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
			<td><a href="javascript:void(0)" onClick="deleteItem({{ $c->id }}, '{{ $c->name }}')" class = "btn">Delete</a></td>
		</tr>
	</tbody>
	<?php endforeach; ?>
</table>
@for ($i = 1; $i <= $count; $i++)
	{{ $i == $params['page'] ? $i : '<a href="javascript:void(0)" onClick="submitPage('.$i.')">'.$i.' </a>' }}
@endfor
<script type = "text/javascript">
var page_changed = 0;
function deleteItem(id, name)
{
	var conf = confirm('Do you really want to delete "' + name + '?"');
	if (conf)
		window.location = '<?php echo URL::to_action('admin.carwashes@delete')?>/' + id;
}

function submitPage(page)
{
	$('#page').val(page);
	page_changed = true;
	$('#view_form').submit();
}

function submitSort(sort)
{
	if (sort === $('#sort').val())
		$('#order').val($('#order').val() === 'asc' ? 'desc' : 'asc');
	else
	{
		$('#sort').val(sort);
		$('#order').val('asc');
	}

	$('#view_form').submit();
}

$('#view_form').submit(function() {
	if (!page_changed)
		$('#page').val(1);
	
	return true;
});


</script>

