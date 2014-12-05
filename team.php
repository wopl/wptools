<!-- ---------------------------------------------------------------------------- -->
<!--                                                                              -->
<!-- team.php                                      (c) Wolfram Plettscher 12/2014 -->
<!--                                                                              -->
<!-- ---------------------------------------------------------------------------- -->

<h1>Project Team</h1>

<?php
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
$myprojid = $_SESSION['projid'];

//$myselect = $_POST['select'];
//$mydefault = $_POST['default'];

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
// show team members                                                              ---
//-----------------------------------------------------------------------------------
$query = $mysqli->query ("SELECT teamid, firstname, lastname, company, location, dept, email, phone, position
						  FROM team
						  WHERE projid = '$myprojid'
						  ORDER BY lastname ASC, firstname ASC ");

// echo "<form action='index.php?section=team' method='post'>"; 

echo "<form action = 'index.php?section=teamedit' method='post'>";
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
		. "<td>" . "<input type='hidden' id='uid1' name='r_teamid' value=" . "'{$result->teamid}'" . "></td>"
		. "<td>" . "<input class='css_btn_class' name='edit' type='submit' value='edit' />" . "</td>"
		. "</tr>";

	}
echo "</table><br /><br />";
echo "</form>";

echo "<form action='index.php?section=teamedit' method='post'>";
echo "<input class='css_btn_class' name='new' type='submit' value='new' />";
echo "</form>";

?>

<?php
$mysqli->close();
?>

