<?php
session_start();
$date=date("Y/m/d");
include("sqlcon.php");

if(!isset($_SESSION["uid"]))
{
	header("Location: login.php");
}
if(isset($_POST["update"])) 
{
	$update="update adminreg set fname='$_POST[firstname]',lname='$_POST[lastname]',dob='$_POST[dob]',username='$_POST[username]',Gender='$_POST[Gender]',Email='$_POST[mail]',contact_no='$_POST[con]',crt='$_POST[crdt]' where username='$_POST[username]'";
if(mysql_query($update))
$msg="updated successfully";
else
die(mysql_error());

}
if (isset($_SESSION["uid"]))
{
	$val=mysql_query("select * from adminreg where username='$_SESSION[uid]'");

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
$q=$row[8];
$i=$row[9];




}
}


include("header.php");	


?>
	


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
function validate()
{
var x=document.f1.mail.value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
	if(document.f1.firstname.value=="" || document.f1.lastname.value=="" || document.f1.dob.value=="" || document.f1.username.value=="" || document.f1.gender.value=="" || document.f1.mail.value=="" || document.f1.con.value=="" || document.f1.crdt.value=="")
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
	 if(document.f1.gender.value=="")
	{
		alert("Select the gender");
		return false;
	}
	
	if(document.f1.mail.value=="")
	{
		
		alert("Enter the email.");
		document.f1.mail.focus();
		return false;
			
	}
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
    {
       alert("Not a valid e-mail address");
        return false;
    }
	

	 if(document.f1.con.value=="")
	{
		alert("Enter the contact number");
		return false;
	}
	else if(document.f1.con.value.length<10 || document.f1.con.value.length>12 )
	{
		alert("Invalid contact number");
		document.f1.con.focus();

		return false;
	}
	 if(document.f1.crdt.value=="")
	{
		alert("Enter the date");
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
			include("sidebar.php");
			?>
                </div>
          </div>
   		</div>
        <div id="content" class="float_r">
       
<form action="" method="post" name="f1">
<center><h5> <font color="red"> <?php echo $msg;?></font></h5></center><br />
<br />
<table width="546" height="359" border=1 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th colspan=2><center> <h3><font color="white">Admin Profile</font></h3></center></th></tr>
<tr>
<td>
Fisrt name:</td><td align="center"><input type="text" name="firstname" value="<?php echo $b;?>" onKeyPress="ValidateAlpha();"/></td></tr>
<tr>
<td>
Last name:</td><td align="center"><input type="text" name="lastname" value="<?php echo $c;?>" onKeyPress="ValidateAlpha();"/></td></tr>
<tr>
<td>
Date Of Birth:</td><td align="center"><input type="date" name="dob" value="<?php echo $d;?>"/></td></tr>

<tr>
<td width="218">
UserName:</td><td width="312" align="center"><input type="text" name="username" readonly="readonly" value="<?php echo $e;?>" /></td> </tr>

<tr>
<td>
Gender</td><td align="center">
<select name="Gender">
<option value="">--SELECT--</option>
<option value="Male"
<?php

if($g=="Male")
{
	echo"selected";
}
?>
>Male
<option value="Female"
<?php
if($g=="Female")
{
	echo"selected";
}
?>
>Female

</option></option></select></td></tr>

 
<tr>
<td>
E-mail </td><td align="center"><input type="text" name="mail"  id="mail" value="<?php echo $h;?>"/></td></tr>
<tr>
<td>
Contact number </td><td align="center"><input type="text" name="con" value="<?php echo $q;?>" onkeypress="return isNumberKey(event)"/></td></tr>
<tr>
<td>
Created date </td><td align="center"><input type="date" name="crdt" value="<?php echo $i;?>" /></td></tr>

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
        <!-----end------->
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