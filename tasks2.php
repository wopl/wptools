<?php
// **********************************************************************************
// **                                                                              **
// ** tasks2.php                                    (c) Wolfram Plettscher 12/2015 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

echo "<h1>Tasks / Issues Details</h1>";

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
// react on previously pushed button to update mySQL database                                                     ---
//-----------------------------------------------------------------------------------

// $myentityid = $_POST['r_entityid'];

if (isset($_POST['select'])) {
	$mytaskid = $_POST['r_id'];
//	echo "Taskid: $mytaskid";
}

if (isset($_POST['rem_update'])) {
	$mytaskid = $_POST['r_task1id'];
	$mytask2id = $_POST['r_task2id'];
	$mydate = $_POST['r_task2date'];
	$myremarks = $_POST['r_task2rem'];
	
	if ($mydate == '')
		$query = $mysqli->query ("UPDATE task2 SET
		 task2_date = NULL,
		 remarks = '$myremarks'
		 WHERE id = '$mytask2id'");
	else
		$query = $mysqli->query ("UPDATE task2 SET
		 task2_date = '$mydate',
		 remarks = '$myremarks'
		 WHERE id = '$mytask2id'");
	
//	$query = $mysqli->query ("UPDATE task2 SET
//		 task2_date = " . (is_null($mydate) ? 'NULL' : '$mydate') . ",
//		 remarks = '$myremarks'
//		 WHERE id = '$mytask2id'");
}

if (isset($_POST['new_rem'])) {
	$mytaskid = $_POST['r_taskid'];

	$query = $mysqli->query ("	INSERT INTO task2	(task1_id, task2_date, remarks)
								VALUES				('$mytaskid', NOW(), 'new')");
}

if (isset($_POST['del_rem'])) {
	$mytaskid = $_POST['r_taskid'];

	$query = $mysqli->query ("DELETE FROM task2
							  WHERE task1_id='$mytaskid'
							  AND task2_date is NULL
							  AND remarks = ''");
}

// create new issue on task1 with type = ''
if (isset($_POST['new'])) {
	$mytaskid = $_POST['r_taskid'];

	$query = $mysqli->query ("	INSERT INTO task1	(task_date, task_type, topic)
								VALUES				(NOW(), 'generic', 'new')");

	// query id of latest inserted record
	$query = $mysqli->query ("SELECT id
							 FROM task1
							 WHERE topic = 'new'
							 ORDER BY id DESC");
	$result = $query->fetch_object();
	$mytaskid = $result->id;
}

// update task1 from input fields
if (isset($_POST['change'])) {
	$mytaskid = $_POST['r_taskid'];

	$mysqlupdate = "UPDATE task1 SET";
	$mysqlupdate .= " task_date = '" . $_POST['taskdate'] . "',";
	$mysqlupdate .= " task_type = '" . $_POST['IssueSelection'] . "',";
	$mysqlupdate .= " category = '" . $_POST['category'] . "',";
	$mysqlupdate .= " subcat = '" . $_POST['subcat'] . "',";
	
	if ($_POST['resolveddate'] == '')
		$mysqlupdate .= " resolved_date = NULL,";
	else
		$mysqlupdate .= " resolved_date = '" . $_POST['resolveddate'] . "',";

	if ($_POST['taskactive'])
		$mysqlupdate .= " task_active = '1',";
	else
		$mysqlupdate .= " task_active = '0',";

	$mysqlupdate .= " severity = '" . $_POST['severity'] . "',";
	$mysqlupdate .= " status = '" . $_POST['status'] . "',";
	$mysqlupdate .= " owner = '" . $_POST['owner'] . "',";

	if ($_POST['duedate'] == '')
		$mysqlupdate .= " duedate = NULL,";
	else
		$mysqlupdate .= " duedate = '" . $_POST['duedate'] . "',";

//	$mysqlupdate .= " duedate = '" . $_POST['duedate'] . "',";
	$mysqlupdate .= " topic = '" . $_POST['topic'] . "'";
	$mysqlupdate .= " WHERE id = '$mytaskid';";
	
//	echo "$mysqlupdate";
	$query = $mysqli->query ($mysqlupdate);

}

//-----------------------------------------------------------------------------------
// select task from database                                                      ---
//-----------------------------------------------------------------------------------
$query = $mysqli->query ("SELECT task_date, task_type, category, subcat, resolved_date, task_active,
							severity, status, topic, owner, duedate
						 FROM task1
						 WHERE id = '$mytaskid'");
$result = $query->fetch_object();

$mytaskdate = $result->task_date;
$myissueselect = $result->task_type;
$mycategory = $result->category;
$mysubcat = $result->subcat;
$myresolveddate = $result->resolved_date;
$mytaskactive = $result->task_active;
$myseverity = $result->severity;
$mystatus = $result->status;
$mytopic = $result->topic;
$myowner = $result->owner;
$myduedate = $result->duedate;

//-----------------------------------------------------------------------------------
// Input fields and menu for Country selection                                                   ---
//-----------------------------------------------------------------------------------
?>
<form method='post'>
    <table width='100%'>
    	<tr>
	       	<td>Date: </td>
        	<td><input type="date" name="taskdate" value="<?php echo $mytaskdate; ?>" tabindex="1"/></td>
 		<td>Issue Type:</td>
		<td colspan="1">
<?php

// Generate drop down list to select group(s)
		echo "<select class='selectbox' name='IssueSelection'>";

		// lines of Drop-Down Box are selected from keyval table
		$query2 = $mysqli2->query ("SELECT value
							  FROM keyval
							  WHERE category = 'task'
							  AND mykey = 'type'
							  ORDER BY prio ASC");
		while ($result2 = $query2->fetch_object())
			{
			if ($myissueselect == $result2->value)
				{
				echo "<option value='{$result2->value}' selected>{$result2->value}</option>";
				}
			else
				{
				echo "<option value='{$result2->value}'>{$result2->value}</option>";
				}
			}

		echo "</select>";
		echo "</td>";
?>
	       	<td>Category: </td>
        	<td><input type="text" name="category" value="<?php echo $mycategory; ?>" tabindex="2"/></td>
	       	<td>SubCat: </td>
        	<td><input type="text" name="subcat" value="<?php echo $mysubcat; ?>" tabindex="3"/></td>
	       	<td>Resolved: </td>
        	<td><input type="date" name="resolveddate" value="<?php echo $myresolveddate; ?>" tabindex="4"/></td>
        	<td>Active: </td>

<?php            
			if ($mytaskactive == '1')
        		echo "<td><input type='checkbox' name='taskactive' checked tabindex='5'/></td>";
			else
        		echo "<td><input type='checkbox' name='taskactive' tabindex='5'/></td>";
?>

        </tr><tr>
	       	<td>Severity: </td>
        	<td><input type="text" name="severity" size="5" value="<?php echo $myseverity; ?>" maxlength="5" tabindex="6"/></td>
	       	<td>Status: </td>
        	<td><input type="text" name="status" size="10" value="<?php echo $mystatus; ?>" maxlength="10" tabindex="7"/></td>
	       	<td>Due Date: </td>
        	<td><input type="date" name="duedate" value="<?php echo $myduedate; ?>" tabindex="8"/></td>
	       	<td>Owner: </td>
        	<td colspan='3'><input type="text" name="owner" style='width:100%' value="<?php echo $myowner; ?>" maxlength="32" tabindex="9"/></td>
        </tr><tr>
	       	<td>Topic: </td>
        	<td colspan='9'><input type="text" name="topic" style='width:100%' value="<?php echo $mytopic; ?>" maxlength="255" tabindex="10"/></td>
			<td><input type="hidden" id="uid1" name="r_taskid" value="<?php echo $mytaskid; ?>"></td>
        </tr>
    </table>
	<br />
	<table>
    	<tr>
 		<td><input class='css_btn_class' name='change' type='submit' value='change issue' /></td>
 		<td><input class='css_btn_class' name='new' type='submit' value='new issue' /></td>
 		<td><input class='css_btn_class' name='new_rem' type='submit' value='new remarks' /></td>
 		<td><input class='css_btn_class' name='del_rem' type='submit' value='delete (empty) remarks' /></td>
        </tr>
    </table>

</form>

<?php


//-----------------------------------------------------------------------------------
// show Remarks (tasks2 - table)                                                   ---
//-----------------------------------------------------------------------------------
$query = $mysqli->query ("SELECT id, task2_date, remarks
						  FROM task2
						  WHERE task1_id = '$mytaskid'
						  ORDER BY task2_date DESC, id DESC");

echo "<table class='sqltable' border='0' cellspacing='0' cellpadding='2' width='100%'>\n";
$sqltable_even = false;

echo "<tr>
	<th width='10%'>Date </th>
	<th width='80%'>Remarks </th>
	<th></th>
	<th></th>
	<th></th>
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

	echo "<tr>";
	echo "<form method='post'>";

    echo "<td><input type='date' $mytableclass name='r_task2date' value=" . "'{$result->task2_date}'" . "/></td>"
    		. "<td><input type='text' $mytableclass style='width:100%' name='r_task2rem' value=" . "'{$result->remarks}'" . "/></td>"
			. "<td>" . "<input type='hidden' id='uid1' name='r_task1id' value=" . "'{$mytaskid}'" . "></td>"
			. "<td>" . "<input type='hidden' id='uid2' name='r_task2id' value=" . "'{$result->id}'" . "></td>"
			. "<td>" . "<input class='css_btn_class' name='rem_update' type='submit' value='update' formaction='index.php?section=tasks2'/>" . "</td>"
		. "</form>"
		. "</tr>";
	}

echo "</table><br /><br />";

$mysqli->close();
$mysqli2->close();
?>

