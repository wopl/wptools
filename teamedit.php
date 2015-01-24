<?php
// **********************************************************************************
// **                                                                              **
// ** teamedit.php                                  (c) Wolfram Plettscher 01/2015 **
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
// react on previously pushed button to update mySQL database                                                     ---
//-----------------------------------------------------------------------------------

$myuser = $_SESSION['usershort'];
$myuserid = $_SESSION['userid'];
$myprojid = $_SESSION['projid'];

$myteamid = $_POST['r_teamid'];
$myfirstname = $_POST['r_firstname'];
$mylastname = $_POST['r_lastname'];
$mycompany = $_POST['r_company'];
$mylocation = $_POST['r_location'];
$mydept = $_POST['r_dept'];
$myemail = $_POST['r_email'];
$myphone = $_POST['r_phone'];
$myposition = $_POST['r_position'];
$myremarks = $_POST['r_remarks'];

if (isset($_POST['edit'])) {
	// this has been triggered by teamlist page; show all data for editing
	$query = $mysqli->query ("SELECT firstname, lastname, company, location, dept, email, phone, position, remarks
							FROM team
							WHERE teamid = '$myteamid'
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
		$query = $mysqli->query ("	INSERT INTO team	(projid, firstname, lastname, company,
														 location, dept, email, phone, position, remarks)
									VALUES				('$myprojid', '$myfirstname', '$mylastname', '$mycompany',
														 '$mylocation', '$mydept', '$myemail', '$myphone', '$myposition', '$myremarks')");
		// select new teamid
		$query = $mysqli->query ("SELECT teamid
							  	FROM team
							  	WHERE projid = '$myprojid'
							  	AND   firstname = '$myfirstname'
								AND   lastname = '$mylastname'
							    ");
		if ($result = $query->fetch_object()) {
			$myteamid = "{$result->teamid}";
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
			WHERE teamid = '$myteamid'
			AND projid = '$myprojid'");
		$_SESSION['kicker'] = "Team member successfully updated.";
	}
}

//if (isset($_POST['submit'])) {
/*
	// select selected project
	$query = $mysqli->query ("SELECT projid, projshort
							  FROM user2proj
							  WHERE usershort = '$myuser'
							  AND   projid = '$myselect'
							  ORDER BY defaultproj DESC, projshort ASC
							 ");
	if ($result = $query->fetch_object()) {
		$_SESSION['project'] = "Project: " . "{$result->projshort}";
		$_SESSION['projid'] = "{$result->projid}";
	}

	// update default project into db
	$query = $mysqli->query ("UPDATE user2proj SET
		 defaultproj = FALSE
		 WHERE usershort = '$myuser'");
	$query = $mysqli->query ("UPDATE user2proj SET
		 defaultproj = TRUE
		 WHERE usershort = '$myuser'
		 AND projid = '$mydefault'");

	// now we need to refresh the screen; therefore these javascript lines
	echo "<body onLoad='document.form1.submit()'>";
	echo "<form name='form1' method='post' action='index.php?section=projsel'>";
	echo "<input type='text' name='sqldone'>";
	echo "</form></body>";
}
*/
// This path will be executed after sql update (to update all values on screen based on selection)
// Currently there is no extra action needed; refresh of screen is done at this moment
//if (isset($_POST['sqldone'])) {
//	echo "</br> POST = abc </br>";
//}


//-----------------------------------------------------------------------------------
// edit team member                                                              ---
//-----------------------------------------------------------------------------------
//$query = $mysqli->query ("SELECT teamid, firstname, lastname
//						  FROM team
//						  WHERE projid = '$myprojid'
//						  ORDER BY lastname ASC, firstname ASC ");


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

//echo "<form action='index.php?section=team' method='post'>";
//echo "<input class='css_btn_class' name='return' type='submit' value='cancel / return' />";
//echo "</form>";



$mysqli->close();
?>

