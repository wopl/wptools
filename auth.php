<?php
// **********************************************************************************
// **                                                                              **
// ** auth.php                                      (c) Wolfram Plettscher 12/2015 **
// **                                                                              **
// **********************************************************************************

include "inc/globalvars.inc";

if (session_id() == '') {
	session_start();
}

$hostname = $_SERVER['HTTP_HOST'];
$path = dirname($_SERVER['PHP_SELF']);

// check, if user is properly logged-in
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
	// no, therefore go to login-page
	if (defined ('HOSTEUROPE_SSLPROXY')) {
		header('Location: https://ssl.webpack.de/'.$hostname.($path == '/' ? '' : $path).'/login.php');
	} else {
		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
	}
	exit;
}

// check, if 10 Minute timer has expired
if (time() - $_SESSION['TIME']	> 600) {
	// yes, counter expired; goto login-page
    session_destroy();
	if (defined ('HOSTEUROPE_SSLPROXY')) {
		header('Location: https://ssl.webpack.de/'.$hostname.($path == '/' ? '' : $path).'/login.php');
	} else {
		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
	}
	exit;
}

// re-establish 10 Minute timer
$_SESSION['TIME'] = time();
?>