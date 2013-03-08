<?php 
    $uri = URI::current();

    if(strpos($uri, '/reviews') !== false ) : ?>

<script type="text/javascript">
googletag.cmd.push(function() {
        googletag.defineSlot('/65246144/728x90-review-lb-top', [728, 90], 'div-gpt-ad-1362761069486-0').addService(googletag.pubads());
        googletag.pubads().enableSingleRequest();
        googletag.enableServices();
        });
</script>

<!-- 728x90-review-lb-top -->
<div id="div-gpt-ad-1362761069486-0" style="width:728px; height:90px;">
    <script type="text/javascript"> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1362761069486-0'); }); </script>
</div>

<?php elseif(strpos($uri, '/products') !== false ) : ?>

<script type="text/javascript">
googletag.cmd.push(function() {
        googletag.defineSlot('/65246144/728x90-products-lb-top', [728, 90], 'div-gpt-ad-1362760957659-0').addService(googletag.pubads());
        googletag.pubads().enableSingleRequest();
        googletag.enableServices();
        });
</script>

<!-- 728x90-products-lb-top -->
<div id="div-gpt-ad-1362760957659-0" style="width:728px; height:90px;">
    <script type="text/javascript"> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1362760957659-0'); }); </script>
</div>

<?php elseif(strpos($uri, '/carwashes') !== false ) : ?>

<script type="text/javascript">
googletag.cmd.push(function() {
        googletag.defineSlot('/65246144/728x90-detailers-lb-top', [728, 90], 'div-gpt-ad-1362760751374-0').addService(googletag.pubads());
        googletag.pubads().enableSingleRequest();
        googletag.enableServices();
        });
</script>

<!-- 728x90-detailers-lb-top -->
<div id="div-gpt-ad-1362760751374-0" style="width:728px; height:90px;">
    <script type="text/javascript"> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1362760751374-0'); }); </script>
</div>

<?php endif;  // best practice
