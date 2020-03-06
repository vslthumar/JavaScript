<?php
/*
 * This is the logout page .
 */
session_start();//session start
session_destroy();//session destroy.
?>
<!--back to login page link-->
<p>Logout successful. <a href="index.php">Click here</a> to log in again.</p>