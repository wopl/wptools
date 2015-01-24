<?php
// **********************************************************************************
// **                                                                              **
// ** passwd.php                                    (c) Wolfram Plettscher 01/2015 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

echo "<h1>Change Password</h1>";

include "mysql/credentials.inc";

$mysqli = new mysqli($host,$username,$password,$database);

// Verbindung prüfen
if (mysqli_connect_errno()) {
	printf ("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
	exit();
}

//-----------------------------------------------------------------------------------
// react on previously pushed button to update mySQL database                                                     ---
//-----------------------------------------------------------------------------------

	$myuser = $_SESSION['usershort'];
	$myuserid = $_SESSION['userid'];

	$myoldpw = $_POST['oldpw'];
	$mynewpw1 = $_POST['newpw1'];
	$mynewpw2 = $_POST['newpw2'];

if (isset($_POST['change'])) {

	if ($mynewpw1 != $mynewpw2) {
		$_SESSION['kicker'] = "new password inputs do not match";
	} elseif ($mynewpw1 == ""){
		$_SESSION['kicker'] = "new password may not be empty";
	} else {
		// select users password from db
		$query = $mysqli->query ("SELECT password
								  FROM user
								  WHERE id = '$myuserid'");
		if ($result = $query->fetch_object()) {
			$mydbmd5 = $result->password;
			$mymd5 = md5($myoldpw);
			if ($mydbmd5 == $mymd5) {
				// Update password in database
				$mynewmd5 = md5($mynewpw1);
				$query = $mysqli->query ("UPDATE user SET
					 password = '$mynewmd5'
					 WHERE id = '$myuserid'");
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

