<?php
// **********************************************************************************
// **                                                                              **
// ** projsel.php                                   (c) Wolfram Plettscher 01/2016 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

echo "<h1>Project Selection</h1>";

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
// set values to '', if not previously set                                        ---
//-----------------------------------------------------------------------------------

	$myacc = $_SESSION['account'];
	$myuser = $_SESSION['userid'];

	if (!isset ($_POST['select'])) $_POST['select'] = '';
	if (!isset ($_POST['default'])) $_POST['default'] = '';

	$myselect = $_POST['select'];
	$mydefault = $_POST['default'];

if (isset($_POST['submit']) || isset($_POST['editgroups'])) {

	// select selected project
	$query = $mysqli->query ("SELECT proj_uuid, projshort
							  FROM user2proj
							  WHERE user_uuid = '$myuser'
							  AND	acc_uuid = '$myacc'
							  AND   proj_uuid = '$myselect'
							  ORDER BY defaultproj DESC, projshort ASC
							 ");
	if ($result = $query->fetch_object()) {
//		$_SESSION['project'] = "Project: " . "{$result->projshort}";
		$_SESSION['projid'] = "{$result->proj_uuid}";
	}
    $myprojid = $result->proj_uuid;

	// select long name for selected project
	$query = $mysqli->query ("SELECT projlong
							  FROM project
							  WHERE proj_uuid = '$myprojid'
							 ");
	if ($result = $query->fetch_object()) {
		$_SESSION['project'] = "Project: " . "{$result->projlong}";
	}

	// update default project into db
	$query = $mysqli->query ("UPDATE user2proj SET
		 defaultproj = FALSE
		 WHERE user_uuid = '$myuser'
		 AND acc_uuid = '$myacc'");
		 
	$query = $mysqli->query ("UPDATE user2proj SET
		 defaultproj = TRUE
		 WHERE user_uuid = '$myuser'
		 AND acc_uuid = '$myacc'
		 AND proj_uuid = '$mydefault'");

	// now we need to refresh the screen; therefore these javascript lines
	// switch to 'Project-Groups' form if this button was pressed
	$mysqli->close();
	echo "<body onLoad='document.form1.submit()'>";
	if (isset($_POST['submit']))
		echo "<form name='form1' method='post' action='index.php?section=projsel'>";
	else
		echo "<form name='form1' method='post' action='index.php?section=projgroups'>";
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
$query = $mysqli->query ("SELECT proj_uuid, projshort, defaultproj FROM user2proj
						  WHERE user_uuid = '$myuser'
						  ORDER by proj_uuid ASC ");

echo "<form method='post' action='index.php?section=projsel'>"; 

echo "<table class='sqltable' border='0' cellspacing='0' cellpadding='2' >\n";

echo "<tr>
	<th> Select </th>
	<th> Default </th>
	<th> Proj.-ID </th>
	<th> Project </th>
	</tr>\n";
	
while ($result = $query->fetch_object())
	{
	// now select for this element the long-name of project
	$myprojid = $result->proj_uuid;
	$query2 = $mysqli2->query ("SELECT projlong FROM project
							    WHERE proj_uuid = '$myprojid' ");
	$result2 = $query2->fetch_object();
		
	echo "<tr>";

	if ($result->proj_uuid == $_SESSION['projid'])
		echo "<td>" . "<input type='radio' name='select' value='{$result->proj_uuid}' checked>" . "</td>";
	else
		echo "<td>" . "<input type='radio' name='select' value='{$result->proj_uuid}' >" . "</td>";

	if ($result->defaultproj == '1' )
		echo "<td>" . "<input type='radio' name='default' value='{$result->proj_uuid}' checked>" . "</td>";
	else
		echo "<td>" . "<input type='radio' name='default' value='{$result->proj_uuid}' >" . "</td>";

	echo "<td>" . "{$result->proj_uuid}" . "</td>"
		. "<td>" . "{$result2->projlong}" . "</td>"
		. "</tr>";
	}
echo "</table><br /><br />";

?>

    <table>
        <tr>
        <td><input class='css_btn_class' name='submit' type='submit' value='submit' /></td>
        <td><input class='css_btn_class' name='editgroups' type='submit' value='edit groups' /></td>
        </tr>
    </table>
</form>

<?php
$mysqli->close();
?>

