jQuery(document).ready(function ($) {
    //wp_option variable
    var $general_settings_key = 'nh_ynaa_general_settings';
    if (php_data.general_settings_key) {
        $general_settings_key = php_data.general_settings_key;
        $menu_settings_key = php_data.menu_settings_key;
        $teaser_settings_key = php_data.teaser_settings_key;
        $homepreset_settings_key = php_data.homepreset_settings_key;
        $delete = php_data.delete2;
        $catText = php_data.catText;
        $allowremoveText = php_data.allowremoveText;
        $color01 = php_data.color01;

    }


    if ($('.my-color-field').length > 0) {
        $('.my-color-field').wpColorPicker({
            //clear: function() {alert('Dieser Wert ist ung�ltig.');}
        });
    }



    //Secon Submit Button
    $('.submitbutton').click(function () {
        $('#submit').trigger('click');
    });

    //Menu select tabs
    $('.tabclass').tabs({
        activate: function (event, ui) {
            $(ui.oldPanel).removeClass('tabs-panel-active');
            $(ui.newPanel).addClass('tabs-panel-active');
        }
    });

    //Menu Select
    $('a.select-all').on("click", function (event) {
        $(event.target).parentsUntil('div.inside').find('input[type="checkbox"]').attr("checked", false);
        $(event.target).parentsUntil('div.inside').children('div.tabs-panel-active').find('input[type="checkbox"]').attr("checked", true);
        return false;
    });

    //Menu accoding
    $('#menu-to-edit.nh-menu-ul')
      .accordion({
          header: "> li > dl",
          collapsible: true,
          heightStyle: "content"
      })
      .sortable({
          axis: "y",
          handle: "dl",
          stop: function (event, ui) {
              // IE doesn't register the blur when sorting
              // so trigger focusout handlers to remove .ui-state-focus
              ui.item.children("dl").triggerHandler("focusout");
          },
          update: function (event, ui) {
              var $i = 0;
              $.each($('.menu-pos-ynaa'), function (key, ob) {
                  $i++;
                  $(ob).val($i);
              });
          }
      });


    $('#menu-to-edit.nh-menu-ul > li > dl :first').trigger('click');

    //teaser draggable
    $('#menu-to-edit.nh-teaser-ul, #menu-to-edit.nh-homepreset-ul').sortable();

    //Add Items to menu
    $('.submit-add-to-menu').click(function (e) {
        //alert(2); 
        if ($(e.target).parentsUntil('div.inside').children('div.tabs-panel-active') && $(e.target).parentsUntil('div.inside').children('div.tabs-panel-active').length > 0) {

            var obj = ($(e.target).parentsUntil('div.inside').children('div.tabs-panel-active').find('input[type="checkbox"]:checked'));
        }
        else {
            var obj = ($(e.target).parentsUntil('div.inside').find('input[type="checkbox"]:checked'));
        }

        $.each(obj, function (key, ob) {

            var $id = getMaxMenuID();
            var $pos = (getItemscount('ul#menu-to-edit.nh-menu-ul li'));
            while ($('#menu-item-' + $pos).length > 0) {
                $pos++;
            }
            var $o = $(ob);
            if (typeof ($o.attr('checked')) != 'undefined') {

                var $type = $('#type-' + $o.attr('name')).val();
                var $menu_id = $o.val();
                //alert($menu_id);
                var $title = $('#title-' + $o.attr('name')).val();
                /*var $post_date = $('#post_date-'+$o.attr('name')).val(); //alert($post_date);
                if (typeof $post_date == 'undefined') $post_date=0;*/
                var $inputurl = '';
                switch ($type) {
                    case 'page': $type_text = 'Seite'; $type2 = 'article'; break;
                    case 'post': $type_text = 'Beitrag'; $type2 = 'article'; break;
                    case 'app': $type_text = 'App'; $type2 = 'app'; $id = $o.val(); break;
                    case 'cat': $type_text = 'Kategorie'; $type2 = 'cat'; break;
                    case 'fb': $type_text = 'Facebook'; $type2 = 'fb'; break;
                    case 'event': $type_text = 'Event'; $type2 = 'event'; break;
                    case 'events': $type_text = 'Events'; $type2 = 'events'; break;
                    case 'map': $type_text = 'Map'; $type2 = 'map'; break;
                    case 'pushCenter': $type_text = 'Push center'; $type2 = 'pushCenter'; break;
                    case 'carFinder': $type_text = 'Car Finder'; $type2 = 'carFinder'; break;
                    case 'webview': $type_text = 'URL'; $type2 = 'webview'; $inputurl = '<div style="clear:left; margin-top:10px;"><p><label for="edit-menu-item-url-' + $pos + '">Url<br><input type="text" value="http://" name="' + $menu_settings_key + '[menu][' + $pos + '][url]" class="widefat edit-menu-item-url" id="edit-menu-item-url-' + $pos + '"></p></div>'; break;
                    default: $type_text = ''; $type2 = ''; break;
                }

                var $objhtml = '<li class="menu-item menu-item-depth-0 menu-item-' + $type + ' menu-item-edit-inactive pending" id="menu-item-' + $pos + '" style="display: list-item;">' +
									'<dl class="menu-item-bar">' +
										'<dt class="menu-item-handle">' +
											'<span class="item-title"><span class="menu-item-title">' + $title + '</span></span>' +
											'<span class="item-controls">' +
												'<span class="item-type">' + $type_text + '</span>' +
												'<span class="item-order hide-if-js"></span>' +
												'<a href="#" title="' + $title + '" id="edit-' + $pos + '" class="item-edit">' + $title + '</a>' +
											'</span>' +
										'</dt>' +
									'</dl>' +
									'<div id="menu-item-settings-' + $pos + '" class="menu-item-settings">' +
										'<p class="description description-thin">' +
											'<label for="edit-menu-item-title-' + $pos + '">Angezeigter Name<br>' +
											'<input type="text" value="' + $title + '" name="' + $menu_settings_key + '[menu][' + $pos + '][title]" class="widefat edit-menu-item-title" id="edit-menu-item-title-' + $pos + '">' +
											'<input type="hidden" value="' + $pos + '" name="' + $menu_settings_key + '[menu][' + $pos + '][pos]" id="menu-pos' + $pos + '" class="menu-pos-ynaa" />' +
									 		'<input type="hidden" value="' + $type2 + '" name="' + $menu_settings_key + '[menu][' + $pos + '][type]" id="menu-type' + $pos + '" />' +
											'<input type="hidden" value="' + $type_text + '" name="' + $menu_settings_key + '[menu][' + $pos + '][type_text]" id="menu-type_text' + $pos + '" />' +
											'<input type="hidden" value="' + $id + '" name="' + $menu_settings_key + '[menu][' + $pos + '][id]" id="menu-id' + $pos + '" class="menu-id-ynaa" />' +
											'<input type="hidden" value="' + $menu_id + '" name="' + $menu_settings_key + '[menu][' + $pos + '][item_id]" id="menu-item-id' + $pos + '" />' +
											'<input type="hidden" value="1" name="' + $menu_settings_key + '[menu][' + $pos + '][status]" id="menu-status' + $pos + '" />' +
                //'<input type="hidden" value="'+$post_date+'" name="'+$menu_settings_key+'[menu]['+$pos+'][post_date]" id="menu-post_date'+$pos+'" />' +
											'</label>' +
										'</p>' +
										$inputurl +
										'<div class="menu-item-actions description-wide submitbox">' +
											'<a href="' + $pos + '" id="delete-' + $pos + '" class="item-delete submitdelete deletion">' + $delete + '</a>' +
										'</div>' +
									'</div><!-- .menu-item-settings-->' +
								'</li>';

                // Add a new header and panel
                $($objhtml).appendTo("#menu-to-edit");
                $o.attr('checked', false);
                // Refresh the accordion
                $("#menu-to-edit").accordion("refresh");
            }
        });
        return false;
    });



    //Teaser Add Elemt
    $('.submit-add-to-teaser').click(function (e) {

        if ($(e.target).parentsUntil('div.inside').children('div.tabs-panel-active') && $(e.target).parentsUntil('div.inside').children('div.tabs-panel-active').length > 0) {
            var obj = ($(e.target).parentsUntil('div.inside').children('div.tabs-panel-active').find('input[type="checkbox"]:checked'));

        }
        else {
            var obj = ($(e.target).parentsUntil('div.inside').find('input[type="checkbox"]:checked'));

        }

        $.each(obj, function (key, ob) {

            var $o = $(ob);
            //alert($o.val());
            if (typeof ($o.attr('checked')) != 'undefined') {


                var $type = $('#type-' + $o.attr('name')).val();
                if (typeof $type == 'undefined') $type = '';
                //alert($type);
                $('<li id="replace' + $o.val() + '" class="floatli empty_teaser_li"></li>').appendTo("ul.nh-teaser-ul");
                jQuery.ajax({
                    type: "post",
                    url: ajaxurl,
                    dataType: "json",
                    data: { action: "ny_ynaa_teaser_action", tpid: $o.val(), type: $type },
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        if (data.error == 0) {

                            $objhtml = '<li id="teaserli' + $o.val() + data.type + '" class="floatli">' +
									'<div  class="teaserdiv" style="background-image:url(' + data.img + ');">' +
									data.title +
									'</div>' +
									'<div>' +
									'<a href="' + $o.val() + data.type + '" class="dellteaser">' + $delete + '</a> ' +
									'<input type="hidden" value="' + $o.val() + '"  name="' + $teaser_settings_key + '[teaser][]" /> ' +
									'<input type="hidden" value="' + data.type + '"  name="' + $teaser_settings_key + '[teaser][type][]" /> ' +
									'</div>' +
									'</li>';
                            //alert(data.title);
                            $($objhtml).replaceAll("#replace" + $o.val());
                            //$( $objhtml ).appendTo( "ul.nh-teaser-ul" );
                            $o.attr('checked', false);
                        }
                        else {
                            alert(data.error);
                            $('.empty_teaser_li').remove();
                        }

                        /*if(response.type == "success") {
                        //jQuery("#vote_counter").html(response.vote_count)
						   
                        }
                        else {
                        alert("Your vote could not be added")
                        }*/
                    }
                });
            }
        });

        return false;
    });

    //Element aus Teaser entfernen
    $('.dellteaser').live('click', function (e) {
        //  alert($(this).attr('href'));
        //  return false;
        if (confirm("Wollen Sie diesen Teaser entfernen?")) {
            $('li#teaserli' + ($(this).attr('href'))).remove();

        }
        return false;
    });

    /*
    * Teaser source
    */
    $('#teaser_source').change(function () {
        if ($(this).val() == 'indi') {
            $('.teaser_categories').hide();
            $('.teaser_limit').hide();
            $('#nav-menus-frame').show();

        }
        else {
            if ($(this).val() == 'cat') {
                $('.teaser_categories').show();
            }
            else {
                $('.teaser_categories').hide();
            }
            $('.teaser_limit').show();
            $('#nav-menus-frame').hide();
        }
    });


    //Element aus Homepreset entfernen
    $('.delhp').live('click', function (e) {
        //  alert($(this).attr('href'));
        //  return false;
        if (confirm("Wollen Sie diesen Element entfernen?")) {
            //$('li#homepresetli'+($(this).attr('href'))).next('.empty_li_clear').remove();
            $('li#homepresetli' + ($(this).attr('href'))).remove();
            //if(parseInt($('.floatli').length)% 2 != 0 ) $('.empty_li_clear:last' ).remove();
        }
        return false;
    });

    //Element aus Menu entfernen
    $('.item-delete').live('click', function (e) {
        //  alert($(this).attr('href'));
        //  return false;
        if (confirm("Wollen Sie diesen Eintrag entfernen?")) {
            $('li#menu-item-' + ($(this).attr('href'))).remove();
            $("#menu-to-edit").accordion("refresh");
        }
        return false;
    });

    //Element im Menu deaktivieren
    $('.item-deactiv').live('click', function (e) {
        //  alert($(this).attr('href'));
        //  return false;
        if (confirm("Wollen Sie diesen Men&uuml;punkt deaktivieren?")) {
            $('li#menu-item-' + ($(this).attr('href'))).remove();
            $("#menu-to-edit").accordion("refresh");
        }
        return false;
    });

    //Change Homepreset Title
    $('.hptitle').live('keyup', function (e) {
        var tempid = '#' + $(this).attr('id') + 'div';
        $(tempid).text($(this).val());

    });


    //Add Item to homepreset
    $('.submit-add-to-homepreset').click(function (e) {
        //alert(1);
        if ($(e.target).parentsUntil('div.inside').children('div.tabs-panel-active') && $(e.target).parentsUntil('div.inside').children('div.tabs-panel-active').length > 0) {
            var obj = ($(e.target).parentsUntil('div.inside').children('div.tabs-panel-active').find('input[type="checkbox"]:checked'));
        }
        else {
            var obj = ($(e.target).parentsUntil('div.inside').find('input[type="checkbox"]:checked'));
        }

        $.each(obj, function (key, ob) {
            var $o = $(ob);
            if (typeof ($o.attr('checked')) != 'undefined') {

                $('<li class="floatli empty_homepreset_li"></li>').appendTo("ul.nh-homepreset-ul");

                var $type = $('#type-' + $o.attr('name')).val();
                var $link_type = $('#link-type-' + $o.attr('name')).val();

                var $pos = getMaxHomepresetID();
                if ($link_type == 'cat') {
                    var $title = $('#title-' + $o.attr('name')).val();
                    var $oval = $o.val();
                    if ($type == 'webview') {
                        $oval = ($o.val()) - (100 + $pos);
                        var $urldiv = '<div class="h30"><input type="text" value="http://" id="' + $homepreset_settings_key + '_items_' + $pos + '_url" name="' + $homepreset_settings_key + '[items][' + $pos + '][url]" data-id="hpdiv' + $pos + '" /></div>';
                    }
                    else var $urldiv = '<div class="h30"><br></div>';
                    $objhtml = '<li id="homepresetli' + $pos + '" class="floatli">' +
										'<div class="hpdiv" id="hpdiv' + $pos + '" style="background-color:' + $color01 + ';">' +
											'<div class="ttitle" id="hptitle' + $pos + 'div">' + $title + '</div>' +
											'<div class="setdefaultcatpic" style="display:none;"><a id="upload_image_button" class="upload_image_button" href="#" name="' + $homepreset_settings_key + '_items_' + $pos + '_img">' + $catText + '</a></div>' +
										'</div>' +
									   '<div><input type="text" value="' + $title + '" id="hptitle' + $pos + '" name="' + $homepreset_settings_key + '[items][' + $pos + '][title]" class="hptitle" /></div>' +
									   $urldiv;
                    //$objhtml +=   '<div><input type="checkbox" checked="checked" name="'+$homepreset_settings_key+'[items]['+$pos+'][allowRemove]" id="allowRemove'+$pos+'" value="1" /><label for="allowRemove'+$pos+'"> '+$allowremoveText+'</label></div>';									   
                    $objhtml += '<div>' +
											'<a href="' + $pos + '" class="delhp">' + $delete + '</a>' +
											'<input type="hidden" value="' + $o.val() + '"  name="' + $homepreset_settings_key + '[items][' + $pos + '][id]" />' +
											'<input type="hidden" value="' + $type + '"  name="' + $homepreset_settings_key + '[items][' + $pos + '][type]" />' +
											'<input type="hidden" value="" id="' + $homepreset_settings_key + '_items_' + $pos + '_img" name="' + $homepreset_settings_key + '[items][' + $pos + '][img]" data-id="hpdiv' + $pos + '" />' +
											'<input type="hidden" value="' + $pos + '" name="' + $homepreset_settings_key + '[items][' + $pos + '][id2]" id="menu-id' + $pos + '" class="homepreset-id-ynaa" />' +
										'</div>' +
									'</li><!--End Hompreset-item -->';
                    //alert(data.title);
                    $($objhtml).replaceAll(".empty_homepreset_li");
                    //if(parseInt($('.floatli').length)% 2 == 0 ) $('<li class="empty_li_clear"></li>' ).appendTo( "ul.nh-homepreset-ul" );					
                    $o.attr('checked', false);

                }
                else {
                    //alert($o.val());
                    jQuery.ajax({
                        type: "post",
                        url: ajaxurl,
                        dataType: "json",
                        async: false,
                        data: { action: "ny_ynaa_teaser_action", tpid: $o.val() },
                        success: function (data, textStatus, jqXHR) {
                            //console.log(data);
                            if (data.error == 0) {
                                $objhtml = '<li id="homepresetli' + $pos + '" class="floatli">' +
											'<div class="hpdiv" id="hpdiv' + $pos + '" style="background-image:url(' + data.img + ');">' +
												'<div class="ttitle" id="hptitle' + $pos + 'div">' + data.title + '</div>' +

											'</div>' +
										   '<div><input type="text" value="' + data.title + '" id="hptitle' + $pos + '" name="' + $homepreset_settings_key + '[items][' + $pos + '][title]" class="hptitle" /></div>';
                                //$objhtml +=	   '<div><input type="checkbox" checked="checked" name="'+$homepreset_settings_key+'[items]['+$pos+'][allowRemove]" id="allowRemove'+$pos+'" value="1" /><label for="allowRemove'+$pos+'"> '+$allowremoveText+'</label></div>';
                                $objhtml += '<div>' +
												'<a href="' + $pos + '" class="delhp">' + $delete + '</a>' +
												'<input type="hidden" value="' + $o.val() + '"  name="' + $homepreset_settings_key + '[items][' + $pos + '][id]" />' +
												'<input type="hidden" value="' + $type + '"  name="' + $homepreset_settings_key + '[items][' + $pos + '][type]" />' +

												'<input type="hidden" value="' + $pos + '" name="' + $homepreset_settings_key + '[items][' + $pos + '][id2]" id="menu-id' + $pos + '" class="homepreset-id-ynaa" />' +
											'</div>' +
										'</li><!--End Hompreset-item -->';
                                //alert(data.title);
                                $($objhtml).replaceAll(".empty_homepreset_li");
                                $o.attr('checked', false);
                                if (parseInt($('.floatli').length) % 2 == 0) $('<li class="empty_li_clear"></li>').appendTo("ul.nh-homepreset-ul");
                                //$( $objhtml ).appendTo( "ul.nh-homepreset-ul" );
                            }
                            else {
                                //alert (data.error);
                                $('.empty_homepreset_li').remove();
                            }
                            /*if(response.type == "success") {
                            //jQuery("#vote_counter").html(response.vote_count)
							   
                            }
                            else {
                            alert("Your vote could not be added")
                            }*/
                        }
                    });
                }
            }
        });

        return false;
    });




    //Upload image
    var $send_url_to = '';
    $('a.upload_image_button').live('click', function () {

        formfield = $(this).attr('name');
        $send_url_to = formfield;

        //$(this).closest( "div.image-div" ).css( "background-color", "red" );

        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');


        return false;
    });
    window.send_to_editor = function (html) {
        imgurl = $('img', html).attr('src');
        if (typeof imgurl === "undefined") {
            imgurl = $(html).attr('src');
        }
        // alert(imgurl);
        $('#' + $send_url_to).val(imgurl);

        var tempid = '#' + $('#' + $send_url_to).attr('data-id');
        $(tempid).css('background-image', 'url("' + imgurl + '")');
        $(tempid).css('background-color', '');

        if ($('#' + $send_url_to).attr('data-link')) {

            var $id = $('#' + $send_url_to).attr('data-link');
            //alert($id);
            //alert($('#'+$send_url_to).attr('id'));
            $('#reset-cat-img-link-cont_' + $id).html('<a href="' + $id + '" class="reset-cat-img-link">Reset image</a>');
        }
        tb_remove();
    }

    /* RESET IMAGE */
    $('.reset-cat-img-link').live('click', function () {
        if (confirm('Do you want reset the image?')) {
            var $id = $(this).attr('href');
            $('#image-div' + $id).css('background-image', '');
            $('#nh_ynaa_categories_settings_items_' + $id + '_img').val('');
            $('#reset-cat-img-link-cont_' + $id + ' a').remove();
            return false;
        }
        return false;
    });



    //Load All Posts tybes
    /*$('.ynaa-tab-all').click(function(){
    var $this = jQuery(this);
		
    $.ajax({
    url: "/wp-content/plugins/nh_ynaa/include/load.php",
    beforeSend: function( xhr ) {
    $('#'+$this.attr('data-type')+' ul').html('<li class="floatli empty_homepreset_li"></li>');				
    }
    })
    .done(function( data ) {
				
    $('#'+$this.attr('data-type')+' ul').html(data);
    if ( console && console.log ) {
    console.log( "Sample of data:", data.slice( 0, 100 ) );				
    }
    });
    });
    */

    //Post search
    //auskomentiert weil load.ph wwp-load.php enth�lt
    /*$('div.tabs-panel p.quick-search-wrap input.quick-search').bind('keypress', function(e) {
    $this = $(this);
		
    if(e.keyCode==13 && $this.val() != ''){

    var $type = $this.next('input.search-post-type').val();
    var $menu_id = $('#menu_id_counter').val();
    //alert($type);
    $.ajax({
    url: "/wp-content/plugins/nh_ynaa/include/load.php",
    data: {s:$this.val(),pt:$type, mid:$menu_id} ,
    type:'POST',
    beforeSend: function( xhr ) {
					
    $this.next('span.spinner').show();
					

    }
    })
    .done(function( data ) {
    $this.parent().next('ul').html(data);
    $this.next('span.spinner').hide();
    //$('#'+$this.attr('data-type')+' ul').html(data);
    /*if ( console && console.log ) {
    console.log( "Sample of data:", data.slice( 0, 100 ) );				
    }*/
    /*		});
    return false;
    }
		
    });*/



    $('div.tabs-panel p.quick-search-wrap input.quick-search').bind('keypress', function (e) {
        $this = $(this);
        //$this.next('span.spinner').show();
        if (e.keyCode == 13 && $this.val() != '') {

            var $type = $this.next('input.search-post-type').val();
            var $menu_id = $('#menu_id_counter').val();

            $.ajax({
           

                url: ajaxurl,
                data: { action: 'nh_search_action', s: $this.val(), pt: $type, mid: $menu_id },
                type: 'POST',
                beforeSend: function (xhr) {

                    $this.next('span.spinner').show();


                }
            })
			.done(function (response) {
			    $this.parent().next('ul').html(response);
			    $this.next('span.spinner').hide();
			    //$('#'+$this.attr('data-type')+' ul').html(data);
			    /*if ( console && console.log ) {
			    console.log( "Sample of data:", data.slice( 0, 100 ) );				
			    }*/
			});
            return false;
        }

    });

    /* active autopush */
    if ($('#id_appkey').length > 0) {

        $('#id_appkey, #id_pushsecret').change(function () {
            if ($('#id_appkey').val() != '' && $('#id_pushsecret').val() != '') {

                $("input[name='nh_ynaa_push_settings[autopush]']").prop('checked', true);
            }
        });
    }


    if ($('.showoverviewposts').length > 0) {
        $('.showoverviewposts').change(function () {
            //alert($(this).val());
            var catid = $(this).attr('data-catid');
            //alert(catid);
            if ($(this).val() == '1') {

                $('#showoverviewposts' + catid).show();
            }
            else {
                $('#showoverviewposts' + catid).hide();
            }

        });
    }

    /* deactive post order if startvie = category */

    $('#nh_homescreentype').change(function () {

        if ($(this).val() == 3) {

            $('.nh_sorttype-tr').hide();
            $('#nav-menus-frame').hide();
            $('#nh_posttype-tr').hide();
        }
        else if ($(this).val() != 1 && $(this).val() != 2) {
            //alert('disable=false setzen');
            //$('#nh_sorttype').prop('disabled', false);
            $('.nh_sorttype-tr').hide();
            $('#nav-menus-frame').show();
            $('#nh_posttype-tr').hide();
        }
        else {
            //alert('disable=true setzen');
            //$('#nh_sorttype').removeAttr('disabled');
            //$('#nh_sorttype').prop('disabled', true);
            $('.nh_sorttype-tr').show();
            $('#nav-menus-frame').hide();

            if ($(this).val() == 1) $('#nh_posttype-tr').show();
            else $('#nh_posttype-tr').hide();
        }
    });

    //Show Post on category overvie page
    //if($('.showoverviewposts').length>0){

    //}

    if ($('#ynaa_nav_tab').length > 0) {


        var $ynaa_nav_tab = $('#ynaa_nav_tab');

        var eTop = $ynaa_nav_tab.offset().top; //get the offset top of the element
        nh_tab_nav_fix(eTop);
        // log(eTop - $(window).scrollTop()); //position of the ele w.r.t window
        $(window).scroll(function (event) {
            //var position = $('h2.nav-tab-wrapper').position();
            //$('#placeholder').html(eTop - $(window).scrollTop());	
            nh_tab_nav_fix(eTop - $(window).scrollTop());

        });
    }


    /* Preview App container */
    /*if ($('#previewapp_help').length > 0) {
        $('#previewapp_help h3').click(function () {
            $('.previewapp_content').slideToggle();
            $('#previewapp_help h3 span').toggleClass('dashicons-arrow-down-alt2').toggleClass('dashicons-arrow-up-alt2');
        });
    }*/

    $("#accordion").accordion({
        collapsible: true,
        heightStyle: "content"
    });

    $('.contextual-help-link-a').click(function () {
    
        $('#contextual-help-link').trigger('click');
        return false;
    });
    



});


function nh_tab_nav_fix(eTop){
	var $ynaa_nav_tab = jQuery('#ynaa_nav_tab');
	
	if(eTop<30){
		  if(!$ynaa_nav_tab.hasClass('fixed')){
			$ynaa_nav_tab.addClass('fixed');
		  }
	  }
	  else if($ynaa_nav_tab.hasClass('fixed')){
		  $ynaa_nav_tab.removeClass('fixed');
	  }
	
}

function getMaxMenuID(){
	var maxid=-1;
	if(jQuery('.menu-id-ynaa')){
		jQuery.each( jQuery('.menu-id-ynaa'), function( key, ob ){
			
			if(maxid < parseInt(jQuery(ob).val()))
				maxid=jQuery(ob).val();
			
		});
	}
	maxid++;

	if(maxid<11)maxid=11;
	//alert(maxid);
	return maxid;
}
function getMaxHomepresetID(){
	var maxid=0;
	if(jQuery('.homepreset-id-ynaa')){
		jQuery.each( jQuery('.homepreset-id-ynaa'), function( key, ob ){
			
			if(maxid < parseInt(jQuery(ob).val()))
				maxid=jQuery(ob).val();
			
		});
	}
	maxid++;
	
	return maxid;
	
}

function getItemscount(e){
	
	pos = (jQuery(e).length);
	pos++;

	return (pos);
}

//Uplud imGE function
function uploadcatimg(){
	
}
	