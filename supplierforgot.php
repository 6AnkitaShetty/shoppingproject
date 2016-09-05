<?php
session_start();
include("sqlcon.php");

if(isset($_POST["submit"]))
{
	$result=mysql_query("select * from supplier where emailid='$_POST[email]' and contact_no='$_POST[connum]'");
	if(mysql_num_rows($result) == 1)
	{
		$set=1;
	}
	else
	$msg="Invalid email id or contact number";
}


if(isset($_POST[submit1]))
{
 if($_POST[pwd] == $_POST[conpwd])
 {
	$res="update supplier set password='$_POST[pwd]' where emailid='$_POST[email]'";
	if(mysql_query($res))
	{
	$msg= "updated successfully";
	}
 }
 else 
 $msg="password and confirm password are not matching";
}


include("adhead.php");
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
function validate()
{
	if(document.f1.email.value=="")
	{
		alert("Enter the email");
		return false;
	}
	else if(document.f1.connum.value=="")
	{
		alert("Enter contact number");
		return false;
	}
	else return true;
}
function val()
{
	
	
	 if(document.f2.email.value=="")
	{
		alert("Enter the email");
		return false;
	}
	else if(document.f2.pwd.value=="")
	{
		alert("Enter the password");
		return false;
	}
	else if(document.f2.conpwd.value=="")
	{
		alert("Enter the confirm password");
		return false;
	}
else if(document.f2.pwd.value.length<8 || document.f2.conpwd.value.length>15 )
	{
		alert("Minimum charaters for password is 8 and maximum character is 15");
		document.f2.pwd.focus();

		return false;
	}
	else if(document.f2.pwd.value != document.f2.conpwd.value)
	{
		alert("Password  and confirm password are not matching");
		return false;
	}
	
	return true;
}
</script>
		
</head>
<body>
<center>
<?php echo $msg;
if($set!=1)
{
?>
<form action="" method="post" name="f1">

<br />
<table width="546" height="276" border=1 align="center" class="listing">

<tr>
<th height="51" colspan="2"><center> <h3><font color="white">Forgot Password (Supplier)</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>
<tr>
<td height="62">
Email id<font color="red">*</font>:</td><td align="center"><input type="text" name="email"/></td></tr>
<tr>
<td height="62">
Contact Number<font color="red">*</font>:</td><td align="center"><input type="text" name="connum"/></td></tr>



<tr><td height="40" colspan=2><center><input type="submit" value="Forgot Password" name="submit" onclick="return validate()" class="button-1"/></center></td></tr>
<tr><td height="37" colspan="2"><center>Login here <a href="supplierlogin.php"><font color="red">Login</font></a></center></td></tr>
</table>
</form>
</center>
<br />
<center>
<?php
}
else
{
?>
<form action="" method="post" name="f2">

<br />
<table width="546" height="241" border=1 align="center" class="listing">

<tr>
<th height="36" colspan=2><center> <h3><font color="white">Forgot password(Supplier)</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>
<tr>
<td height="62">
Email id<font color="red">*</font>:</td><td align="center"><input type="text" name="email"  value="<?php echo $_POST[email];?>"/></td></tr>
<tr>
<td height="62">
New Password<font color="red">*</font>:</td><td align="center"><input type="password" name="pwd"/></td></tr>

<tr>
<td height="62">
Confirm Password<font color="red">*</font>:</td><td align="center"><input type="password" name="conpwd"/></td></tr>


<tr><td height="69" colspan=2><center><input type="submit" value="Submit" name="submit1" onclick="return val()" class="button-1"/></center></td></tr>
</table>
</form>
<?php }?>
</center>
</body>
</html>