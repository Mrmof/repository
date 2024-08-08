<?php
# Root paths for development (absolute paths, for localhost)
define('ROOT', '/repository/');    												# use this for localhost
define('WEB_ROOT', $_SERVER['PROJECT_ROOT'].'/');    							# for backend includes
define('ROOT_URL', 'http://localhost/repository/');  								# use this for frontend paths and assets, also backend headers 


// If(ROOT_URL ===''){
// 	echo '<p style="color:red;"> Please open your repository app file and provide the required values</p>';
// 	return;
// }