<div id="ml_settings_membership" class="tabs-panel ml-compact">
    <form method="post" action="<?php echo admin_url(base64_decode('YWRtaW4ucGhwP3BhZ2U9bW9iaWxvdWRfc2V0dGluZ3MmdGFiPW1lbWJlcnNoaXA=')); ?>">
        <?php wp_nonce_field(base64_decode('Zm9ybS1zZXR0aW5nc19tZW1iZXJzaGlw')); ?>
        <h3>Membership</h3>
        <div class='ml-col-twothirds'>
            <p>Mobiloud can integrate with a number of WordPress membership plugins and require your users to authenticate to access the contents of your app.</p>
			<p>Don't see your membership plugin here? <a class="ml-intercom" href="mailto:h89uu5zu@incoming.intercom.io">Contact our developers</a> for help.</p>
            <div class="ml-form-row ml-checkbox-wrap">
                <input type="checkbox" id="ml_subscriptions_enable" name="ml_subscriptions_enable" value="true" <?php echo Mobiloud::get_option(base64_decode('bWxfc3Vic2NyaXB0aW9uc19lbmFibGU=')) ? base64_decode('Y2hlY2tlZA==') : ''; ?>/>
                <label for="ml_subscriptions_enable">Enable <a target="_blank" href="https://wordpress.org/plugins/groups/">WP-Groups</a> subscriptions</label>
            </div>
        </div>        
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
    </form>
</div>