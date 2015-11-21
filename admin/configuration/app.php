<?php add_action(base64_decode('d3BfYWpheF9tbF9jb25maWd1cmF0aW9uX2FwcF9yZWRpcmVjdA=='), base64_decode('bWxfY29uZmlndXJhdGlvbl9hcHBfcmVkaXJlY3RfY2FsbGJhY2s='));


function ml_configuration_app_redirect_callback()
{
	
	global $ml_popup_message_on_mobile_active, 
		   $ml_popup_message_on_mobile_appid;
	if(isset($_POST[base64_decode('bWxfcG9wdXBfbWVzc2FnZV9vbl9tb2JpbGVfYWN0aXZl')]))
	{
		$ml_popup_message_on_mobile_active = $_POST[base64_decode('bWxfcG9wdXBfbWVzc2FnZV9vbl9tb2JpbGVfYWN0aXZl')] == base64_decode('dHJ1ZQ==');
		
		ml_set_generic_option(base64_decode('bWxfcG9wdXBfbWVzc2FnZV9vbl9tb2JpbGVfYWN0aXZl'),
							   $ml_popup_message_on_mobile_active);
	}
	
	if(isset($_POST[base64_decode('bWxfcG9wdXBfbWVzc2FnZV9vbl9tb2JpbGVfYXBwaWQ=')]))
	{
		$ml_popup_message_on_mobile_appid = $_POST[base64_decode('bWxfcG9wdXBfbWVzc2FnZV9vbl9tb2JpbGVfYXBwaWQ=')];

		ml_set_generic_option(base64_decode('bWxfcG9wdXBfbWVzc2FnZV9vbl9tb2JpbGVfYXBwaWQ='),
							   $ml_popup_message_on_mobile_appid);
	}
	

	
	ml_configuration_app_redirect();
	
	die();
}

function ml_configuration_app_redirect_ajax_load()
{

}

function ml_configuration_app_redirect()
{

	ml_configuration_app_redirect_div();


}

function ml_configuration_app_redirect_div()
{
	
	global $ml_popup_message_on_mobile_active, $ml_popup_message_on_mobile_appid;

	$ml_popup_message_on_mobile_active = get_option(base64_decode('bWxfcG9wdXBfbWVzc2FnZV9vbl9tb2JpbGVfYWN0aXZl'));
	$ml_popup_message_on_mobile_appid = get_option(base64_decode('bWxfcG9wdXBfbWVzc2FnZV9vbl9tb2JpbGVfYXBwaWQ='));
	
	?>
	<h3 style="font-family:arial;font-size:20px;font-weight:normal;padding:10px;">
		Apple Smart App Banners (recommended)
	</h3>


	<p style="font-size:20px;font-weight:normal;padding:10px;">Apple created <a href="http://developer.apple.com/library/ios/#documentation/AppleApplications/Reference/SafariWebContent/PromotingAppswithAppBanners/PromotingAppswithAppBanners.html" target="_blank">Smart App Banners</a> to help you promote your app from your website in a<br>
simple and polished way. Once active, a banner promoting your app will be visible only to visitors of your website using an iPhone or iPad and will allow them to download your app with one click.</p>

	<h2 style="font-size:20px;font-weight:normal;padding:10px;">
		<input id="ml_popup_message_on_mobile_active" type="checkbox"
			<?php 				if($ml_popup_message_on_mobile_active)
				{
					echo base64_decode('IGNoZWNrZWQg');
				}
			?>
			/> Activate Smart App Banners
	</h2>


	<!-- ACTIVE ? -->
	<p></p>


	<p style="font-size:20px;font-weight:normal;padding:10px;">To make the banner visible, enter your app's APP ID below.</p>
	
	<!-- APP ID -->
	<h2 style="font-size:20px;font-weight:normal;padding:10px;">
		App ID
	</h2>
	<input id="ml_popup_message_on_mobile_appid" placeholder="Type the App ID here" 
			name="ml_popup_message_on_mobile_appid" type="text" size="8" 
	value="<?php echo $ml_popup_message_on_mobile_appid;?>" 
	style="padding:5px;font-size:15px;margin-left:5%;width:50%;"/>
	<p></p>
		
	<!-- DESCRIPTION -->
	<div style="font-size:20px;padding:5px;;margin-top:20px;margin-bottom:20px;width:70%;
		text-align:justify;">
	  <p>Need to find your App-ID? <a href="http://mobiloud.com/faq.php#faq-14<?php echo get_option(base64_decode('YWZmaWxpYXRlX2xpbms='), null); ?>" target="_blank">Read how</a>.</p>
    </div>
	
	<div style="margin-right:20px;">
		<p class="submit" align="right">
			<input type="submit" id="ml_configuration_app_redirect_submit" 
											   value="<?php _e(base64_decode('QXBwbHk=')); ?>" />
		</p>
	</div>
	
	<?php }
?>