        <div class="grid_6 alpha omega">
          <div id="title_with_sub">
            <h3>Review Products</h3>
          </div>
          <div class="spacer10"></div>
		</div>
<div class="grid_6 alpha omega">
@foreach ($products as $product)
<a href="{{URL::to_action('review@product', array($product->id))}}">{{$product->name . ' | ' . $product->company}}</a><br>
@endforeach
</div>

