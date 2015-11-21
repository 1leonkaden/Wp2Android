<?php if($post_id == NULL) { ?>


<?php $post_id = sanitize_text_field($_GET[base64_decode('cG9zdF9pZA==')]); ?>
<?php $post = get_post($post_id); ?>
<?php } ?>
<?php $post_type = get_post_type($post->ID); ?>
<?php $post_content = $post->post_content; ?>
<?php eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9zdGFydF9ib2R5')))); ?>
<div class="post-content" id="post_content">
<div id="loading_spinner">
</div><div id="post_header">
<?php eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9iZWZvcmVfZGV0YWlscw==')))); ?>
<h1 class="post-title">
<?php echo $post->post_title; ?>

</h1><div class="second-line">
<?php if(($post_type == base64_decode('cG9zdA==') && get_option(base64_decode('bWxfcG9zdF9kYXRlX2VuYWJsZWQ=')) == base64_decode('dHJ1ZQ==')) || ($post_type == base64_decode('cGFnZQ==') && get_option(base64_decode('bWxfcGFnZV9kYXRlX2VuYWJsZWQ=')) == base64_decode('dHJ1ZQ=='))) { ?>

<div class="date">
<?php echo mysql2date(base64_decode('RiBqIFk='),$post->post_date); ?>

</div><?php } ?>
<?php if(($post_type == base64_decode('cG9zdA==') && get_option(base64_decode('bWxfcG9zdF9hdXRob3JfZW5hYmxlZA==')) == base64_decode('dHJ1ZQ==')) || ($post_type == base64_decode('cGFnZQ==') && get_option(base64_decode('bWxfcGFnZV9hdXRob3JfZW5hYmxlZA==')) == base64_decode('dHJ1ZQ=='))) { ?>

<div class="author-name">
<?php echo the_author_meta(base64_decode('ZGlzcGxheV9uYW1l'),$post->post_author); ?>

</div><?php } ?>
<div class="clearfix">
</div></div><div class="clearfix">
</div><?php eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9hZnRlcl9kZXRhaWxz')))); ?>
</div><?php eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9iZWZvcmVfY29udGVudA==')))); ?>
<div id="main_content">
<?php echo do_shortcode($post_content); ?>

</div><?php eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9hZnRlcl9jb250ZW50')))); ?>
</div><?php eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9lbmRfYm9keQ==')))); ?>