<?php
// **********************************************************************************
// **                                                                              **
// ** index.php                                     (c) Wolfram Plettscher 01/2015 **
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
			include ('css/selectbox.inc'); 
		?>
        <link href="css/modal.css" rel="stylesheet">

    </head>

<!-- ---------------------------------------------------------------------------- -->
<!-- body                                                                         -->
<!-- ---------------------------------------------------------------------------- -->
    <body>

        <div id="wrapper">

            <div id="header">
            	<table width="980px"><tr>
					<td align="left" valign="bottom"><b>Wolfram Plettscher's Project Tools</b></td>
					<td align="right" valign="bottom"><b><?php echo $_SESSION['welcome']; ?></b></td>
				</tr><tr>
                	<td></td>
                    <td align="right" valign="bottom"><b><?php echo $_SESSION['project']; ?></b></td>
				</tr></table>
            </div>
        
            <div id="cssmenu">
				<?php include ("menu.php"); ?>
            </div>
            
            <div id="contentbody">
				<?php include ("sites.php"); ?>
            </div>
            
        </div>
        <div id="kicker">
            <?php echo $_SESSION['kicker']; ?>
        </div>

        <div id="footer">
            &copy; Wolfram Plettscher 2015
        </div>

    </body>

</html>
