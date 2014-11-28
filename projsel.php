<!-- ---------------------------------------------------------------------------- -->
<!--                                                                              -->
<!-- projsel.php                                   (c) Wolfram Plettscher 11/2014 -->
<!--                                                                              -->
<!-- ---------------------------------------------------------------------------- -->

<h1>Project Selection</h1>

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

	$myselect = $_POST['select'];
	$mydefault = $_POST['default'];

if (isset($_POST['submit'])) {

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

// This path will be executed after sql update (to update all values on screen based on selection)
// Currently there is no extra action needed; refresh of screen is done at this moment
//if (isset($_POST['sqldone'])) {
//	echo "</br> POST = abc </br>";
//}


//-----------------------------------------------------------------------------------
// show user-project assignements                                                      ---
//-----------------------------------------------------------------------------------
$query = $mysqli->query ("SELECT projid, projshort, defaultproj FROM user2proj
						  WHERE usershort = '$myuser' ");

echo "<form action='index.php?section=projsel' method='post'>"; 

echo "<table class='sqltable' border='0' cellspacing='0' cellpadding='2' >\n";

echo "<tr>
	<th> Select </th>
	<th> Default </th>
	<th> Proj.-ID </th>
	<th> Project </th>
	</tr>\n";
	
while ($result = $query->fetch_object())
	{
	echo "<tr>";

	if ($result->projid == $_SESSION['projid'])
		echo "<td>" . "<input type='radio' name='select' value='{$result->projid}' checked/>" . "</td>";
	else
		echo "<td>" . "<input type='radio' name='select' value='{$result->projid}' />" . "</td>";

	if ($result->defaultproj == '1' )
		echo "<td>" . "<input type='radio' name='default' value='{$result->projid}' checked/>" . "</td>";
	else
		echo "<td>" . "<input type='radio' name='default' value='{$result->projid}' />" . "</td>";

	echo "<td>" . "{$result->projid}" . "</td>"
		. "<td>" . "{$result->projshort}" . "</td>"
		. "</tr>";
	}
echo "</table><br /><br />";
echo "<input class='css_btn_class' name='submit' type='submit' value='submit' />";
echo "</form>";

?>

<?php
$result->close();
$mysqli -> close();
?>

