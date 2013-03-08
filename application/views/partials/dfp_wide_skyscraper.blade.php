<?php 
    $uri = URI::current();

    if(strpos($uri, '/reviews') !== false ) : ?>

<script type="text/javascript">
googletag.cmd.push(function() {
        googletag.defineSlot('/65246144/160x600-review-wss-left-side', [160, 600], 'div-gpt-ad-1362761390805-0').addService(googletag.pubads());
        googletag.pubads().enableSingleRequest();
        googletag.enableServices();
        });
</script>

<!-- 160x600-review-wss-left-side -->
<div id="div-gpt-ad-1362761390805-0" style="width:160px; height:600px;">
    <script type="text/javascript"> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1362761390805-0'); }); </script>
</div>

<?php elseif(strpos($uri, '/products') !== false ) : ?>

<script type="text/javascript">
googletag.cmd.push(function() {
        googletag.defineSlot('/65246144/160x600-products-wss-left-side', [160, 600], 'div-gpt-ad-1362761493682-0').addService(googletag.pubads());
        googletag.pubads().enableSingleRequest();
        googletag.enableServices();
        });
</script>

<!-- 160x600-products-wss-left-side -->
<div id="div-gpt-ad-1362761493682-0" style="width:160px; height:600px;">
    <script type="text/javascript"> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1362761493682-0'); }); </script>
</div>

<?php elseif(strpos($uri, '/carwashes') !== false ) : ?>

<script type="text/javascript">
googletag.cmd.push(function() {
        googletag.defineSlot('/65246144/160x600-detailers-wss-left-side', [160, 600], 'div-gpt-ad-1362761592236-0').addService(googletag.pubads());
        googletag.pubads().enableSingleRequest();
        googletag.enableServices();
        });
</script>

<!-- 160x600-detailers-wss-left-side -->
<div id="div-gpt-ad-1362761592236-0" style="width:160px; height:600px;">
    <script type="text/javascript"> googletag.cmd.push(function() { googletag.display('div-gpt-ad-1362761592236-0'); }); </script>
</div>

<?php endif;  // best practice
