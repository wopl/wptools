<?php
// **********************************************************************************
// **                                                                              **
// ** newaccount.php                                (c) Wolfram Plettscher 01/2016 **
// **                                                                              **
// **********************************************************************************

include "inc/menuhref.inc";

//-----------------------------------------------------------------------------------
// react on previously pushed buttons                                             ---
//-----------------------------------------------------------------------------------


?>

<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
-->
<!DOCTYPE html>
<html>
<head>

    <title>WP Tools</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
	<?php
		include ('css/menu.inc');
		include ('css/stdbutton.inc');
	?>

</head>
 
<body>
	<div id="wrapper">

        <div id="header">
            <table width="980px"><tr>
                <td align="left" valign="bottom"><h3> </h3></td>
                <td align="right" valign="middle"></td>
            </tr></table>
        </div>
        
        <div id="cssmenu">
            <ul>
				<li class='active'><a href='<?php echo checksslproxy ('login.php')?>'><span>New Account Request</span></a></li> 
            </ul>
        </div>
            

        <div id="contentbody">
            <h1>Wolfram Plettscher's Project Tools</h1>
            <form method="post">
                <table>
                    <tr>
                        <td><b>Sorry, this feature has not been implemented yet. Please stay tuned!</b></td>
                        <td> </td>
                    </tr><tr>
                        <td>xAccount: </td>
                        <td><input type="text" name="account" size="20" value="" maxlength="30" tabindex="1"/></td>
                    </tr><tr>
                        <td>xUsername: </td>
                        <td><input type="text" name="user" size="20" value="" maxlength="30" tabindex="2"/></td>
                    </tr><tr>
                        <td>xPassword: </td>
                        <td><input type="password" name="pass" size="20" value="" maxlength="30" tabindex="3"/></td>
                    </tr>
                </table>
                <br />
                <table>
                    <tr>
                    <td><input class='css_btn_class' name='newaccount' type='submit' value='submit new Account request' formaction='login.php'/></td>
                    </tr>
                </table>
            </form>
        </div>
        
 	</div>
        
	<div id="footer">
		&copy; Wolfram Plettscher 2016
    </div>

</body>
</html>