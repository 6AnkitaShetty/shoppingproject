<?php
session_start();
 include("sqlcon.php"); 
?>
<div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>   <font color="#FFFFFF">Order Summary<a href="http://es.vectorhq.com/" title="más info" class="more_link"  target="_blank"></a></font></h3>   
                <div class="content"> 
                <font color="#FFFFFF">
                	<table width="213" border="1" align="center">
                    <tr>
                    <th>Product</th><th>Qty</th><th>Delivery</th><th>Price</th><th>Total</th></tr>
                    <?php
					$sql=mysql_query("select * from cart where custid='$_SESSION[custid]'");
					while($row=mysql_fetch_array($sql))
					{
						$res=mysql_query("select * from products where prod_id='$row[prod_id]'");
						
						$row1=mysql_fetch_array($res);
						
						echo "<tr>";
						echo "<td>".$row1[product_name]."</td>";
						echo "<td>".$row[qty]."</td>";
						
						echo "<td>3-5 days </td>";
						echo "<td>".$row1[price]."</td>";
						echo "<td>".$row[total]."</td>";
						echo "<tr>";
						$subtotal+=$row[total];
						
					}
					
					?>
                    <tr>
                    <th colspan="4" align="center">Subtotal:</th><td>Rs.<?php echo $subtotal;?></td></tr>
                    <?php
					if($subtotal<500)
					{
						?>
                                    <tr>
                    <th colspan="4" align="center">Shipping Charge:</th><td>Rs.<?php echo $charge=50 ?></td></tr>
                    <?php
					}
					else
					{
						?>
						            <tr>
                    <th colspan="4" align="center">Shipping Charge</th><td><font color="#FF0000"><b>FREE</b></font></td></tr>
                    <?php
					}
					?>
                                <tr>
                    <th colspan="4" align="center">Total:</th><td>Rs.<?php echo $subtotal+$charge;?></td></tr>
                    
                    <?php $_SESSION['total']=$subtotal+$charge; ?>
                    
                    </table>
                    </font>
              </div>
            </div>
          
            
        </div>