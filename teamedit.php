<?php
// **********************************************************************************
// **                                                                              **
// ** teamedit.php                                  (c) Wolfram Plettscher 01/2016 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

echo "<h1>Edit Project Teammember</h1>";

include "mysql/credentials.inc";

$mysqli = new mysqli($host,$username,$password,$database);

// Verbindung prüfen
if (mysqli_connect_errno()) {
	printf ("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
	exit();
}

$_SESSION['kicker'] = "Edit fields. Then update database by pressing 'save' !";

//-----------------------------------------------------------------------------------
// react on previously pushed button to update mySQL database                     ---
// set values to '', if not previously set                                        ---
//-----------------------------------------------------------------------------------

$myacc = $_SESSION['account'];
$myuser = $_SESSION['usershort'];
$myuserid = $_SESSION['userid'];
$myprojid = $_SESSION['projid'];

if (!isset ($_POST['r_teamid'])) {
	$_POST['r_teamid'] = '';
	$_POST['r_firstname'] = '';
	$_POST['r_lastname'] = '';
	$_POST['r_company'] = '';
	$_POST['r_location'] = '';
	$_POST['r_dept'] = '';
	$_POST['r_email'] = '';
	$_POST['r_phone'] = '';
	$_POST['r_position'] = '';
	$_POST['r_remarks'] = '';
	}

if (isset ($_POST['r_teamid']))	$myteamid = $_POST['r_teamid']; else $myteamid = '';
if (isset ($_POST['r_firstname']))	$myfirstname = $_POST['r_firstname']; else $myfirstname = '';
if (isset ($_POST['r_lastname']))	$mylastname = $_POST['r_lastname']; else $mylastname = '';
if (isset ($_POST['r_company']))	$mycompany = $_POST['r_company']; else $mycompany = '';
if (isset ($_POST['r_location']))	$mylocation = $_POST['r_location']; else $mylocation = '';
if (isset ($_POST['r_dept']))	$mydept = $_POST['r_dept']; else $mydept = '';
if (isset ($_POST['r_email']))	$myemail = $_POST['r_email']; else $myemail = '';
if (isset ($_POST['r_phone']))	$myphone = $_POST['r_phone']; else $myphone = '';
if (isset ($_POST['r_position']))	$myposition = $_POST['r_position']; else $myposition = '';
if (isset ($_POST['r_remarks']))	$myremarks = $_POST['r_remarks']; else $myremarks = '';


if (isset($_POST['edit'])) {
	// this has been triggered by teamlist page; show all data for editing
	$query = $mysqli->query ("SELECT firstname, lastname, company, location, dept, email, phone, position, remarks
							FROM team
							WHERE teammember_uuid = '$myteamid'
							");
	if ($result = $query->fetch_object()) {
		$myfirstname = "{$result->firstname}";
		$mylastname = "{$result->lastname}";
		$mycompany = "{$result->company}";
		$mylocation = "{$result->location}";
		$mydept = "{$result->dept}";
		$myemail = "{$result->email}";
		$myphone = "{$result->phone}";
		$myposition = "{$result->position}";
		$myremarks = "{$result->remarks}";
	}

} elseif (isset($_POST['save'])) {
	// this has been triggered by teamedit page; perform insert or update
	if ($myteamid == "") {

		// teamid is empty, therefore create a new record
		$query = $mysqli->query ("	INSERT INTO team	(acc_uuid, proj_uuid, teammember_uuid, firstname, lastname, company,
														 location, dept, email, phone, position, remarks)
									VALUES				('$myacc', '$myprojid', UUID(), '$myfirstname', '$mylastname', '$mycompany',
														 '$mylocation', '$mydept', '$myemail', '$myphone', '$myposition', '$myremarks')");
		// select new teamid
		$query = $mysqli->query ("SELECT teammember_uuid
							  	FROM team
							  	WHERE proj_uuid = '$myprojid'
							  	AND   firstname = '$myfirstname'
								AND   lastname = '$mylastname'
							    ");
		if ($result = $query->fetch_object()) {
			$myteamid = "{$result->teammember_uuid}";
			$_SESSION['kicker'] = "New project team member successfully created. Don't forget to assign new team member to at least one group!";
		}
	} else {
		// teamid is set, therefore update record
		$query = $mysqli->query ("UPDATE team SET
			firstname = '$myfirstname',
			lastname = '$mylastname',
			company = '$mycompany',
			location = '$mylocation',
			dept = '$mydept',
			email = '$myemail',
			phone = '$myphone',
			position = '$myposition',
			remarks = '$myremarks'
			WHERE teammember_uuid = '$myteamid'
			AND proj_uuid = '$myprojid'");
		$_SESSION['kicker'] = "Team member successfully updated.";
	}
}


?>
<form action="index.php?section=teamedit" method="post">

	<table>
    	<tr>
        	<td>ID: </td>
        	<td><?php echo $myteamid; ?></td>
        	<td><input type="text" name="r_teamid" size="40" value="<?php echo $myteamid; ?>" maxlength="64" hidden/></td>
        </tr><tr>
         	<td>Lastname: </td>
        	<td><input type="text" name="r_lastname" size="40" value="<?php echo $mylastname; ?>" maxlength="64" tabindex="1"/></td>
        	<td>Firstname: </td>
        	<td><input type="text" name="r_firstname" size="40" value="<?php echo $myfirstname; ?>" maxlength="64" tabindex="2"/></td>
        </tr><tr>
	       	<td>Company: </td>
        	<td><input type="text" name="r_company" size="40" value="<?php echo $mycompany; ?>" maxlength="64" tabindex="3"/></td>
        	<td>Department: </td>
        	<td><input type="text" name="r_dept" size="40" value="<?php echo $mydept; ?>" maxlength="64" tabindex="4"/></td>
        </tr><tr>
	       	<td>Position: </td>
        	<td><input type="text" name="r_position" size="40" value="<?php echo $myposition; ?>" maxlength="64" tabindex="5"/></td>
        	<td>Location: </td>
        	<td><input type="text" name="r_location" size="40" value="<?php echo $mylocation; ?>" maxlength="64" tabindex="6"/></td>
        </tr><tr>
	       	<td>Email: </td>
        	<td><input type="text" name="r_email" size="40" value="<?php echo $myemail; ?>" maxlength="64" tabindex="7"/></td>
        	<td>Phone: </td>
        	<td><input type="text" name="r_phone" size="40" value="<?php echo $myphone; ?>" maxlength="64" tabindex="8"/></td>
        </tr><tr>
	       	<td>Remarks: </td>
        	<td colspan="3"><input type="text" name="r_remarks" size="97" value="<?php echo $myremarks; ?>" maxlength="64" tabindex="9"/></td>
        </tr>
    </table>
	<br />
    <b>Be aware that the 'delete' button below will completely destroy this user entry without further confirmation!</b>
	<table>
    	<tr>
<!--
 		<td><input class='css_btn_class' name='list' type='submit' value='show list' /></td>
 		<td><input class='css_btn_class' name='clear' type='submit' value='clear' /></td>
 		<td><input class='css_btn_class' name='delete' type='submit' value='delete' /></td>
-->        
 		<td><input class='css_btn_class' name='save' type='submit' value='save' /></td>
 		<td><input class='css_btn_class' name='group' type='submit' value='assign group' formaction='index.php?section=teamassign' /></td>
        </tr>
    </table>

</form>

<?php
$mysqli->close();
?>

