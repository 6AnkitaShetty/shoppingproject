<?php
session_start();
 include("sqlcon.php"); 
 $pdate=date("Y/m/d");
 $d1=mktime(0,0,0,date(m),date(d)+7,date(Y));
 $deldate=date("Y/m/d",$d1);
if(isset($_GET["prodid"]))
  {
  $result= mysql_query("SELECT * FROM products where prod_id='$_GET[pid]'");
  }
  
 if(isset($_GET['pid']))
 {
	 if(isset( $_SESSION["custid"]))
	 {
	 $r="insert into cart(custid,prod_id,qty,total) values('$_SESSION[custid]','$_GET[pid]','$_SESSION[qty]','$_SESSION[total]')";
	 if(mysql_query($r))
	 {
		$msg= "product added to cart";
		header("Location: cart.php");


	 }
	 else
	 echo "error".mysql_error();
	 }
	
	
 }
 include("indexheader.php");
 include("orderdetail.php");
?>  
  
 
         
        <div id="content" class="float_r">
        	<h1>Cart Details</h1>
            <br />
            <?php echo $msg;?>
            <br />
            
            	<table width="680px" cellspacing="0" cellpadding="5" class="CSSTableGenerator">
                   	  	<tr bgcolor="#ddd">
                        	<th width="220" align="left">Image </th> 
                        	<th width="180" align="left">Product name </th> 
                       	  	<th width="100" align="center">Quantity </th> 
                        	<th width="60" align="right">Price </th> 
                        	<th width="60" align="right">Total </th> 
                        	<th width="90"> </th>
                      	</tr>
                        <?php
						 if(isset($_GET["del"]))
{
	$dl="delete from cart where prod_id='$_GET[del]'";
	if(mysql_query($dl))
	{
		$msg= "Deleted successfully";
	}
}
	 $result1=mysql_query("select * from cart where custid='$_SESSION[custid]'");

						while($row=mysql_fetch_array($result1))
						{
		$prod=mysql_query("select * from products where prod_id='$row[prod_id]'");
		$row1=mysql_fetch_array($prod);
							echo"<tr>";
							echo "<td><img src='$row1[imge]' height=100/></td>";
							echo "<td>".$row1[product_name]."</td>";
							echo "<td>".$row[3]."</td>";
							echo "<td>".$row1[price]."</td>";
							echo "<td>".$row[4]."</td>";
									if(isset($_POST["purchase"]))
					{
						echo "<td></td>";
					
					}
					else
					{
							 echo" <td><a href='cart.php?del=$row[prod_id]'>Remove</a></td>";
					}
							echo "<tr>";
							$grandtotal+=$row[4];
						
						}
						?>
						<form action="" method="post">
                        
						<?php
						$query=mysql_query("select * from purchase");
					
							$count=mysql_num_rows($query);
						
							if($count!=0)
							{
								$billno=$count+1;
                             }
							else
							{
							$billno=1;
							}
							echo"<input type=hidden name=billno value='$billno'/>";
						     $_SESSION[billno]=$billno;
							if(isset($_POST["purchase"]))
					{
						

					 $result2=mysql_query("select * from cart where custid='$_SESSION[custid]'");

						while($row=mysql_fetch_array($result2))
						{
		$prod1=mysql_query("select * from products where prod_id='$row[prod_id]'");
		$row1=mysql_fetch_array($prod1);
						
						           
							$prodid=$row1[prod_id];
							$qty1=$row[3];
							$price=$row1[price];
							$total=$row[4];
							$grandtotal1+=$row[4];
						
		$sql="insert into purchase(custid,product_id,quantity,price,total,purchase_date,delivery_date,status,billid) values('$_SESSION[custid]','$prodid','$qty','$price','$total','$pdate','$deldate','Pending','$_POST[billno]')";
		if(mysql_query($sql))
		{
			?>
            <script language="javascript">
			alert("Product purchased successfully");
			</script>
            <?php
			
		}
		else
		{
		echo "error".mysql_error();
		}
		$qty=$row1[qty];
		$r=$qty-$_SESSION[qty];
mysql_query("update products set qty='$r' where prod_id='$row1[prod_id]'");
					}
					
				
					}
					else
					{
					$msg= "error".mysql_error();
							
						}
					
						
						?>
         <tr bgcolor="#ddd">
						<th></th><th></th><th></th><th width="50">Grand Total:</th>
                        <td><?php echo $grandtotal; ?></td><td></td>
                        </tr>
        
    
        </table>
          <div style="float:right; width: 215px; margin-top: 20px;">
                    <p><input type="submit" name="purchase" value="Purchase Now" /></p>
					<p><a href="checkout.php">Proceed to checkout</a></p>
                    <p><a href="index.php">Continue shopping</a></p>
                    	
          </div> 
        </div>
        </form>
        <center> 
         <img src="pics/ppo.jpg" width="100" height="100">
         <?php
						$query=mysql_query("select * from cart");
					
							$count=mysql_num_rows($query);
							echo $count;
						?>
        </center>
        
<div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    <?php
	include("footer.php");?>