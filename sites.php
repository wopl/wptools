<?php
// **********************************************************************************
// **                                                                              **
// ** sites.php                                     (c) Wolfram Plettscher 01/2015 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

	switch ($section)
	{

// **********************************************************************************
// ** Menu: Time

		case "travel":
			include ("travel.php");
			break;

// **********************************************************************************
// ** Menu: Tasks

//		case "task":
//			include ("task.php");
//			break;
			
// **********************************************************************************
// ** Menu: People

		case "team":
			include ("team.php");
			break;
		case "team4":
			include ("team4.php");
			break;
		case "teamedit":
			include ("teamedit.php");
			break;
		case "teamassign":
			include ("teamassign.php");
			break;

// **********************************************************************************
// ** Menu: Admin

		case "passwd":
			include ("passwd.php");
			break;
		case "projsel":
			include ("projsel.php");
			break;
		case "projgroups":
			include ("projgroups.php");
			break;
		case "user":
			if ($_SESSION['usergroup'] == "root")
				include ("user.php");
			else
				include ("home.php");
			break;
		case "impressum":
			include ("impressum.php");
			break;

// **********************************************************************************
// ** Menu: Logout

		case "logout":
			include ("logout.php");
			break;

// **********************************************************************************
// ** default

		default:
			include ("home.php");
	}
?>