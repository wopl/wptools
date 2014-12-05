<?php
// **********************************************************************************
// **                                                                              **
// ** menu.php                                      (c) Wolfram Plettscher 10/2014 **
// **                                                                              **
// **********************************************************************************
include "inc/menuhref.inc";

// clear Kicker box if menu is selected
$_SESSION['kicker'] = "";

echo "<ul>";

	// Menu "Home"
	href ($section, "home", "Home", "index.php?section=home", "all");

	// Menu "Time" with submenus
	$li = "<li class='has-sub'>";
	if (($section == "task") || ($section == "travel")){
		// Highlight Top-Menu
		$li = "<li class='active has-sub'>";
	}
	echo $li;
	hrefsub ("Time", "#");
		echo "<ul>";		
//			href ($section, "task", "Task", "index.php?section=task");
			href ($section, "travel", "Travel", "index.php?section=travel", "all");
		echo "</ul>";
	echo "</li>";
	
	// Menu "Tasks" with submenus
	$li = "<li class='has-sub'>";
	if (($section == "task2") || ($section == "task2")){
		// Highlight Top-Menu
		$li = "<li class='active has-sub'>";
	}
	echo $li;
	hrefsub ("Tasks", "#");
		echo "<ul>";		
			href ($section, "task2", "Task1", "index.php?section=task2", "all");
			href ($section, "task2", "Task2", "index.php?section=task2", "all");
		echo "</ul>";
	echo "</li>";

	// Menu "People" with submenus
	$li = "<li class='has-sub'>";
	if (($section == "team") || ($section == "teamgroups") || ($section == "teamedit")){
		// Highlight Top-Menu
		$li = "<li class='active has-sub'>";
	}
	echo $li;
	hrefsub ("People", "#");
		echo "<ul>";		
			href ($section, "team", "Project Team List", "index.php?section=team", "all");
			href ($section, "teamedit", "New Project Member", "index.php?section=teamedit", "all");
			href ($section, "teamgroups", "Edit Team Groups", "index.php?section=teamgroups", "all");
		echo "</ul>";
	echo "</li>";

	// Menu "Admin" with submenus
	$li = "<li class='has-sub'>";
	if (($section == "passwd") ||
		($section == "projsel") ||
		($section == "user") ||
		($section == "impressum")){
		// Highlight Top-Menu
		$li = "<li class='active has-sub'>";
	}
	echo $li;
	hrefsub ("Admin", "#");
		echo "<ul>";		
			href ($section, "passwd", "Change Password", "index.php?section=passwd", "all");
			href ($section, "projsel", "Project Selection", "index.php?section=projsel", "all");
			href ($section, "user", "User", "index.php?section=user", "root");
			href ($section, "impressum", "Impressum", "index.php?section=impressum", "all");
		echo "</ul>";
	echo "</li>";
	

	// Menu "Logout"
	href ($section, "logout", "Logout", "logout.php", "all");
   
echo "</ul></br>";
?>