<?php
// **********************************************************************************
// **                                                                              **
// ** index.php                                     (c) Wolfram Plettscher 02/2016 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');
//error_reporting( error_reporting() & ~E_NOTICE );

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
				<?php
					$timestamp = time();
					$datum = "Date: " . date ("d.m.Y H:i", $timestamp);
				?>	

            	<table width="1220px"><tr>
					<td width='400px' align="left" valign="bottom"><b>Wolfram Plettscher's Project Tools</b></td>
					<td align="center" valign="bottom"><b><?php echo $_SESSION['company']; ?></b></td>
					<td width='400px' align="right" valign="bottom"><b><?php echo $_SESSION['welcome']; ?></b></td>
				</tr><tr>
                    <td align="left" valign="bottom"><b><?php echo $datum; ?></b></td> 
					<td align="center" valign="bottom"><b></b></td>
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
            &copy; Wolfram Plettscher 2016
        </div>

    </body>

</html>
