<?php
// **********************************************************************************
// **                                                                              **
// ** menu.php                                      (c) Wolfram Plettscher 10/2014 **
// **                                                                              **
// **********************************************************************************
include "inc/menuhref.inc";

echo "<ul>";

	// Menu "Home"
	href ($section, "home", "Home", "index.php?section=home");

	// Menu "Time" with submenus
	$li = "<li class='has-sub'>";
	if (($section == "task") || ($section == "travel")){
		// Highlight Top-Menu
		$li = "<li class='active has-sub'>";
	}
	echo $li;
	hrefsub ("Time", "#");
		echo "<ul>";		
			href ($section, "task", "Task", "index.php?section=task");
			href ($section, "travel", "Travel", "index.php?section=travel");
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
			href ($section, "task2", "Task1", "index.php?section=task2");
			href ($section, "task2", "Task2", "index.php?section=task2");
		echo "</ul>";
	echo "</li>";

	// Menu "People" with submenus
	$li = "<li class='has-sub'>";
	if (($section == "people") || ($section == "people")){
		// Highlight Top-Menu
		$li = "<li class='active has-sub'>";
	}
	echo $li;
	hrefsub ("People", "#");
		echo "<ul>";		
			href ($section, "people", "People1", "index.php?section=people");
			href ($section, "people", "People2", "index.php?section=people");
		echo "</ul>";
	echo "</li>";

	// Menu "Admin" with submenus
	$li = "<li class='has-sub'>";
	if (($section == "admin") || ($section == "user") || ($section == "impressum")){
		// Highlight Top-Menu
		$li = "<li class='active has-sub'>";
	}
	echo $li;
	hrefsub ("Admin", "#");
		echo "<ul>";		
			href ($section, "admin", "Admin1", "index.php?section=admin");
			href ($section, "admin", "Admin2", "index.php?section=admin");
			href ($section, "user", "Benutzer", "index.php?section=user");
			href ($section, "impressum", "Impressum", "index.php?section=impressum");
		echo "</ul>";
	echo "</li>";
	

	// Menu "Logout"
	href ($section, "logout", "Logout", "logout.php");
   
echo "</ul></br>";
?>