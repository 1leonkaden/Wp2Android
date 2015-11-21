jQuery(document).ready( function() {
	var checkchange = '';
	jQuery('#nh_location_name, #nh_location_pintype').change(function(){
		jQuery('#nh_location_name_change').val(1);
		jQuery('#nh_location_change').val(1);
		jQuery(this).unbind('change');
	});
	jQuery(".blurlocation").focus( function() {
		checkchange = jQuery(this).val();
	});
	jQuery(".blurlocation").blur( function() {
	
		if(checkchange == jQuery(this).val()) return;
		jQuery('#nh_location_change').val(1);
		var address = '';
		if(jQuery('#nh_location_address').val()){
			address += encodeURIComponent(jQuery('#nh_location_address').val())+',';
		}
		if(jQuery('#nh_location_postcode').val()){
			address += encodeURIComponent(jQuery('#nh_location_postcode').val())+'';
		}
		if(jQuery('#nh_location_town').val()){
			address += '+'+encodeURIComponent(jQuery('#nh_location_town').val())+'';
		}
		if(jQuery('#nh_location_name').val()){
			address += '+('+encodeURIComponent(jQuery('#nh_location_name').val())+')';
		}
		//alert(address);
		jQuery('#googlemapdiv').empty();
		jQuery('#googlemapdiv').html('<iframe id="googlemapiframe" width="400" height="400" src="http://maps.google.de/maps?hl=de&q='+address+'&ie=UTF8&t=&iwloc=A&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>');
		
     /* post_id = 1;
      nonce = 2;

      jQuery.ajax({
         type : "post",
         dataType : "json",
         url : myAjax.ajaxurl,
         data : {action: "nh_ynaa_google_action", post_id : post_id, nonce: nonce},
         success: function(response) {
            if(response.type == "success") {
				alert(response);
               //jQuery("#vote_counter").html(response.vote_count)
            }
            else {
               alert("Your vote could not be added")
            }
         }
      });   
	*/
   });
   
   
   jQuery('#reset_location').click(function(){

	   jQuery('.blurlocation, #nh_location_name, #nh_location_change').val('');
	   jQuery('#nh_location_del').val(1);
	
	   return false;
   });
});