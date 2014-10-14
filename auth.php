<?php
// **********************************************************************************
// **                                                                              **
// ** auth.php                                      (c) Wolfram Plettscher 10/2014 **
// **                                                                              **
// **********************************************************************************

session_start();

$hostname = $_SERVER['HTTP_HOST'];
$path = dirname($_SERVER['PHP_SELF']);

// check, if user is properly logged-in
if (!isset($_SESSION['angemeldet']) || !$_SESSION['angemeldet']) {
	// no, therefore go to login-page
//	header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
	header('Location: https://ssl.webpack.de/'.$hostname.($path == '/' ? '' : $path).'/login.php');
	exit;
}

// check, if 10 Minute timer has expired
if (time() - $_SESSION['TIME']	> 600) {
	// yes, counter expired; goto login-page
//	header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
	header('Location: https://ssl.webpack.de/'.$hostname.($path == '/' ? '' : $path).'/login.php');
	exit;
}

// re-establish 10 Minute timer
$_SESSION['TIME'] = time();
?>