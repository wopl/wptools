<?php
// **********************************************************************************
// **                                                                              **
// ** auth.php                                      (c) Wolfram Plettscher 10/2014 **
// **                                                                              **
// **********************************************************************************

     session_start();

     $hostname = $_SERVER['HTTP_HOST'];
     $path = dirname($_SERVER['PHP_SELF']);


     if (!isset($_SESSION['angemeldet']) || !$_SESSION['angemeldet']) {

      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
      exit;
      }
?>