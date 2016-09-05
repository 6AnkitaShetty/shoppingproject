<?php
session_start();
include("sqlcon.php");


if(isset($_POST["submit"]))
{
	$result=mysql_query("select * from customerregistration where email='$_POST[logid]' and pwd='$_POST[oldpwd]'");
	if(mysql_num_rows($result) == 1)
	{
		if($_POST[newpwd]==$_POST[conpwd])
		{
			$up="update customerregistration set pwd='$_POST[newpwd]' where email='$_POST[logid]'";
			if(mysql_query($up))
			{
				$msg="updated successfully";
			}
		
		}

		else 
		$msg="new password and confirm password are not matching";
	
	
	}
	else
	$msg="invalid emailid and oldpassword";
}


include("indexheader.php");
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
function validate()
{
	if(document.f1.logid.value=="")
	{
		alert("Enter the login id");
		return false;
	}
	else if(document.f1.oldpwd.value=="")
	{
		alert("Enter the old password");
		return false;
	}
	else if(document.f1.newpwd.value=="")
	{
		alert("Enter the new password");
		return false;
	}
	else if(document.f1.conpwd.value=="")
	{
		alert("Enter the confirm password");
		return false;
	}
	else if(document.f1.newpwd.value.length<8 || document.f1.conpwd.value.length>15 )
	{
		alert("Minimum charaters for password is 8 and maximum character is 15");
		document.f1.newpwd.focus();

		return false;
	}
	else if(document.f1.newpwd.value != document.f1.conpwd.value)
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
<form action="" method="post" name="f1">
<?php echo $msg;?>
<br />
<table width="546" height="298" border=1 align="center" class="listing">
<tr>
<th height="51" colspan="2"><center> <h3><font color="white">Change Password (Customer)</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>
<tr>
<td height="43">
Login Id<font color="red">*</font>:</td>
<td align="center"><input type="text" name="logid" title="Enter the login id"  placeholder="Login id"/></td></tr>
<tr>
<td height="46">
Old Password<font color="red">*</font>:</td><td align="center"><input type="password" name="oldpwd"  title="Enter the old password"  placeholder="Old Password"/></td></tr>
<tr>
<td width="218" height="42">
New Password<font color="red">*</font>:</td><td width="312" align="center"><input type="password" name="newpwd"  title="Enter the new password"  placeholder="New Password"/></td></tr>

<tr>
<td height="45">
Confirm Password<font color="red">*</font>:</td><td align="center"><input type="password" name="conpwd" title="Enter the confirm password"  placeholder="Confirm Password"/></td></tr>
<tr><td height="53" colspan=2><center><input type="submit" value="Change password" name="submit" onclick="return validate()" class="button-1"/></center></td></tr>
</table>
</form>
</center>
        <!-----end------->
 <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    <center>
    <?php include("footer.php"); ?>
 </center>
     <!-- END of templatemo_footer -->
      
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>