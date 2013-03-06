    <div id="menu">
      <ul>
        <li><a href="javascript:void(0)" onClick="showCityPopup();"><img src="{{ URL::to_asset('images/nav_city.jpg'); }}" width="160" height="44" border="0" /></a></li>
        <li><a href="{{ URL::to_action('search/carwashes@index'); }}"><img src="{{ URL::to_asset('images/nav_detailers.jpg'); }}" width="123" height="44" border="0" /></a></li>
        <li><a href="{{ URL::to('search/products') }}"><img src="{{ URL::to_asset('images/nav_diyprod.jpg'); }}" width="153" height="44" border="0" /></a></li>
        <li><a href="{{URL::to('resources')}}"><img src="{{ URL::to_asset('images/nav_diyres.jpg'); }}" width="162" height="44" border="0" /></a></li>
        <li><a href="{{URL::to('review')}}"><img src="{{ URL::to_asset('images/nav_review.jpg'); }}" width="169" height="44" border="0" /></a></li>
        <li><div id="search_box"><input id="site_search" type="text" name="search" size="17" placeholder="Site Search"><a href="#"><img src="{{ URL::to_asset('images/search_button.png'); }}" align="right" /></a></div></li>
      </ul>      
    </div> <!--end menu-->

