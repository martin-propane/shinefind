<p>
Welcome {{ $user->first_name }},<br /><br />
Choose from the following menu:
</p>
<ul>
<li>{{ HTML::link('user/settings', 'Settings'); }}</li>
</ul>


