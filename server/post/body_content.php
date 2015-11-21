<?php 
    if(!function_exists(base64_decode('c2V0dXBfcG9zdGRhdGFfY3VzdG9t'))) {
        /**
        * Set up global post data.
        *
        * @since 1.5.0
        *
        * @param object $post Post data.
        * @uses do_action_ref_array() Calls 'the_post'
        * @return bool True when finished.
        */
       function setup_postdata_custom( $post ) {
           global $id, $authordata, $currentday, $currentmonth, $page, $pages, $multipage, $more, $numpages;

           $id = (int) $post->ID;

           $authordata = get_userdata($post->post_author);

           $currentday = mysql2date(base64_decode('ZC5tLnk='), $post->post_date, false);
           $currentmonth = mysql2date(base64_decode('bQ=='), $post->post_date, false);
           $numpages = 1;
           $multipage = 0;
           $page = get_query_var(base64_decode('cGFnZQ=='));
           if ( ! $page )
               $page = 1;
           if ( is_single() || is_page() || is_feed() )
               $more = 1;
           $content = $post->post_content;
           $pages = array( $post->post_content );


           /**
            * Fires once the post data has been setup.
            *
            * @since 2.8.0
            *
            * @param WP_Post &$post The Post object (passed by reference).
            */
           do_action_ref_array( base64_decode('dGhlX3Bvc3Q='), array( &$post ) );

           return true;
       }
    }


if (!function_exists(base64_decode('bWxfcmVtb3ZlX2VsZW1lbnRz'))) {

    function ml_remove_elements($content)
    {
        if (strpos($content,base64_decode('bWxfcmVtb3Zl')) !== false){
            $d = new DOMDocument();
            $d->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $s = new DOMXPath($d);

            foreach ($s->query(base64_decode('Ly9kaXZbY29udGFpbnMoYXR0cmlidXRlOjpjbGFzcywgIm1sX3JlbW92ZSIpXQ==')) as $t)
                $t->parentNode->removeChild($t);

            return  preg_replace(base64_decode('fjwoPzohRE9DVFlQRXwvPyg/Omh0bWx8aGVhZHxib2R5KSlbXj5dKj5ccyp+aQ=='), '', $d->saveHTML());
        }
        else {
            return $content;
        }
    }

}

$current_permalink = get_permalink($post->ID);
    if(!function_exists(base64_decode('bWxfY29udmVydF9yZWxhdGl2ZV9saW5rcw=='))) {
        function ml_convert_relative_links($content) {
            global $current_permalink;
            $content = preg_replace(base64_decode('Iyg8cyphcytbXj5dKmhyZWZzKj1zKlsiJ10pKD8haHR0cHwvKShbXiInPl0rKShbIic+XSspIw=='), base64_decode('JDE=').$current_permalink.base64_decode('JDIkMw=='), $content);
            return $content;
        }
        add_filter( base64_decode('dGhlX2NvbnRlbnQ='), base64_decode('bWxfY29udmVydF9yZWxhdGl2ZV9saW5rcw=='), 20 );
    }

	setup_postdata_custom($post); 

	if(!isset($custom_css)){
		$custom_css = stripslashes(get_option(base64_decode('bWxfcG9zdF9jdXN0b21fY3Nz')));
		echo $custom_css ? base64_decode('PHN0eWxlIHR5cGU9InRleHQvY3NzIiBtZWRpYT0ic2NyZWVuIj4=') . $custom_css . base64_decode('PC9zdHlsZT4=') : '';
	}
	if(!isset($custom_js)){
		$custom_js = stripslashes(get_option(base64_decode('bWxfcG9zdF9jdXN0b21fanM=')));

	}

    echo stripslashes(get_option(base64_decode('bWxfYmFubmVyX2Fib3ZlX2NvbnRlbnQ='), ''));
	eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9zdGFydF9ib2R5'))));
	echo stripslashes(get_option(base64_decode('bWxfaHRtbF9wb3N0X3N0YXJ0X2JvZHk=')));

	eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9iZWZvcmVfdG9wX2Jhbm5lcg=='))));

	
	

	eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9hZnRlcl90b3BfYmFubmVy'))));

?>
<article class="mb_article">
<?php 
	eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9iZWZvcmVfZGV0YWlscw=='))));
	echo stripslashes(get_option(base64_decode('bWxfaHRtbF9wb3N0X2JlZm9yZV9kZXRhaWxz')));

	if(!isset($_GET[base64_decode('cGFnZV9JRA==')])){
		
		echo get_option(base64_decode('bWxfcG9zdF9kYXRlX2VuYWJsZWQ=')) ? base64_decode('PHAgY2xhc3M9Im1iX3Bvc3RfbWV0YSI+PHRpbWUgdGl0bGU9Ig==') . $post->post_date . base64_decode('Ij4=') . date_i18n(get_option(base64_decode('ZGF0ZV9mb3JtYXQ=')), strtotime($post->post_date)) . base64_decode('PC90aW1lPjwvcD4=') : '';

	} else {
		echo get_option(base64_decode('bWxfcGFnZV9kYXRlX2VuYWJsZWQ=')) ? base64_decode('PHAgY2xhc3M9Im1iX3Bvc3RfbWV0YSI+PHRpbWUgdGl0bGU9Ig==') . $post->post_date . base64_decode('Ij4=') . date_i18n(get_option(base64_decode('ZGF0ZV9mb3JtYXQ=')), strtotime($post->post_date)) . base64_decode('PC90aW1lPjwvcD4=') : '';
	}
	
	echo base64_decode('PGRpdiBjbGFzcz0ibWJfcG9zdF9tZXRhIHJpZ2h0Ij4='); eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9yaWdodF9vZl9kYXRl')))); echo base64_decode('PC9kaXY+');
?>
	<div class="mb_clear"></div>
    <?php echo stripslashes(get_option(base64_decode('bWxfYmFubmVyX2Fib3ZlX3RpdGxl'), '')); ?>
    <?php if(!isset($_GET[base64_decode('cGFnZV9JRA==')])): ?>
        <?php if(get_option(base64_decode('bWxfcG9zdF90aXRsZV9lbmFibGVk'))): ?>
            <h1 class="gamma mb_post_title"><?php echo $post->post_title; ?></h1>
        <?php endif; ?>
    <?php else: ?>
        <?php if(get_option(base64_decode('bWxfcGFnZV90aXRsZV9lbmFibGVk'))): ?>
            <h1 class="gamma mb_post_title"><?php echo $post->post_title; ?></h1>
        <?php endif; ?>
    <?php endif; ?>
<?php     $show_full_body = false;
    if(get_option(base64_decode('bWxfZWFnZXJfbG9hZGluZ19lbmFibGU=')) || isset($_GET[base64_decode('ZnVsbGNvbnRlbnQ=')]) || isset($_GET[base64_decode('cGFnZV9JRA==')])) {
        
        
        $show_full_body = true;
    } elseif(isset($_POST[base64_decode('YWxsb3dfbGF6eQ==')]) && !get_option(base64_decode('bWxfZWFnZXJfbG9hZGluZ19lbmFibGU='))) {
        $show_full_body = true;
    }
    
    if($show_full_body) {
	

		if(!isset($_GET[base64_decode('cGFnZV9JRA==')])){
			echo get_option(base64_decode('bWxfcG9zdF9hdXRob3JfZW5hYmxlZA==')) ? base64_decode('PHAgY2xhc3M9Im1iX3Bvc3RfbWV0YSI+') . get_the_author() . base64_decode('PC9wPjxkaXYgY2xhc3M9Im1iX2NsZWFyIj48L2Rpdj4=') : ''; 
		} else {
			echo get_option(base64_decode('bWxfcGFnZV9hdXRob3JfZW5hYmxlZA==')) ? base64_decode('PHAgY2xhc3M9Im1iX3Bvc3RfbWV0YSI+') . get_the_author() . base64_decode('PC9wPjxkaXYgY2xhc3M9Im1iX2NsZWFyIj48L2Rpdj4=') : ''; 
		}

	eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9hZnRlcl9kZXRhaWxz'))));
	echo stripslashes(get_option(base64_decode('bWxfaHRtbF9wb3N0X2FmdGVyX2RldGFpbHM=')));

	eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9iZWZvcmVfY29udGVudA=='))));
	echo stripslashes(get_option(base64_decode('bWxfaHRtbF9wb3N0X2JlZm9yZV9jb250ZW50')));
    add_filter(base64_decode('dGhlX2NvbnRlbnQ='), base64_decode('bWxfcmVtb3ZlX2VsZW1lbnRz'), 70);

	
	global $more;
    $more = 1;
	the_content();

	eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9hZnRlcl9jb250ZW50'))));
	echo stripslashes(get_option(base64_decode('bWxfaHRtbF9wb3N0X2FmdGVyX2NvbnRlbnQ=')));

	eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9iZWZvcmVfZm9vdGVyX2Jhbm5lcg=='))));

	eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9hZnRlcl9mb290ZXJfYmFubmVy'))));

	}
?>
</article>
<?php 
	eval(stripslashes(get_option(base64_decode('bWxfcG9zdF9hZnRlcl9ib2R5'))));
	echo stripslashes(get_option(base64_decode('bWxfaHRtbF9wb3N0X2FmdGVyX2JvZHk=')));
    echo stripslashes(get_option(base64_decode('bWxfYmFubmVyX2JlbG93X2NvbnRlbnQ='), ''));
?>

    var iframes = document.getElementsByTagName('iframe')
        , frameRatios = []
        , container = document.getElementsByTagName('article')[0]
        , imgs = document.getElementsByTagName('img');
    for(var i = 0; i < iframes.length; i++){
        var frame = iframes[i];
        frameRatios[i] = frame.offsetHeight / frame.offsetWidth;
        frame.removeAttribute('width');
        frame.removeAttribute('height');
        frame.style.width = '100%';
    }
    for(var i = 0; i < imgs.length; i++){
        var img = imgs[i];
        img.removeAttribute('width');
        img.removeAttribute('height');
        while(img = img.parentNode){
            if(/^attachment_[0-9]+$/.test(img.id)){
                img.removeAttribute('style');
            }
        }
    }
    window.onresize = function(){
        var containerWidth = container.offsetWidth;
        for(var i = 0; i < iframes.length; i++){
            var frame = iframes[i];
            frame.style.height = (containerWidth * frameRatios[i]) + 'px';
        }
    };
    window.onresize();
</script>