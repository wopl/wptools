<?php
// **********************************************************************************
// **                                                                              **
// ** team.php                                      (c) Wolfram Plettscher 12/2015 **
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
// set values to '', if not previously set                                        ---
//-----------------------------------------------------------------------------------

$myuser = $_SESSION['usershort'];
$myuserid = $_SESSION['userid'];
$myprojid = $_SESSION['projid'];

if (isset ($_POST['r_role'])) $myrole = $_POST['r_role']; else $myrole = '';
if (isset ($_POST['r_remarks'])) $myremarks = $_POST['r_remarks']; else $myremarks = '';
if (isset ($_POST['r_role'])) $myrole = $_POST['r_role']; else $myrole = '';
if (isset ($_POST['r_role'])) $myrole = $_POST['r_role']; else $myrole = '';
//$myrole = $_POST['r_role'];
//$myremarks = $_POST['r_remarks'];
//$myteamid = $_POST['r_teamid'];
//$mygroupid = $_POST['r_groupid'];

$_SESSION['kicker'] = "";

//-----------------------------------------------------------------------------------
// react on previously pushed button to update mySQL database                     ---
//-----------------------------------------------------------------------------------

// Figure out, what group should be preselected in Drop-Down Box and shown in Header of page
if (isset($_POST['team1']) ||
    isset($_POST['team2']) ||
    isset($_POST['team3']) ||
    isset($_POST['team4']) ||
    isset($_POST['update']) )
	// One of the "View"-Buttons or the "Update"-Button (roles view) has been pushed
	{
	$mygroupselect = $_POST['GroupSelection'];
	}
else
	// This is the case when we enter the page from top menu
	{
	$mygroupselect = "all_groups";
	}

if (isset($_POST['update']))
	{
//	echo "<p>Proj: $myprojid Team: $myteamid Group: $mygroupid $mygroupselect</p>";
//	echo "<p>Role: $myrole</p>";
//	echo "<p>Remarks: $myremarks</p>";
	// thisis necessary to preset Drop-Down Box to same value as before
	$mygroupselect = $mygroupid;

	// update role/remarks in team2group record
	$query = $mysqli->query ("UPDATE team2group SET
		 role='$myrole',
		 remarks='$myremarks'
		 WHERE projid = '$myprojid'
		 AND   teamid = '$myteamid'
		 AND   groupid = '$mygroupid'");

	$_SESSION['kicker'] = "Record updated";
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

		// following lines of Drop-Down Box are selected from project database
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
		<td><input class='css_btn_class' name='team4' type='submit' value='Roles View' formaction='index.php?section=team' /></td>
        </tr>
    </table>
</form>
<?php
//-----------------------------------------------------------------------------------
// show team members without grouping                                             ---
//-----------------------------------------------------------------------------------
// All cases will be handled here, except we selected "team4" or "update" on roles view
if (!isset($_POST['team4']) && !isset($_POST['update'])) {

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

//-----------------------------------------------------------------------------------
// show team members with grouping                                                ---
//-----------------------------------------------------------------------------------
if (isset($_POST['team4']) || isset($_POST['update'])) {

	echo "<h1>Project Team</h1>";

// Depending on selected group, we will show subsets of the team
	if ($mygroupselect == "" || $mygroupselect == "all_groups")
		{
		$query2 = $mysqli2->query ("SELECT groupid, name
								  FROM projgroup
								  WHERE projid = '$myprojid'
								  ORDER BY prio ASC ");
		}
	else
		{
		$query2 = $mysqli2->query ("SELECT groupid, name
								  FROM projgroup
								  WHERE projid = '$myprojid'
								  AND   groupid = '$mygroupselect'
								  ORDER BY prio ASC ");
		}

	while ($result2 = $query2->fetch_object())
		{
		$mygroupid = "{$result2->groupid}";

		echo "<h2>Group: " . "{$result2->name}" . "</h2>";
		$query = $mysqli->query ("SELECT t.teamid, t.firstname, t.lastname, t.company, t.location, t.dept, t.email, t.phone, t.position, tg.role, tg.remarks
								  FROM team t, team2group tg
								  WHERE tg.groupid = '$mygroupid'
								  AND tg.projid = '$myprojid'
								  AND t.projid = '$myprojid'
								  AND tg.teamid = t.teamid
								  ORDER BY t.lastname ASC, t.firstname ASC ");

		echo "<table class='sqltable2' border='0' cellspacing='0' cellpadding='2' width='100%' >\n";
		$sqltable_even = false;
				
			echo "<tr>
				<th width='5%'> Name,</th>
				<th width='10%'>Company</th>
				<th width='15%'></th>
				<th width='60%'> Role (within this group)</th>
				<th></th>
				<th width='6%'></th>
				<th width='6%'></th>
				</tr>\n";
			
		while ($result = $query->fetch_object())
			{
			$sqltable_even = ! $sqltable_even;

			if ($sqltable_even)
				{
//				echo "<p>EVEN</p>";
				echo "<div class='sqltableeven'>";
				$mytableclass = "class='sqltableeven'";
				}
			else
				{
//				echo "<p>ODD</p>";
				echo "<div class='sqltableodd'>";
				$mytableclass = "class='sqltableodd'";
				}

			echo "<form method='post'>";
				echo "<tr $mytableclass>";
					echo "<td colspan='3'>" . "<b>{$result->lastname} {$result->firstname}</b>, {$result->company}" . "</td>"
						. "<td>" . "<input type='input' $mytableclass style='width:100%' id='uid1' name='r_role' value=" . "'{$result->role}'" . "></td>"
						. "<td></td>"
						. "<td align='right'>" . "<input class='css_btn_class' cellspacing='2' name='edit' type='submit' value='edit' formaction='index.php?section=teamedit' />" . "</td>"
						. "<td align='right'>" . "<input class='css_btn_class' cellspacing='2' name='update' type='submit' value='update' formaction='index.php?section=team' />"  . "</td>";
									
				echo "</tr><tr $mytableclass>";
					echo "<td width='5%'></td>"
						. "<td width='15'%>Remarks: </td>"
						. "<td colspan='5'>" . "<input type='input' $mytableclass style='width:100%' id='uid2' name='r_remarks' value=" . "'{$result->remarks}'" . "></td>";
				echo "</tr>";
				echo "<input type='hidden' id='uid3' name='r_teamid' value=" . "'{$result->teamid}'" . ">";
				echo "<input type='hidden' id='uid4' name='r_groupid' value=" . "'{$mygroupid}'" . ">";
			echo "</form>";
			echo "</div>";
			} // of inner while
		echo "<br />";
		echo "</table>";
		} // of outer while

	
} // of "if isset team4"

$mysqli->close();
$mysqli2->close();
?>
