<?php
// **********************************************************************************
// **                                                                              **
// ** projgroups.php                                (c) Wolfram Plettscher 01/2016 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

echo "<h1>Edit Project Groups</h1>";

include "mysql/credentials.inc";

$mysqli = new mysqli($host,$username,$password,$database);

// Verbindung prüfen
if (mysqli_connect_errno()) {
	printf ("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
	exit();
}

//-----------------------------------------------------------------------------------
// set global variables and comments before doing the real things                 ---
// set values to '', if not previously set                                        ---
//-----------------------------------------------------------------------------------

$myacc = $_SESSION['account'];
$myprojid = $_SESSION['projid'];

echo "<h3> Project-Id: $myprojid</h3>";
$_SESSION['kicker'] = "Deleting a group will result in all roles and remarks for associated users to be discarded. Be careful!";

if (!isset ($_POST['groupid'])) $_POST['groupid'] = '';
if (!isset ($_POST['prio'])) $_POST['prio'] = '';
if (!isset ($_POST['groupname'])) $_POST['groupname'] = '';

if (!isset ($_POST['r_groupid'])) $_POST['r_groupid'] = '';
if (!isset ($_POST['r_prio'])) $_POST['r_prio'] = '';
if (!isset ($_POST['r_name'])) $_POST['r_name'] = '';

$mygroupid = $_POST['groupid'];
$myprio = $_POST['prio'];
$myname = $_POST['groupname'];

//-----------------------------------------------------------------------------------
// react on previously pushed button to update mySQL database                     ---
//-----------------------------------------------------------------------------------

if (isset($_POST['new'])) {
	$query = $mysqli->query ("	INSERT INTO projgroup(acc_uuid, proj_uuid, projgroup_uuid, prio, name)
								VALUES				 ('$myacc', '$myprojid', UUID(), '$myprio', '$myname')");

} elseif (isset($_POST['delete'])) {
	$query = $mysqli->query ("DELETE FROM projgroup WHERE projgroup_uuid='$mygroupid'");

} elseif (isset($_POST['change'])) {
	$query = $mysqli->query ("UPDATE projgroup SET
		 prio='$myprio',
		 name='$myname'
		 WHERE projgroup_uuid='$mygroupid'");
} 

//-----------------------------------------------------------------------------------
// show project-groups-table                                                      ---
//-----------------------------------------------------------------------------------
$query = $mysqli->query ("SELECT projgroup_uuid, prio, name FROM projgroup
						  WHERE proj_uuid = '$myprojid'
						  AND acc_uuid = '$myacc'
						  ORDER BY prio ASC");

echo "<table class='sqltable' border='0' cellspacing='0' cellpadding='2' >\n";

echo "<tr>
	<th> Priority </th>
	<th> Groupname </th>
	<th> GroupID </th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	</tr>\n";

while ($result = $query->fetch_object())
	{
	echo "<tr>"
		. "<td>" . "{$result->prio}" . "</td>"
		. "<td>" . "{$result->name}" . "</td>"
		. "<td>" . "{$result->projgroup_uuid}" . "</td>"
		. "<form action='index.php?section=projgroups' method='post'>" 
			. "<td>" . "<input type='hidden' id='uid2' name='r_prio' value=" . "'{$result->prio}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid3' name='r_name' value=" . "'{$result->name}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid1' name='r_groupid' value=" . "'{$result->projgroup_uuid}'" . "></td>"
			. "<td>" . "<input class='css_btn_class' type='submit' value='edit' />" . "</td>"
		. "</form>"
		. "</tr>";

	}

echo "</table><br /><br />";
?>

<form action="index.php?section=projgroups" method="post">

	<table>
    	<tr>
         	<td>GroupID: </td>
        	<td><input type="text" name="groupid" size="20" value="<?php echo $_POST["r_groupid"]; ?>" maxlength="30" tabindex="1" readonly/></td>
        </tr><tr>
	       	<td>Priority: </td>
        	<td><input type="text" name="prio" size="20" value="<?php echo $_POST["r_prio"]; ?>" maxlength="30" tabindex="2"/></td>
        	<td>Groupname: </td>
        	<td><input type="text" name="groupname" size="40" value="<?php echo $_POST["r_name"]; ?>" maxlength="64" tabindex="3"/></td>
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

