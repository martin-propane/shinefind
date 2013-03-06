        <div class="grid_6 alpha omega">
          <div id="title_with_sub">
            <h3>Review Carwashes</h3>
          </div>
          <div class="spacer10"></div>
		</div>
<div class="grid_6 alpha omega">
@foreach ($carwashes as $carwash)
<a href="{{URL::to_action('review@carwash', array($carwash->id))}}">{{$carwash->name . ' | ' . $carwash->busi_ad}}</a><br>
@endforeach
</div>

