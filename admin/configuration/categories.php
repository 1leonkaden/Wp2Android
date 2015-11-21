<?php add_action(base64_decode('d3BfYWpheF9tbF9jb25maWd1cmF0aW9uX2NhdGVnb3JpZXM='), base64_decode('bWxfY29uZmlndXJhdGlvbl9jYXRlZ29yaWVzX2NhbGxiYWNr'));
add_action(base64_decode('d3BfYWpheF9tbF9jb25maWd1cmF0aW9uX3N3aXRjaF9jYXRlZ29yaWVz'), base64_decode('bWxfY29uZmlndXJhdGlvbl9zd2l0Y2hfY2F0ZWdvcmllc19jYWxsYmFjaw=='));


function ml_configuration_categories_callback()
{

	if(isset($_POST[base64_decode('Y2F0X0lE')]))
	{
		$cat_ID = intval($_POST[base64_decode('Y2F0X0lE')]);
		if($_POST[base64_decode('Y2F0X2FjdGlvbg==')] == base64_decode('ZGVsZXRl')) 
		{
			ml_remove_category($cat_ID);			
		}
		else if($_POST[base64_decode('Y2F0X2FjdGlvbg==')] == base64_decode('YWRk'))
		{
			ml_add_category($cat_ID);
		}
	}

	
	ml_configuration_categories();
	
	die();

}

function ml_configuration_switch_categories_callback()
{

	if(isset($_POST[base64_decode('Y2F0X0lEX2E=')]) && isset($_POST[base64_decode('Y2F0X0lEX2I=')]))
	{
		$cat_ID_a = intval($_POST[base64_decode('Y2F0X0lEX2E=')]);
		$cat_ID_b = intval($_POST[base64_decode('Y2F0X0lEX2I=')]);
		ml_switch_categories($cat_ID_a,$cat_ID_b);
	}

	
	ml_configuration_categories();
	
	die();

}


function ml_configuration_categories_ajax_load()
{


function ml_configuration_categories()
{

	ml_configuration_categories_div();


}

function ml_configuration_categories_div()
{

	?>
	<h3 style="font-family:arial;font-size:20px;font-weight:normal;padding:10px;">Add categories to your app's menu</h3>
	<p><span style="font-size:20px;font-weight:normal;padding:10px;">Choose which categories to include in your app's navigation menu.</span></p>
	<table style="margin-left:15px;">
		<tr valign="bottom">
			<td><h2>Add category</h2></td>

			<td><select name="category">
				<option value="0">Select a category</option>
				<?php $categories = get_categories();?>
				<?php 
					foreach($categories as $c) {
						echo "<option value='$c->cat_ID'>$c->cat_name</option>";
					}
				?>
			</select></td>
			<td>
				<input type="submit" id="ml_configuration_categories_add" 
											   value="<?php _e(base64_decode('QWRk')); ?>" />
			</td>
		</tr>
	</table>
	<table style="margin-left:15px;margin-top:50px;">

		<?php 
			global $wpdb;
			$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfY2F0ZWdvcmllcw==');
			
			$ml_categories = ml_categories();
			$ml_prev_cat = 0;
			foreach($ml_categories as $cat) {
				echo "<tr><td><h2>$cat->name</h2></td>";
				echo "<td><h2><a class='remove-category' data-cat='$cat->cat_ID'>remove</a></h2></td>";
				if($ml_prev_cat > 0) {
					echo "<td><a class='move-category-up' data-cat='$cat->cat_ID' data-prev-cat='$ml_prev_cat'>[move up]</a></td>";					
				}
				echo base64_decode('PC90cj4=');
				$ml_prev_cat = $cat->cat_ID;
			}
		?>

	</table>

<?php }
?>