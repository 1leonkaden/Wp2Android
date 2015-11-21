<?php
add_action('wp_ajax_ml_configuration_sticky_categories', 'ml_configuration_sticky_categories_callback');


function ml_configuration_sticky_categories_callback()
{

	if(isset($_POST['sticky_category_1']))
	{
		ml_set_generic_option("sticky_category_1",$_POST['sticky_category_1']);
		$sticky_category_1 = get_option('sticky_category_1');
	}

	if(isset($_POST['sticky_category_2']))
	{
		ml_set_generic_option("sticky_category_2",$_POST['sticky_category_2']);
		$sticky_category_2 = get_option('sticky_category_2');
	}
	
	ml_configuration_sticky_categories();
	
	die();

}

function ml_configuration_sticky_categories_ajax_load()
{

}

function ml_configuration_sticky_categories()
{

	ml_configuration_sticky_categories_div();

}

function ml_configuration_sticky_categories_div()
{
	$sticky_category_1 = get_option("sticky_category_1");
	$sticky_category_2 = get_option("sticky_category_2");

	if(!$sticky_category_1) $sticky_category_1 = 0;
	if(!$sticky_category_2) $sticky_category_2 = 0;
	
	?>
	<h3 style="font-family:arial;font-size:20px;font-weight:normal;padding:10px;">Sticky categories (optional)</h3>

	<p><span style="font-size:20px;font-weight:normal;padding:10px;">The first 3 posts from each sticky category are displayed before others in the app's article list.</span></p>

	<table>
		<tr valign="bottom">
			<td><h2 style="margin-left:15px;">First category</h2></td>

			<td><select name="sticky_category_1">
				<option value="0">Select a category</option>
				<?php $categories = get_categories();?>
				<?php 
					foreach($categories as $c) {
						echo "<option value='$c->cat_ID' ";
						if($sticky_category_1 == $c->cat_ID) echo "selected='selected'";
						echo ">$c->cat_name</option>";
					}
				?>
			</select></td>
		</tr>

		<tr valign="bottom">
			<td><h2 style="margin-left:15px;">Second category</h2></td>

			<td><select name="sticky_category_2">
				<option value="0">Select a category</option>
				<?php $categories = get_categories();?>
				<?php 
					foreach($categories as $c) {
						echo "<option value='$c->cat_ID' ";
						if($sticky_category_2 == $c->cat_ID) echo "selected='selected'";
						echo ">$c->cat_name</option>";
					}
				?>
			</select></td>
		</tr>

	</table>

	<div style="margin-right:20px;">
		<p class="submit" align="right">
			<input type="submit" id="ml_configuration_sticky_categories_submit" 
											   value="<?php _e('Save'); ?>" />
		</p>
	</div>
<?php
}
?>