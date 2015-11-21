<a id="intercom" style="float: right;" class="ml-contact-button button button-primary" href="mailto:h89uu5zu@incoming.intercom.io">Contact Us</a>       
<div style="clear:both; height: 20px;"></div>
<h2 align="right">
Preview
</h2><div class="preview-selection">
<select id="preview_popup_post_select">
<?php $posts = get_posts(array(base64_decode('cG9zdHNfcGVyX3BhZ2U=') => 10,base64_decode('b3JkZXJieQ==') => base64_decode('cG9zdF9kYXRl'),base64_decode('b3JkZXI=') => base64_decode('REVTQw=='),base64_decode('cG9zdF90eXBl') => base64_decode('cG9zdA=='))); ?>
<?php $pages = get_pages(array(base64_decode('c29ydF9vcmRlcg==') => base64_decode('QVND'), base64_decode('c29ydF9jb2x1bW4=') => base64_decode('cG9zdF90aXRsZQ=='), base64_decode('cG9zdF90eXBl') => base64_decode('cGFnZQ=='),base64_decode('cG9zdF9zdGF0dXM=') => base64_decode('cHVibGlzaA=='))); ?>
<optgroup label="Posts">
<?php foreach($posts as $post) { ?>

<option value="<?php echo MOBILOUD_PLUGIN_URL; ?>/post/post.php?post_id=<?php echo $post->ID; ?>">
<?php if(strlen($post->post_title) > 40) { ?>

<?php echo substr($post->post_title,0,40); ?>

..
<?php } else { ?>

<?php echo $post->post_title; ?>

<?php } ?>
</option><?php } ?>
</optgroup><optgroup label="Pages">
<?php foreach($pages as $page) { ?>

<option value="<?php echo MOBILOUD_PLUGIN_URL; ?>/post/post.php?post_id=<?php echo $page->ID; ?>">
<?php if(strlen($page->post_title) > 40) { ?>

<?php echo substr($page->post_title,0,40); ?>

..
<?php } else { ?>

<?php echo $page->post_title; ?>

<?php } ?>
</option><?php } ?>
</optgroup></select><div class="devices">
<div class="ipadmini-device-btn">
<img class="open_preview_btn" src="<?php echo MOBILOUD_PLUGIN_URL; ?>/images/ipadmini_120.png" />iPad
</div><div class="iphone5s-device-btn">
<img class="open_preview_btn" src="<?php echo MOBILOUD_PLUGIN_URL; ?>/images/iphone5s_100.png" />iPhone
</div><div class="clearfix">
</div></div><div class="description">
<p>
	
</p>
</div></div><div id="preview_popup_content">
<div class="iphone5s_device">
<iframe id="preview_popup_iframe">
</iframe></div><div class="ipadmini_device">
<iframe id="preview_popup_iframe">
</iframe></div></div>