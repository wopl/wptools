<!-- ---------------------------------------------------------------------------- -->
<!--                                                                              -->
<!-- sites.php                                     (c) Wolfram Plettscher 09/2014 -->
<!--                                                                              -->
<!-- ---------------------------------------------------------------------------- -->

<?php

	switch ($section)
	{
//		case "workplace":
//			include ("workplace.php");
//			break;
//		case "workplace2":
//			include ("workplace2.php");
//			break;
//		case "workplace3":
//			include ("workplace3.php");
//			break;
//		case "workplace4":
//			include ("workplace4.php");
//			break;
		case "travel":
			include ("travel.php");
			break;
//		case "about":
//			include ("about.php");
//			break;
//		case "contact":
//			include ("contact.php");
//			break;
//		case "database":
//			include ("database.php");
//			break;
		case "passwd":
			include ("passwd.php");
			break;
		case "projsel":
			include ("projsel.php");
			break;
		case "user":
			if ($_SESSION['usergroup'] == "root")
				include ("user.php");
			else
				include ("home.php");
			break;
//		case "customer":
//			include ("customer.php");
//			break;
//		case "customer2":
//			include ("customer2.php");
//			break;
//		case "worksteps":
//			include ("worksteps.php");
//			break;
//		case "reports":
//			include ("reports.php");
//			break;
		case "logout":
			include ("logout.php");
			break;
		case "impressum":
			include ("impressum.php");
			break;
		default:
			include ("home.php");
	}
?>