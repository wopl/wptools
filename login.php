<?php
// **********************************************************************************
// **                                                                              **
// ** login.php                                     (c) Wolfram Plettscher 02/2016 **
// **                                                                              **
// **********************************************************************************

include "inc/menuhref.inc";
include "inc/password.class.php";

//-----------------------------------------------------------------------------------
// react on previously pushed buttons                                             ---
//-----------------------------------------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();

	$account = $_POST['account'];
	$user = $_POST['user'];
	$pw = $_POST['pw'];

	// we check inputs of account, user and password before we allow to access the DB
	// all three inputs will be verified by Password::check  (same criteria)
	if (Password::check ($account) && Password::check($user) && Password::check($pw)) {

		// now hash the password to check against DB
		Password::$salt = $user;
		$pw_hash = Password::hash ($pw);
//echo $pw_hash;
//exit();
		
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

		// Get account uuid and check, if account is active
		$query = $mysqli->query ("SELECT acc_uuid, inv_company
								  FROM account
								  WHERE acc_name = '$account'
								  AND active = '1'
								  ");

		if ($result = $query->fetch_object()) {
			$myacc = $result->acc_uuid;
			$_SESSION['account'] = $myacc;
			$_SESSION['company'] = $result->inv_company;
			
			// check and hash the password
			$pwh = new Password();
			if (! $pwh->check ($pw))
				exit();
			$pw_hash = $pwh->hash ($pw);
			//$pw_hash = md5($pw);

			// Select the user from database
			$query = $mysqli->query ("SELECT user_uuid, firstname, lastname, user_role
									  FROM user
									  WHERE user = '$user'
									  AND password = '$pw_hash'
									  AND acc_uuid = '$myacc'
									  ");

			if ($result = $query->fetch_object()) {
				// we found the user in database

				$_SESSION['loggedin'] = true;
				$_SESSION['TIME'] = time();
				$_SESSION['welcome'] = "Welcome " . "{$result->firstname}" . " {$result->lastname}";
				$_SESSION['userid'] = "{$result->user_uuid}";
				$_SESSION['usershort'] = $user;
				$_SESSION['kicker'] = "";
				$_SESSION['usergroup'] = $result->user_role;

				// update last login and # of logins
				$myid = "{$result->user_uuid}";
				$query = $mysqli->query ("UPDATE user
										  SET sessionctr = sessionctr + 1
										  WHERE user_uuid = '$myid'");

				// get group rights
	//			$query = $mysqli->query ("SELECT groupshort
	//									  FROM user2group
	//									  WHERE usershort = '$user'
	//									  ");
	//			if ($result = $query->fetch_object()) {
	//				$_SESSION['usergroup'] = "{$result->groupshort}";
	//			}
				
				// select default project
				$query = $mysqli->query ("SELECT proj_uuid, projshort
										  FROM user2proj
										  WHERE user_uuid = '$myid'
										  ORDER BY defaultproj DESC, projshort ASC
										  ");
				if ($result = $query->fetch_object()) {
					$myprojid = "{$result->proj_uuid}";
					$_SESSION['projid'] = $myprojid;
					$query = $mysqli->query ("SELECT projlong
											  FROM project
											  WHERE proj_uuid = '$myprojid'
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

				header ('Location: ' . checksslproxy ('index.php?section=home'));
				exit;
			}
		}
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
				<li class='active'><a href='<?php echo checksslproxy ('login.php')?>'><span>Login</span></a></li> 
            </ul>
        </div>
            

        <div id="contentbody">
            <h1>Wolfram Plettscher's Project Tools</h1>
            <form action="<?php echo checksslproxy ('login.php')?>" method="post">
                <table>
                    <tr>
                        <td>Account: </td>
                        <td><input type="text" name="account" size="20" value="" maxlength="30" tabindex="1"/></td>
                    </tr><tr>
                        <td>Username: </td>
                        <td><input type="text" name="user" size="20" value="" maxlength="30" tabindex="2"/></td>
                    </tr><tr>
                        <td>Password: </td>
                        <td><input type="password" name="pw" size="20" value="" maxlength="30" tabindex="3"/></td>
                    </tr>
                </table>
                <br />
                <table>
                    <tr>
                    <td><input class='css_btn_class' name='login' type='submit' value='login' /></td>
                    <td><input class='css_btn_class' name='newaccount' type='submit' value='new Account' formaction='newaccount.php'/></td>
                    </tr>
                </table>
            </form>
        </div>
        
 	</div>
        
	<div id="footer">
		&copy; Wolfram Plettscher 2016
    </div>

</body>
</html>