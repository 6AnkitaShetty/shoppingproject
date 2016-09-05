<?php
session_start();
include("sqlcon.php");
if (isset($_POST[login]))
{
	$sql=mysql_query("select * from shop  where username='$_POST[uname]' and password='$_POST[password]'");
	if(mysql_num_rows($sql) == 1)
	{
		$_SESSION[uid]=$_POST[uname];
		header("Location: p1.php");
	}
	else
	{
		echo "invalid username or password";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form  name="log" method="post" action="">
<table width="370" height="161" border=1 align="center" >
<tr>
<td align="center" > user name:</td><td align="center"><input type=text name="uname" /></td></tr>
<tr><td align="center">password:</td><td align="center"><input type=password name="password"/></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="login" value="login" /><input type="reset" />
</table></form>
</body>
</html>