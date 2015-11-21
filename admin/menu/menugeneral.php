<?php
add_action('wp_ajax_ml_configuration_menu_general', 'ml_configuration_menu_general_callback');


function ml_configuration_menu_general_callback()
{
	global $ml_menu_show_favorites;
	
	if(isset($_POST['ml_menu_show_favorites']))
	{
		$ml_menu_show_favorites = $_POST['ml_menu_show_favorites'] == "true";
		ml_set_generic_option("ml_menu_show_favorites", $ml_menu_show_favorites);
	}

	ml_configuration_menu_general();
	die();
}

function ml_configuration_menu_general_ajax_load()
{

}

function ml_configuration_menu_general()
{

	ml_configuration_menu_general_div();

	
}



function ml_configuration_menu_general_div()
{
	global $ml_menu_show_favorites;
	$ml_menu_show_favorites = get_option('ml_menu_show_favorites',true);
	
	?>
	<h3 style="font-family:arial;font-size:20px;font-weight:normal;padding:10px;">General menu settings</h3>
	
	

	<h2 style="font-size:20px;font-weight:normal;padding:10px;">
	<input id="ml_menu_show_favorites" type="checkbox"
		<?php
			if($ml_menu_show_favorites)
			{
				echo " checked ";
			}
		?>
		/> Show Favorites in the app menu
	</h2>
    
	<div style="margin-right:20px;">
		<p class="submit" align="right">
			<input type="submit" id="ml_configuration_menu_general_submit" 
											   value="<?php _e('Apply'); ?>" class="button button-primary button-large"/>
		</p>
	</div>
	
	<?php
}
?>