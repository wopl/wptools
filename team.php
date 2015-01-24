<?php
// **********************************************************************************
// **                                                                              **
// ** team.php                                      (c) Wolfram Plettscher 01/2015 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

include "mysql/credentials.inc";

$mysqli = new mysqli($host,$username,$password,$database);

// Verbindung prüfen
if (mysqli_connect_errno()) {
	printf ("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
	exit();
}

$mysqli2 = new mysqli($host,$username,$password,$database);

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
$mygrouping = "0";

//-----------------------------------------------------------------------------------
// react on previously pushed button to update mySQL database                     ---
//-----------------------------------------------------------------------------------

// Figure out, what group should be preselected in Drop-Down Box and shown in Header of page
if (isset($_POST['team1']) ||
    isset($_POST['team2']) ||
    isset($_POST['team3']) )
	// One of the "View"-Buttons has been pushed
	{
	$mygroupselect = $_POST['GroupSelection'];
	}
else
	// This is the case when we enter the page from top menu
	{
	$mygroupselect = "all_groups";
	}

//-----------------------------------------------------------------------------------
// Menu for Team-View selection                                                   ---
//-----------------------------------------------------------------------------------
?>
<form method='post'>
    <table>
    	<tr>
 		<td><b>select Group: </b></td>
		<td colspan="4">
<?php
// Generate drop down list to select group(s)
		echo "<select class='selectbox' name='GroupSelection'>";

		// first line of Drop-Down Box should show "all_groups"
		if ($mygroupselect == "" || $mygroupselect == "all_groups")
			{
	        echo "<option value='all_groups' selected>All Groups</option>";
			$mygroupname = "All Groups";
			}
		else
	        echo "<option value='all_groups'>All Groups</option>";

		// following lines of Drop-Down Box are selected from porject database
		$query2 = $mysqli2->query ("SELECT groupid, name
							  FROM projgroup
							  WHERE projid = '$myprojid'
							  ORDER BY prio ASC");
		while ($result2 = $query2->fetch_object())
			{
			if ($mygroupselect == $result2->groupid)
				{
				echo "<option value='{$result2->groupid}' selected>{$result2->name}</option>";
				$mygroupid = $result2->groupid;
				$mygroupname = $result2->name;
				}
			else
				{
				echo "<option value='{$result2->groupid}'>{$result2->name}</option>";
				}
			}

		// last line of Drop-Down Box shows "Not Assigned to any Group"
		if ($mygroupselect == "not_assigned")
			{
        	echo "<option value='not_assigned' selected>Not Assigned to any Group</option>";
			$mygroupname = "Not Assigned to any Group";
			}
		else
        	echo "<option value='not_assigned'>Not Assigned to any Group</option>";

		echo "</select>";

// show buttons to select the next form-view
?>
        </td>
        </tr><tr>
 		<td><b>select View: </b></td>
 		<td><input class='css_btn_class' name='team1' type='submit' value='Base View' formaction='index.php?section=team' /></td>
  		<td><input class='css_btn_class' name='team2' type='submit' value='Contact View' formaction='index.php?section=team' /></td>
		<td><input class='css_btn_class' name='team3' type='submit' value='Remarks View' formaction='index.php?section=team' /></td>
		<td><input class='css_btn_class' name='team4' type='submit' value='Roles View' formaction='index.php?section=team4' /></td>
        </tr>
    </table>
</form>
<?php
//-----------------------------------------------------------------------------------
// show team members without grouping                                             ---
//-----------------------------------------------------------------------------------
if ($mygrouping == "0") {
//	echo "<b>(remarks view)</b>";
	echo "<h1>Project Team - $mygroupname</h1>";

// Depending on selected group, we will show subsets of the team
	if ($mygroupselect == "" || $mygroupselect == "all_groups")
		{
		$query = $mysqli->query ("SELECT teamid, firstname, lastname, company, location, dept, email, phone, position, remarks
								  FROM team
								  WHERE projid = '$myprojid'
								  ORDER BY lastname ASC, firstname ASC ");
		}
	elseif ($mygroupselect == "not_assigned")
		{
		$query = $mysqli->query ("SELECT teamid, firstname, lastname, company, location, dept, email, phone, position, remarks
								  FROM team
								  WHERE projid = '$myprojid'
								  AND teamid NOT IN
								  	(
									SELECT teamid FROM team2group
									WHERE projid = '$myprojid'
									)
								  ORDER BY lastname ASC, firstname ASC ");
		}
	else
		{
		$query = $mysqli->query ("SELECT t.teamid, t.firstname, t.lastname, t.company, t.location, t.dept, t.email, t.phone, t.position, t.remarks
								  FROM team t, team2group tg
								  WHERE tg.groupid = '$mygroupid'
								  AND tg.projid = '$myprojid'
								  AND t.projid = '$myprojid'
								  AND tg.teamid = t.teamid
								  ORDER BY t.lastname ASC, t.firstname ASC ");
		}

// Build up the screen to show the table		
		
	echo "<table class='sqltable' border='0' cellspacing='0' cellpadding='2' >\n";

//-----------------------------------------------------------------------------------
// Show "Remarks View"                                                            ---
//-----------------------------------------------------------------------------------
	if (isset($_POST['team3']))
		{
	
		echo "<tr>
			<th> Lastname </th>
			<th> Firstname </th>
			<th> Remarks </th>
			<th></th>
			<th></th>
			</tr>\n";
		
		while ($result = $query->fetch_object())
			{
			echo "<tr>";
			echo "<td>" . "{$result->lastname}" . "</td>"
				. "<td>" . "{$result->firstname}" . "</td>"
				. "<td>" . "{$result->remarks}" . "</td>"
				. "<form action='index.php?section=teamedit' method='post'>" 
					. "<td>" . "<input type='hidden' id='uid1' name='r_teamid' value=" . "'{$result->teamid}'" . "></td>"
					. "<td>" . "<input class='css_btn_class' name='edit' type='submit' value='edit' />" . "</td>"
				. "</form>"
				. "</tr>";
			}
		}

//-----------------------------------------------------------------------------------
// Show "Contact View"                                                            ---
//-----------------------------------------------------------------------------------
	elseif (isset($_POST['team2']))
		{
		echo "<tr>
			<th> Lastname </th>
			<th> Firstname </th>
			<th> Company </th>
			<th> E-Mail </th>
			<th> Phone </th>
			<th></th>
			<th></th>
			</tr>\n";
			
		while ($result = $query->fetch_object())
			{
			echo "<tr>";
			echo "<td>" . "{$result->lastname}" . "</td>"
				. "<td>" . "{$result->firstname}" . "</td>"
				. "<td>" . "{$result->company}" . "</td>"
				. "<td>" . "{$result->email}" . "</td>"
				. "<td>" . "{$result->phone}" . "</td>"
				. "<form action='index.php?section=teamedit' method='post'>" 
					. "<td>" . "<input type='hidden' id='uid1' name='r_teamid' value=" . "'{$result->teamid}'" . "></td>"
					. "<td>" . "<input class='css_btn_class' name='edit' type='submit' value='edit' />" . "</td>"
				. "</form>"
				. "</tr>";
			}
		}

//-----------------------------------------------------------------------------------
// Show "Base View", which is the default view                                    ---
//-----------------------------------------------------------------------------------

	else
		{
		echo "<tr>
			<th> Lastname </th>
			<th> Firstname </th>
			<th> Company </th>
			<th> Department </th>
			<th> Position </th>
			<th> Location </th>
			<th></th>
			<th></th>
			</tr>\n";
			
		while ($result = $query->fetch_object())
			{
			echo "<tr>";
			echo "<td>" . "{$result->lastname}" . "</td>"
				. "<td>" . "{$result->firstname}" . "</td>"
				. "<td>" . "{$result->company}" . "</td>"
				. "<td>" . "{$result->dept}" . "</td>"
				. "<td>" . "{$result->position}" . "</td>"
				. "<td>" . "{$result->location}" . "</td>"
				. "<form action='index.php?section=teamedit' method='post'>" 
					. "<td>" . "<input type='hidden' id='uid1' name='r_teamid' value=" . "'{$result->teamid}'" . "></td>"
					. "<td>" . "<input class='css_btn_class' name='edit' type='submit' value='edit' />" . "</td>"
				. "</form>"
				. "</tr>";
			}
		}
		
//-----------------------------------------------------------------------------------
	echo "</table><br /><br />";
	
// the "new" Button only should be shown, if all team-members are displayed
	if ($mygroupselect == "" || $mygroupselect == "all_groups")
		{
		echo "<form action='index.php?section=teamedit' method='post'>";
		echo "<input class='css_btn_class' name='new' type='submit' value='new' />";
		echo "</form>";
		}
}


$mysqli->close();
$mysqli2->close();
?>

