<?php
$conn=mysql_connect("localhost","root","technology");
if(!$conn)
{
	die("could not connect".mysql_error);
}
mysql_select_db("new",$conn);
?>