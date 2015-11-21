<?php 

function build_page_object($dic){
	
	$childobject = array();
	$childobject[base64_decode('dGl0bGU=')] = $dic->post_title;
	$childobject[base64_decode('bGluaw==')] = get_permalink($dic->ID);
	$childobject[base64_decode('bWxfbGluaw==')] = plugins_url(base64_decode('Z2V0X3BhZ2UucGhwP3BhZ2VfSUQ9').$dic->ID,__FILE__);
	$childobject[base64_decode('bWxfcmVuZGVy')] = ml_page_get_render($dic->ID);
	$childobject[base64_decode('aWQ=')] = "$dic->ID";
	
	$comments_count = wp_count_comments($dic->ID);

	$childobject[base64_decode('Y29tbWVudHMtY291bnQ=')] = 0;
	if($comments_count) {
		$childobject[base64_decode('Y29tbWVudHMtY291bnQ=')] = intval($comments_count->approved);
	}
		
	
	

	
	$children = get_pages(array(base64_decode('cGFyZW50') => $dic->ID));
	
	$childarray = array();
			
	foreach($children as $child){
						
		if($child->post_title!=NULL&&$child->ID!=NULL&&$child->post_parent==$dic->ID){
							
			array_push($childarray,build_page_object($child));
							
		}
						
	}
	
	
	
	$childobject[base64_decode('Y2hpbGRyZW4=')] = $childarray;
						
	return $childobject;
	
}



$categories = ml_categories();
$final_categories = array();

$pages = ml_pages();
$final_pages = array();

$final_urls = array();

$final_options = array();


foreach($categories as $c)
{
	$cat = array();
	if($c->cat_name != NULL && $c->slug != NULL && $c->cat_ID != NULL) {
		$cat[base64_decode('bmFtZQ==')] = html_entity_decode($c->cat_name);
		$cat[base64_decode('c2x1Zw==')] = $c->slug;
		$cat[base64_decode('aWQ=')] = "$c->cat_ID";
		array_push($final_categories,$cat);
	}
}

$terms = get_option(base64_decode('bWxfbWVudV90ZXJtcw=='), array());
foreach($terms as $term) {
    $term_data = explode(base64_decode('PQ=='), $term);
    $taxonomy = $term_data[0];
    $term_id = $term_data[1];
    $term_object = get_term_by(base64_decode('aWQ='), $term_id, $taxonomy);
    if($term_object) {
        $final_categories[] = array(
            base64_decode('bmFtZQ==')=>html_entity_decode($term_object->name),
            base64_decode('c2x1Zw==')=>$term_object->slug,
            base64_decode('aWQ=')=>$term_object->term_id . ''
        );
    }
}

$tags = get_option(base64_decode('bWxfbWVudV90YWdz'), array());
foreach($tags as $tag) {
    $term_object = get_term_by(base64_decode('aWQ='), $tag, base64_decode('cG9zdF90YWc='));
    if($term_object) {
        $final_categories[] = array(
            base64_decode('bmFtZQ==')=>html_entity_decode($term_object->name),
            base64_decode('c2x1Zw==')=>$term_object->slug,
            base64_decode('aWQ=')=>$term_object->term_id . ''
        );
    }
}




		
		

foreach($pages as $p)
{
	$page = array();
	if($p->post_title != NULL && $p->ID != NULL) {
		$page[base64_decode('dGl0bGU=')] = $p->post_title;
		$page[base64_decode('bGluaw==')] = get_permalink($p->ID);
		$page[base64_decode('bWxfbGluaw==')] = plugins_url(base64_decode('Z2V0X3BhZ2UucGhwP3BhZ2VfSUQ9').$p->ID,__FILE__);
		$page[base64_decode('bWxfcmVuZGVy')] = ml_page_get_render($p->ID);
		$page[base64_decode('aWQ=')] = "$p->ID";
		
		$comments_count = wp_count_comments($p->ID);

		$page[base64_decode('Y29tbWVudHMtY291bnQ=')] = 0;
		if($comments_count) {
			$page[base64_decode('Y29tbWVudHMtY291bnQ=')] = intval($comments_count->approved);
		}
		
		if(get_option(base64_decode('bWxfaGllcmFyY2hpY2FsX3BhZ2VzX2VuYWJsZWQ='),true)==true){
				
				
				
				
				
								
				
			
			
				$children = get_pages(array(base64_decode('cGFyZW50') => $p->ID));
				$childarray = array();
			
				foreach($children as $child){
						
						if($child->post_title!=NULL&&$child->ID!=NULL&&$child->post_parent==$p->ID){
							
							array_push($childarray,build_page_object($child));
							
						}
						
				}
				
				$page[base64_decode('Y2hpbGRyZW4=')] = $childarray;
				
				
		}
		
		array_push($final_pages,$page);
	}
}

$urls = get_option(base64_decode('bWxfbWVudV91cmxz'),array());
foreach($urls as $url){
	$urlObject = array();
	$urlObject[base64_decode('dXJs')] = $url[base64_decode('dXJs')];
	$urlObject[base64_decode('dGl0bGU=')] = $url[base64_decode('dXJsVGl0bGU=')];	
	array_push($final_urls,$urlObject);
}

$final_options = array();
$final_options[base64_decode('c2hvd0Zhdm9yaXRlcw==')] = get_option(base64_decode('bWxfbWVudV9zaG93X2Zhdm9yaXRlcw=='),true);

echo json_encode(array(base64_decode('Y2F0ZWdvcmllcw==') => $final_categories, base64_decode('cGFnZXM=') => $final_pages, base64_decode('dXJscw==') => $final_urls, base64_decode('b3B0aW9ucw==') => $final_options));


?>