<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php

//v1:simple logout
// start session();

$_SESSION["admin_id"] = null;
$_SESSION["username"] = null;
redirect_to("index.php");

?>