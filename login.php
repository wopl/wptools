<?php
// **********************************************************************************
// **                                                                              **
// ** login.php                                     (c) Wolfram Plettscher 10/2014 **
// **                                                                              **
// **********************************************************************************

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//	ini_set ('session.cookie_lifetime', 99);
//	ini_set ('session.gc_maxlifetime', 99);
//	session_set_cookie_params (60,"/");
	session_start();

    $username = $_POST['username'];
    $passwort = $_POST['passwort'];

    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

    // Benutzername und Passwort werden überprüft
    if ($username == 'benjamin' && $passwort == 'geheim') {
    	$_SESSION['angemeldet'] = true;
		$_SESSION['TIME'] = time();

        // Weiterleitung zur geschützten Startseite
        if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
        	if (php_sapi_name() == 'cgi') {
         		header('Status: 303 See Other');
         	} else {
         		header('HTTP/1.1 303 See Other');
         	}
        }

//		header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/index.php?section=home');
		header('Location: https://ssl.webpack.de/'.$hostname.($path == '/' ? '' : $path).'/index.php?section=home');
        exit;
	}
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
	<!-- following lines are included for menu style -->
    <link rel="stylesheet" href="css/menu.css">
    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
        
    <title>WP Tools</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
 
 <body>
         <div id="wrapper">

            <div id="header">
            	<table width="980px"><tr>
					<td align="left" valign="bottom"><h3> </h3></td>
					<td align="right" valign="middle"></td>
				</tr></table>
            </div>
        
            <div id="cssmenu">
             	<ul>
					<li class='active'><a href='login.php'><span>Login</span></a></li>
			    </ul>
            </div>
            
            <div id="contentbody">
            	<h1>Wolfram Plettscher's Project Tools</h1>
	            <form action="login.php" method="post">
                    <table>
                        <tr>
                            <td>Username: </td>
                            <td><input type="text" name="username" size="20" value="" maxlength="30" tabindex="1"/></td>
                        </tr><tr>
                            <td>Password: </td>
                            <td><input type="password" name="passwort" size="20" value="" maxlength="30" tabindex="2"/></td>
                        </tr>
                    </table>
                    <br />
                    <table>
                        <tr>
                        <td><input class='css_btn_class' name='login' type='submit' value='login' /></td>
                        </tr>
                    </table>
			    </form>
            </div>
            
        </div>

        <div id="footer">
            &copy; Wolfram Plettscher 2014
        </div>
    
    </body>

 
 </body>
</html>