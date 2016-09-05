<?php
session_start();

if(isset($_SESSION["uid"]))
{
	session_destroy();
	header("Location: login.php");
}

if(isset($_SESSION["sup_id"]))
{
	session_destroy();
	header("Location: supplierlogin.php");
}

?>