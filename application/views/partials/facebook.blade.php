      <div id="facebook">
	  @if (!Auth::check())
        <a href="#"><img src="{{ URL::to_asset('images/facebook.png'); }}" width="302" height="33" /></a><p><a href="{{ URL::to('register'); }}">or create a login</a></p>
	  @else
	  Hello {{ Auth::user()->first_name }}<br />
	  {{HTML::link('user/home', 'Member Home');}} {{HTML::link('logout', 'Log Out');}}
	  @endif
      </div> <!--end facebook-->
