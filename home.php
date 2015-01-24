<?php
// **********************************************************************************
// **                                                                              **
// ** home.php                                      (c) Wolfram Plettscher 01/2015 **
// **                                                                              **
// **********************************************************************************

// Display page only, if authenticated, otherwise jump to login page
include ('auth.php');

$_SESSION['kicker'] = "";
?>

<h1>WP-Tools Landing Page</h1>
<h3>Dear user,</h3>
this application has been designed to simplify tasks that are very common for all
kind of projects. Typically these tasks are done by using Excel sheets or connecting
to a collaboration server. Using Excel results in large, unreadable tables that are sent around
via Mail regularly. They can only be maintained by one person and trying to 
collaborate results in a mess of versions.</br></br>

Collaboration servers solve the multi-user problem, but are highly overloaded with
functions and are not user-friendliy enough for ad-hoc users.</br></br>

The current tools you find here overcome the disadvantages described above. All users
operate simultaneously on a single data-storage. The look and feel is consistent
accross different tools and much more user-friendly than Excel or other tools.</br></br> 

We are currently in a very early stage of development, therefore not all modules
have the functionality desired and expected. Use, what you like, and wait for
more to come in the future.</br></br>

Currently we plan to implement the following:
<ul>
	<li>Time tracking of tasks/projects</li>
    <li>Travel notes needed for expense reclaim</li>
    <li>provide a convenient task-list</li>
    <li>Project related contact list</li>
</ul>

I hope, you find this tool useful. Let us know your opinion.</br></br>

Have fun while exploring WP-Tools!</br>
<b>Wolfram</b>




