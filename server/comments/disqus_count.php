<?php


$postID = sanitize_text_field($_GET["post_id"]);
$site_url = network_site_url("/");
$disqus_identifier_string = "$postID $site_url?p=$postID";
$post_permalink = get_permalink($postID);
$post_title = get_the_title($postID);

?>
<html>
	

		var disqus_shortname = "<?php echo sanitize_text_field($_GET['shortname']);?>";
	    var disqus_domain = 'disqus.com';
       
		(function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());

     </script>

</body>
</html>
