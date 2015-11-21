<?php add_action(base64_decode('d3BfYWpheF9tbF9jb25maWd1cmF0aW9uX2hvbWU='), base64_decode('bWxfY29uZmlndXJhdGlvbl9ob21lX2NhbGxiYWNr'));


function ml_configuration_home_callback()
{

	global $ml_home_article_list_enabled;
	global $ml_home_page_enabled;
	global $ml_home_url_enabled;

	global $ml_home_page_id;
	global $ml_home_url;
	
	if(isset($_POST[base64_decode('bWxfaG9tZV9hcnRpY2xlX2xpc3RfZW5hYmxlZA==')]))
	{
		$ml_home_article_list_enabled = $_POST[base64_decode('bWxfaG9tZV9hcnRpY2xlX2xpc3RfZW5hYmxlZA==')] == base64_decode('dHJ1ZQ==');
		ml_set_generic_option(base64_decode('bWxfaG9tZV9hcnRpY2xlX2xpc3RfZW5hYmxlZA=='),
							   $ml_home_article_list_enabled);
	}
	
	if(isset($_POST[base64_decode('bWxfaG9tZV9wYWdlX2VuYWJsZWQ=')]))
	{
		$ml_home_page_enabled = $_POST[base64_decode('bWxfaG9tZV9wYWdlX2VuYWJsZWQ=')] == base64_decode('dHJ1ZQ==');
		ml_set_generic_option(base64_decode('bWxfaG9tZV9wYWdlX2VuYWJsZWQ='),
							   $ml_home_page_enabled);
	}
	
	if(isset($_POST[base64_decode('bWxfaG9tZV91cmxfZW5hYmxlZA==')]))
	{
		$ml_home_url_enabled = $_POST[base64_decode('bWxfaG9tZV91cmxfZW5hYmxlZA==')] == base64_decode('dHJ1ZQ==');
		ml_set_generic_option(base64_decode('bWxfaG9tZV91cmxfZW5hYmxlZA=='),
							   $ml_home_url_enabled);
	}
	
	if(isset($_POST[base64_decode('bWxfaG9tZV9wYWdlX2lk')]))
	{
		$ml_home_page_id = $_POST[base64_decode('bWxfaG9tZV9wYWdlX2lk')];
		ml_set_generic_option(base64_decode('bWxfaG9tZV9wYWdlX2lk'),
							   $ml_home_page_id);
	}
	
	if(isset($_POST[base64_decode('bWxfaG9tZV91cmw=')]))
	{
		$ml_home_url = $_POST[base64_decode('bWxfaG9tZV91cmw=')];
		ml_set_generic_option(base64_decode('bWxfaG9tZV91cmw='),
							   $ml_home_url);
	}
	
	ml_configuration_home();
	
	die();

}


function ml_configuration_home_ajax_load()
{

}

function ml_configuration_home()
{

	ml_configuration_home_div();


}

function ml_configuration_home_div()
{
	global $ml_home_article_list_enabled;
	global $ml_home_page_enabled;
	global $ml_home_url_enabled;

	global $ml_home_page_id;
	global $ml_home_url;
	
	$ml_home_article_list_enabled = get_option(base64_decode('bWxfaG9tZV9hcnRpY2xlX2xpc3RfZW5hYmxlZA=='),true);
	$ml_home_page_enabled = get_option(base64_decode('bWxfaG9tZV9wYWdlX2VuYWJsZWQ='),false);
	$ml_home_url_enabled = get_option(base64_decode('bWxfaG9tZV91cmxfZW5hYmxlZA=='),false);

	$ml_home_page_id = get_option(base64_decode('bWxfaG9tZV9wYWdlX2lk'));
	$ml_home_url = get_option(base64_decode('bWxfaG9tZV91cmw='));
	
	?>
	<h3 style="font-family:arial;font-size:20px;font-weight:normal;padding:10px;">Select a home screen</h3>

	<p><span style="font-size:20px;font-weight:normal;padding:10px;">Choose what to show on your app's home screen.

</span></p>
	<h2 style="font-size:20px;font-weight:normal;padding:10px;">
	<input id="ml_home_article_list_enabled" type="radio" name="homepagetype"
		<?php 			if($ml_home_article_list_enabled)
			{
				echo base64_decode('IGNoZWNrZWQg');
			}
		?>
		/> Article list
	</h2>
    
    <h2 style="font-size:20px;font-weight:normal;padding:10px;">
	<input id="ml_home_page_enabled" type="radio" name="homepagetype"
		<?php 			if($ml_home_page_enabled)
			{
				echo base64_decode('IGNoZWNrZWQg');
			}
		?>
		/> Page <select name="home_page">
				<option value="0">Select a page</option>
				<?php $pages = get_pages();?>
				<?php 
					foreach($pages as $p) {
						echo "<option value='$p->ID' ";
						if($ml_home_page_id == $p->ID) echo base64_decode('c2VsZWN0ZWQ9J3NlbGVjdGVkJw==');
						echo ">$p->post_title</option>";
					}
				?>
			</select>
	</h2>
	<h2 style="font-size:20px;font-weight:normal;padding:10px;">
	<input id="ml_home_url_enabled" type="radio" name="homepagetype"
		<?php 			if($ml_home_url_enabled)
			{
				echo base64_decode('IGNoZWNrZWQg');
			}
		?>
		/> URL <input id="ml_home_url" placeholder="Type the URL here" 
			name="ml_home_url" type="text" size="8" 
	value="<?php echo $ml_home_url;?>" 
	style="padding:5px;font-size:15px;margin-left:0;width:50%;"/>
	</h2>
	<div style="margin-right:20px;">
		<p class="submit" align="right">
			<input type="submit" id="ml_configuration_home_submit" 
											   value="<?php _e(base64_decode('QXBwbHk=')); ?>" class="button button-primary button-large"/>
		</p>
	</div>
<?php }
?>