<?php
session_start();
if(isset($_SESSION[uid]))
{
	session_destroy();
	echo "LOGGED OUT SUCCESSFULLY";
}
?>