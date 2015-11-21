<?php 



function ml_using_mobiloud() {
    return isset($_GET[base64_decode('cGFnZQ==')]) && strpos($_GET[base64_decode('cGFnZQ==')], base64_decode('bW9iaWxvdWQ=')) !== false;
}

function ml_init_perfect_audience() {
    if(is_admin() && current_user_can(base64_decode('YWRtaW5pc3RyYXRvcg==')) && ml_using_mobiloud()) {
        ?>
<script type="text/javascript">
  (function() {
    window._pa = window._pa || {};
    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
    pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.perfectaudience.com/serve/52ac92a5a6c82451b400007e.js";
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
  })();
</script>
        <?php     }
}

function ml_init_olark() {
    if(is_admin() && current_user_can(base64_decode('YWRtaW5pc3RyYXRvcg==')) && Mobiloud::get_option(base64_decode('bWxfaW5pdGlhbF9kZXRhaWxzX3NhdmVk')) && ml_using_mobiloud()) {
        $user_email = Mobiloud::get_option(base64_decode('bWxfdXNlcl9lbWFpbA=='));
        $user_name = Mobiloud::get_option(base64_decode('bWxfdXNlcl9uYW1l'));
        $user_site = Mobiloud::get_option(base64_decode('bWxfdXNlcl9zaXRl'));
        ?>
<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark('api.visitor.updateEmailAddress', {emailAddress: "<?php echo esc_js($user_email); ?>"});
olark('api.visitor.updateFullName', {fullName: "<?php echo esc_js($user_name); ?>"});
olark('api.chat.onBeginConversation', function() {
olark('api.chat.sendNotificationToOperator', {
    body: 'Customer Information... User site: ' + "<?php echo esc_js($user_site); ?>" + ' Install URL: ' + "<?php echo get_site_url(); ?>" + ' Version: ' + "<?php echo MOBILOUD_PLUGIN_VERSION;?>" + ' Post Count: ' + "<?php echo wp_count_posts()->publish; ?>" + ' Homepage Type: ' + "<?php echo get_option( base64_decode('c2hvd19vbl9mcm9udCA=')); ?>"});
});
olark.identify('6896-984-10-6494');/*]]>*/</script><noscript><a href="https://www.olark.com/site/6896-984-10-6494/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->
        <?php     }
}

function ml_init_intercom() {
    
    
	if(is_admin() && current_user_can(base64_decode('YWRtaW5pc3RyYXRvcg==')) && Mobiloud::get_option(base64_decode('bWxfaW5pdGlhbF9kZXRhaWxzX3NhdmVk')) && ml_using_mobiloud()) {
		$user_email = Mobiloud::get_option(base64_decode('bWxfdXNlcl9lbWFpbA=='));
        $user_name = Mobiloud::get_option(base64_decode('bWxfdXNlcl9uYW1l'));
        $user_site = Mobiloud::get_option(base64_decode('bWxfdXNlcl9zaXRl'));
        
        ?>
            <script>(function(){var w=window;var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://api.intercom.io/api/js/library.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}})();</script>	
            <script id="IntercomSettingsScriptTag">
              window.intercomSettings = {
                email: "<?php echo esc_js($user_email); ?>",
                name: "<?php echo esc_js($user_name); ?>",
                site: "<?php echo esc_js($user_site); ?>",
				installurl: "<?php echo get_site_url(); ?>",              
                sitename: "<?php echo get_bloginfo(base64_decode('bmFtZQ==')); ?>",
                version: "<?php echo MOBILOUD_PLUGIN_VERSION;?>",
				post_count: "<?php echo wp_count_posts()->publish; ?>",
				homepage_type: "<?php echo get_option( base64_decode('c2hvd19vbl9mcm9udCA=')); ?>",
                app_id: "h89uu5zu",
                user_id: "<?php echo esc_js($user_email); ?>",
                user_hash: "<?php echo hash_hmac(base64_decode('c2hhMjU2'), $user_email, base64_decode('MmQ4UmVvTkhob3ZENE5oV0NiNzJEZ3JnaGFkdktWd0dKc1IwdDZZUg==')); ?>",
                haswoocommerce:<?php echo (is_plugin_active(base64_decode('d29vY29tbWVyY2Uvd29vY29tbWVyY2UucGhw')) || class_exists(base64_decode('V29vY29tbWVyY2U=')) ? base64_decode('InllcyI=') : base64_decode('Im5vIg==')); ?>,
                hasbuddypress:<?php echo (is_plugin_active(base64_decode('YnVkZHlwcmVzcy9icC1sb2FkZXIucGhw')) || class_exists(base64_decode('QnVkZHlQcmVzcw==')) ? base64_decode('InllcyI=') : base64_decode('Im5vIg==')); ?>,
                widget: {
                    activator: ".ml-intercom"
                }
              };
            </script>
        <?php 	}
}

function ml_init_getvero() {    
    if(is_admin() && current_user_can(base64_decode('YWRtaW5pc3RyYXRvcg==')) && Mobiloud::get_option(base64_decode('bWxfaW5pdGlhbF9kZXRhaWxzX3NhdmVk'))  && ml_using_mobiloud()) {
        $user_email = Mobiloud::get_option(base64_decode('bWxfdXNlcl9lbWFpbA=='));
        $user_name = Mobiloud::get_option(base64_decode('bWxfdXNlcl9uYW1l'));
        $user_site = Mobiloud::get_option(base64_decode('bWxfdXNlcl9zaXRl'));
        ?>
        <script type="text/javascript">
            var _veroq = _veroq || [];

            _veroq.push(['init', {
              api_key: '36bd54bf9afde30628102337cf6dc4306a6a212a',
              development_mode: false 
              // Turn this off when you decide to 'go live'.
            } ]);

            _veroq.push(['user', {
                id: "<?php echo esc_js($user_email); ?>", 
                email: "<?php echo esc_js($user_email); ?>", 
                name: "<?php echo esc_js($user_name); ?>",
                website: "<?php echo esc_js($user_site); ?>",
				installurl: "<?php echo get_site_url(); ?>",              
                website_name: "<?php echo get_bloginfo(base64_decode('bmFtZQ==')); ?>",
				post_count: "<?php echo wp_count_posts()->publish; ?>",
				homepage_type: "<?php echo get_option( base64_decode('c2hvd19vbl9mcm9udCA=')); ?>",
                sitename: "<?php echo get_bloginfo(base64_decode('bmFtZQ==')); ?>",
                version: "<?php echo MOBILOUD_PLUGIN_VERSION;?>",
                user_lever: 'administrator',
                version: "<?php echo MOBILOUD_PLUGIN_VERSION;?>",
              }]);

            (function() {var ve = document.createElement('script'); ve.type = 'text/javascript'; ve.async = true; ve.src = '//getvero.com/assets/m.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ve, s);})();

        </script>
        <?php     }
}

function ml_track($action, $services=array(), $loadInit=false) {
    foreach($services as $service) {
        switch($service) {
            case base64_decode('bWl4cGFuZWw='):
                ml_track_mixpanel($action);
                break;
            case base64_decode('Z2V0dmVybw=='):
                ml_track_getvero($action, $loadInit);
                break;
            case base64_decode('aW50ZXJjb20='):
                ml_track_intercom($action, $loadInit);
                break;
            case base64_decode('cGVyZmVjdF9hdWRpZW5jZQ=='):
                ml_track_perfect_audience($action, $loadInit);
                break;
        }
    }
}

function ml_track_mixpanel($action) {
    if (function_exists(base64_decode('Y3VybF92ZXJzaW9u'))) {
        
        $mp = Mixpanel::getInstance(base64_decode('M2U3Y2MzOGEwYWJlNGVhM2ExNmEwZTc1MzgxNDRmMjM='));
        
        $mp->track($action);
    }
}

function ml_track_getvero($action, $loadInit=false) {
    if(is_admin() && current_user_can(base64_decode('YWRtaW5pc3RyYXRvcg=='))) {
        $user = wp_get_current_user();
        if($loadInit) {
            ml_init_getvero();
        }
        ?>
        <script type="text/javascript">
            _veroq.push(['track', "<?php echo $action; ?>"]);
        </script>
        <?php     }
}

function ml_track_intercom($action, $loadInit=false) {
    if(is_admin() && current_user_can(base64_decode('YWRtaW5pc3RyYXRvcg=='))) {
        $user = wp_get_current_user();
        if($loadInit) {
            ml_init_intercom();
        }
        ?>
        <script type="text/javascript">
            Intercom("trackUserEvent", "<?php echo $action; ?>");
        </script>
        <?php     }
}

function ml_track_perfect_audience($action, $loadInit=false) {
    if(is_admin() && current_user_can(base64_decode('YWRtaW5pc3RyYXRvcg=='))) {
        $user = wp_get_current_user();
        if($loadInit) {
            ml_init_perfect_audience();
        }
        ?>

        <?php     }
}
?>