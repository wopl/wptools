<?php
// **********************************************************************************
// **                                                                              **
// ** teamassign.php                                (c) Wolfram Plettscher 01/2015 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

echo "<h1>Assign Teammember to Groups</h1>";

include "mysql/credentials.inc";

$mysqli = new mysqli($host,$username,$password,$database);

// Verbindung prüfen
if (mysqli_connect_errno()) {
	printf ("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
	exit();
}

//-----------------------------------------------------------------------------------
// set global variables and comments before doing the real things                 ---
//-----------------------------------------------------------------------------------
$myuser = $_SESSION['usershort'];
$myuserid = $_SESSION['userid'];
$myprojid = $_SESSION['projid'];

$myteamid = $_POST['r_teamid'];
$mygroupid = $_POST['r_groupid'];
$myfirstname = $_POST['r_firstname'];
$mylastname = $_POST['r_lastname'];
$myrole = $_POST['r_role'];
$myremarks = $_POST['r_remarks'];

echo "<h3>$myfirstname $mylastname</h3>";

//-----------------------------------------------------------------------------------
// react on previously pushed button to update mySQL database                     ---
//-----------------------------------------------------------------------------------

if (isset($_POST['delete']) || isset($_POST['delgroup']))
	{
	// Delete Group Assignment
	$query = $mysqli->query ("DELETE FROM team2group
							  WHERE projid = '$myprojid'
							  AND   teamid = '$myteamid'
							  AND   groupid = '$mygroupid' ");
	}

if (isset($_POST['setgroup']))
	{
	// Set Group Assignment
	$query = $mysqli->query ("	INSERT INTO team2group	(projid, teamid, groupid)
								VALUES				('$myprojid', '$myteamid', '$mygroupid')");
	}

//-----------------------------------------------------------------------------------
// show/edit team to group assignements                                                      ---
//-----------------------------------------------------------------------------------
$query = $mysqli->query ("SELECT projgroup.groupid, projgroup.name, team2group.teamid, team2group.role, team2group.remarks
						  FROM projgroup
						  LEFT JOIN team2group
						  	ON projgroup.groupid = team2group.groupid
							AND team2group.teamid = '$myteamid'
						  WHERE projgroup.projid = '$myprojid'
						  ORDER by projgroup.prio ASC ");

echo "<table class='sqltable' border='0' cellspacing='0' cellpadding='2' >\n";

echo "<tr>
	<th> Assigned </th>
	<th> Project Group </th>
	<th></th>
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
	echo "<tr>";

		if ($result->teamid == $myteamid)
			{
			echo "<td>" . "<input type='checkbox' name='selected' disabled='disabled' checked>" . "</td>";
			$my_ischecked = 1;
			}
		else
			{
			echo "<td>" . "<input type='checkbox' name='selected' disabled='disabled'>" . "</td>";
			$my_ischecked = 0;
			}
		echo "<td>" . "{$result->name}" . "</td>";
		echo "<form action='index.php?section=teamassign' method='post'>" 
				. "<td>" . "<input type='hidden' id='uid1' name='r_groupid' value=" . "'{$result->groupid}'" . "></td>"
				. "<td>" . "<input type='hidden' id='uid2' name='r_teamid' value=" . "'{$myteamid}'" . "></td>"
				. "<td>" . "<input type='hidden' id='uid3' name='r_firstname' value=" . "'{$myfirstname}'" . "></td>"
				. "<td>" . "<input type='hidden' id='uid4' name='r_lastname' value=" . "'{$mylastname}'" . "></td>"
				. "<td>" . "<input type='hidden' id='uid5' name='r_ischecked' value=" . "'{$my_ischecked}'" . "></td>"
				. "<td>" . "<input type='hidden' id='uid6' name='r_role' value=" . "'{$result->role}'" . "></td>"
				. "<td>" . "<input type='hidden' id='uid7' name='r_remarks' value=" . "'{$result->remarks}'" . "></td>";

		if ($my_ischecked == 0)
			// just set the box on pushing the "change" button
			echo "<td>" . "<input class='css_btn_class' name='setgroup' type='submit' value='change' />" . "</td>";
		else
			if (($result->role == "") && ($result->remarks == ""))
				// as role and remarks are empty, we can delete the group assignment without any confirmation
				echo "<td>" . "<input class='css_btn_class' name='delgroup' type='submit' value='change' />" . "</td>";
			else
				// show a modal box first to confirm deletion
				echo "<td>" . "<input class='css_btn_class' name='openmodal' type='submit' value='change' />" . "</td>";
//			echo "<td>" . "<a href='#modal'><button class= 'css_btn_class' type='button'>remove</button></a>" . "</td>";
		echo "</form>";

	echo "</tr>";
	}
echo "</table><br /><br />";

$mysqli->close();

//<!-- ---------------------------------------------------------------------------- -->
//<!-- site specific modal boxes                                                    -->
//<!-- ---------------------------------------------------------------------------- -->
if (isset($_POST['openmodal']))
	{
	// open modal box for confirmation of record delete
	echo "<div id='modal'>";
		echo "<div class='modal-content'>";
			echo "<div class='header'>";
				echo "<h2>Remove Group Assignment</h2>";
			echo "</div>";
			echo "<div class='copy'>";
				echo "<p>You are going to remove a group assignement for <b>$myfirstname $mylastname</b>." .
				     " Below shown are remarks and role descriptions belonging to this group assignment.</p>";
				echo "<p><b>Role: </b>$myrole</p>";
				echo "<p><b>Remarks: </b>$myremarks</p>";
				echo "<p>Do you really want to delete all this information?</p>";
			echo "</div>";
			echo "<div class='cf footer'>";
				echo "<form action='index.php?section=teamassign' method='post'>" 
						. "<table><tr>"
							. "<td>" . "<input class='css_btn_class' name='cancel' type='submit' value='cancel' />" . "</td>"
							. "<td>" . "<input class='css_btn_class' name='delete' type='submit' value='delete' />" . "</td>"
							. "<td>" . "<input type='hidden' id='uid1' name='r_groupid' value=" . "'{$mygroupid}'" . "></td>"
							. "<td>" . "<input type='hidden' id='uid2' name='r_teamid' value=" . "'{$myteamid}'" . "></td>"
							. "<td>" . "<input type='hidden' id='uid3' name='r_firstname' value=" . "'{$myfirstname}'" . "></td>"
							. "<td>" . "<input type='hidden' id='uid4' name='r_lastname' value=" . "'{$mylastname}'" . "></td>"
							. "<td>" . "<input type='hidden' id='uid5' name='r_ischecked' value=" . "'{$my_ischecked}'" . "></td>"
						. "</tr></table>"
					. "</form>";
			echo "</div>";
		echo "</div>";
		echo "<div class='overlay'></div>";
	echo "</div>";
	}
?>


