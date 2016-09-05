<?php
session_start();
include("sqlcon.php");
$date=date("Y/m/d");

if(!isset($_SESSION["sup_id"]))
{
	header("Location: supplierlogin.php");
}
if(isset($_POST["update"])) 
{
$update="update supplier set firstname='$_POST[firstname]',lastname='$_POST[lastname]',gender='$_POST[Gender]',comp_id='$_POST[cid]',compname='$_POST[cnm]',address='$_POST[add]',city='$_POST[cit]',state='$_POST[state]',country='$_POST[country]',contact_no='$_POST[connum]',emailid='$_POST[em]',created_at='$_POST[cretdat]' where emailid='$_POST[em]'";
if(mysql_query($update))
$msg= "updated successfully";
else
die(mysql_error());

}
if (isset($_SESSION["sup_id"]))
{
	$val=mysql_query("select * from supplier where sup_id='$_SESSION[sup_id]'");

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
		
		
		
}
}


	
	
		


include("supplierheader.php");
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
	if(document.supplier.firstname.value=="" || document.supplier.lastname.value=="" || document.supplier.Gender.value=="" || document.supplier.cid.value=="" || document.supplier.cnm.value=="" || document.supplier.add.value=="" || document.supplier.cit.value=="" || document.supplier.state.value=="" || document.supplier.country.value=="" || document.supplier.connum.value=="" || document.supplier.logid.value=="" || document.supplier.pwd.value=="" || document.supplier.em.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	
	else if(document.supplier.firstname.value=="")
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
		alert("Minimum number for contact number is 10 and maximum number is 12");
		document.supplier.connum.focus();

		return false;
	}
	
		 if(document.supplier.logid.value=="")
	{
		alert("Enter the login id");
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
	
	if(document.supplier.em.value=="")
	{
		
		alert("Enter the email.");
		document.supplier.em.focus();
		return false;
			
	}
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
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
<div id="templatemo_main">
	  <div id="sidebar" class="float_l">
       	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>Navigation</h3>   
                <div class="content">
                  <?php
			include("suppliersidebar.php");
			?>
                </div>
          </div>
   		</div>
        <div id="content" class="float_r" style="background-color:white; color:black">



<form action="" method="post" name="supplier">
<br />
<h4><center> <font color="red"> <?php echo $msg;?></font></center></h4><br />
<table width="546" height="359" border=1 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th colspan=2><center> <h3><font color="white">Supplier Profile</font></h3></center></th></tr>

<tr><td>
First name</td><td width="254" align="center"><input type="text" name="firstname" value="<?php echo $b;?>" onKeyPress="ValidateAlpha();"/></td></tr>


<tr><td>
last Name</td><td align="center"><input type="text" name="lastname" value="<?php echo $c;?>" onKeyPress="ValidateAlpha();"/></td></tr>


<tr>
<td>
Gender</td><td align="center">
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
Company id</td><td align="center"><input type="text" name="cid" value="<?php echo $e;?>"/></td></tr>

<tr><td>
Company name</td><td align="center"><input type="text" name="cnm" value="<?php echo $f;?>"/></td></tr>

<tr>
<td>Address
</td><td align="center"><textarea name="add"><?php echo $g;?></textarea></td></tr>

<tr><td>
City</td><td align="center"><input type="text" name="cit" value="<?php echo $h;?>"/></td></tr>

<tr><td>
State</td><td align="center">
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
Country</td><td align="center">
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
Contact Number</td><td align="center"><input type="text" name="connum" value="<?php echo $k;?>"   onkeypress="return isNumberKey(event)"/></td></tr>




<tr>
<td >
Email</td><td align="center"><input type="text" name="em" value="<?php echo $m;?>"/></td></tr>


<tr>
<td>
Created_At</td><td align="center"><input type="date" name="cretdat" value="<?php echo $n;?>" /></td></tr>



<?php
if(!isset($_SESSION['sup_id']))
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
</table></form>
 <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <?php include("footer.php"); ?>
     <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>