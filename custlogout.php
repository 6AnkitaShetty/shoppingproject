<?php
session_start();
include("sqlcon.php");
 
	mysql_query("delete from cart where custid='$_SESSION[custid]'");

  
if(isset($_SESSION["custid"]))
{
	session_destroy();
	header("Location: index.php");
    
}
?>