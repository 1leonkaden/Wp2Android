<div id="ml_settings_general" class="tabs-panel ml-compact">
    <form method="post" action="<?php echo admin_url(base64_decode('YWRtaW4ucGhwP3BhZ2U9bW9iaWxvdWRfc2V0dGluZ3M=')); ?>">
        <?php wp_nonce_field(base64_decode('Zm9ybS1zZXR0aW5nc19nZW5lcmFs')); ?>
	
	<p>The options on this page let you define exactly what content is presented in the app's main article list, including adding custom post types, filtering content by category and adding a custom field to the list.</p>
	<p>Any questions or need some help? <a class="ml-intercom" href="mailto:h89uu5zu@incoming.intercom.io">Send us a message</a></p>
	
	
       <h3>Application details</h3>

        <!-- <h4>App Name</h4>
        <div class='ml-col-row'>
            <div class='ml-col-half'>
                <p>Enter the name of your App.</p>
            </div>
            <div class='ml-col-half'>
                <div class="ml-form-row">
                    <input id="ml_app_name" type="text" size="36" name="ml_app_name" value="<?php echo esc_attr(Mobiloud::get_option(base64_decode('bWxfYXBwX25hbWU='), $appname)); ?>" />
                </div>
            </div>
        </div> -->
        <h4>Email Contact</h4>
        <div class='ml-col-row'>
            <div class='ml-col-half'>
                <p>Setup email contact details.</p>
            </div>
            <div class='ml-col-half'>
                <div class="ml-form-row ml-checkbox-wrap">
                    <input type="checkbox" id="ml_show_email_contact_link" name="ml_show_email_contact_link" value="true" <?php echo Mobiloud::get_option(base64_decode('bWxfc2hvd19lbWFpbF9jb250YWN0X2xpbms=')) ? base64_decode('Y2hlY2tlZA==') : ''; ?>/>
                    <label for="ml_show_email_contact_link">Show email contact link?</label>
                </div>
                <div class="ml-email-contact-row ml-form-row" <?php                     echo !Mobiloud::get_option(base64_decode('bWxfc2hvd19lbWFpbF9jb250YWN0X2xpbms=')) ? base64_decode('c3R5bGU9ImRpc3BsYXk6bm9uZTsi') : ''; ?>>
                    <label for="ml_contact_link_email">Enter public email address</label>
                    <input id="ml_contact_link_email" type="text" size="36" name="ml_contact_link_email" value="<?php echo esc_attr(Mobiloud::get_option(base64_decode('bWxfY29udGFjdF9saW5rX2VtYWls'), '')); ?>" />
                </div>
            </div>
        </div>
        <h4>Copyright Notice</h4>
        <div class='ml-col-row'>
            <div class='ml-col-half'>
                <p>Enter the copyright notice which will be displayed in your app's settings screen.</p>
            </div>
            <div class='ml-col-half'>
                <div class="ml-form-row">
                    <textarea id="ml_copyright_string" name="ml_copyright_string" rows="4" style="width:100%"><?php echo esc_attr(Mobiloud::get_option(base64_decode('bWxfY29weXJpZ2h0X3N0cmluZw=='), '')); ?></textarea>
                </div>
            </div>
        </div>


	    <?php if( strlen(Mobiloud::get_option(base64_decode('bWxfcGJfYXBwX2lk'))) > 0 && Mobiloud::get_option(base64_decode('bWxfcGJfYXBwX2lk')) < base64_decode('NTQzZTdiM2YxZDBhYjE2ZDE0OGI0NTk5')): ?>
        <div class='update-nag'>
            <p>The functionality above is new. Your app might require to be updated for these settings to take effect.</p>
			<p>Should you have any questions or to request an update, get in touch at <a href='mailto:support@mobiloud.com'>support@mobiloud.com</a>.</p>
        </div>
        <?php endif; ?>
		
        <h3>Article List settings</h3>
        <h4>List preferences</h4>
        <div class='ml-col-row'>
            <div class='ml-col-half'>
                <p>Adjust how your content will show in article lists, affecting your app's main list as well as category lists.</p>            
            </div>
            <div class='ml-col-half'>
                <div class="ml-form-row ml-checkbox-wrap">
                    <input type="checkbox" id="ml_article_list_enable_dates" name="ml_article_list_enable_dates" value="true" <?php echo Mobiloud::get_option(base64_decode('bWxfYXJ0aWNsZV9saXN0X2VuYWJsZV9kYXRlcw==')) ? base64_decode('Y2hlY2tlZA==') : ''; ?>/>
                    <label for="ml_article_list_enable_dates">Show post dates in the list</label>
                </div>
                <div class="ml-form-row ml-checkbox-wrap no-margin">
                    <input type="checkbox" id="ml_automatic_image_resize_active" name="ml_automatic_image_resize_active" value="true" <?php echo Mobiloud::get_option(base64_decode('bWxfYXV0b21hdGljX2ltYWdlX3Jlc2l6ZV9hY3RpdmU=')) ? base64_decode('Y2hlY2tlZA==') : ''; ?>/>
                    <label for="ml_automatic_image_resize_active">Compress image thumbnails</label>
                </div>
                <div class="ml-form-row ml-checkbox-wrap no-margin">
                    <input type="checkbox" id="ml_article_list_show_excerpt" name="ml_article_list_show_excerpt" value="true" <?php echo Mobiloud::get_option(base64_decode('bWxfYXJ0aWNsZV9saXN0X3Nob3dfZXhjZXJwdA==')) ? base64_decode('Y2hlY2tlZA==') : ''; ?>/>
                    <label for="ml_article_list_show_excerpt">Show excerpts in article list</label>
                </div>
                <div class="ml-form-row ml-checkbox-wrap no-margin">
                    <input type="checkbox" id="ml_article_list_show_comment_count" name="ml_article_list_show_comment_count" value="true" <?php echo Mobiloud::get_option(base64_decode('bWxfYXJ0aWNsZV9saXN0X3Nob3dfY29tbWVudF9jb3VudA==')) ? base64_decode('Y2hlY2tlZA==') : ''; ?>/>
                    <label for="ml_article_list_show_comment_count">Show comments count in article list</label>
                </div>
            </div>
        </div>
       
    
        <h4>Custom Post Types</h4>
        <div class='ml-col-row'>
            <div class='ml-col-half'>
                <p>Select which post types should be included in the article list.</p>
                <?php                 $posttypes = get_post_types('',base64_decode('bmFtZXM=')); 
                $includedPostTypes = explode(base64_decode('LA=='),Mobiloud::get_option(base64_decode('bWxfYXJ0aWNsZV9saXN0X2luY2x1ZGVfcG9zdF90eXBlcw=='),base64_decode('cG9zdA==')));
                foreach( $posttypes as $v ) {
                    if($v!=base64_decode('YXR0YWNobWVudA==') && $v!=base64_decode('cmV2aXNpb24=') && $v!=base64_decode('bmF2X21lbnVfaXRlbQ==')){
                        $checked = '';
                        if(in_array($v,$includedPostTypes)){
                            $checked = base64_decode('Y2hlY2tlZA==');
                        }                         
                        ?>
                        <div class="ml-form-row ml-checkbox-wrap no-margin">
                            <input type="checkbox" id='postypes_<?php echo esc_attr($v); ?>' name="postypes[]" value="<?php echo esc_attr($v); ?>" <?php echo $checked; ?>/>
                            <label for="postypes_<?php echo esc_attr($v); ?>"><?php echo esc_html($v); ?></label>
                        </div>
                        <?php                     }
                }
                ?>
            </div>
        </div>
		
        <h4>Categories</h4>
        <div class='ml-col-row'>
            <div class='ml-col-half'>
                <p>Select which categories should be included in the article list.</p>
                <?php                 $categories = get_categories(base64_decode('b3JkZXJieT1uYW1l'));  
                $wp_cats = array();  

                $excludedCategories = explode(base64_decode('LA=='),get_option(base64_decode('bWxfYXJ0aWNsZV9saXN0X2V4Y2x1ZGVfY2F0ZWdvcmllcw=='),''));

                foreach( $categories as $category_list ) {  
                    $wp_cats[$category_list->cat_ID] = $category_list->cat_name;  
                }
                foreach( $wp_cats as $v ) {
                    $checked = '';
                    if(!in_array($v,$excludedCategories)){
                        $checked = base64_decode('Y2hlY2tlZA==');
                    }                         
                    ?>
                    <div class="ml-form-row ml-checkbox-wrap no-margin">
                        <input type="checkbox" id='categories_<?php echo esc_attr($v); ?>' name="categories[]" value="<?php echo esc_attr($v); ?>" <?php echo $checked; ?>/>
                        <label for="categories_<?php echo esc_attr($v); ?>"><?php echo esc_html($v); ?></label>
                    </div>
                    <?php                    
                }
                ?>
            </div>
        </div>        
		
		
        <h4>Sticky categories</h4>
        <div class='ml-col-row'>
            <div class='ml-col-half'>
                <p>The first posts from each sticky category are displayed before all others in the app's article list.</p>            
            </div>
            <div class='ml-col-half'>
                <div class='ml-form-row ml-left-align clearfix'>
                    <label class='ml-width-120'>First category</label>                            
                    <select name="sticky_category_1">
                        <option value="">Select a category</option>
                        <?php 
                        $categories = get_categories();                        
                        foreach ($categories as $c) {
                            $selected = '';
                            if(Mobiloud::get_option(base64_decode('c3RpY2t5X2NhdGVnb3J5XzE=')) === $c->cat_ID) {
                                $selected = base64_decode('c2VsZWN0ZWQ9InNlbGVjdGVkIg==');
                            }
                            echo base64_decode('PG9wdGlvbiB2YWx1ZT0n').esc_attr($c->cat_ID).base64_decode('JyA=').$selected.base64_decode('Pg==').esc_html($c->cat_name).base64_decode('PC9vcHRpb24+');
                        }
                        ?>
                    </select>
                    <label>No. of Posts</label>   
                    <input type='text' size='2' id='ml_sticky_category_1_posts' name='ml_sticky_category_1_posts' value='<?php echo esc_attr(Mobiloud::get_option(base64_decode('bWxfc3RpY2t5X2NhdGVnb3J5XzFfcG9zdHM='), 3)); ?>'/>
                    
                </div>
                <div class='ml-form-row ml-left-align clearfix'>
                    <label class='ml-width-120'>Second category</label>                            
                    <select name="sticky_category_2">
                        <option value="">Select a category</option>
                        <?php $categories = get_categories(); ?>
                        <?php                         foreach ($categories as $c) {
                            $selected = '';
                            if(Mobiloud::get_option(base64_decode('c3RpY2t5X2NhdGVnb3J5XzI=')) === $c->cat_ID) {
                                $selected = base64_decode('c2VsZWN0ZWQ9InNlbGVjdGVkIg==');
                            }
                            echo base64_decode('PG9wdGlvbiB2YWx1ZT0n').esc_attr($c->cat_ID).base64_decode('JyA=').$selected.base64_decode('Pg==').esc_html($c->cat_name).base64_decode('PC9vcHRpb24+');
                        }
                        ?>
                    </select>
                    <label>No. of Posts</label>   
                    <input type='text' size='2' id='ml_sticky_category_2_posts' name='ml_sticky_category_2_posts' value='<?php echo esc_attr(Mobiloud::get_option(base64_decode('bWxfc3RpY2t5X2NhdGVnb3J5XzJfcG9zdHM='), 3)); ?>'/>
                    
                </div>
            </div>
        </div>
		
        <h4>Custom field in article list</h4>
        <div class='ml-col-row'>
            <div class='ml-col-half'>
                <p>Your app's article list can show data from a Custom Field (e.g. author, price, source) defined in your posts.</p>            
            </div>
            <div class='ml-col-half'>
                <div class="ml-form-row ml-checkbox-wrap">
                    <input type="checkbox" id="ml_custom_field_enable" name="ml_custom_field_enable" value="true" <?php echo Mobiloud::get_option(base64_decode('bWxfY3VzdG9tX2ZpZWxkX2VuYWJsZQ==')) ? base64_decode('Y2hlY2tlZA==') : ''; ?>/>
                    <label for="ml_custom_field_enable">Show custom field in article list</label>
                </div>
                <div class="ml-form-row ml-left-align clearfix">
                    <label class='ml-width-120' for="ml_custom_field_name">Field Name</label>
                    <input type="text" placeholder="Custom Field Name" id="ml_custom_field_name" name="ml_custom_field_name" value="<?php echo esc_attr(Mobiloud::get_option(base64_decode('bWxfY3VzdG9tX2ZpZWxkX25hbWU='))); ?>"/>
                </div>
            </div>
        </div>
		
		
        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
    </form>
</div>