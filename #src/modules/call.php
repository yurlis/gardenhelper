<?php

$siteHost = $_SERVER['HTTP_HOST'];

if ( $siteHost == 'yurylisovsky.colocall.com') {
	$dbname  = 'yurylisovsky3';		
	$server = 'db.colocall.net';	
	$password = 'Parol1973cl3';		
	$username = 'yurylisovsky3';		
	$siteUrl = $_SERVER['DOCUMENT_ROOT'] . '/portfolio/gardenhelper'; 
} else {
	$dbname = "garden_helper";
	$server = "localhost";
	$password = "";
	$username = "root";
	$siteUrl = $_SERVER['DOCUMENT_ROOT']; 
}

include $siteUrl . '/modules/config/db.php';

include $siteUrl . '/modules/config/random.php';

if (isset($_GET['cmd'])) {

	switch ($_GET['cmd']) {
		case 'islogin' : {
			include $siteUrl . '/modules/user/islogin.php';
		break;
		}
		case 'registration' : { // request: {name, email, phone, password, repassword} ___ response: {status, id, message}
			include $siteUrl . '/modules/user/registration.php'; 
		break;
		}
		case 'login' : {
			include $siteUrl . '/modules/user/login.php';
		break;
		}
		case 'getzones' : { // request: "" ___ response: { zone [{id, name}] }
			include $siteUrl . '/modules/user/getzones.php';
		break;
		}
		case 'getplants' : { // request: "" ___ response: { zone [{id, name}] }
			include $siteUrl . '/modules/user/getplants.php';
		break;
		}
		case 'getsellers' : { // request: "" ___ response: { zone [{id, name}] }
			include $siteUrl . '/modules/user/getsellers.php';
		break;
		}
		case 'addplant' : { // request: "plantid, zone, sellerid, comment, planted, date, follow ___ response: { status, id, message }
			include $siteUrl . '/modules/user/addplant.php';
		break;
		}		
	}
}


/*
$indicesServer = array('PHP_SELF',
'argv',
'argc',
'GATEWAY_INTERFACE',
'SERVER_ADDR',
'SERVER_NAME',
'SERVER_SOFTWARE',
'SERVER_PROTOCOL',
'REQUEST_METHOD',
'REQUEST_TIME',
'REQUEST_TIME_FLOAT',
'QUERY_STRING',
'DOCUMENT_ROOT',
'HTTP_ACCEPT',
'HTTP_ACCEPT_CHARSET',
'HTTP_ACCEPT_ENCODING',
'HTTP_ACCEPT_LANGUAGE',
'HTTP_CONNECTION',
'HTTP_HOST',
'HTTP_REFERER',
'HTTP_USER_AGENT',
'HTTPS',
'REMOTE_ADDR',
'REMOTE_HOST',
'REMOTE_PORT',
'REMOTE_USER',
'REDIRECT_REMOTE_USER',
'SCRIPT_FILENAME',
'SERVER_ADMIN',
'SERVER_PORT',
'SERVER_SIGNATURE',
'PATH_TRANSLATED',
'SCRIPT_NAME',
'REQUEST_URI',
'PHP_AUTH_DIGEST',
'PHP_AUTH_USER',
'PHP_AUTH_PW',
'AUTH_TYPE',
'PATH_INFO',
'ORIG_PATH_INFO') ;

echo '<table cellpadding="10">' ;
foreach ($indicesServer as $arg) {
    if (isset($_SERVER[$arg])) {
        echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ;
    }
    else {
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ;
    }
}
echo '</table>' ;
*/

// echo('<pre>');

// echo('DOCUMENT_ROOT' . '=' . $_SERVER['DOCUMENT_ROOT'] . '<br />');
// echo('PHP_SELF' . '=' . $_SERVER['PHP_SELF'] . '<br />');
// echo('HTTP_HOST' . '=' . $_SERVER['HTTP_HOST'] . '<br />');
// echo('SCRIPT_FILENAME' . '=' . $_SERVER['SCRIPT_FILENAME'] . '<br />');
// echo('SCRIPT_NAME' . '=' . $_SERVER['SCRIPT_NAME'] . '<br />');
// echo('REQUEST_URI' . '=' . $_SERVER['REQUEST_URI'] . '<br />');
// echo('PATH_INFO' . '=' . $_SERVER['PATH_INFO'] . '<br />');
// echo('__DIR__' . '=' . __DIR__ . '<br />');
// echo('__FILE__' . '=' . __FILE__ . '<br />');
// echo('</pre>');
// echo ($siteUrl);