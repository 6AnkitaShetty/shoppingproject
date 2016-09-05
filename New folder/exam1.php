<?php
session_start();
include("sqlcon.php");
if(isset($_POST[token]) && ($_POST[token]==$_SESSION[token]))
{
if(isset($_POST["submit"]))
{
  $val="insert into shop(username,password,Gender,Email) values('$_POST[username]','$_POST[password]','$_POST[gender]','$_POST[mail]')";
  if(mysql_query($val))
  {
	  echo"record inserted";
  }
  else
  echo "error";
}
unset($_SESSION[token]);
}
$new_token=md5(time().rand(0,100));
$_SESSION[token]=$new_token;
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
function validate()
{
	if(document.f1.username.value=="")
	{
		alert("enter the username");
		return false;
	}
	else if(document.f1.password.value != document.f1.pwd.value)
	{
		alert("Password  and confirm password are not matching");
		return false;
	}
	else
	return true;
}
</script>
	
</head>

<body>
<form action="exam1.php" method="post" name="f1">
<table height="341" border=1>
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<td width="112">
username:</td><td width="321"><input type="text" name="username" /></td> </tr>
<tr>
<td>
password:</td><td><input type="password" name="password" /></td></tr>
<tr>
<td>
confirm password:</td><td><input type="password" name="pwd"/></td></tr>
<tr>
<td>
gender</td><td><input type="radio"  name="gender" value="male" checked="checked"/>male
<input type="radio" name="gender" value="female" />female</td></tr>
<tr>
<td>
E-mail </td><td><input type="text" name="mail"/></td></tr>
<tr>
<td colspan=2 align="center"><input type="submit" name="submit" onclick="return validate()"/></td></tr>
</table>
</form>
</body>
</html>