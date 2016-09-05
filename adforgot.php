<?php
session_start();
include("sqlcon.php");
if(isset($_POST["token"]) && ($_POST["token"]==$_SESSION["token"]))
{
if(isset($_POST["submit"]))
{
	$result=mysql_query("select * from adminreg where Email='$_POST[email]' and dob='$_POST[dob]'");
	if(mysql_num_rows($result) == 1)
	{
		$set=1;
	}
	else
	$msg="Invalid email id or date of birth";
}
unset($_SESSION["token"]);
}
if(isset($_POST[submit1]))
{
 if($_POST[pwd]==$_POST[conpwd])
 {
	$res="update adminreg set password='$_POST[pwd]' where Email='$_POST[email]'";
	if(mysql_query($res))
	{
	$msg= "updated successfully";
	}
 }
 else 
 $msg="password and confirm password are not matching";
}

$new_token=md5(time().rand(0,100));
$_SESSION["token"]=$new_token;
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
	if(document.f1.email.value=="" || document.f1.dob.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	
	else if(document.f1.email.value=="")
	{
		alert("Enter the email");
		return false;
	}
	else if(document.f1.dob.value=="")
	{
		alert("Enter the date of birth");
		return false;
	}
	else return true;
}

function val()
{
	if(document.f2.email.value=="" || document.f2.pwd.value=="" || document.f2.conpwd.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	
	else if(document.f2.email.value=="")
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
<table width="546" height="196" border=1 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th height="51" colspan="2"><center> <h3><font color="white">Forgot Password (Admin)</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>
<tr>
<td height="42">
Email id<font color="red">*</font>:</td><td align="center"><input type="text" name="email" title="Enter the Email Id"  placeholder="Email address"/></td></tr>
<tr>
<td height="34">
Dob<font color="red">*</font>:</td><td align="center"><input type="text" name="dob" title="Enter the date of birth"  placeholder="Date of Birth"/></td></tr>



<tr><td height="33" colspan=2><center><input type="submit" value="Forgot Password" name="submit" onclick="return validate()" class="button-2"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="button-1"  /></center></td></tr>
<tr><td height="37" colspan="2"><center>Login here <a href="login.php"><font color="red">Login</font></a></center></td></tr>
</table>
</form>
</center>
<?php
}
else
{
?>
<br />
<center>
<?php echo $msg;?>
<form action="" method="post" name="f2">

<br />
<table width="546" height="222" border=1 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th height="51" colspan="2"><center> <h3><font color="white">Forgot Password (Admin)</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>
<tr>
<td height="44">
Email id<font color="red">*</font>:</td><td align="center"><input type="text" name="email" value="<?php echo $_POST[email];?>"/></td></tr>
<tr>
<td height="44">
New Password<font color="red">*</font>:</td><td align="center"><input type="password" name="pwd" title="Enter the new password"  placeholder="New Password"/></td></tr>

<tr>
<td height="43">
Confirm Password<font color="red">*</font>:</td><td align="center"><input type="password" name="conpwd"  title="Enter the confirm password"  placeholder="Confirm Password"/></td></tr>


<tr><td height="41" colspan=2><center><input type="submit" value="Submit" name="submit1" onclick="return val()" class="button-2"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="button-1"  /></center></td></tr>
</table>
</form>
</center>
<?php
}
?>
<br /><br />
 <center> <img src="pics/for.jpg" width="329" height="117"></center>
    
</body>
</html>