<?php $menu_id=0;
//var_dump($this->general_settings);
 ?>
 <input type="hidden" name="<?php echo $this->menu_settings_key; ?>[ts]" value="<?php echo time(); ?>" />
<div id="nav-menus-frame">
	<div id="menu-settings-column" class="metabox-holder">
		<div class="clear"></div>
		<div class="accordion-container" id="side-sortables">
			<ul class="outer-border">
				<?php

					$post_types = get_post_types();

					foreach( $post_types as $post_type ){
						if( !in_array( $post_type, array( 'attachment', 'revision', 'nav_menu_item' ) ) ){
						?>
							<li id="add-<?php echo $post_type; ?>" class="control-section accordion-section add-<?php echo $post_type; ?>">
								<h3 title="<?php echo ucfirst(_n($post_type,$post_type.'s',2,'nh-ynaa')); ?>" tabindex="0" class="accordion-section-title hndle"><?php echo ucfirst(_n($post_type,$post_type.'s',2));?></h3>
								<div class="accordion-section-content ">
									<div class="inside">
									<?php

										$args = array(
											'post_type'=> $post_type,
											'order'    => 'post_modified',
											'post_status'=>'publish'
											//'nopaging' => true
											);
										$the_query = new WP_Query(  $args  );
										//$the_query = get_posts( array('posts_per_page' => 1, 'category' => 682));
										//$the_query = get_posts( $args );
										//var_dump($the_query);
										if($the_query->have_posts() ) :
											?>
											<div class="posttypediv tabclass" id="posttype-<?php echo $post_type; ?>">
												<ul class="add-menu-item-tabs">
													<li><a href="#tabs-panel-posttype-<?php echo $post_type; ?>-most-recent" data-type="tabs-panel-posttype-<?php echo $post_type; ?>-most-recent" class="nav-tab-link"><?php _e('Most Recent','nh-ynaa'); ?></a></li>
													<!--<li><a class="nav-tab-link ynaa-tab-all" data-type="<?php //echo $post_type; ?>-all" href="#<?php //echo $post_type; ?>-all"><?php //_e('View All','nh-ynaa'); ?></a></li>-->
													<li>
														<a href="#tabs-panel-posttype-<?php echo $post_type; ?>-search" data-type="tabs-panel-posttype-<?php echo $post_type; ?>-search" class="nav-tab-link">
															<?php _e('Search'); ?>				</a>
													</li>
												</ul><!-- .posttype-tabs -->
												<div class="tabs-panel tabs-panel-active" id="tabs-panel-posttype-<?php echo $post_type; ?>-most-recent">
													<ul class="categorychecklist form-no-clear" id="<?php echo $post_type; ?>checklist-most-recent">
													<?php
													$i=0;
													$li = "";
													while ( $the_query->have_posts() ) : $the_query->the_post();
														if($i>7) break;
														$temp = "";
														$temp .= '<li>';
														$temp .=  '<input type="hidden" value="'.$post_type.'" name="type-menu-item-'.$post_type.$menu_id.'" id="type-menu-item-'.$post_type.$menu_id.'" >';
														//$temp .=  '<input type="text" value="'.strtotime($the_query->post->post_date).'" name="post_date-menu-item-'.$post_type.$menu_id.'" id="post_date-menu-item-'.$post_type.$menu_id.'">';
														$temp .=  '<input type="hidden" value="html" name="link-typ-menu-item-'.$post_type.$menu_id.'" id="link-type-menu-item-'.$post_type.$menu_id.'">';
														$temp .=  '<input type="hidden" value="'.$this->shortenText($the_query->post->post_title).'" name="title-menu-item-'.$post_type.$menu_id.'" id="title-menu-item-'.$post_type.$menu_id.'">';
														$temp .=  '<label class="menu-item-title">';
														$temp .=  '<input type="checkbox" value="'.$the_query->post->ID.'" name="menu-item-'.$post_type.$menu_id.'" class="menu-item-checkbox" /> ';
														$temp .=  $this->shortenText($the_query->post->post_title).'</label>';
														$temp .=  '</li>';
														echo $temp;
														$li .= $temp;
														$i++;
														$menu_id++;
													endwhile;
													?>
													</ul>
												</div><!-- /.tabs-panel -->

												<!--<div class="tabs-panel" id="<?php //echo $post_type; ?>-all">
													<ul class="categorychecklist form-no-clear" data-wp-lists="list:<?php //echo $post_type; ?>" id="<?php //echo $post_type; ?>checklist">
													<?php
														/*echo $li;
														while ( $the_query->have_posts() ) : $the_query->the_post();
															echo '<li>';
															echo '<input type="hidden" value="'.$post_type.'" name="type-menu-item-'.$post_type.$menu_id.'" id="type-menu-item-'.$post_type.$menu_id.'">';
															echo '<input type="hidden" value="html" name="link-typ-menu-item-'.$post_type.$menu_id.'" id="link-type-menu-item-'.$post_type.$menu_id.'">';
															echo '<input type="hidden" value="'.$this->shortenText($the_query->post->post_title).'" name="title-menu-item-'.$post_type.$menu_id.'" id="title-menu-item-'.$post_type.$menu_id.'">';
															echo '<label class="menu-item-title">';
															echo '<input type="checkbox" value="'.$the_query->post->ID.'" name="menu-item-'.$post_type.$menu_id.'" class="menu-item-checkbox" /> ';
															echo $this->shortenText($the_query->post->post_title).'</label>';
															echo '</li>';
															$menu_id++;
														endwhile; */
													?>
													</ul>
												</div>--><!-- /.tabs-panel -->

                                                <div id="tabs-panel-posttype-<?php echo $post_type; ?>-search" class="tabs-panel">
                                                        <p class="quick-search-wrap">
                                                			<input type="search" name="quick-search-posttype-<?php echo $post_type; ?>" value="" title="Suchen" class="quick-search" autocomplete="off">
                                                            <input type="hidden" value="<?php echo $post_type; ?>" class="search-post-type" />

                                                            <span class="spinner" style="display: none;"></span>
                                                			<input type="submit" value="Suchen" class="button button-small quick-search-submit hide-if-js" id="submit-quick-search-posttype-page" name="submit">		</p>

                                            <ul class="categorychecklist form-no-clear" data-wp-lists="list:page" id="page-search-checklist"></ul>
                                        </div><!-- /.tabs-panel -->

												<p class="button-controls">
													<span class="list-controls"><a class="select-all" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=ynaa_plugin_options&page-tab=all&amp;selectall=1#posttype-<?php echo $post_type; ?>"><?php _e('Select All'); ?></a></span>
													<span class="add-to-menu">
														<input type="submit" id="submit-posttype-<?php echo $post_type; ?>" name="add-post-type-menu-item" value="<?php _e('Add to Menu'); ?>" class="button-secondary submit-add-to-menu right">
														<span class="spinner"></span>
													</span>
												</p>
											</div><!-- /.posttypediv -->

											<?php
										else:
											_e('No items.');
										endif; //End Post Query
									?>
									</div><!-- .inside -->
								</div><!-- .accordion-section-content -->
							</li><!-- .accordion-section -->

						<?php


						}
					}
				?>
			<li id="add-custom-categories" class="control-section accordion-section   add-custom-categories">
				<h3 title="<?php _e('Categories'); ?>" tabindex="0" class="accordion-section-title hndle"><?php _e('Categories'); ?></h3>
				<div class="accordion-section-content ">
					<div class="inside">
						<div id="customcategoriediv" class="customlinkdiv">
							<ul class="categorychecklist form-no-clear" id="cat-checklist-all">
								<?php
								$args=array(
								  'orderby' => 'name',
								  'order' => 'ASC',
								  'taxonomy' => $this->nh_find_taxonomies()
								);
								$categories = get_categories( $args );
								$post_type = 'cat';
								if($categories){
									//var_dump($this->categories_settings);
										foreach ( $categories as $category ) {
										if(isset($this->categories_settings[$category->term_id]) && $this->categories_settings[$category->term_id]['hidecat']==1) {
											continue;
										}

										/* check if category is used in menu */
										$active_class = '';
										foreach($this->menu_settings['menu'] as $menuitem) {
											if($menuitem['type'] === 'cat' && $menuitem['item_id'] == $category->term_id) {
												$active_class = ' activated';
												break;
											}
										}

										echo '<li>';
										echo '<input type="hidden" value="'.$post_type.'" name="type-menu-item-'.$post_type.$menu_id.'" id="type-menu-item-'.$post_type.$menu_id.'">';
										echo '<input type="hidden" value="'.$post_type.'" name="link-typ-menu-item-'.$post_type.$menu_id.'" id="link-type-menu-item-'.$post_type.$menu_id.'">';
										echo '<input type="hidden" value="'.$category->name.'" name="title-menu-item-'.$post_type.$menu_id.'" id="title-menu-item-'.$post_type.$menu_id.'">';
										echo '<label class="menu-item-title'.$active_class.'">';
										echo '<input type="checkbox" value="'.$category->term_id.'" name="menu-item-'.$post_type.$menu_id.'" class="menu-item-checkbox" /> ';
										echo $category->name.'</label>';
										echo '</li>';
										$menu_id++;
									}
								}
									//wp_category_checklist();

								?>
							</ul>
							<p class="button-controls">
								<!--<span class="list-controls"><a class="select-all" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=ynaa_plugin_options&page-tab=all&amp;selectall=1#category ?>"><?php //_e('Select All'); ?></a></span>-->
								<span class="add-to-menu">
									<input type="submit" id="submit-customcategorydiv" name="add-custom-menu-item" value="<?php _e('Add to Menu'); ?>" class="button-secondary submit-add-to-menu right">
									<span class="spinner"></span>
								</span>
							</p>

						</div><!-- /.customlinkdiv -->
					</div><!-- .inside -->
				</div><!-- .accordion-section-content -->
			</li>
			<li id="add-app-menus" class="control-section accordion-section   add-app-menus">
				<h3 title="<?php _e('App Extras'); ?>" tabindex="0" class="accordion-section-title hndle"><?php _e('App Extras'); ?></h3>
				<div class="accordion-section-content ">
					<div class="inside">
						<div id="app-menusdiv" class="customlinkdiv">
							<ul class="categorychecklist form-no-clear" id="app-checklist-all">
								<?php
								/*$args=array(
								  'orderby' => 'name',
								  'order' => 'ASC'
								);
								$categories = get_categories( $args );
								*/


								foreach ( $this->appmenus_pre as $appmenu_pre ) {
									//if($appmenu_pre['id']==-1 && !$this->nh_ynaa_check_eventmanager()) continue;
									echo '<li>';
									echo '<input type="hidden" value="'.$appmenu_pre['type'].'" name="type-menu-item-'.$appmenu_pre['type'].$menu_id.'" id="type-menu-item-'.$appmenu_pre['type'].$menu_id.'">';
									echo '<input type="hidden" value="cat" name="link-typ-menu-item-'.$appmenu_pre['type'].$menu_id.'" id="link-type-menu-item-'.$appmenu_pre['type'].$menu_id.'">';
									echo '<input type="hidden" value="'.$appmenu_pre['title'].'" name="title-menu-item-'.$appmenu_pre['type'].$menu_id.'" id="title-menu-item-'.$appmenu_pre['type'].$menu_id.'">';
									echo '<label class="menu-item-title">';
									echo '<input type="checkbox" value="'.$appmenu_pre['id'].'" name="menu-item-'.$appmenu_pre['type'].$menu_id.'" class="menu-item-checkbox" /> ';
									echo $appmenu_pre['title'].'</label>';
									echo '</li>';
									$menu_id++;
								}

									//wp_category_checklist();

								?>
							</ul>

							<p class="button-controls">
								<!--<span class="list-controls"><a class="select-all" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=ynaa_plugin_options&page-tab=all&amp;selectall=1#category ?>"><?php //_e('Select All'); ?></a></span>-->
								<span class="add-to-menu">
									<input type="submit" id="submit-customcategorydiv" name="add-custom-menu-item" value="<?php _e('Add to Menu','nh-ynaa'); ?>" class="button-secondary submit-add-to-menu right">
									<span class="spinner"></span>
								</span>
							</p>

						</div><!-- /.customlinkdiv -->
					</div><!-- .inside -->
				</div><!-- .accordion-section-content -->
			</li>
		</ul><!-- .outer-border -->
        <input type="hidden" value="<?php echo $menu_id; ?>" id="menu_id_counter">
		</div>
	</div><!-- /#menu-settings-column -->

	<div id="menu-management-liquid" >
		<div id="menu-management">
			<div class="menu-edit ">
				<div id="nav-menu-header">
					<div class="major-publishing-actions">
						<div class="publishing-action"><?php _e('App Menu','nh-ynaa'); ?></div>
					</div><!-- END .major-publishing-actions -->
				</div><!-- END .nav-menu-header -->
					<div id="post-body">

						<div id="post-body-content" class="">
							<h3><?php _e('Menu Structure','nh-ynaa'); ?></h3>
							<div class="drag-instructions post-body-plain">
								<p><?php _e('Here you change the settings for the app menu.','nh-ynaa'); ?></p>
							</div>
							<div id="menu-accordion">
								<ul id="menu-to-edit" class="menu nav-menus-php nh-menu-ul">
									<?php
									if($this->menu_settings['menu'] && !empty($this->menu_settings['menu'])){
										$menuitems= $this->menu_settings['menu'];
										//var_dump($menuitems);
										foreach($menuitems as $k=>$menuitem){
											$deactivated_cat_class = '';
											$deactivated_cat_title = '';
											if($menuitem['type'] === 'cat' && $this->categories_settings[$menuitem['item_id']]['hidecat']) {
												$deactivated_cat_class = ' cat_deactivated';
												$deactivated_cat_title = __('This category is deactivated in the app', 'nh-ynaa');
											}
										?>
											<li class="menu-item menu-item-depth-0 menu-item-<?php echo $menuitem['type']; ?> menu-item-edit-inactive pending" id="menu-item-<?php echo $menuitem['pos']; ?>" style="display: list-item;">
												<dl class="menu-item-bar">
													<dt class="menu-item-handle<?php echo $deactivated_cat_class; ?>" title="<?php echo $deactivated_cat_title; ?>">
														<span class="item-title"><span class="menu-item-title"><?php echo $menuitem['title']; ?></span></span>
														<span class="item-controls">
															<span class="item-type"><?php _e($menuitem['type_text']);?></span>
															<span class="item-order hide-if-js"></span>
															<a href="#" title="<?php echo $menuitem['title']; ?>" id="edit-<?php echo $menuitem['pos']; ?>" class="item-edit"><?php echo $menuitem['title']; ?></a>
														</span>
													</dt>
												</dl>
												<div id="menu-item-settings-<?php echo $menuitem['pos']; ?>" class="menu-item-settings">
													<p class="description description-thin">
														<label for="edit-menu-item-title-<?php echo $menuitem['pos']; ?>"><?php _e('Navigation Label','nh-ynaa'); ?></label><br>
															<input type="text" value="<?php echo $menuitem['title']; ?>" name="<?php echo $this->menu_settings_key; ?>[menu][<?php echo $k; ?>][title]" class="widefat edit-menu-item-title" id="edit-menu-item-title-<?php echo $menuitem['pos']; ?>">
															<input type="hidden" value="<?php echo $menuitem['pos']; ?>" name="<?php echo $this->menu_settings_key; ?>[menu][<?php echo $k; ?>][pos]" id="menu-pos<?php echo $menuitem['pos']; ?>"  class="menu-pos-ynaa" />
															<input type="hidden" value="<?php echo $menuitem['type']; ?>" name="<?php echo $this->menu_settings_key; ?>[menu][<?php echo $k; ?>][type]" id="menu-type<?php echo $menuitem['pos']; ?>" />
															<input type="hidden" value="<?php echo $menuitem['type_text']; ?>" name="<?php echo $this->menu_settings_key; ?>[menu][<?php echo $k; ?>][type_text]" id="menu-type_text<?php echo $menuitem['pos']; ?>" />
															<input type="hidden" value="<?php echo $menuitem['id']; ?>" name="<?php echo $this->menu_settings_key; ?>[menu][<?php echo $k; ?>][id]" id="menu-id<?php echo $menuitem['pos']; ?>" class="menu-id-ynaa" />
															<input type="hidden" value="<?php echo $menuitem['item_id']; ?>" name="<?php echo $this->menu_settings_key; ?>[menu][<?php echo $k; ?>][item_id]" id="menu-item-id<?php echo $menuitem['pos']; ?>" />
															<input type="hidden" value="<?php echo $menuitem['status']; ?>" name="<?php echo $this->menu_settings_key; ?>[menu][<?php echo $k; ?>][status]" id="menu-status<?php echo $menuitem['pos']; ?>" />

													</p>
                                                    <?php if( $menuitem['type'] == 'webview') { ?>

                                                    <div style="clear:left; margin-top:10px;"><p><label for="edit-menu-item-url-<?php echo $menuitem['pos']; ?>">Url<br><input type="text" value="<?php echo $menuitem['url']; ?>" name="<?php echo $this->menu_settings_key; ?>[menu][<?php echo $k; ?>][url]" class="widefat edit-menu-item-url" id="edit-menu-item-url-<?php echo $menuitem['pos']; ?>"></p></div>
                                                    <?php } ?>
													<div class="menu-item-actions description-wide submitbox">
														<a href="<?php echo $menuitem['pos']; ?>" id="delete-<?php echo $menuitem['pos']; ?>" class="item-delete submitdelete deletion"><?php _e('Delete'); ?></a>
													</div>

												</div><!-- .menu-item-settings-->
											</li><!--End menu-item -->
										<?php

										}
										if(false) {
										$menuitem['title'] = __('Report an error','nh-ynaa');
										$menuitem['type_text'] = __('App','nh-ynaa');
										$menuitem['pos'] = 999999999;
										$k = 999999999;
										?>
										<!-- Report an Error -->
                                        <li class="menu-item menu-item-depth-0 menu-item-<?php echo $menuitem['type']; ?> menu-item-edit-inactive pending disable" id="menu-item-<?php echo $menuitem['pos']; ?>" style="display:none;">
												<dl class="menu-item-bar">
													<dt class="menu-item-handle">
														<span class="item-title"><span class="menu-item-title"><?php echo $menuitem['title']; ?></span></span>
														<span class="item-controls">
															<span class="item-type"><?php echo ($menuitem['type_text']);?></span>
															<span class="item-order hide-if-js"></span>
															<a href="#" title="<?php echo $menuitem['title']; ?>" id="edit-<?php echo $menuitem['pos']; ?>" class="item-edit"><?php echo $menuitem['title']; ?></a>
														</span>
													</dt>
												</dl>
												<div id="menu-item-settings-<?php echo $menuitem['pos']; ?>" class="menu-item-settings">
													<p class="description description-thin">
														<label for="edit-menu-item-title-<?php echo $menuitem['pos']; ?>"><?php _e('Navigation Label','nh-ynaa'); ?><br>
															<input type="text" disabled value="<?php echo $menuitem['title']; ?>" name="<?php echo $this->menu_settings_key; ?>[menu][<?php echo $k; ?>][title]" class="widefat edit-menu-item-title" id="edit-menu-item-title-<?php echo $menuitem['pos']; ?>">





														</label>
													</p>
													<div class="menu-item-actions description-wide submitbox" >
														<a href="<?php echo $menuitem['pos']; ?>" id="delete-<?php echo $menuitem['pos']; ?>"  class=" submitdelete deletion"><?php _e("This item can not be removed.", 'nh-ynaa'); ?></a>
													</div>
												</div><!-- .menu-item-settings-->
											</li>
                                        <?php
                     }
									}
									?>
								</ul>
							</div><!-- /#menu-accordion -->
						</div><!-- /#post-body-content -->
					</div><!-- /#post-body -->
					<div id="nav-menu-footer">
						<div class="major-publishing-actions">
							<div class="publishing-action">&nbsp;<?php //submit_button(); ?>
								<!--<input type="submit" name="save_menu" id="save_menu_header" class="button button-primary menu-save" value="Men� erstellen">-->
							</div><!-- END .publishing-action -->
						</div><!-- END .major-publishing-actions -->
					</div><!-- /#nav-menu-footer -->
				</div><!-- /.menu-edit -->
			<!--</form>--><!-- /#update-nav-menu -->
		</div><!-- /#menu-management -->
	</div><!-- /#menu-management-liquid -->

</div><!-- /#nav-menus-frame -->
<div style="clear:both;"></div>