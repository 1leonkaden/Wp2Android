<div class='ml-preview <?php echo strlen(get_option(base64_decode('bWxfcHJldmlld19vcw=='))) ? get_option(base64_decode('bWxfcHJldmlld19vcw==')) : base64_decode('aW9z'); ?>'>
    <div class='ml-preview-body'>
        <div class="ml-preview-top-bar <?php echo $iconShade; ?>" style='background-color: <?php echo get_option(base64_decode('bWxfcHJldmlld190aGVtZV9jb2xvcg==')); ?>;'></div>
        <div class='ml-preview-menu-bar' style='background-color: <?php echo get_option(base64_decode('bWxfcHJldmlld190aGVtZV9jb2xvcg==')); ?>;'>
            <a href='javascript:void(0);' class='ml-icon ml-icon-menu <?php echo $iconShade; ?>'></a>
            <a href='javascript:void(0);' class='ml-preview-logo-holder'>
                <?php 
                if(strlen(trim(get_option(base64_decode('bWxfcHJldmlld191cGxvYWRfaW1hZ2U=')))) > 0) {
                    $logoPath = get_option(base64_decode('bWxfcHJldmlld191cGxvYWRfaW1hZ2U='));
                } else {
                    $logoPath =  MOBILOUD_PLUGIN_URL . base64_decode('L2ltYWdlcy9tbF9wcmV2aWV3X25vbG9nby5wbmc=');
                }
                ?>  
                <img class='ml-preview-logo' src='<?php echo $logoPath; ?>'/>
            </a>
            <a href='javascript:void(0);' class='ml-icon ml-icon-search <?php echo $iconShade; ?>'></a>
        </div>
        <div class='ml-preview-article-list'>
            <div class='scroller'>
                <?php                 $posts = ml_preview_get_posts();
                if(count($posts) > 0) {
                    
                    foreach($posts as $post) {
                        $imageUrl = null;
                        if (has_post_thumbnail( $post->ID ) ) {
                           $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), base64_decode('c2luZ2xlLXBvc3QtdGh1bWJuYWls') );   
                           $imageUrl = $image[0];
                        }
                        ?>
                        <div class='ml-preview-article'>
                            <?php if($imageUrl): ?>
                            <img class='ml-preview-img' src='<?php echo $imageUrl; ?>'/>   
                            <?php endif; ?>
                            <div class='ml-preview-article-body'>
                                <h3><?php echo $post->post_title; ?></h3>
                                <span class='ml-article-date'><?php echo (get_option(base64_decode('bWxfZGF0ZXR5cGU='), base64_decode('cHJldHR5ZGF0ZQ==')) == base64_decode('cHJldHR5ZGF0ZQ==') ? Mobiloud_App_Preview::how_long_ago(strtotime($post->post_date)) : date_i18n( get_option(base64_decode('bWxfZGF0ZWZvcm1hdA=='), base64_decode('RiBqLCBZ')) , strtotime($post->post_date), get_option(base64_decode('Z210X29mZnNldA==')))); ?></span>
                            </div>
                        </div>
                        <?php                     }
                } else {
                ?>
                    <div class='ml-preview-article'>
                        <img src='<?php echo MOBILOUD_PLUGIN_URL; ?>/images/articles/1.jpg'/>          
                        <div class='ml-preview-article-body'>
                            <h3>Microsoft and Knewton partner up to bring adaptive learning to publishers & schools</h3>
                            <span class='ml-article-date'>42 days ago</span>
                        </div>
                    </div>
                    <div class='ml-preview-article'>
                        <img src='<?php echo MOBILOUD_PLUGIN_URL; ?>/images/articles/2.jpg'/>          
                        <div class='ml-preview-article-body'>
                            <h3>Orangina and their brilliant new campaign</h3>
                            <span class='ml-article-date'>42 days ago</span>
                        </div>
                    </div>
                    <div class='ml-preview-article'>
                        <img src='<?php echo MOBILOUD_PLUGIN_URL; ?>/images/articles/3.jpg'/>          
                        <div class='ml-preview-article-body'>
                            <h3>Float down the Colorado River using Google Street View</h3>
                            <span class='ml-article-date'>56 days ago</span>
                        </div>
                    </div>
                    <div class='ml-preview-article'>
                        <img src='<?php echo MOBILOUD_PLUGIN_URL; ?>/images/articles/4.jpg'/>          
                        <div class='ml-preview-article-body'>
                            <h3>Venture capitalists face a more competitive, global market</h3>
                            <span class='ml-article-date'>56 days ago</span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>