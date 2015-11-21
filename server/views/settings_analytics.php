<div id="ml_settings_analytics" class="tabs-panel ml-compact">
    <form method="post" action="<?php echo admin_url(base64_decode('YWRtaW4ucGhwP3BhZ2U9bW9iaWxvdWRfc2V0dGluZ3MmdGFiPWFuYWx5dGljcw==')); ?>">
        <?php wp_nonce_field(base64_decode('Zm9ybS1zZXR0aW5nc19hbmFseXRpY3M=')); ?>
        <h3>Google Analytics</h3>
            <p>Configure your Google Analytics tracking code below to track page and article views and user activity on your app 
                within Google Analytics.</p>  
            <p>You'll need to <a target="_blank" href="https://support.google.com/analytics/answer/2614741?hl=en-GB">setup a new Google Analytics property</a> and select "App" as the type of property you 
                want to track. Make a note of the Tracking ID and enter it below (ignore any instructions relating to the SDK, we've done everything for you!).</p>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row">Tracking ID</th>
                        <td>
                            <input size="36" type="text" id="ml_google_tracking_id" name="ml_google_tracking_id" placeholder="UA-XXXXXXXX-X" value='<?php echo Mobiloud::get_option(base64_decode('bWxfZ29vZ2xlX3RyYWNraW5nX2lk')); ?>'>
                        </td>
                    </tr>
                </tbody>
            </table>
			
		    <?php if( strlen(Mobiloud::get_option(base64_decode('bWxfcGJfYXBwX2lk'))) > 0 && Mobiloud::get_option(base64_decode('bWxfcGJfYXBwX2lk')) < base64_decode('NTQzZTdiM2YxZDBhYjE2ZDE0OGI0NTk5')): ?>			
	        <div class='update-nag'>
	            <p> The settings above are only available for recently published apps.</p>
				<p> Your app was built wih a pre-configured Analytics ID, get in touch at <a href='mailto:support@mobiloud.com'>support@mobiloud.com</a> to know more.</p>
	        </div>
	        <?php endif; ?>

        <?php wp_nonce_field(base64_decode('Zm9ybS1zZXR0aW5nc19hbmFseXRpY3M=')); ?>
        <h3>Facebook Analytics for Apps</h3>
        <p>Facebook Analytics for Apps gives you the ability to learn about the types of people using your app, how they got there, and what they’re doing in the app.</p>
        <p>Read more <a target="_blank" href="https://developers.facebook.com/docs/analytics/overview"> about Facebook Analytics.</a>&nbsp&nbsp&nbsp  <a target="_blank" href="https://developers.facebook.com/docs/apps/register">Configure your App ID.</a></p>
        <table class="form-table">
            <tbody>
            <tr valign="top">
                <th scope="row">Facebook App ID</th>
                <td>
                    <input size="36" type="text" id="ml_fb_app_id" name="ml_fb_app_id" placeholder="XXXXXXXXXXXXXXX" value='<?php echo Mobiloud::get_option(base64_decode('bWxfZmJfYXBwX2lk')); ?>'>
                </td>
            </tr>
            </tbody>
        </table>

        <?php if( strlen(Mobiloud::get_option(base64_decode('bWxfcGJfYXBwX2lk'))) > 0 && Mobiloud::get_option(base64_decode('bWxfcGJfYXBwX2lk')) < base64_decode('NTQzZTdiM2YxZDBhYjE2ZDE0OGI0NTk5')): ?>
            <div class='update-nag'>
                <p> The settings above are only available for recently published apps.</p>
                <p> Your app was built wih a pre-configured Analytics ID, get in touch at <a href='mailto:support@mobiloud.com'>support@mobiloud.com</a> to know more.</p>
            </div>
        <?php endif; ?>

        <h3>Other Analytics tools</h3>
        Beyond Google Analytics, our developers can setup other Analytics solutions for your app, for more information,
        contact <a href="mailto:support@mobiloud.com">support@mobiloud.com</a>.
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
    </form>
</div>