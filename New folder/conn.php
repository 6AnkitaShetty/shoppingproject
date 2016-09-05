<?php
$conn=mysql_connect("localhost","root","technology");
if(!$conn)
{
	die("could not connect".mysql_error);
}
else
echo("connectoin established");

/*if(mysql_query("create database new",$conn))
echo "database is created";
else
echo "database is not created";*/

mysql_select_db("new",$conn);
 /*$sql="create table person
( 
name varchar(15),
age int,
salary double
)";
mysql_query($sql,$conn);*/

mysql_query("insert into person(name,age,salary) values('ram',34,4500)");
mysql_query("insert into person(name,age,salary) values('teena',25,30000)");
mysql_query("insert into person(name,age,salary) values('uday',40,50000)");



 
?>


