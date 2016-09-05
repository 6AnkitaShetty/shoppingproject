<?php
session_start();
include("sqlcon.php");

if (isset($_POST[login]))
{
	$sql=mysql_query("select * from adminreg  where username='$_POST[uname]' and password='$_POST[password]'");
	$row=mysql_fetch_array($sql);
	$_SESSION['name']=$row[fname]." ".$row[lname];
	if(mysql_num_rows($sql) == 1)
	{
		$_SESSION["uid"]=$_POST["uname"];
		$_SESSION['adm_id']=$row[0];
		header("Location: adminhome.php");
	}
	else
	{
		$msg="Invalid Username or Password";
	}
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
	if(document.log.uname.value=="" || document.log.password.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	
	
	else if(document.log.uname.value=="")
	{
		alert("Enter the username");
		return false;
	}
	
	else if(document.log.password.value=="")
	{
		alert("Enter the password");
		return false;
	}
	
	return true;
}
 
</script>
</head>

        
<body>

<center>
  <form  name="log" method="post" action="">
  <br />
<h4> <font color="red"> <?php echo $msg;?></font></h4><br />
<table width="426" height="269" border=1 align="center" class="listing">
<tr>
<th height="51" colspan="2"><center> <h3><font color="white">ADMIN LOGIN</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>

<tr>
<td width="195" height="44" align="center" >Admin user name<font color="red">*</font>:</td><td width="181" align="center"><input type=text name="uname" title="Enter username" placeholder="Username" /></td></tr>

<tr><td height="45" align="center">Admin password<font color="red">*</font>:</td><td align="center"><input type=password name="password" title="Enter Password" placeholder="Password"/></td></tr>
<tr><td height="41" colspan="2"><center><input type="submit" name="login" value="Login" onclick="return validate()" class="button-2"/><input type="reset" class="button-1" /></center>
</td>
</tr>
<tr><td height="37" colspan="2"><center>New User? <a href="adminreg.php"><font color="red">Click to Register here</font></a></center>
<center>Forgot Password? <a href="adforgot.php"><font color="red">Click here</font></a></center></td></tr>
</table>
</form>
</center>
</body>
</div>
<!-- END of templatemo_main -->
    
     <!-- END of templatemo_wrapper -->
     <br /><br />
     <center> <img src="pics/user.jpg" width="501" height="167"></center>
    

<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>