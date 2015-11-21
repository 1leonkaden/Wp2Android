<?php 	add_action(base64_decode('d3BfYWpheF9tbF9hZG1pbl9saWNlbnNlX2tleXM='), base64_decode('bWxfYWRtaW5fbGljZW5zZV9jYWxsYmFjaw=='));
	add_action(base64_decode('d3BfZW5xdWV1ZV9zY3JpcHRz'), base64_decode('bWxfYWRtaW5fbGljZW5zZV9lbnF1ZXVlX3NjcmlwdA=='));

	function ml_admin_license_callback()
	{
		global $ml_pb_app_id, $ml_pb_secret_key;
		
		
		if(isset($_POST[base64_decode('bWxfcGJfYXBwX2lk')]))
		{
			ml_set_pb_app_id($_POST[base64_decode('bWxfcGJfYXBwX2lk')]);
			$ml_pb_app_id = get_option(base64_decode('bWxfcGJfYXBwX2lk'));
		}

		
		if(isset($_POST[base64_decode('bWxfcGJfc2VjcmV0X2tleQ==')]))
		{
			ml_set_pb_secret_key($_POST[base64_decode('bWxfcGJfc2VjcmV0X2tleQ==')]);
			$ml_pb_secret_key = get_option(base64_decode('bWxfcGJfc2VjcmV0X2tleQ=='));
		}
		
		ml_admin_license_page();
		die();
	}

	function ml_admin_license_enqueue_script() {
		wp_enqueue_script(base64_decode('bW9iaWxvdWRfYWRtaW5fbGljZW5zZQ=='),MOBILOUD_PLUGIN_URL.base64_decode('YWRtaW4vbGljZW5zZS9saWNlbnNlLmpz'),array(base64_decode('anF1ZXJ5'),base64_decode('anF1ZXJ5LXVpLWNvcmU=')),MOBILOUD_PLUGIN_VERSION);
	}

	function ml_admin_license_page() {
		global $ml_pb_app_id, $ml_pb_secret_key;

		echo base64_decode('PGRpdiBpZD0nbWxfYWRtaW5fbGljZW5zZV9wYWdlJz4=');	
		wp_register_style(base64_decode('bW9iaWxvdWRfYWRtaW5fbGljZW5zZQ=='), MOBILOUD_PLUGIN_URL . base64_decode('L2FkbWluL2xpY2Vuc2UvbGljZW5zZS5jc3M='));
		wp_enqueue_style(base64_decode('bW9iaWxvdWRfYWRtaW5fbGljZW5zZQ=='));
		
		include(dirname( __FILE__ ).base64_decode('L3BhZ2UucGhw'));
		echo base64_decode('PC9kaXY+');
	}
?>