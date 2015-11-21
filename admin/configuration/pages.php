<?php add_action(base64_decode('d3BfYWpheF9tbF9jb25maWd1cmF0aW9uX3BhZ2Vz'), base64_decode('bWxfY29uZmlndXJhdGlvbl9wYWdlc19jYWxsYmFjaw=='));


function ml_configuration_pages_callback()
{

	if(isset($_POST[base64_decode('cGFnZV9JRA==')]))
	{
		$page_ID = intval($_POST[base64_decode('cGFnZV9JRA==')]);
		if($_POST[base64_decode('cGFnZV9hY3Rpb24=')] == base64_decode('ZGVsZXRl')) 
		{
			ml_remove_page($page_ID);			
		}
		else if($_POST[base64_decode('cGFnZV9hY3Rpb24=')] == base64_decode('YWRk'))
		{
			ml_add_page($page_ID);
		}
	}

	
	ml_configuration_pages();
	
	die();

}

function ml_configuration_switch_pages_callback()
{

	if(isset($_POST[base64_decode('cGFnZV9JRF9h')]) && isset($_POST[base64_decode('cGFnZV9JRF9i')]))
	{
		$page_ID_a = intval($_POST[base64_decode('cGFnZV9JRF9h')]);
		$page_ID_b = intval($_POST[base64_decode('cGFnZV9JRF9i')]);
		
	}

	
	ml_configuration_pages();
	
	die();

}


function ml_configuration_pages_ajax_load()


function ml_configuration_pages()
{

	ml_configuration_pages_div();



function ml_configuration_pages_div()
{

	?>
	<h3 style="font-family:arial;font-size:20px;font-weight:normal;padding:10px;">Add pages to your app's menu</h3>

	<p><span style="font-size:20px;font-weight:normal;padding:10px;">Choose which pages to include in your app's navigation menu.

</span></p>
	
	<table style="margin-left:15px;">
		<tr valign="bottom">
			<td><h2>Add page</h2></td>

			<td><select name="page">
				<option value="0">Select a page</option>
				<?php $pages = get_pages();?>
				<?php 
					foreach($pages as $p) {
						echo "<option value='$p->ID'>$p->post_title</option>";
					}
				?>
			</select></td>
			<td>
				<input type="submit" id="ml_configuration_pages_add" 
											   value="<?php _e(base64_decode('QWRk')); ?>" />
			</td>
		</tr>
	</table>
	<table style="margin-left:15px;margin-top:50px;">

		<?php 
			global $wpdb;
			$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfcGFnZXM=');
			
			$ml_pages = ml_pages();
			$ml_prev_page = 0;
			foreach($ml_pages as $page) {
				echo "<tr><td><h2>$page->post_title</h2></td>";
				echo "<td><h2><a class='remove-page' data-page='$page->ID'>remove</a></h2></td>";
				if($ml_prev_cat > 0) {
					echo "<td><a class='move-page-up' data-page='$page->ID' data-prev-page='$ml_prev_page'>[move up]</a></td>";					
				}
				echo base64_decode('PC90cj4=');
				$ml_prev_page = $page->ID;
			}
		?>

	</table>
<?php }
?>