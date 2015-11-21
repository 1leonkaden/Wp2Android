<?php function ipad_html($post)
{
	global $ml_html_banners_enable;
	$ml_html_banners_enable = get_option(base64_decode('bWxfaHRtbF9iYW5uZXJzX2VuYWJsZQ=='));

	$prefiltered_html = ml_filters_get_filtered($post->post_content);

	$prefiltered_html = str_replace(base64_decode('Cg=='),base64_decode('PHA+PC9wPg=='),$prefiltered_html);
 	
	$html = str_get_html($prefiltered_html);	
	
	$img_tags = $html->find(base64_decode('aW1n'));
	$iframe_tags = $html->find(base64_decode('aWZyYW1l'));
	$object_tags = $html->find(base64_decode('b2JqZWN0'));
	$embed_tags = $html->find(base64_decode('ZW1iZWQ='));
	
	$tags = array_merge($img_tags,$iframe_tags,$object_tags,$embed_tags);
	$scripts = $html->find(base64_decode('c2NyaXB0'));
	
	foreach($tags as $e)
	{
		
		if(isset($e->width)) $e->width = null;
		if(isset($e->height)) $e->height = null;

		$e->style = base64_decode('bWF4LXdpZHRoOjUyMHB4O21hcmdpbi10b3A6MjBweDttYXJnaW4tYm90dG9tOjIwcHg7');
		if($e->tag == base64_decode('aWZyYW1l') || $e->tag == base64_decode('b2JqZWN0') || $e->tag == base64_decode('ZW1iZWQ='))
		{
			
				$e->width = 500;
				$e->height = 300;
		}
		
		$e->outertext = base64_decode('PGNlbnRlcj48ZGl2IGNsYXNzPSJtb2JpbG91ZF9tZWRpYSI+') . $e->outertext . base64_decode('PC9kaXY+PC9jZW50ZXI+PHA+PC9wPg==');
	}
		
	foreach($scripts as $s)
	{
		$s->outertext = ''; 
	}
	
	


	
	$header = base64_decode('PGhlYWQ+').$header_js;
	
	$header .= base64_decode('PG1ldGEgbmFtZT0idmlld3BvcnQiIGNvbnRlbnQ9IndpZHRoPWRldmljZS13aWR0aDsgbWluaW11bS1zY2FsZT0xLjA7IG1heGltdW0tc2NhbGU9MS4wOyIgLz4=');
	$header .= base64_decode('PGxpbmsgcmVsPSJTdHlsZVNoZWV0IiBocmVmPSI=').plugin_dir_url(__FILE__).base64_decode('Y3NzL2lwYWQuY3NzIiB0eXBlPSJ0ZXh0L2NzcyIgIG1lZGlhPSJzY3JlZW4iPg==');

	$header .= base64_decode('PGxpbmsgcmVsPSJTdHlsZVNoZWV0IiBocmVmPSI=').plugin_dir_url(__FILE__).base64_decode('Y3NzL2lwYWRfcG9ydHJhaXQuY3NzIiB0eXBlPSJ0ZXh0L2NzcyIgIG1lZGlhPSJzY3JlZW4iIGlkPSJvcmllbnRfY3NzIj4=');

	$header .= ml_filters_header($post->postID);

	$header .= base64_decode('PC9oZWFkPg==');

	
	$init_html = base64_decode('PGh0bWwgbWFuaWZlc3Q9Ig==').plugin_dir_url(__FILE__+base64_decode('Li4v')).base64_decode('bWFuaWZlc3QucGhwIj4=').$header;
	
	$title = base64_decode('PGgxIGNsYXNzPSd0aXRsZScgYWxpZ249J2xlZnQnPg==').$post->post_title.base64_decode('PC9oMT4=');
	
	$author = get_author_name($post->post_author);
	
	$text_author = '';
	if(strcmp($author, base64_decode('YWRtaW4=')) != 0){
		if(strcmp($author, '') != 0){
			$text_author = base64_decode('ICZidWxsOyA=').get_author_name($post->post_author);
		}
	}
	
	if ( get_post_type($post->ID) != base64_decode('cGFnZQ==')) {
		$title .= base64_decode('PHAgY2xhc3M9J2RldGFpbHMnPg==').mysql2date(base64_decode('RiBqIFk='),$post->post_date).''.$text_author.base64_decode('PC9wPjxwPiZuYnNwOzwvcD4=');
	}
		
	$final_html = $init_html;
	$final_html .= base64_decode('PGJvZHk+PGRpdiBpZD0iY29udGVudCI+');
	$final_html .= $spaces;
	$final_html .= $title.$html->save().$spaces.base64_decode('PGJyLz48YnIvPjxici8+PGJyLz48YnIvPjxici8+PGJyLz48YnIvPjwvZGl2PjwvYm9keT48L2h0bWw+');

	return $final_html;
}
?>