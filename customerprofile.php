<?php
session_start();
include("sqlcon.php");
$date=date("Y/m/d");

if(!isset($_SESSION["uid"]))
{
	header("Location: customerlogin.php");
}

if(isset($_POST["update"])) 
{
	$update="update customerregistration set pincode='$_POST[pin]',name='$_POST[fname]',lname='$_POST[lname]',gender='$_POST[gender]',dob='$_POST[dob]',address='$_POST[add]',billing_addr='$_POST[bil]',locality='$_POST[loc]',city='$_POST[cit]',state='$_POST[state]',country='$_POST[country]',connum='$_POST[con]',altnum='$_POST[alcon]',email='$_POST[em]',createdon='$_POST[crt]' where email='$_POST[email]'";
if(mysql_query($update))
$msg="Updated successfully";
else
die(mysql_error());

}
if (isset($_SESSION["uid"]))
{
	$val=mysql_query("select * from customerregistration where email='$_SESSION[uid]'");

while($row=mysql_fetch_array($val))
{
$a=$row[0];
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
$o=$row[14];	
$p=$row[15];
$q=$row[16];	

}
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
	var x=document.f1.em.value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
	
	if(document.f1.pin.value=="")
	{
		alert("Enter the pincode");
		return false;
	}
	else if(document.f1.pin.value.length<6 || document.f1.pin.value.length>6 )
	{
		alert("Pincode must be equal to six");
		document.f1.pin.focus();
		return false;
	}
	
	else if(document.f1.fname.value=="")
	{
		alert("Enter the first name");
		return false;
	}
	else if(document.f1.fname.value.length<4 || document.f1.fname.value.length>10 )
	{
		alert("First name must be greater than 4 letters and less than 10 letters");
		document.f1.fname.focus();
		return false;
	}
	else if(document.f1.lname.value=="")
	{
		alert("Enter the last name");
		return false;
	}
	else if(document.f1.gender.value=="")
	{
		alert("Select the gender");
		return false;
	}
	else if(document.f1.dob.value=="")
	{
		alert("Enter the date of birth");
		return false;
	}
	else if(document.f1.add.value=="")
	{
		alert("Enter the address");
		return false;
	}
	else if(document.f1.add.value.length<15)
		{
		alert("Address cannt be less than 15 characters");
		return false;
	}
	else if(document.f1.bil.value=="")
	{
		alert("Enter the billing address");
		return false;
	}
	else if(document.f1.bil.value.length<15)
	{
		alert("Billing Address cannt be less than 15 characters");
		return false;
	}
	else if(document.f1.loc.value=="")
	{
		alert("Enter the locality");
		return false;
	}
	else if(document.f1.cit.value=="")
	{
		alert("Enter the city");
		return false;
	}
	else if(document.f1.state.value=="")
	{
		alert("Select the state");
		return false;
	}
	else if(document.f1.country.value=="")
	{
		alert("Select the country");
		return false;
	}
	if(document.f1.con.value=="")
	{
		alert("Enter the contact number");
		return false;
	}
	
	else if(document.f1.con.value.length<10 || document.f1.con.value.length>12 )
	{
		alert("Minimum number for contact number is 10 and maximum number is 12");
		document.f1.con.focus();

		return false;
	}
	
	 if(document.f1.alcon.value=="")
	{
		alert("Enter the alternate contact number");
		return false;
	}
	else if(document.f1.alcon.value.length<10 || document.f1.alcon.value.length>12 )
	{
		alert("Minimum number for alternate contact number is 10 and maximum number is 12");
		document.f1.alcon.focus();

		return false;
	}
	
	if(document.f1.em.value=="")
	{
		
		alert("Enter the email.");
		document.f1.em.focus();
		return false;
			
	}
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
       alert("Not a valid e-mail address");
        return false;
    }
	if(document.f1.pwd.value=="")
	{
		alert("Enter the password");
		return false;
	}
	
	else if(document.f1.pwd.value.length<8 || document.f1.pwd.value.length>15 )
	{
		alert("Minimum charaters for password is 8 and maximum character is 15");
		document.f1.pwd.focus();

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
<h4><center><?php echo $msg;?></center></h4>
<br />
<table width="546" height="359" border=1 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<input type="hidden" name="email" value="<?php echo $_SESSION["uid"];?>" />
<tr>
<th height="51" colspan="2"><center> <h3><font color="white">Customer Profile</font></h3></center></th></tr>

<tr>
<td>
Pin code:</td><td align="center"><input type="text" name="pin" value="<?php echo $b;?>" onkeypress="return isNumberKey(event)"/></td></tr>
<tr>
<td>
First Name:</td><td align="center"><input type="text" name="fname" value="<?php echo $c;?>"  onKeyPress="ValidateAlpha();"/></td></tr>
<tr>
<td width="218">
Last Name:</td><td width="312" align="center"><input type="text" name="lname" value="<?php echo $d;?>"  onKeyPress="ValidateAlpha();" /></td> </tr>

<tr>
<td>
Gender</td><td align="center">
<select name="Gender">
<option value="">--SELECT--</option>
<option value="Male"
<?php

if($e=="Male")
{
	echo"selected";
}
?>
>Male
<option value="Female"
<?php
if($e=="Female")
{
	echo"selected";
}
?>
>Female

</option></option></select></td></tr>
<tr>
<td>
Date of birth </td><td align="center"><input type="date" name="dob" value="<?php echo $f;?>"/></td></tr>
<tr>
<td>
Address </td><td align="center"><input type="text" name="add" value="<?php echo $g;?>"/></td></tr>
<tr>
<td>
Billing Address </td><td align="center"><input type="text" name="bil" value="<?php echo $h;?>"/></td></tr>
<tr>
<td>
Locality </td><td align="center"><input type="text" name="loc" value="<?php echo $i;?>"/></td></tr>
<tr>
<td>
City </td><td align="center"><input type="text" name="cit" value="<?php echo $j;?>"/></td></tr>
<tr><td>
State</td><td align="center">
<select name="state">
<option value="">--SELECT--</option>
 <?php
 $arr=array("karnataka","Kerala","Andhra Pradesh");
 foreach($arr as $value)
 {
	 if($k==$value)
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
Country</td><td align="center">
<select name="country">
<option value="">--SELECT--</option>
<option value= "india"
<?php
if($l=="india")
{
	echo "selected";
}
?>
>india</option>
<option value="pakistan"
<?php
if($l=="pakistan")
{
	echo "selected";
}
?>
>pakistan</option>
</option>
</select></td></tr>
<tr>
<td>
Contact number</td><td align="center"><input type="text" name="con" value="<?php echo $m;?>" onkeypress="return isNumberKey(event)"/></td></tr>
<tr>
<td>
Alternate  Number </td><td align="center"><input type="text" name="alcon" value="<?php echo $n;?>" onkeypress="return isNumberKey(event)"/></td></tr>
<tr>
<td>
email </td><td align="center"><input type="text" name="em" value="<?php echo $o;?>"/></td></tr>

<tr>
<td>
Created on</td><td align="center"><input type="text" name="crt" value="<?php echo $q?>"/></td></tr>

<?php
if(!isset($_SESSION['uid']))
{
	?><tr>
<td colspan=2><center><input type="submit" name="submit" onclick="return validate()" class="button-2"/></center></td></tr>
<?php
}
else
{
	?>
<tr><td colspan=2><center><input type="submit" value="update" name="update" onclick="return validate()" class="button-1"/></center></td></tr>
</table><?php
}
?>
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