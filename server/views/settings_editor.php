<div id="ml_settings_editor" class="tabs-panel ml-compact">
    <form method="post" action="<?php echo admin_url(base64_decode('YWRtaW4ucGhwP3BhZ2U9bW9iaWxvdWRfc2V0dGluZ3MmdGFiPWVkaXRvcg==')); ?>">
        <?php wp_nonce_field(base64_decode('Zm9ybS1zZXR0aW5nc19lZGl0b3I=')); ?>
        <h3>Code Editor</h3>
        <div class='ml-col-twothirds'>
            <p>You can use the editor to inject HTML, PHP, CSS and Javascript code in a number of positions within the post and page 
                screens. You can reference the current post id using $post->id.</p>
				
	        <p><em>Note: this is for developers and advanced users only.</em></p>
					
			<p>Need any help? <a class="ml-intercom" href="mailto:h89uu5zu@incoming.intercom.io">Contact our developers</a>.</p>
				

            <div class="ml-editor-controls">
                <select id="ml_admin_post_customization_select" name="ml_admin_post_customization_select">
                    <option value="">
                        Select a customization...
                    </option>
                    <?php foreach(Mobiloud_Admin::$editor_sections as $editor_key=>$editor_name): ?>
                    <option value='<?php echo esc_attr($editor_key); ?>'?>
                        <?php echo esc_html($editor_name); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <a href="#" class='button-primary ml-save-editor-btn'>Save</a>
            </div>
            <textarea class='ml-editor-area ml-show'></textarea>
            <?php foreach(Mobiloud_Admin::$editor_sections as $editor_key=>$editor_name): ?>
            <textarea class='ml-editor-area' name='<?php echo esc_attr($editor_key); ?>'><?php echo stripslashes(htmlspecialchars(Mobiloud::get_option($editor_key, ''))); ?></textarea>
            <?php endforeach; ?>
            
            <h4>Preview the results</h4>
            <p>Select a post or page to preview the results of your edits.</p>
            <select id="preview_popup_post_select">
                <?php 
                $posts_query = array(
                    base64_decode('cG9zdHNfcGVyX3BhZ2U=') => 10,base64_decode('b3JkZXJieQ==') => base64_decode('cG9zdF9kYXRl'),base64_decode('b3JkZXI=') => base64_decode('REVTQw=='),base64_decode('cG9zdF90eXBl')
                );
                $included_post_types = explode(base64_decode('LA=='), Mobiloud::get_option(base64_decode('bWxfYXJ0aWNsZV9saXN0X2luY2x1ZGVfcG9zdF90eXBlcw=='), array()));
                foreach($included_post_types as $post_type) {
                    $posts_query[base64_decode('cG9zdF90eXBl')] = $post_type;
                    $posts = get_posts($posts_query); 
                    if(count($posts) > 0) {
                        ?>                    
                        <optgroup label="<?php echo ucfirst($post_type); ?>">
                        <?php foreach($posts as $post) { ?>

                        <option value="<?php echo MOBILOUD_PLUGIN_URL; ?>post/post.php?post_id=<?php echo $post->ID; ?>">
                        <?php if(strlen($post->post_title) > 40) { ?>

                        <?php echo substr($post->post_title,0,40); ?>

                        ..
                        <?php } else { ?>

                        <?php echo $post->post_title; ?>

                        <?php } ?>
                        </option><?php } ?>
                        </optgroup>
                        <?php                     }
                }
                
                
                ?>
                <?php $pages = get_pages(array(base64_decode('c29ydF9vcmRlcg==') => base64_decode('QVND'), base64_decode('c29ydF9jb2x1bW4=') => base64_decode('cG9zdF90aXRsZQ=='), base64_decode('cG9zdF90eXBl') => base64_decode('cGFnZQ=='),base64_decode('cG9zdF9zdGF0dXM=') => base64_decode('cHVibGlzaA=='))); ?>
                <optgroup label="Pages">
                <?php foreach($pages as $page) { ?>

                <option value="<?php echo MOBILOUD_PLUGIN_URL; ?>post/post.php?post_id=<?php echo $page->ID; ?>">
                <?php if(strlen($page->post_title) > 40) { ?>

                <?php echo substr($page->post_title,0,40); ?>

                ..
                <?php } else { ?>

                <?php echo $page->post_title; ?>

                <?php } ?>
                </option><?php } ?>
                </optgroup>
            </select>
            <a href='#' class='ml_open_preview_btn button-secondary ml-preview-phone-btn'>Preview on phone</a>
            <a href='#' class='ml_open_preview_btn button-secondary ml-preview-tablet-btn'>Preview on tablet</a>
        </div>
        <h3>Need help from a pro?</h3>
        <div class='ml-col-twothirds'>
            <p>The Mobiloud developer team can help you integrate custom fields, add video/audio embeds and 
                much more to your app, for more information, contact <a href='mailto:support@mobiloud.com'>support@mobiloud.com</a>.</p>
        </div>
    </form>
</div>
<div id="preview_popup_content">
<div class="iphone5s_device">
<iframe id="preview_popup_iframe">
</iframe></div><div class="ipadmini_device">
<iframe id="preview_popup_iframe">
</iframe></div></div>