<?php 
/*
Plugin Name: nm-cPlayer
Description: WWordPress 163 Music Embed + cPlayer
Version: 1.0
Author: bigfa, Caringor
*/	

define('NM_VERSION', '3.0.7');
define('NM_URL', plugins_url('', __FILE__));
define('NM_PATH', dirname( __FILE__ ));
define('NM_ADMIN_URL', admin_url());
define('NM_DEBUG',false);

require NM_PATH . '/functions/nmjson.php';

require NM_PATH . '/functions/core.php';

require NM_PATH . '/functions/embed2.php';

//require NM_PATH . '/functions/static2.php';

require NM_PATH . '/functions/pr-list.php';

require NM_PATH . '/functions/shortcode.php';
