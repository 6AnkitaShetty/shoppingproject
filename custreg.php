<?php
session_start();
$date=date("Y/m/d");
include("sqlcon.php");
if(isset($_POST["token"]) && ($_POST["token"]==$_SESSION["token"]))
{
$us=mysql_query("select * from customerregistration where email='$_POST[email]'");

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

$reg="insert into customerregistration(pincode,name,lname,gender,dob,address,billing_addr,locality,city,state,country,connum,altnum,email,pwd,createdon) values('$_POST[pin]','$_POST[name]','$_POST[lname]','$_POST[Gender]','$_POST[dob]','$_POST[add]','$_POST[badd]','$_POST[loc]','$_POST[city]','$_POST[state]','$_POST[country]','$_POST[cnmbr]','$_POST[altnmbr]','$_POST[email]','$_POST[password]','$_POST[createdon]')";

if(mysql_query($reg)) 
{

header("Location: customerlogin.php");
?>
<script language="javascript">
alert("You are registered successfully...");
</script>
<?php
}
 else
 echo "error".mysql_error();
}
}

unset($_SESSION["token"]);
}
if(isset($_GET["custid"]))
{
	$result=mysql_query("select * from customerregistration  where cid='$_GET[custid]'");
	while($row=mysql_fetch_array($result))
	{
		$id=$row[custid];
		$pin=$row[pincode];
		$fnm=$row[name];
		$lnm=$row[lname];
		$gen=$row[gender];
		$ob=$row[dob];
		$ad=$row[address];
		$badd=$row[billing_addr];
		$loc=$row[locality];
		$city=$row[city];
		$st=$row[state];
		$con=$row[country];
		$con=$row[connum];
		$acon=$row[altnum];
		$em=$row[email];
		$pas=$row[pwd];
		$crt=$row[createdon];
	
	}
}
$res=mysql_query("select * from customerregistration");
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
	var x=document.cust.email.value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
	if(document.cust.pin.value=="" || document.cust.name.value=="" || document.cust.lname.value=="" || document.cust.Gender.value=="" || document.cust.dob.value=="" || document.cust.add.value=="" || document.cust.badd.value=="" || document.cust.loc.value=="" || document.cust.city.value=="" || document.cust.state.value=="" || document.cust.country.value=="" || document.cust.cnmbr.value=="" || document.cust.altnmbr.value=="" || document.cust.email.value=="" || document.cust.password.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	else if(document.cust.pin.value=="")
	{
		alert("Enter the pincode");
		return false;
	}
	else if(document.cust.pin.value.length<6 || document.cust.pin.value.length>6 )
	{
		alert("Pincode must be equal to six");
		document.cust.pin.focus();
		return false;
	}
	
	else if(document.cust.name.value=="")
	{
		alert("Enter the first name");
		return false;
	}
	else if(document.cust.name.value.length<4 || document.cust.name.value.length>10 )
	{
		alert("First name must be greater than 4 letters and less than 10 letters");
		document.cust.name.focus();
		return false;
	}
	else if(document.cust.lname.value=="")
	{
		alert("Enter the last name");
		return false;
	}
	else if(document.cust.Gender.value=="")
	{
		alert("Select the gender");
		return false;
	}
	else if(document.cust.dob.value=="")
	{
		alert("Enter the date of birth");
		return false;
	}
	else if(document.cust.add.value=="")
	{
		alert("Enter the address");
		return false;
	}
	else if(document.cust.add.value.length<15)
		{
		alert("Address cannt be less than 15 characters");
		return false;
	}
	else if(document.cust.badd.value=="")
	{
		alert("Enter the billing address");
		return false;
	}
	else if(document.cust.badd.value.length<15)
	{
		alert("Billing Address cannt be less than 15 characters");
		return false;
	}
	else if(document.cust.loc.value=="")
	{
		alert("Enter the locality");
		return false;
	}
	else if(document.cust.city.value=="")
	{
		alert("Enter the city");
		return false;
	}
	else if(document.cust.state.value=="")
	{
		alert("Enter the state");
		return false;
	}
	else if(document.cust.country.value=="")
	{
		alert("Enter the country");
		return false;
	}
	if(document.cust.cnmbr.value=="")
	{
		alert("Enter the contact number");
		return false;
	}
	
	else if(document.cust.cnmbr.value.length<10 || document.cust.cnmbr.value.length>12 )
	{
		alert("Minimum number for contact number is 10 and maximum number is 12");
		document.cust.cnmbr.focus();

		return false;
	}
	
	 if(document.cust.altnmbr.value=="")
	{
		alert("Enter the alternate contact number");
		return false;
	}
	else if(document.cust.altnmbr.value.length<10 || document.cust.altnmbr.value.length>12 )
	{
		alert("Minimum number for alternate contact number is 10 and maximum number is 12");
		document.cust.altnmbr.focus();

		return false;
	}
	
	if(document.cust.email.value=="")
	{
		
		alert("Enter the email.");
		document.cust.email.focus();
		return false;
			
	}
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
       alert("Not a valid e-mail address");
        return false;
    }
	if(document.cust.password.value=="")
	{
		alert("Enter the password");
		return false;
	}
	
	else if(document.cust.password.value.length<8 || document.cust.password.value.length>15 )
	{
		alert("Minimum charaters for password is 8 and maximum character is 15");
		document.cust.password.focus();

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

function IsEmail(email) 
{
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

</script>
</head>

<body>
<center>
<form action="" method="post" name="cust">
<br />
<?php echo $msg;?>
<table width="546" height="359" border=1 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th height="51" colspan="2"><center> <h3><font color="white">CUSTOMER REGISTRATION</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>
<tr>
<td>
Pincode<font color="red">*</font>:</td><td align="center"><input type="text" name="pin" title="Enter pincode" placeholder="Pincode" onKeyPress="return isNumberKey(event)"/></td></tr>
<tr>
<td>
First Name<font color="red">*</font>:</td><td align="center"><input type="text" name="name" title="Enter first Name"placeholder="Firstname" onKeyPress="ValidateAlpha();"/></td></tr>
<tr>
<td>
Last Name<font color="red">*</font>:</td><td align="center"><input type="text" name="lname" title="Enter Last Name"placeholder="Lastname" onKeyPress="ValidateAlpha();"/></td></tr>
<tr>
<td>
Gender<font color="red">*</font>:</td><td align="center">
<select name="Gender">
<option value="">--SELECT--</option>
<option value="Male">Male
<option value="Female">Female
</option></option></select></td></tr>

<tr>
<td>
DOB<font color="red">*</font>:</td><td align="center"><input type="date" name="dob" title="Enter date of birth" placeholder="Date Of Birth"/></td></tr>
<tr>
<td>
Address<font color="red">*</font>:</td><td align="center"><textarea name="add" title="Enter Address" placeholder="Address"></textarea></td></tr>
<tr>
<td>Billing Address<font color="red">*</font>:</td><td align="center"><textarea name="badd" title="Enter billing address" placeholder="Billing Address"></textarea></td></tr>
<tr>
<td>Locality<font color="red">*</font>:</td><td align="center"><input type="text" name="loc" title="Enter locality"placeholder="Locality"/></td></tr>
<tr>
<td>City<font color="red">*</font>:</td><td align="center"><input type="text" name="city" title="Enter the name of city" placeholder="City"/></td></tr>
<tr><td>
State<font color="red">*</font>:</td><td align="center">
<select name="state">
<option value="">--SELECT--</option>
 <?php
 $arr=array("karnataka","Kerala","Andhra Pradesh");
 foreach($arr as $value)
 {
	 if($st==$value)
	 {
		 echo "<option value='$value' selected='selected'>$value</option>";
	 }
	 else
	 {
		  echo "<option value='$value'>$value</option>";
		 
	 }
 }
 ?>
</select></td></tr>
<tr>
<td>
Country<font color="red">*</font>:</td><td align="center">
<select name="country">
<option value="">--SELECT--</option>
<option value= "india"
<?php
if($con=="india")
{
	echo "selected";
}
?>
>india</option>
<option value="pakistan"
<?php
if($con=="pakistan")
{
	echo "selected";
}
?>
>pakistan</option>
</option>
</select></td></tr>
<tr>
<td>Contact_no<font color="red">*</font>:</td><td align="center"><input type="text" name="cnmbr" title="Enter the contact number" placeholder="Contact Number" onKeyPress="return isNumberKey(event)"/></td></tr>
<tr>
<td>Alternate number</td><td align="center"><input type="text" name="altnmbr" title="Enter the alternate contact number" placeholder="Alternate number" onKeyPress="return isNumberKey(event)"/></td></tr>
<tr>
<td>Email address<font color="red">*</font>:</td><td align="center"><input type="email" name="email"  title="Enter the email address" placeholder="Email" onBlur="return IsEmail(this.value)"  />	 </td></tr>
<tr>
<td>Password<font color="red">*</font>:</td><td align="center"><input type="password" name="password" title="Enter password" placeholder="Password"/></td></tr>
<tr>
<td>Created at</td><td align="center"><input type="text" name="createdon" value="<?php echo $date;?>"/></td></tr>

<tr><td colspan=2><center><input type="submit" value="submit" name="submit" onClick="return validate()" class="button-1"/><input type="reset" class="button-2" /></center>
<tr><td height="37" colspan="2"><center>Already Registered? <a href="customerlogin.php"><font color="red">Click here to Login</font></a></center>


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

