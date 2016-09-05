<?php
session_start();
include("sqlcon.php");
if(isset($_POST["login"]))
{
	$log=mysql_query("select * from supplier where emailid='$_POST[uname]' and password='$_POST[password]'");


if(mysql_num_rows($log) == 1)
	{
	  echo "Logged in successfully";
	  $row=mysql_fetch_array($log);
	  $_SESSION['name']=$row[firstname]." ".$row[lastname];
	  
		  $_SESSION["sup_id"]=$row[0];
		  $_SESSION['compname']=$row[compname];
		  $_SESSION["uid"]=$_POST[uname];
	
	  header("Location: homesupplier.php");
	 
	}
	else
	 $msg="Invalid Username or Password";
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
<center></center>
<center>
<form  name="log" method="post" action="">

<h4> <font color="red"> <?php echo $msg;?></font></h4><br />
<table width="464" height="280" border=1 align="center" class="listing">
<tr>
<th height="51" colspan="2"><center> <h3><font color="white">SUPPLIER LOGIN</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>
<tr>
<td height="49" align="center" > Supplier user name <font color="red">*</font>:</td><td align="center"><input type=text name="uname" title="Enter username" placeholder="Username" /></td></tr>
<tr><td height="46" align="center">Supplier password<font color="red">*</font>:</td><td align="center"><input type=password name="password" title="Enter Password" placeholder="Password"/></td></tr>
<tr><td height="53" colspan="2"><center><input type="submit" name="login" value="Login" onclick="return validate()" class="button-2"/>
<input type="reset" class="button-1" /></center></td></tr>
<tr><td colspan="2"><center>New User? <a href="supplierreg.php"><font color="red">Click to Register here</font></a></center><center>Forgot Password? <a href="supplierforgot.php"><font color="red">Click here</font></a></center></td></tr>
</table></form>
</center>
<div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    
     <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->

<center><img src="pics/re.jpg" width="374" height="188" /></center>
<script type='text/javascript' src='js/logging.js'></script>

</body>
</html>
</body>
</html>