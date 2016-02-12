<?php
// **********************************************************************************
// **                                                                              **
// ** user.php                                      (c) Wolfram Plettscher 01/2016 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

echo "<h1>User Maintenance</h1>";

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
//-----------------------------------------------------------------------------------
// set global variables and comments before doing the real things                 ---
// set values to '', if not previously set                                        ---
//-----------------------------------------------------------------------------------

$myacc = $_SESSION['account'];

if (!isset ($_POST['r_userid'])) {
	$_POST['r_userid'] = '';
	$_POST['r_username'] = '';
	$_POST['r_firstname'] = '';
	$_POST['r_lastname'] = '';
	$_POST['r_email'] = '';
	$_POST['r_phone'] = '';
	}
	
if (!isset ($_POST['userid'])) $_POST['userid'] = '';
if (!isset ($_POST['username'])) $_POST['username'] = '';
if (!isset ($_POST['vorname'])) $_POST['vorname'] = '';
if (!isset ($_POST['nachname'])) $_POST['nachname'] = '';
if (!isset ($_POST['email'])) $_POST['email'] = '';
if (!isset ($_POST['phone'])) $_POST['phone'] = '';

$myuserid = $_POST['userid'];
$myuser = $_POST['username'];
$myfirstname = $_POST['vorname'];
$mylastname = $_POST['nachname'];
$myemail = $_POST['email'];
$myphone = $_POST['phone'];

//-----------------------------------------------------------------------------------
// react on previously pushed button to update mySQL database                     ---
//-----------------------------------------------------------------------------------

if (isset($_POST['new'])) {
	$query = $mysqli->query ("	INSERT INTO user	(acc_uuid, user_uuid, user, firstname, lastname, email, phone)
								VALUES				('$myacc', UUID(), '$myuser', '$myfirstname', '$mylastname', '$myemail', '$myphone')");

} elseif (isset($_POST['delete'])) {
	$query = $mysqli->query ("DELETE FROM user WHERE user_uuid='$myuserid'");
//	$query = $mysqli->query ("DELETE FROM user2work WHERE userid='$myuserid'");

} elseif (isset($_POST['change'])) {
	$query = $mysqli->query ("UPDATE user SET
		 user='$myuser',
		 firstname='$myfirstname',
		 lastname='$mylastname',
		 email='$myemail',
		 phone='$myphone'
		 WHERE user_uuid='$myuserid'");
} 

//-----------------------------------------------------------------------------------
// show user-table                                                      ---
//-----------------------------------------------------------------------------------
$query = $mysqli->query ("SELECT user_uuid, user, firstname, lastname, email, phone FROM user
							ORDER BY lastname ASC, firstname ASC");

echo "<table class='sqltable' border='0' cellspacing='0' cellpadding='2' >\n";

echo "<tr>
	<th> User </th>
	<th> Lastname </th>
	<th> Firstname </th>
	<th> Mail </th>
	<th> Phone </th>
	<th> ID </th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	</tr>\n";
	
while ($result = $query->fetch_object())
	{
	echo "<tr>"
		. "<td>" . "{$result->user}" . "</td>"
		. "<td>" . "{$result->lastname}" . "</td>"
		. "<td>" . "{$result->firstname}" . "</td>"
		. "<td>" . "{$result->email}" . "</td>"
		. "<td>" . "{$result->phone}" . "</td>"
		. "<td>" . "{$result->user_uuid}" . "</td>"
		. "<form action='index.php?section=user' method='post'>" 
			. "<td>" . "<input type='hidden' id='uid1' name='r_userid' value=" . "'{$result->user_uuid}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid2' name='r_username' value=" . "'{$result->user}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid3' name='r_firstname' value=" . "'{$result->firstname}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid4' name='r_lastname' value=" . "'{$result->lastname}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid5' name='r_email' value=" . "'{$result->email}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid6' name='r_phone' value=" . "'{$result->phone}'" . "></td>"
			. "<td>" . "<input class='css_btn_class' type='submit' value='edit' />" . "</td>"
		. "</form>"
		. "</tr>";
	}
echo "</table><br /><br />";
?>

<form action="index.php?section=user" method="post">

	<table>
    	<tr>
         	<td>User-ID: </td>
        	<td><input type="text" name="userid" size="20" value="<?php echo $_POST["r_userid"]; ?>" maxlength="30" tabindex="1" readonly/></td>
        	<td>Firstname: </td>
        	<td><input type="text" name="vorname" size="40" value="<?php echo $_POST["r_firstname"]; ?>" maxlength="64" tabindex="3"/></td>
        </tr><tr>
	       	<td>User-Name: </td>
        	<td><input type="text" name="username" size="20" value="<?php echo $_POST["r_username"]; ?>" maxlength="30" tabindex="2"/></td>
        	<td>Lastname: </td>
        	<td><input type="text" name="nachname" size="40" value="<?php echo $_POST["r_lastname"]; ?>" maxlength="64" tabindex="4"/></td>
        </tr><tr>
			<td></td>
            <td></td>
        	<td>E-Mail: </td>
        	<td><input type="text" name="email" size="40" value="<?php echo $_POST["r_email"]; ?>" maxlength="64" tabindex="5"/></td>
        </tr><tr>
			<td></td>
            <td></td>
        	<td>Phone: </td>
        	<td><input type="text" name="phone" size="40" value="<?php echo $_POST["r_phone"]; ?>" maxlength="64" tabindex="6"/></td>
        </tr>
    </table>
	<br />
	<table>
    	<tr>
 		<td><input class='css_btn_class' name='cancel' type='submit' value='cancel' /></td>
 		<td><input class='css_btn_class' name='delete' type='submit' value='delete' /></td>
 		<td><input class='css_btn_class' name='new' type='submit' value='new' /></td>
 		<td><input class='css_btn_class' name='change' type='submit' value='change' /></td>
        </tr>
    </table>

</form>

<?php
$mysqli->close();
?>

