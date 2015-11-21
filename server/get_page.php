<?php 


$page_ID = sanitize_text_field($_GET[base64_decode('cGFnZV9JRA==')]);


$page = get_page($page_ID);



if(isset($_GET[base64_decode('ZnVsbA==')]))
{
	
	$link = get_permalink($page_ID);
	header("Location: $link");
	exit;
}

$post = $page;



?>