<?php
session_start();
 include("sqlcon.php"); 
 if(!isset($_SESSION[custid]))
 {
  header("Location: customerlogin.php");
	 
 }
 if(isset($_GET["prodid"]))
  {
	
		if(!isset($_SESSION['qty']))
		{
			$_SESSION['qty']=1;
		}
		else
		{
		 $_SESSION['qty']=$_POST[qty];
		}

  }
  
 
 $result= mysql_query("SELECT * FROM products where prod_id='$_GET[prodid]'");
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
	 var myregex = /^[0-9][0-9]{0,3}$|^[0-9][0-9]{0,3}[\.][0-9]$/;

	
	if(document.shop.qty.value=="")
	{
		alert("Enter the quantity");
		return false;
	}
	else if(document.shop.qty.value==0)
	{
		alert("Quantity cannot be Zero");
		return false;
	}

else
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

 
</script>
</head>
    
    
        <div id="content" class="float_r">
         <?php echo $msg; ?>
        	<h1>Shopping Cart</h1>
        	   <form action="" method="post" name="shop">
               
        	<table width="680px" cellspacing="0" cellpadding="5">
                   	  	<tr bgcolor="#ddd">
                        	<th width="220" align="left">Image </th> 
                        	<th width="180" align="left">Description </th> 
                       	  	<th width="100" align="center">Quantity </th> 
                        	<th width="60" align="right">Price </th> 
                        	<th width="60" align="right">Total </th> 
                        	<th width="90"> </th>
                      	</tr>
                        <?php
						while($row=mysql_fetch_array($result))
						{
							echo "<td><img src='$row[imge]' alt='image 01' height=100 width=100/></td>"; 
                        	echo "<td>".$row[product_name]."</td>"; 
                            ?>
                            <td align='center'><input type='text' name='qty' qty style='width: 20px; text-align: right'  value='<?php echo $_SESSION['qty'];?>' onkeypress="return isNumberKey(event)" /> </td>
                          <?php echo "<td align='right'>".$row[price]."</td>"; 
                           echo " <td align='right'>".$_SESSION[qty]*$row[price] ."</td>";
						  echo "<input type='hidden' name='total' value='<?php echo $_SESSION[qty]*$row[price];?>' />";
						  $_SESSION['total']=$_SESSION[qty]*$row[price];
						  
						  
						  if($_POST[qty]>$row[qty])
						{
							echo "<td align='center'>OUT OF STOCK</td>";
						}
						else
						{
						echo" <td align='center'> <a href='cart.php?pid=$row[prod_id]'>Add to Cart</a></td>";
						}
                          
						echo "</tr>";
						}
						?>
                    	
              <tr>
                        	<td colspan="3" align="right"  height="30px">&nbsp;&nbsp; </td>
                            <td align="right" style="background:#ddd; font-weight:bold"><input type="submit" name="updtqty" value="Update Quantity" onclick="return validate()"/></td>
                            <td align="right" style="background:#ddd; font-weight:bold"> Total </td>
                            <td align="right" style="background:#ddd; font-weight:bold"><?php echo $_SESSION["total"];?> </td>
                            <td style="background:#ddd; font-weight:bold"> </td>
						</tr>
                   
		  </table>
                      
                    </form>
                    
            
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
    	<p>
			<a href="index.html">Home</a> | <a href="products.html">Products</a> | <a href="about.html">About</a> | <a href="faqs.html">FAQs</a> | <a href="checkout.html">Checkout</a> | <a href="contact.html">Contact</a>
		</p>

    	Copyright © 2048 <a href="#">Your Company Name</a> | Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
    </div> <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>