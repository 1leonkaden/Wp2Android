<?php
	//filter using the AppStore plugin
	class MobiloudAppStoreFilter extends MobiloudFilter {
		public function header($post_id) {
			$head = $this->css();
			return $head;
		}

		public function css() {
			}

		public function filter($post_html) {

			return do_shortcode($post_html);

		}
	} 
?>