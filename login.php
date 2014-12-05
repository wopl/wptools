<?php
// **********************************************************************************
// **                                                                              **
// ** login.php                                     (c) Wolfram Plettscher 11/2014 **
// **                                                                              **
// **********************************************************************************

include "inc/menuhref.inc";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

	// Access database to verify credentials
	include "mysql/credentials.inc";
	$mysqli = new mysqli($host,$username,$password,$database);

	// Verbindung prüfen
	if (mysqli_connect_errno()) {
		printf ("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
		exit();
	}

	$passmd5 = md5($pass);

	// Select the user from database
	$query = $mysqli->query ("SELECT id, firstname, lastname
							  FROM user
							  WHERE user = '$user'
							  AND password = '$passmd5'
							  ");

	if ($result = $query->fetch_object()) {
		// we found the user in database

    	$_SESSION['loggedin'] = true;
		$_SESSION['TIME'] = time();
		$_SESSION['welcome'] = "Welcome " . "{$result->firstname}" . " {$result->lastname}";
		$_SESSION['userid'] = "{$result->id}";
		$_SESSION['usershort'] = $user;
		$_SESSION['kicker'] = "";

		// update last login and # of logins
		$myid = "{$result->id}";
		$query = $mysqli->query ("UPDATE user
								  SET sessionctr = sessionctr + 1
								  WHERE id = '$myid'");

		// get group rights
		$query = $mysqli->query ("SELECT groupshort
								  FROM user2group
								  WHERE usershort = '$user'
								  ");
		if ($result = $query->fetch_object()) {
			$_SESSION['usergroup'] = "{$result->groupshort}";
		}
		
		// select default project
		$query = $mysqli->query ("SELECT projid, projshort
								  FROM user2proj
								  WHERE usershort = '$user'
								  ORDER BY defaultproj DESC, projshort ASC
								  ");
		if ($result = $query->fetch_object()) {
			$myprojid = "{$result->projid}";
			$_SESSION['projid'] = $myprojid;
			$query = $mysqli->query ("SELECT projlong
									  FROM project
									  WHERE projid = '$myprojid'
									  ");
			if ($result = $query->fetch_object()) {
				$_SESSION['project'] = "Project: " . "{$result->projlong}";
			}
		}

        // Weiterleitung zur geschützten Startseite
        if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
        	if (php_sapi_name() == 'cgi') {
         		header('Status: 303 See Other');
         	} else {
         		header('HTTP/1.1 303 See Other');
         	}
        }

		header ('Location: ' . addsslproxy ('index.php?section=home'));
        exit;
	}
}

?>

<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
-->
<!DOCTYPE html>
<html>
<head>

    <title>WP Tools</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
	<?php
		include ('css/menu.inc');
		include ('css/stdbutton.inc');
	?>

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
                <li class='active'><a href='<?php //echo addsslproxy ('login.php')?>'><span>Login</span></a></li>
            </ul>
        </div>
            

        <div id="contentbody">
            <h1>Wolfram Plettscher's Project Tools</h1>
            <form action="<?php //echo addsslproxy ('login.php')?>" method="post">
                <table>
                    <tr>
                        <td>Username: </td>
                        <td><input type="text" name="user" size="20" value="" maxlength="30" tabindex="1"/></td>
                    </tr><tr>
                        <td>Password: </td>
                        <td><input type="password" name="pass" size="20" value="" maxlength="30" tabindex="2"/></td>
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
</html>