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

echo "<h3>$myfirstname $mylastname</h3>";

//-----------------------------------------------------------------------------------
// react on previously pushed button to update mySQL database                                                     ---
//-----------------------------------------------------------------------------------

if (isset($_POST['change']))
	{
	if ($_POST['r_ischecked'])
		{
		// Delete Group Assignment
//		$_SESSION['kicker'] = "Delete Group Assignment";
		$query = $mysqli->query ("DELETE FROM team2group
								  WHERE projid = '$myprojid'
								  AND   teamid = '$myteamid'
								  AND   groupid = '$mygroupid' ");
		}
	else
		{
		// Set Group Assignment
//		$_SESSION['kicker'] = "Set Group Assignment";
		$query = $mysqli->query ("	INSERT INTO team2group	(projid, teamid, groupid)
									VALUES				('$myprojid', '$myteamid', '$mygroupid')");
		}
	}

//-----------------------------------------------------------------------------------
// show/edit team to group assignements                                                      ---
//-----------------------------------------------------------------------------------
$query = $mysqli->query ("SELECT projgroup.groupid, projgroup.name, team2group.teamid
						  FROM projgroup
						  LEFT JOIN team2group
						  	ON projgroup.groupid = team2group.groupid
							AND team2group.teamid = '$myteamid'
						  WHERE projgroup.projid = '$myprojid'
						  ORDER by projgroup.prio ASC ");

//echo "<form method='post' action='index.php?section=teamassign'>"; 

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
				. "<td>" . "<input class='css_btn_class' name='change' type='submit' value='change' />" . "</td>"
			. "</form>";

	echo "</tr>";
	}
echo "</table><br /><br />";

$mysqli->close();
?>

