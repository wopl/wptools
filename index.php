<?php
// **********************************************************************************
// **                                                                              **
// ** index.php                                     (c) Wolfram Plettscher 10/2014 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

// effectively pages are loaded by section; index.php is a wrapper only
if (isset ($_GET["section"]))
	{
		$section = $_GET["section"];
	} else {
		$section = "";
	}
?>

<!-- ---------------------------------------------------------------------------- -->
<!-- start html page                                                              -->
<!-- ---------------------------------------------------------------------------- -->

<html>
	<head>
		<title>WP Tools</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
		<?php
			include ('css/menu.inc');
			include ('css/zebratable.inc');
			include ('css/stdbutton.inc'); 
		?>
    </head>

<!-- ---------------------------------------------------------------------------- -->
<!-- body                                                                         -->
<!-- ---------------------------------------------------------------------------- -->
    <body>

        <div id="wrapper">

            <div id="header">
            	<table width="980px"><tr>
					<td align="left" valign="bottom"><h3>Wolfram Plettscher's Project Tools</h3></td>
					<td align="right" valign="bottom"><h3> <?php echo $_SESSION['welcome']; ?> </h3></td>
				</tr></table>
            </div>
        
            <div id="cssmenu">
				<?php include ("menu.php"); ?>
            </div>
            
            <div id="contentbody">
				<?php include ("sites.php"); ?>
            </div>
            
        </div>

        <div id="footer">
            &copy; Bluefish Communications, Wolfram Plettscher 2014
        </div>
    
    </body>

</html>
