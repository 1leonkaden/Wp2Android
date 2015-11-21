<?php function ml_hone_menu_install()
{
	global $wpdb;
	$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfbWVudQ==');
	

	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
		
		$sql = base64_decode('Q1JFQVRFIFRBQkxFIA==') . $table_name . base64_decode('ICgNCgkJCSAgaWQgYmlnaW50KDExKSBOT1QgTlVMTCBBVVRPX0lOQ1JFTUVOVCwNCgkJCSAgdGltZSBiaWdpbnQoMTEpIERFRkFVTFQgJzAnIE5PVCBOVUxMLA0KCQkJICANCgkJCSAgcGFnZV9JRCBiaWdpbnQoMTEpLA0KCQkJICBjYXRfSUQgYmlnaW50KDExKSwNCgkJCSAgdXJsIFZBUkNIQVIoMjU1KSwNCg0KCQkJICB0aXRsZSBWQVJDSEFSKDI1NSksDQoJCQkgIG1lbnVfdHlwZSBWQVJDSEFSKDI1NSkgTk9UIE5VTEwsDQoJCQkJcG9zaXRpb24gQklHSU5UKDIwKSB1bnNpZ25lZCwNCg0KCQkJICBVTklRVUUgS0VZIGlkIChpZCkNCgkJCSk7');
			
		
		dbDelta($sql);
	}
}

function ml_home_menu_create_item($title,$menu_type,$page_ID,$cat_ID,$url) {
	global $wpdb;
	$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfbWVudQ==');
	$data = array();
	$value_types = array();
	
	if($title != NULL && strlen(trim($title)) > 0) {
		$data[base64_decode('dGl0bGU=')] = $title;
		array_push($value_types,base64_decode('JXM='));
	}

	if($menu_type != NULL && $menu_type != base64_decode('MA==')) {
		$data[base64_decode('bWVudV90eXBl')] = $menu_type;
		array_push($value_types,base64_decode('JXM='));
	}

	$wpdb->insert($table_name, $data,$value_types);

	$last_id = $wpdb->insert_id;

	if($last_id == 0) return 0;


	
	$wpdb->update($table_name,array(base64_decode('cG9zaXRpb24=') => $last_id), 
				  array( base64_decode('aWQ=') => $last_id ), 
				  array(base64_decode('JWQ=')), array( base64_decode('JWQ=') ));
	return $last_id;
}

function ml_home_menu_items() 
{
	global $wpdb;
	$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfbWVudQ==');
	$items = $wpdb->get_results("SELECT * FROM $table_name ORDER BY position");
	return $items;
}

function ml_home_menu_get_item($item_ID) {
	global $wpdb;
	$table_name = $wpdb->prefix . base64_decode('bW9iaWxvdWRfbWVudQ==');
	return $wpdb->get_row("SELECT * FROM $table_name WHERE id = $item_ID");
}
?>