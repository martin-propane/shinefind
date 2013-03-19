	  <?php 
	    $city_str = rawurlencode($carwash->busi_ad.','.$carwash->city.$carwash->state);
	  ?>
        <div id="location_pic_top">
		<img src="http://maps.googleapis.com/maps/api/streetview?size=220x193&location={{$city_str}}&fov=30&sensor=false" width="220" height="193">{{--TODO: Top round edges--}}
        </div>
        <div id="location_box">
          <div>
            <p>
			<b>Wash Type: </b>
			<?php
			$OPTIONS = array('ConvenienceStore'=>'Convenience Store: ', 'CreditCards'=>'Accepts Credit Cards: ', 'Fuel'=>'Fuel: ', 'Fundraiser'=>'Fundraiser: ', 'GiftCards'=>'Gift Cards: ', 'MilitaryDiscount'=>'Military Discount: ', 'OilChange'=>'Oil Changes: ', 'PetWash'=>'Pet Wash: ', 'Salon'=>'Salon: ', 'SeniorDiscount'=>'Senior Discount: ');
			$TYPE_NAMES = array('FullService'=>'Full Service', 'Tunnel'=>'Drive Through Tunnels', 'HandWash'=>'Manual Wash', 'Mobile'=>'Mobile Detail', 'Detailing'=>'Advanced Detailing', 'FreeVacuums'=>'Free Vacuums', 'SelfServe'=>'Self Serve', 'SoftTouch'=>'Soft Touch', 'TouchFree'=>'Touch Free', 'Xpress'=>'Express');
			$found = false;
			foreach ($TYPE_NAMES as $k=>$t)
			{
				if ($carwash->types[$k])
				{
					echo $t;
					$found = true;
					break;
				}
			}
			if (!$found)
				echo 'N/A';
			?>
			<br />
			@foreach ($OPTIONS as $k=>$o)
			<b>{{$o}}</b>{{ ($carwash->options[$k] == null) ? 'N/A' : 'Yes' }}<br />
			@endforeach
			</p>
          </div>
        </div><!--location box-->
