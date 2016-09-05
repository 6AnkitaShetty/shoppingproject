<?php
session_start();
 include("sqlcon.php"); 
if(isset($_POST[submit]))
{
mysql_query("update customerregistration set pincode='$_POST[pincode]', connum='$_POST[mbl]',altnum='$_POST[altp]',address='$_POST[addr1]',billing_addr='$_POST[addr2]',locality='$_POST[loc]',city='$_POST[city]',state='$_POST[state]' where custid='$_SESSION[custid]'");

}

  include("indexheader.php");
      include("orderdetail.php");

?>  
<script language="javascript">
function validate()
{
	if(document.f1.db.value=="" || document.f1.date.value=="" || document.f1.cvv.value=="" || document.f1.card.value=="" || document.f1.amount.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	else if(document.f1.db.value=="")
	{
		alert("Enter debit card number");
		return false;
	}
	else if(document.f1.db.value.length<16 || document.f1.db.value.length>16 )
	{
		alert("debit card number must be equal to sixteen");
		document.f1.db.focus();
		return false;
	}
	else if(document.f1.date.value=="")
	{
		alert("Enter expiry date");
		return false;
	}
	else if(document.f1.cvv.value=="")
	{
		alert("Enter cvv number");
		return false;
	}
	else if(document.f1.cvv.value.length<3 || document.f1.cvv.value.length>3 )
	{
		alert("cvv number must be equal to 3");
		document.f1.cvv.focus();
		return false;
	}
	else if(document.f1.card.value=="")
	{
		alert("Enter the name on card");
		return false;
	}
	else if(document.f1.amount.value=="")
	{
		alert("Enter the amount");
		return false;
	}
	
	return true;
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
	  function ValidateAlpha() 
{ 
var keyCode = window.event.keyCode; 
if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32) 
{ 
window.event.returnValue = false; 
alert("Enter only letters"); 
} 
} 

function val()
{
	
	if(document.f2.creditcardnum.value=="" || document.f2.date.value=="" || document.f2.cvv.value=="" || document.f2.card.value=="" || document.f2.amount.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	else if(document.f2.creditcardnum.value=="")
	{
		alert("Enter credit card number");
		return false;
	}
	else if(document.f2.creditcardnum.value.length<16 || document.f2.creditcardnum.value.length>16 )
	{
		alert("credit card number must be equal to sixteen");
		document.f2.creditcardnum.focus();
		return false;
	}
	else if(document.f2.date.value=="")
	{
		alert("Enter expiry date");
		return false;
	}
	else if(document.f2.cvv.value=="")
	{
		alert("Enter cvv number");
		return false;
	}
	else if(document.f2.cvv.value.length<3 || document.f2.cvv.value.length>3 )
	{
		alert("cvv number must be equal to 3");
		document.f2.cvv.focus();
		return false;
	}
	else if(document.f2.card.value=="")
	{
		alert("Enter the name on card");
		return false;
	}
	else if(document.f2.amount.value=="")
	{
		alert("Enter the amount");
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
	
	

    <script type="text/javascript" language="javascript">
 window.onload=blinkOn;
 
function blinkOn()
{
  document.getElementById("blink").style.color="#FF0000"
  setTimeout("blinkOff()",500)
}
 
function blinkOff()
{
  document.getElementById("blink").style.color="#000000"
  setTimeout("blinkOn()",500)
}
 
 
 
</script>
  
<?php if($_POST['pay']=="debit card")
{
	?>
	
	        <div id="templatemo_main">
   		 <div id="content" class="float_r">
        	<h2>Payment</h2>
      
    
      <table border="1" align="center" class="CSSTableGenerator">
      <form action="pay.php" method="post"  name="f1">
      <tr><th colspan="2"><h5><strong>PAYMENT DETAILS</strong></h5></th></tr>
            <tr>
            <th>              Payment type:  </th>   
					<td><input type="text" name="paynum" value="<?php echo $_POST[pay];?>"   />
</tr>
              <tr> <th> debit card no:</th>
               <td> <input type="text" name="db" onKeyPress="return isNumberKey(event)" /></td></tr>
               
               <tr><th>  Expiry date:
				 </th>
               <td> <input type="date" name="date" /></td></tr>   
              <tr><th> cvv:</th>
				<td><input type="password"  name="cvv" size="8" maxlength="3" onKeyPress="return isNumberKey(event)"  /></td></tr>
                 
                           				
                <tr><th> Name on card:  </th>              				
               <td> <input type="text"  name="card" onKeyPress="ValidateAlpha()" /></td></tr>
                <tr><th>Amount:</th>
               <td> <input type="text"  name="amount" value="<?php echo $_SESSION[total];?>" readonly="readonly" /></td></tr>
               
                <tr>
                <th colspan="2" align="center"><input type="submit" name="submit" onclick="return validate()" class="button-1" value="Payment"></tr>
                </table>
                </form>
                 </div>
           <?php
}
else if($_POST[pay]=="credit card")
{
	?>
    
     <div id="templatemo_main">
   		 <div id="content" class="float_r">
        	<h2>Payment</h2>
            
            
            
    
      <table border="1" align="center" class="CSSTableGenerator">
      <form name="f2" action="pay.php" method="post">
      <tr><th colspan="2"><h5><strong>PAYMENT DETAILS</strong></h5></th></tr>
            <tr>
            <th>              Payment type:  </th>   
					<td><input type="text" name="paynum"  value="<?php echo $_POST[pay];?>" />
</tr>
              <tr> <th> credit card no:</th>
               <td> <input type="text" name="creditcardnum" onKeyPress="return isNumberKey(event)" /></td></tr>
                <tr><th>  Expiry date:
				 </th>
               <td> <input type="date" name="date" /></td></tr>  
                 <tr><th> cvv:</th>
				<td><input type="password"  name="cvv" size="8" maxlength="3" onKeyPress="return isNumberKey(event)" /></td></tr>
                 
                           				
                <tr><th> Name on card:  </th>              				
               <td> <input type="text"  name="card" onKeyPress="ValidateAlpha()" /></td></tr>
               
                <tr><th>Amount:</th>
               <td> <input type="text"  name="amount" value="<?php echo $_SESSION[total];?>" readonly="readonly" /></td></tr>
               
               
            
                <tr>
                <th colspan="2" align="center"><input type="submit" name="submit"  onclick="return val()" value="Payment"></tr>
               
                </form>
    <?php
}
else 
{
echo "<br /><br /><br /><center><font color='black' size='+3'><div id='blink'>Thank you for shopping</div></font></center>";
}
?>
</table>
 <!-----end------->
 <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
 <center>   <?php include("footer.php"); ?></center>
     <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>