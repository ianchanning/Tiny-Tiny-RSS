<?php
class No_Iframes extends Plugin {
	private $host;

	function about() {
		return array(1.0,
			"Remove embedded iframes",
			"fox");
	}

	function init($host) {
		$this->host = $host;

		$host->add_hook($host::HOOK_SANITIZE, $this);
	}

	function hook_sanitize($doc, $site_url, $allowed_elements, $disallowed_attributes) {

		$allowed_elements = array_diff($allowed_elements, array("iframe"));

		return array($doc, $allowed_elements, $disallowed_attributes);
	}

	function api_version() {
		return 2;
	}

}
?>
