<?php
session_start();
$date=date("Y/m/d");
include("sqlcon.php");
if(isset($_POST["token"]) && ($_POST["token"]==$_SESSION["token"]))
{
$us=mysql_query("select * from adminreg where Email='$_POST[mail]'");

if(isset($_POST['submit']))
{
	if(mysql_num_rows($us) == 1)
	{
		?>
        <script language="javascript">
		alert("Record already exists.");
		</script>
      <?php
	}
	else
	{
  $val="insert into adminreg(fname,lname,dob,username,password,Gender,Email,contact_no,crt) values('$_POST[firstname]','$_POST[lastname]','$_POST[dob]','$_POST[username]','$_POST[pwd]','$_POST[gender]','$_POST[mail]','$_POST[contact]','$_POST[cretdat]')";
  if(mysql_query($val))
 	 {
	  	$msg="Registered Successfully";
	  	header("Location: login.php");
 	 }
 	 else
 	 $msg= "error".mysql_error();
	}
}
	unset($_SESSION["token"]);
}
if(isset($_GET["admid"]))
{
	$result=mysql_query("select * from adminreg where adid='$_GET[admid]'");
	while($row=mysql_fetch_array($result))
	{
		$aid=$row[0];
		$fnm=$row[1];
		$lnm=$row[2];
		$db=$row[3];
		
		$unm=$row[4];
		$pwd=$row[5];
		$gen=$row[6];
		$mail=$row[7];
		$no=$row[8];
		$cr=$row[9];
		
		
		
			
	}
}
$res=mysql_query("select * from adminreg");
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
var x=document.f1.email.value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
	
	if(document.f1.firstname.value=="" || document.f1.lastname.value=="" || document.f1.dob.value=="" || document.f1.username.value=="" || document.f1.password.value=="" || document.f1.pwd.value=="" || document.f1.gender.value=="" || document.f1.email.value=="" || document.f1.contact.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	
	else if(document.f1.firstname.value=="")
	{
		alert("Enter the first name");
		return false;
	}
	else if(document.f1.firstname.value.length<4 || document.f1.firstname.value.length>10 )
	{
		alert("First name must be greater than 4 letters and less than 10 letters");
		document.f1.firstname.focus();

		return false;
	}
	 if(document.f1.lastname.value=="")
	{
		alert("Enter the last name");
		return false;
	}
	
	 if(document.f1.dob.value=="")
	{
		alert("Enter the date of birth");
		return false;
	}
	 if(document.f1.username.value=="")
	{
		alert("Enter the username");
		return false;
	}
	if(document.f1.password.value=="")
	{
		alert("Enter the password");
		return false;
	}
	if(document.f1.pwd.value=="")
	{
		alert("Enter the confirm password");
		return false;
	}
	else if(document.f1.password.value.length<8 || document.f1.password.value.length>15 )
	{
		alert("Minimum charaters for password is 8 and maximum character is 15");
		document.f1.password.focus();

		return false;
	}
	if(document.f1.password.value != document.f1.pwd.value)
	{
		alert("Password  and confirm password are not matching");
		return false;
	}
	
	 if(document.f1.gender.value=="")
	{
		alert("Select the gender");
		return false;
	}

	

	
	if(document.f1.email.value=="")
	{
		
		alert("Enter the email.");
		document.f1.email.focus();
		return false;
			
	}
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
       alert("Not a valid e-mail address");
        return false;
    }
	 if(document.f1.contact.value=="")
	{
		alert("Enter the contact number");
		return false;
	}
	else if(document.f1.contact.value.length<10 || document.f1.contact.value.length>12 )
	{
		alert("Invalid contact number");
		document.f1.contact.focus();

		return false;
	}
	return true;
}


function ValidateAlpha() 
{ 
var keyCode = window.event.keyCode; 
if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32) 
{ 
window.event.returnValue = false; 
alert("Enter only letters"); 
} 
} 

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            {
				window.event.returnValue = false; 
alert("Enter only Numbers");
			}
         return true;
      }

</script>
	
	
</head>
<body>
<center>
<form action="" method="post" name="f1">
<br />
<?php echo $msg;?>
<br />
<table width="546" height="359" border=1 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th height="51" colspan="2"><center> <h3><font color="white">ADMIN REGISTRATION</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>
<tr>
<td>
First name<font color="red">*</font>:</td><td align="center"><input type="text" name="firstname" title="Enter First Name" placeholder="Firstname"  onKeyPress="ValidateAlpha();"/></td></tr>
<tr>
<td>
Last name<font color="red">*</font>:</td><td align="center"><input type="text" name="lastname" title="Enter Last Name" placeholder="Lastname"  onKeyPress="ValidateAlpha();"/></td></tr>
<tr>
<td>
Date Of Birth<font color="red">*</font>:</td><td align="center"><input type="date" name="dob" title="Enter date of birth"  placeholder="Date Of Birth"/></td></tr>

<tr>
<td width="218">
UserName<font color="red">*</font>:</td><td width="312" align="center"><input type="text" name="username" title="Enter username" placeholder="Username" /></td> </tr>
<tr>
<td>
Password<font color="red">*</font>:</td><td align="center"><input type="password" name="password" title="Enter password"  placeholder="Password"/></td></tr>
<tr>
<td>
Confirm Password<font color="red">*</font>:</td><td align="center"><input type="password" name="pwd" title="Enter the confirm password"  placeholder="Confirm Password"/></td></tr>
<tr>
<td>
Gender<font color="red">*</font>:</td><td align="center">
<select name="gender">
<option value="">--SELECT--</option>
<option value="Male">Male
<option value="Female">Female
</option></option></select></td></tr>
<tr>
<td>
E-mail<font color="red">*</font>: </td><td align="center"><input type="text" name="mail" id="email" title="Enter email"  placeholder="Email"/></td></tr>


<tr>
<td>
Contact No<font color="red">*</font>:</td><td align="center"><input type="text" name="contact" title="Enter contact number"  placeholder="Contact number" onKeyPress="return isNumberKey(event)" /></td></tr>
<tr>
<td>
Created At:</td><td align="center"><input type="text" name="cretdat"  value="<?php echo $date;?>"/></td></tr>


<tr><td colspan=2><center><input type="submit" value="submit" name="submit" onClick="return validate()" class="button-1"/><input type="reset" class="button-2" /></center>
<tr><td height="37" colspan="2"><center>Already Registered? <a href="login.php"><font color="red">Click here to Login</font></a></center>
</table>
</form></center>
<div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
  
     <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>