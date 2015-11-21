<?php 	function ml_categories()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfY2F0ZWdvcmllcw==');
		$cats = $wpdb->get_results("SELECT id, cat_ID FROM $table_name");
		$categories = array();
		foreach($cats as $cat) {
			$c = get_category($cat->cat_ID);
			array_push($categories, $c);
		}		
		return $categories;
	}

	function ml_get_category($ml_catid) 
	{
		global $wpdb;
		$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfY2F0ZWdvcmllcw==');
		return $wpdb->get_row("SELECT * FROM $table_name WHERE ID = $ml_catid");
	}


	function ml_update_cat_ID($id, $cat_ID)
	{
		global $wpdb;
		$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfY2F0ZWdvcmllcw==');

		$wpdb->update($table_name,array(base64_decode('Y2F0X0lE') => $cat_ID), 
					  array( base64_decode('SUQ=') => $id ), 
					array(base64_decode('JWQ=')), array( base64_decode('JWQ=') ) );
	}


	function ml_add_category($cat_ID) {
		global $wpdb;
		$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfY2F0ZWdvcmllcw==');
		$wpdb->insert($table_name, array(base64_decode('Y2F0X0lE') => $cat_ID),array(base64_decode('JWQ=')));
	}


	function ml_remove_category($cat_ID) {
		global $wpdb;
		$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfY2F0ZWdvcmllcw==');

		$wpdb->query( 
			$wpdb->prepare("DELETE FROM $table_name WHERE cat_ID = %d",$cat_ID)
		);
	}
    
    function ml_remove_all_categories() {
        global $wpdb;
		$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfY2F0ZWdvcmllcw==');

		$wpdb->query( "DELETE FROM $table_name");
    }

	
	function ml_switch_categories($cat_ID_a,$cat_ID_b)
	{
		global $wpdb;
		$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfY2F0ZWdvcmllcw==');

		
		$a_id = $wpdb->get_row("SELECT * FROM $table_name WHERE cat_ID = $cat_ID_a limit 1")->id;
		$b_id = $wpdb->get_row("SELECT * FROM $table_name WHERE cat_ID = $cat_ID_b limit 1")->id;

		ml_update_cat_ID($a_id,$cat_ID_b);
		ml_update_cat_ID($b_id,$cat_ID_a);
	}

?>