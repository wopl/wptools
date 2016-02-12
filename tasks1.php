<?php
// **********************************************************************************
// **                                                                              **
// ** tasks1                                        (c) Wolfram Plettscher 01/2016 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

echo "<h1>Tasks / Issues</h1>";

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

$myacc = $_SESSION['account'];
$myprojid = $_SESSION['projid'];

$_SESSION['kicker'] = "";

if (!isset ($_POST['dcheck'])) $_POST['dcheck'] = '';

//-----------------------------------------------------------------------------------
// react on previously pushed button to update mySQL database                                                     ---
//-----------------------------------------------------------------------------------

if (isset($_POST['confirm'])) {
	$myissueselect = $_POST['IssueSelection'];

	if ($_POST['dcheck'])
		$mydetails = "checked";
	else
		$mydetails = "";
} else {
	$myissueselect = "";
	$mydetails = "";
}

//-----------------------------------------------------------------------------------
// Menu for Issue type selection                                                   ---
//-----------------------------------------------------------------------------------
?>
<form method='post'>
    <table>
    	<tr>
 		<td><b>select Issue type: </b></td>
		<td colspan="4">
<?php

// Generate drop down list to select issue type(s)
		echo "<select class='selectbox' name='IssueSelection'>";

		// first line of Drop-Down Box should show "all_issuess"
		if ($myissueselect == "" || $myissueselect == "all_issues")
			{
	        echo "<option value='all_issues' selected>all issues</option>";
//			$myhubame = "All Countries";
			}
		else
	        echo "<option value='all_issues'>all issues</option>";

		// second line line of Drop-Down Box should show "all_issuess" including inactive ones
		if ($myissueselect == "all_issues+")
	        echo "<option value='all_issues+' selected>all issues+</option>";
		else
	        echo "<option value='all_issues+'>all issues+</option>";

		// following lines of Drop-Down Box are selected from keyval table
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
//				$mycountryid = $result2->country_id;
//				$mycountryname = $result2->country_name;
				}
			else
				{
				echo "<option value='{$result2->value}'>{$result2->value}</option>";
				}
			}

		echo "</select>";
		echo "</td>";
 		echo "<td><b>details: </b></td>";
		echo "<td><input type='checkbox' id='dcheck' name='dcheck' $mydetails/></td>";
		echo "<td><input type='hidden' id='uid1' name='r_issue' value='$myissueselect' /></td>";
		echo "<td><input class='css_btn_class' name='confirm' type='submit' value='confirm' formaction='index.php?section=tasks1' /></td>";
		echo "</tr>";

	echo "</table>";
echo "</form>";

//-----------------------------------------------------------------------------------
// show tasks-table                                                               ---
//-----------------------------------------------------------------------------------
//$query = $mysqli->query ("SELECT entity_id, entity_name FROM entity ORDER BY entity_name");

// Depending on issue-type, we will show subsets of the issues
	if ($myissueselect == "" || $myissueselect == "all_issues")
		{
		$query = $mysqli->query ("SELECT task1_uuid, task_date, task_type, category, subcat, severity, status, topic, duedate, owner
								  FROM task1
								  WHERE task_active = '1'
								  AND proj_uuid = '$myprojid'
								  AND acc_uuid = '$myacc'
								  ORDER BY task_date DESC, task_time DESC");
		}
	elseif ($myissueselect == "all_issues+")
		{
		$query = $mysqli->query ("SELECT task1_uuid, task_date, task_type, category, subcat, severity, status, topic, duedate, owner
								  FROM task1
								  WHERE proj_uuid = '$myprojid'
								  AND   acc_uuid = '$myacc'
								  ORDER BY task_date DESC, task_time DESC");
		}
	elseif ($myissueselect == "not_assigned")
		{
		$query = $mysqli->query ("SELECT task1_uuid, task_date, task_type, category, subcat, severity, status, topic, duedate, owner
								  FROM task1
								  WHERE (task_type IS NULL OR task_type = '')
								  AND task_active = '1'
								  AND proj_uuid = '$myprojid'
								  AND acc_uuid = '$myacc'
								  ORDER BY task_date DESC, task_time DESC");
		}
	else
		{
		$query = $mysqli->query ("SELECT task1_uuid, task_date, task_type, category, subcat, severity, status, topic, duedate, owner
								  FROM task1
								  WHERE task_type = '$myissueselect'
								  AND task_active = '1'
								  AND proj_uuid = '$myprojid'
								  ORDER BY task_date DESC, task_time DESC");
		}

echo "<table width='100%' class='sqltable' border='0' cellspacing='0' cellpadding='2' >\n";

echo "<tr>
	<th> ID </th>
	<th> Date Raised </th>
	<th> Type </th>
	<th> RAG </th>
	<th> Status </th>
	<th> Cat </th>
	<th> SubCat </th>
	<th width='70%'> Topic </th>
	<th> Due Date </th>
	<th> Owner </th>
	<th></th>
	<th></th>
	</tr>\n";
	
while ($result = $query->fetch_object())
	{
	echo "<tr>";
	echo "<td>" . "{$result->task1_uuid}" . "</td>";
	echo "<td><b>" . "{$result->task_date}" . "</b></td>";
	echo "<td>" . "{$result->task_type}" . "</td>";

	switch ($result->severity) {
		case 'green':
			$tdseverity = "<td><img src='pics/status_green.png' width='18' height='18' alt='green' /></td>";
			break;
		case 'amber':
			$tdseverity = "<td><img src='pics/status_orange.png' width='18' height='18' alt='amber' /></td>";
			break;
		case 'red':
			$tdseverity = "<td><img src='pics/status_red.png' width='18' height='18' alt='red' /></td>";
			break;
		case 'blue':
			$tdseverity = "<td><img src='pics/status_blue.png' width='18' height='18' alt='blue' /></td>";
			break;
		case 'grey':
			$tdseverity = "<td><img src='pics/status_grey.png' width='18' height='18' alt='grey' /></td>";
			break;
		default:
			$tdseverity = "<td></td>";
	}
	echo $tdseverity;

//	echo "<td>" . "{$result->severity}" . "</td>";
	echo "<td>" . "{$result->status}" . "</td>";
	echo "<td>" . "{$result->category}" . "</td>";
	echo "<td>" . "{$result->subcat}" . "</td>";

	// Prepare topic to be displayed with additional details from tasks2 table
	$mytopic = "<b>" . $result->topic . "</b>";
	if ($mydetails != "")
		{
		$mytaskid = $result->task1_uuid;
		$query2 = $mysqli2->query ("SELECT task2_uuid, task2_date, remarks
								  FROM task2
								  WHERE task1_uuid = '$mytaskid'
								  ORDER BY task2_date DESC, task2_time DESC");
		while ($result2 = $query2->fetch_object())
			{
			$mytopic .= "<br><b>" . $result2->task2_date . ":</b> $result2->remarks";
			}
		$mytopic .= "<br>&nbsp";
		}

	echo "<td>" . "{$mytopic}" . "</td>";
	echo "<td>" . "{$result->duedate}" . "</td>";
	echo "<td>" . "{$result->owner}" . "</td>";

	echo "<form action='index.php?section=tasks2' method='post'>" 
			. "<td>" . "<input type='hidden' id='uid1' name='r_id' value=" . "'{$result->task1_uuid}'" . "></td>"
			. "<td>" . "<input class='css_btn_class' name='select' type='submit' value='select' />" . "</td>"
		. "</form>"
		. "</tr>";
	}
echo "</table><br /><br />";

$mysqli->close();
$mysqli2->close();
?>

