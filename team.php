<!-- ---------------------------------------------------------------------------- -->
<!--                                                                              -->
<!-- team.php                                      (c) Wolfram Plettscher 01/2015 -->
<!--                                                                              -->
<!-- ---------------------------------------------------------------------------- -->

<?php

//echo "<h1>Project Team</h1>";

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
// react on previously pushed button to update mySQL database                     ---
//-----------------------------------------------------------------------------------

$myuser = $_SESSION['usershort'];
$myuserid = $_SESSION['userid'];
$myprojid = $_SESSION['projid'];
$mygrouping = "1";

//-----------------------------------------------------------------------------------
// show team members without grouping                                             ---
//-----------------------------------------------------------------------------------
if ($mygrouping == "0") {
	echo "<h1>Project Team</h1>";
	$query = $mysqli->query ("SELECT teamid, firstname, lastname, company, location, dept, email, phone, position
							  FROM team
							  WHERE projid = '$myprojid'
							  ORDER BY lastname ASC, firstname ASC ");
	
	echo "<table class='sqltable' border='0' cellspacing='0' cellpadding='2' >\n";
	
	echo "<tr>
		<th> Lastname </th>
		<th> Firstname </th>
		<th> Company </th>
		<th> Department </th>
		<th> Position </th>
		<th> Location </th>
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
			. "<td>" . "{$result->dept}" . "</td>"
			. "<td>" . "{$result->position}" . "</td>"
			. "<td>" . "{$result->location}" . "</td>"
			. "<td>" . "{$result->email}" . "</td>"
			. "<td>" . "{$result->phone}" . "</td>"
			. "<form action='index.php?section=teamedit' method='post'>" 
				. "<td>" . "<input type='hidden' id='uid1' name='r_teamid' value=" . "'{$result->teamid}'" . "></td>"
				. "<td>" . "<input class='css_btn_class' name='edit' type='submit' value='edit' />" . "</td>"
			. "</form>"
			. "</tr>";
		}
	echo "</table><br /><br />";
	
	echo "<form action='index.php?section=teamedit' method='post'>";
	echo "<input class='css_btn_class' name='new' type='submit' value='new' />";
	echo "</form>";
	
}

//-----------------------------------------------------------------------------------
// show team members with grouping                                                ---
//-----------------------------------------------------------------------------------
if ($mygrouping == "1") {

	$query2 = $mysqli2->query ("SELECT groupid, name
							  FROM projgroup
							  WHERE projid = '$myprojid'
							  ORDER BY name ASC ");

	while ($result2 = $query2->fetch_object()) {
		$mygroupid = "{$result2->groupid}";

		echo "<h2>Group: "	. "$mygroupid {$result2->name}" . "</h2>";
		$query = $mysqli->query ("SELECT t.teamid, t.firstname, t.lastname, t.company, t.location, t.dept, t.email, t.phone, t.position, tg.role, tg.remarks
								  FROM team t, team2group tg
								  WHERE tg.groupid = '$mygroupid'
								  AND tg.projid = '$myprojid'
								  AND t.projid = '$myprojid'
								  AND tg.teamid = t.teamid
								  ORDER BY t.lastname ASC, t.firstname ASC ");

//		$query = $mysqli->query ("SELECT teamid, firstname, lastname, company, location, dept, email, phone, position
//								  FROM team
//								  WHERE projid = '$myprojid'
//								  ORDER BY lastname ASC, firstname ASC ");
		
		echo "<table class='sqltable3' border='0' cellspacing='0' cellpadding='2' >\n";
		
		echo "<tr>
			<th> Lastname </th>
			<th> Firstname </th>
			<th> Company </th>"
//			. "<th> Department </th>"
			. "<th> Position </th>"
//			. "<th> Location </th>"
//			. "<th> E-Mail </th>"
//			. "<th> Phone </th>"
//			. "<th> Role </th>"
//			. "<th> Remarks </th>"
			. "<th></th>
			<th></th>
			<th></th>
			<th></th>
			</tr>\n";
			
		while ($result = $query->fetch_object())
			{
			echo "<tr>";
			echo "<td>" . "{$result->lastname}" . "</td>"
				. "<td>" . "{$result->firstname}" . "</td>"
				. "<td>" . "{$result->company}" . "</td>"
//				. "<td>" . "{$result->dept}" . "</td>"
				. "<td>" . "{$result->position}" . "</td>"
//				. "<td>" . "{$result->location}" . "</td>"
//				. "<td>" . "{$result->email}" . "</td>"
//				. "<td>" . "{$result->phone}" . "</td>"
				. "</tr><tr>"
				. "<form action='index.php?section=team' method='post'>"
					. "<td>Role: </td>" 
					. "<td colspan='7'>" . "<input type='input' id='uid1' name='r_role' size='130' value=" . "'{$result->role}'" . "></td></tr><tr>"
					. "<td>Remarks: </td>"
					. "<td colspan='3'>" . "<input type='input' id='uid2' name='r_remarks' size='100' value=" . "'{$result->remarks}'" . "></td>"
					. "<td>" . "<input type='hidden' id='uid3' name='r_teamid' value=" . "'{$result->teamid}'" . "></td>"
					. "<td>" . "<input class='css_btn_class' name='update' type='submit' value='update' />" . "</td>"
				. "</form>"
				. "<form action='index.php?section=teamedit' method='post'>" 
					. "<td>" . "<input type='hidden' id='uid1' name='r_teamid' value=" . "'{$result->teamid}'" . "></td>"
					. "<td>" . "<input class='css_btn_class' name='edit' type='submit' value='edit' />" . "</td>"
				. "</form>"
				. "</tr>";
			}
		echo "</table><br /><br />";
		
	}
	echo "<form action='index.php?section=teamedit' method='post'>";
	echo "<input class='css_btn_class' name='new' type='submit' value='new' />";
	echo "</form>";
}

?>

<?php
$mysqli->close();
$mysqli2->close();
?>

