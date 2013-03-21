    <div id="menu">
      <ul>
        <li class="change-city">
            {{$city}}<br />
            <a href="javascript:void(0)" onClick="showCityPopup();" class="small_wlink">(change city)</a>
        </li>
        <li><a href="{{ URL::to_action('search/carwashes@index'); }}">Detailers</a></li>
        <li><a href="{{ URL::to('search/products') }}">DIY Products</a></li>
        <li><a href="{{URL::to('review')}}">Write A Review</a></li>
        <li>&nbsp;</li>
      </ul>      
    </div> <!--end menu-->

