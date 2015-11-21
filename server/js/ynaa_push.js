// JavaScript Document
jQuery(document).ready(function($) {

	var data = {
		action: 'my_action',
		whatever: 1234
	};

	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	$('#nh_ynaa_sendpush').click(function(e) {
		//alert('123');
		jQuery.ajax({
			 type : "post",			 
			 url : ajax_object.ajaxurl,
			 data : {action: "my_action", whatever: ajax_object.we_value},
			 success: function(data,textStatus,jqXHR ) {
				alert(data);
				/*if(response.type == "success") {
				   //jQuery("#vote_counter").html(response.vote_count)
				   
				}
				else {
				   alert("Your vote could not be added")
				}*/
			 }
		  })   ;
		//alert('Got this from the server: ' + e);
	});
	
	alert(3);
});