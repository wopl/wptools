<?php
// **********************************************************************************
// **                                                                              **
// ** menuhref.inc                                  (c) Wolfram Plettscher 11/2014 **
// **                                                                              **
// **********************************************************************************

function href ($section, $sect, $menu, $ref, $group)
{
	// first check, if menu should be displayed for this group of users
	if (($group == "all") || ($_SESSION['usergroup'] == $group))
	{
		// Prepare Menu-entries in CSS Menu
		// Highlight, if the right section is selected

		if ($section == $sect){
			echo "<li class='active'>";
		} else {
			echo "<li>";
		}
		// finally set href-link and menu name and display
		hrefsub ($menu, $ref);
		echo "</li>\r\n";
	}
}

function hrefsub ($menu, $ref)
{
	$ref = addsslproxy ($ref);
		
	// finally set href-link and menu name and display
	echo "<a href='$ref'><span>$menu</span></a>\r\n";
}

function addsslproxy ($ref)
{
    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

	// add HostEurope SSL-Proxy to href
	$ref = 'https://ssl.webpack.de/' .
		$hostname .
		($path == '/' ? '' : $path) .
		'/' .
		$ref;
		
	return $ref;
}

?>
