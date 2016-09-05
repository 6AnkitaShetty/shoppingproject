<?php
session_start();
include("sqlcon.php");
$date=date("Y/m/d");
if(isset($_POST["token"]) && ($_POST["token"]==$_SESSION["token"]))
{
$us=mysql_query("select * from supplier where emailid='$_POST[em]'");

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

$val="insert into supplier(firstname,lastname,gender,comp_id,compname,address,city,state,country,contact_no,password,emailid,created_at) values('$_POST[firstname]','$_POST[lastname]','$_POST[Gender]','$_POST[cid]','$_POST[cnm]','$_POST[add]','$_POST[cit]','$_POST[state]','$_POST[country]','$_POST[connum]','$_POST[pwd]','$_POST[em]','$_POST[cretdat]')";
 if(mysql_query($val))
  {
	  $msg="Registered Successfully";
	  header("Location: supplierlogin.php");
  }
else
die(mysql_error());
}
}
unset($_SESSION["token"]);
}
if(isset($_GET['editid']))
{
	$res=mysql_query("select * from supplier where emailid='$_GET[editid]'");
	while($row=mysql_fetch_array($res))
	{
		
		$b=$row[1];
		$c=$row[2];
		$d=$row[3];
		$e=$row[4];
		$f=$row[5];
		$g=$row[6];
		$h=$row[7];
		$i=$row[8];
		$j=$row[9];
		$k=$row[10];
		$l=$row[11];
		$m=$row[12];
		$n=$row[13];
		
		
	}
}
$res=mysql_query("select * from supplier");
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
	var x=document.supplier.em.value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
	if(document.supplier.firstname.value=="" || document.supplier.lastname.value=="" || document.supplier.Gender.value=="" || document.supplier.cid.value=="" || document.supplier.cnm.value=="" || document.supplier.add.value=="" || document.supplier.cit.value=="" || document.supplier.state.value=="" || document.supplier.country.value=="" || document.supplier.connum.value==""  || document.supplier.pwd.value=="" || document.supplier.em.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	
	 if(document.supplier.firstname.value=="")
	{
		alert("Enter the first name");
		return false;
	}
	else if(document.supplier.firstname.value.length<4 || document.supplier.firstname.value.length>10 )
	{
		alert("First name must be greater than 4 letters and less than 10 letters");
		document.supplier.firstname.focus();

		return false;
	}
	if(document.supplier.lastname.value=="")
	{
		alert("Enter the last name");
		return false;
	}
	 if(document.supplier.Gender.value=="")
	{
		alert("Select the gender");
		return false;
	}
	
	 if(document.supplier.cid.value=="")
	{
		alert("Enter the company id");
		return false;
	}
	if(document.supplier.cnm.value=="")
	{
		alert("Enter the company name");
		return false;
	}
     if(document.supplier.add.value=="")
	{
		alert("Enter the address");
		return false;
	}

	else if(document.supplier.add.value.length<15)
		{
		alert("Address cannot be less than 15 characters");
		return false;
	}
		 if(document.supplier.cit.value=="")
	{
		alert("Enter the city");
		return false;
	}
	 if(document.supplier.state.value=="")
	{
		alert("Select the state");
		return false;
	}
		 if(document.supplier.country.value=="")
	{
		alert("Select the country");
		return false;
	}
	
	
	

	
	if(document.supplier.connum.value=="")
	{
		alert("Enter the contact number");
		return false;
	}
	
	else if(document.supplier.connum.value.length<10 || document.supplier.connum.value.length>12 )
	{
		alert("Invalid contact number");
		document.supplier.connum.focus();

		return false;
	}
	
		
	if(document.supplier.pwd.value=="")
	{
		alert("Enter the password");
		return false;
	}
	else if(document.supplier.pwd.value.length<8 || document.supplier.pwd.value.length>15 )
	{
		alert("Minimum charaters for password is 8 and maximum character is 15");
		document.supplier.pwd.focus();

		return false;
	}
	
	else if(document.supplier.em.value=="")
	{
		
		alert("Enter the email.");
		document.supplier.em.focus();
		return false;
			
	}
	else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
       alert("Not a valid e-mail address");
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
<form action="" method="post" name="supplier">
<br />
<?php echo $msg;?>

<table width="546" height="359" border=1 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th height="51" colspan="2"><center> <h3><font color="white">SUPPLIER REGISTRATION</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>
<tr><td>
First name<font color="red">*</font>:</td><td width="254" align="center"><input type="text" name="firstname" title="Enter First Name"  placeholder="Firstname" onKeyPress="ValidateAlpha();"/></td></tr>

<tr><td>
last Name<font color="red">*</font>:</td><td align="center"><input type="text" name="lastname" title="Enter Last Name" placeholder="Lastname" onKeyPress="ValidateAlpha();"/></td></tr>

<tr>
<td>
Gender<font color="red">*</font>:</td><td align="center">
<select name="Gender">
<option value="">--SELECT--</option>
<option value="Male"
<?php

if($d=="Male")
{
	echo"selected";
}
?>
>Male
<option value="Female"
<?php
if($d=="Female")
{
	echo"selected";
}
?>
>Female

</option></option></select></td></tr>

<tr><td>
Company id<font color="red">*</font>:</td><td align="center"><input type="text" name="cid" title="Enter company id" placeholder="Company Id"/></td></tr>

<tr><td>
Company name<font color="red">*</font>:</td><td align="center"><input type="text" name="cnm" title="Enter company name" placeholder="Company name" onKeyPress="ValidateAlpha();"/></td></tr>

<tr>
<td>Address<font color="red">*</font>:
</td><td align="center"><textarea name="add" title="Enter Address" placeholder="Address"></textarea></td></tr>

<tr><td>
City<font color="red">*</font>:</td><td align="center"><input type="text" name="cit"  title="Enter the city" placeholder="City"/></td></tr>

<tr><td>
State<font color="red">*</font>:</td><td align="center">
<select name="state">
<option value="">--SELECT--</option>
 <?php
 $arr=array("karnataka","Kerala","Andhra Pradesh");
 foreach($arr as $value)
 {
	 if($i==$value)
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
if($j=="india")
{
	echo "selected";
}
?>
>india</option>
<option value="pakistan"
<?php
if($j=="pakistan")
{
	echo "selected";
}
?>
>pakistan</option>
</option>
</select></td></tr>

<tr>
<td>
Contact Number<font color="red">*</font>:</td><td align="center"><input type="text" name="connum" title="Enter the contact number" placeholder="Contact Number"  onkeypress="return isNumberKey(event)"/></td></tr>



<tr>
<td >
Password<font color="red">*</font>:</td><td align="center"><input type="password" name="pwd" title="Enter the password" placeholder="Password"/></td></tr>

<tr>
<td >
Email<font color="red">*</font>:</td><td align="center"><input type="text" name="em" title="Enter email address" placeholder="Email"/></td></tr>


<tr>
<td>
Created_At</td><td align="center"><input type="text" name="cretdat" value="<?php echo $date;?>"/></td></tr>



<tr><td colspan=2><center><input type="submit" value="submit" name="submit" onclick="return validate()" class="button-2"/><input type="reset" class="button-1" /></center>
<tr><td height="37" colspan="2"><center>Already Registered? <a href="supplierlogin.php"><font color="red">Click here to Login</font></a></center>
</table></form></center>


 <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    
     <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>