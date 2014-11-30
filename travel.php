<!-- ---------------------------------------------------------------------------- -->
<!--                                                                              -->
<!-- travel.php                                    (c) Wolfram Plettscher 11/2014 -->
<!--                                                                              -->
<!-- ---------------------------------------------------------------------------- -->

<h1>Travel Notes</h1>

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

	$myuserid = $_SESSION['userid'];
	$myusershort = $_SESSION['usershort'];

	$myid = $_POST['id'];
	$mydatestart = $_POST['date_start'];
	$mytimestart = $_POST['time_start'];
	$mykmstart = $_POST['km_start'];
	$mydateend = $_POST['date_end'];
	$mytimeend = $_POST['time_end'];
	$mykmend = $_POST['km_end'];
	$myroute = $_POST['route'];
	$mypurpose = $_POST['purpose'];
	
if (isset($_POST['new'])) {
	$query = $mysqli->query ("	INSERT INTO travel	(id, userid, usershort, date_start, time_start, km_start,
													 date_end, time_end, km_end, route, purpose)
								VALUES				('$myid', '$myuserid', '$myusershort', '$mydatestart', '$mytimestart', '$mykmstart',
													 '$mydateend', '$mytimeend', '$mykmend', '$myroute', '$mypurpose')");

} elseif (isset($_POST['delete'])) {
	$query = $mysqli->query ("DELETE FROM travel WHERE id='$myid'");

} elseif (isset($_POST['change'])) {
	$query = $mysqli->query ("UPDATE travel SET
		 date_start='$mydatestart',
		 time_start='$mytimestart',
		 km_start='$mykmstart',
		 date_end='$mydateend',
		 time_end='$mytimeend',
		 km_end='$mykmend',
		 route='$myroute',
		 purpose='$mypurpose'
		 WHERE id='$myid'");
} 

//-----------------------------------------------------------------------------------
// show user-table                                                      ---
//-----------------------------------------------------------------------------------
$query = $mysqli->query ("SELECT id, date_start, time_start, km_start, date_end, time_end, km_end, route, purpose
						  FROM travel
						  WHERE userid = '$myuserid'
						  ORDER BY date_start DESC, time_start DESC");

echo "<table class='sqltable' border='0' cellspacing='0' cellpadding='2' >\n";

echo "<tr>
	<th> Start </th>
	<th> Time </th>
	<th> km/mls </th>
	<th> End </th>
	<th> Time </th>
	<th> km/mls </th>
	<th> Distance </th>
	<th> Route </th>
	<th> Comment </th>
	<th> ID </th>
	<th></th>
	<th></th>
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
	$mydistance = $result->km_end - $result->km_start;
		
	echo "<tr><td>" . "{$result->date_start}" . "</td>"
		. "<td>" . "{$result->time_start}" . "</td>"
		. "<td>" . "{$result->km_start}" . "</td>"
		. "<td>" . "{$result->date_end}" . "</td>"
		. "<td>" . "{$result->time_end}" . "</td>"
		. "<td>" . "{$result->km_end}" . "</td>"
		. "<td>" . "{$mydistance}" . "</td>"
		. "<td>" . "{$result->route}" . "</td>"
		. "<td>" . "{$result->purpose}" . "</td>"
		. "<td>" . "{$result->id}" . "</td>"
		. "<form action='index.php?section=travel' method='post'>" 
			. "<td>" . "<input type='hidden' id='uid1' name='r_id' value=" . "'{$result->id}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid2' name='r_date_start' value=" . "'{$result->date_start}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid3' name='r_time_start' value=" . "'{$result->time_start}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid4' name='r_km_start' value=" . "'{$result->km_start}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid5' name='r_date_end' value=" . "'{$result->date_end}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid6' name='r_time_end' value=" . "'{$result->time_end}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid7' name='r_km_end' value=" . "'{$result->km_end}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid8' name='r_route' value=" . "'{$result->route}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid9' name='r_purpose' value=" . "'{$result->purpose}'" . "></td>"
			. "<td>" . "<input class='css_btn_class' type='submit' value='edit' />" . "</td>"
		. "</form>"
		. "</tr>";
	}
echo "</table><br /><br />";
?>

<form action="index.php?section=travel" method="post">

	<table>
    	<tr>
         	<td>ID: </td>
        	<td><input type="text" name="id" size="10" value="<?php echo $_POST["r_id"]; ?>" maxlength="30" tabindex="1" readonly/></td>
        </tr><tr>
	       	<td>Start Date: </td>
        	<td><input type="date" name="date_start" size="10" value="<?php echo $_POST["r_date_start"]; ?>" maxlength="30" tabindex="2"/></td>
        	<td>Time: </td>
        	<td><input type="time" name="time_start" size="10" value="<?php echo $_POST["r_time_start"]; ?>" maxlength="64" tabindex="3"/></td>
        	<td>km/mls: </td>
        	<td><input type="text" name="km_start" size="10" value="<?php echo $_POST["r_km_start"]; ?>" maxlength="64" tabindex="4"/></td>
        </tr><tr>
	       	<td>End Date: </td>
        	<td><input type="date" name="date_end" size="10" value="<?php echo $_POST["r_date_end"]; ?>" maxlength="30" tabindex="5"/></td>
        	<td>Time: </td>
        	<td><input type="time" name="time_end" size="10" value="<?php echo $_POST["r_time_end"]; ?>" maxlength="64" tabindex="6"/></td>
        	<td>km/mls: </td>
        	<td><input type="text" name="km_end" size="10" value="<?php echo $_POST["r_km_end"]; ?>" maxlength="64" tabindex="7"/></td>
        </tr><tr>
        	<td>Route: </td>
        	<td colspan="5"><input type="text" name="route" size="60" value="<?php echo $_POST["r_route"]; ?>" maxlength="64" tabindex="8"/></td>
        </tr><tr>
        	<td>Comment: </td>
        	<td colspan="5"><input type="text" name="purpose" size="60" value="<?php echo $_POST["r_purpose"]; ?>" maxlength="64" tabindex="9"/></td>
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

