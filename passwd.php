<?php
// **********************************************************************************
// **                                                                              **
// ** passwd.php                                    (c) Wolfram Plettscher 01/2016 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');
include "inc/password.class.php";

echo "<h1>Change Password</h1>";
echo "<b>A password may not contain any special characters (only a-z, A-Z and 0-9) and is 4-32 characters long.</b><br><br>";

include "mysql/credentials.inc";

$mysqli = new mysqli($host,$username,$password,$database);

// Verbindung prüfen
if (mysqli_connect_errno()) {
	printf ("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
	exit();
}

//-----------------------------------------------------------------------------------
// react on previously pushed button to update mySQL database                     ---
// set values to '', if not previously set                                        ---
//-----------------------------------------------------------------------------------

	$myuser = $_SESSION['usershort'];
	$myuserid = $_SESSION['userid'];

	if (!isset ($_POST['oldpw'])) $_POST['oldpw'] = '';
	if (!isset ($_POST['newpw1'])) $_POST['newpw1'] = '';
	if (!isset ($_POST['newpw2'])) $_POST['newpw2'] = '';
	
	$myoldpw = $_POST['oldpw'];
	$mynewpw1 = $_POST['newpw1'];
	$mynewpw2 = $_POST['newpw2'];

if (isset($_POST['change'])) {
	if (!Password::check ($myuser)) {
		$_SESSION['kicker'] = "Something is wrong with your user-id. Please consult your administrator.";
	} elseif (!Password::check($myoldpw)) {
		$_SESSION['kicker'] = "Your old password has not been accepted. Please try again.";
	} elseif ($mynewpw1 == "") {
		$_SESSION['kicker'] = "new password may not be empty";
	} elseif ($mynewpw1 != $mynewpw2) {
		$_SESSION['kicker'] = "new password inputs do not match";
	} elseif (!Password::check($mynewpw1) || !Password::check($mynewpw2)) {
		$_SESSION['kicker'] = "Your new password has not been accepted. Please try again.";
	} else {
		// select users password from db
		$query = $mysqli->query ("SELECT password
								  FROM user
								  WHERE user_uuid = '$myuserid'");
		if ($result = $query->fetch_object()) {
			$dbpw_hash = $result->password;
			Password::$salt = $myuser;
			$oldpw_hash = Password::hash($myoldpw);
			if ($dbpw_hash === $oldpw_hash) {

			// Update password in database
				$newpw_hash = Password::hash($mynewpw1);
				$query = $mysqli->query ("UPDATE user SET
					 password = '$newpw_hash'
					 WHERE user_uuid = '$myuserid'");
				$_SESSION['kicker'] = "Password changed successfully. Please immediate log out and login again!";
			} else {
				$_SESSION['kicker'] = "old password is not correct; plese try again!";
			}
		}
	}
	
	// now we need to refresh the screen; therefore these javascript lines
//	echo "<body onLoad='document.form1.submit()'>";
//	echo "<form name='form1' method='post' action='index.php?section=projsel'>";
//	echo "<input type='text' name='sqldone'>";
//	echo "</form></body>";

} else {
	// regular initial call of this page
	$_SESSION['kicker'] = "";
}

// This path will be executed after sql update (to update all values on screen based on selection)
// Currently there is no extra action needed; refresh of screen is done at this moment
//if (isset($_POST['sqldone'])) {
//	echo "</br> POST = abc </br>";
//}


//-----------------------------------------------------------------------------------


?>
<form action="index.php?section=passwd" method="post">

	<table>
    	<tr>
         	<td>Old Password: </td>
        	<td><input type="password" name="oldpw" size="40" value="" maxlength="30" tabindex="1"/></td>
        </tr><tr>
	       	<td>New Password: </td>
        	<td><input type="password" name="newpw1" size="40" value="" maxlength="30" tabindex="2"/></td>
        </tr><tr>
        	<td>Repeat new Password: </td>
        	<td><input type="password" name="newpw2" size="40" value="" maxlength="30" tabindex="3"/></td>
        </tr>
    </table>
	<br />
	<table>
    	<tr>
 		<td><input class='css_btn_class' name='change' type='submit' value='change' /></td>
        </tr>
    </table>

</form>
<?php
$mysqli->close();
?>

