    <div id="footer">
      <div id="footer_container">
        <div id="footer_info">
          <img src="{{ URL::to_asset('images/footer_copyright.png'); }}" width="220" height="25" />
          <p>THE authorative force for all things detail-oriented. We pride ourselves with providing our users with accurate and relevant reviews and information to keep their cars looking their best.</p>
		</div> <!--end footer_info-->
        <div id="sitemap">
          <p>SITEMAP</p>
          <ul>
            <li><a href="{{ URL::to('search/carwashes') }}">&raquo;Wash Reviews</a></li>
            <li><a href="{{ URL::to('search/carwashes') }}">&raquo;Detailer Reviews</a></li>
            <li><a href="{{ URL::to('privacy') }}">&raquo;Privacy Policy</a></li>
            <li><a href="{{ URL::to('search/products') }}">&raquo;Product Reviews</a></li>
            <li>{{ HTML::link_to_action('login@index', '&raquo;Member Login'); }}</li>
            <li><a href="{{ URL::to('advertise') }}">&raquo;Advertise</a></li>
            <li><a href="{{ URL::to('resources') }}">&raquo;Information Articles</a></li>
            <li><a href="{{ URL::to('about') }}">&raquo;Company Info</a></li>
            <li><a href="{{ URL::to('listing') }}">&raquo;Get your Product or Company Listed</a></li>
          </ul>
        </div> <!--end sitemap-->
      </div> <!--end footer_container-->
    </div> <!--end footer-->
