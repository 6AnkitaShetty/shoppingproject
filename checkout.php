<?php
session_start();
 include("sqlcon.php"); 
 
   if(isset($_SESSION["custid"]))
{
	$result=mysql_query("select * from customerregistration where custid='$_SESSION[custid]'");
	while($row=mysql_fetch_array($result))
	{
		$pc=$row[pincode];
		$fn=$row[name];
		$ln=$row[lname];
		$con=$row[connum];
		$alcon=$row[altnum];
		$gen=$row[gender];
		$add=$row[address];
		$badd=$row[billing_addr];
		$loc=$row[locality];
		$cit=$row[city];
		$st=$row[state];
		
	}
}


 include("indexheader.php");
   include("orderdetail.php");
?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
function validate()
{
	
	if(document.cust.pincode.value=="" || document.cust.fname.value=="" || document.cust.lname.value=="" || document.cust.mbl.value=="" || document.cust.altp.value=="" || document.cust.Gender.value=="" || document.cust.addr1.value=="" || document.cust.addr2.value=="" || document.cust.loc.value=="" || document.cust.city.value=="" || document.cust.state.value=="" || document.cust.pay.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	else if(document.cust.pincode.value=="")
	{
		alert("Enter the pincode");
		return false;
	}
	else if(document.cust.pincode.value.length<6 || document.cust.pincode.value.length>6 )
	{
		alert("Pincode must be equal to six");
		document.cust.pincode.focus();
		return false;
	}
	
	else if(document.cust.fname.value=="")
	{
		alert("Enter the first name");
		return false;
	}
	else if(document.cust.fname.value.length<4 || document.cust.fname.value.length>10 )
	{
		alert("First name must be greater than 4 letters and less than 10 letters");
		document.cust.fname.focus();
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
	else if(document.cust.addr1.value=="")
	{
		alert("Enter the address");
		return false;
	}
	else if(document.cust.addr1.value.length<15)
		{
		alert("Address cannt be less than 15 characters");
		return false;
	}
	else if(document.cust.addr2.value=="")
	{
		alert("Enter the billing address");
		return false;
	}
	else if(document.cust.addr2.value.length<15)
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
	if(document.cust.mbl.value=="")
	{
		alert("Enter the contact number");
		return false;
	}
	
	else if(document.cust.mbl.value.length<10 || document.cust.mbl.value.length>12 )
	{
		alert("Minimum number for contact number is 10 and maximum number is 12");
		document.cust.mbl.focus();

		return false;
	}
	
	 if(document.cust.altp.value=="")
	{
		alert("Enter the alternate contact number");
		return false;
	}
	else if(document.cust.altp.value.length<10 || document.cust.altp.value.length>12 )
	{
		alert("Minimum number for alternate contact number is 10 and maximum number is 12");
		document.cust.altp.focus();

		return false;
	}
	
	if(document.cust.pay.value=="")
	{
		
		alert("Enter the payment");
		document.cust.pay.focus();
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

    
    <div id="templatemo_main">
   		 <div id="content" class="float_r">
        	<h2>Checkout</h2>
            <form name="cust"  action="payment.php" method="post">
      <table border="1" align="center" class="CSSTableGenerator">
     <tr>
<th height="51" colspan="2"><center> <h3><font color="white">Shipping Details</font></h3></center></th></tr>
<tr>
<th height="47" colspan="2"><center>Field marked <font color="red">* </font>are mandantory</center></th></tr>
            <tr>
            <th>              Pincode<font color="red">*</font>:  </th>              				
               <td> <input type="text" name="pincode"  value="<?php echo $pc;?>"  onKeyPress="return isNumberKey(event)"/>
                <h5>(Enter accurate pincode to help us deliver faster)</h5></td>
                </tr> 
              <tr> <th> First Name<font color="red">*</font>:</th>
               <td> <input type="text" name="fname" value="<?php echo $fn;?>" onKeyPress="ValidateAlpha();"></td></tr>
                <tr><th>Last Name<font color="red">*</font>:</th>
               <td> <input type="text"  name="lname" value="<?php echo $ln;?>" onKeyPress="ValidateAlpha();"> </td></tr>
               <tr><th>  Mobile<font color="red">*</font>:
				 </th>
               <td> <input type="text" name="mbl" value="<?php echo $con;?>"  onKeyPress="return isNumberKey(event)"> </td></tr>   
              <tr><th> Alternate Phone<font color="red">*</font>:</th>
				<td><input type="text"  name="altp" value="<?php echo $alcon;?>" onKeyPress="return isNumberKey(event)"> </td></tr>
                <tr><th>Gender<font color="red">*</font>:  </th>
                <td><input type="radio"  name="Gender" value="Male"
                 <?php 
				if($gen=="Male")
				{
					echo "checked";
				}
				
				?>/>Male
                <input type="radio"  name="Gender" value="Female"
                 <?php 
				if($gen=="Female")
				{
					echo "checked";
				}
				
				?>
                 />Female
                </td></tr>   
                           				
                <tr><th> Address<font color="red">*</font>: </th>              				
               <td> <textarea name="addr1" ><?php echo $add;?></textarea> </td></tr>
                <tr><th> Shipping Address<font color="red">*</font>:  </th>              				
               <td> <textarea name="addr2" ><?php echo $badd;?></textarea> </td></tr>
                 <tr><th> Locality<font color="red">*</font>:  </th>              				
               <td> <input type="text"  name="loc" value="<?php echo $loc;?>"> </td></tr>
                <tr><th> city<font color="red">*</font>: </th>              				
               <td> <input type="text"  name="city" value="<?php echo $cit;?>"> </td></tr>
                <tr><th> state/region<font color="red">*</font>:  </th>              				
                <td><input type="text"  name="state" value="<?php echo $st;?>"> </td></tr>
                <tr>
            <th>              Payment type<font color="red">*</font>:  </th>   
					<td><select name="pay">
<option value="">--SELECT--</option>
<option value= "cash on delivery" >cash on delivery</option>
<option value= "debit card" >debit card</option>
<option value= "credit card" >credit card</option>
</select></td></tr>
                
                <tr>
                <th colspan="2" align="center"><input type="submit" name="submit" onClick="return validate()" class="button-1"/></tr>
                </table>
                 </div>
           
      </div>
        </form>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    <?php
	include("footer.php");?>
</body>
</html>