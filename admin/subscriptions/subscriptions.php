<?php 	add_action(base64_decode('d3BfYWpheF9tbF9hZG1pbl9zdWJzY3JpcHRpb25zX3NhdmVfb3B0aW9ucw=='), base64_decode('bWxfYWRtaW5fc3Vic2NyaXB0aW9uc19zYXZlX29wdGlvbnNfY2FsbGJhY2s='));

	function ml_admin_subscriptions_save_options_callback()
	{
		if(isset($_POST[base64_decode('bWxfc3Vic2NyaXB0aW9uc19lbmFibGU=')])) {
			ml_set_generic_option(base64_decode('bWxfc3Vic2NyaXB0aW9uc19lbmFibGU='),$_POST[base64_decode('bWxfc3Vic2NyaXB0aW9uc19lbmFibGU=')]);
		}
		die();
	}

	function ml_admin_subscriptions_page() {

		echo base64_decode('PGRpdiBpZD0nbWxfYWRtaW5fc3Vic2NyaXB0aW9uc19wYWdlJz4=');	
		wp_register_style(base64_decode('bW9iaWxvdWRfYWRtaW5fc3Vic2NyaXB0aW9ucw=='), MOBILOUD_PLUGIN_URL . base64_decode('L2FkbWluL3N1YnNjcmlwdGlvbnMvc3Vic2NyaXB0aW9ucy5jc3M='));
		wp_enqueue_style(base64_decode('bW9iaWxvdWRfYWRtaW5fc3Vic2NyaXB0aW9ucw=='));
		
	
		echo base64_decode('PC9kaXY+');
	}
?>