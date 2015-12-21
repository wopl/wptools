<?php
// **********************************************************************************
// **                                                                              **
// ** logout.php                                    (c) Wolfram Plettscher 12/2015 **
// **                                                                              **
// **********************************************************************************
include "inc/globalvars.inc";

	session_start();
    session_destroy();

    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

	if (defined (HOSTEUROPE_SSLPROXY)) {
		header('Location: https://ssl.webpack.de/'.$hostname.($path == '/' ? '' : $path).'/login.php');
	} else {
		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
	}

?>

