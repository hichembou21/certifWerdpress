<?php
// Before removing this file, please verify the PHP ini setting `auto_prepend_file` does not point to this.

if (file_exists('/var/www/clients/client0/web14/web/wp-content/plugins/wordfence/waf/bootstrap.php')) {
	define("WFWAF_LOG_PATH", '/var/www/clients/client0/web14/web/wp-content/wflogs/');
	include_once '/var/www/clients/client0/web14/web/wp-content/plugins/wordfence/waf/bootstrap.php';
}
?>