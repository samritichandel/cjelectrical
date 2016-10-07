<?php
// Before removing this file, please verify the PHP ini setting `auto_prepend_file` does not point to this.

if (file_exists('/home/cjelectrical/public_html/dev/wp-content/plugins/wordfence/waf/bootstrap.php')) {
	define("WFWAF_LOG_PATH", '/home/cjelectrical/public_html/dev/wp-content/wflogs/');
	include_once '/home/cjelectrical/public_html/dev/wp-content/plugins/wordfence/waf/bootstrap.php';
}
?>