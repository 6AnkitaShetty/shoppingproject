<?php
session_start();
 include("sqlcon.php"); 
 if(isset($_POST[submit]))
{
mysql_query("update customerregistration set pincode='$_POST[pincode]', connum='$_POST[mbl]',altnum='$_POST[altp]',address='$_POST[addr1]',billing_addr='$_POST[addr2]',locality='$_POST[loc]',city='$_POST[city]',state='$_POST[state]' where custid='$_SESSION[custid]'");

}

?>
<div id="templatemo_main">
   		
            	<h3> <font color="#FFFFFF">Order Summary<a href="http://es.vectorhq.com/" title="más info" class="more_link"  target="_blank"></a></font></h3>   
                <div class="content"> 
                <font color="#FFFFFF">
                <form action="" method="post">
                	<table width="304" height="206" border="1" align="center">
                    <tr>
                    <th width="58">Product</th><th width="29">Qty</th><th width="68">Delivery</th><th width="40">Price</th><th width="75">Total</th></tr>
                    <?php
					$i=0;
					$sql=mysql_query("select * from purchase where custid='$_SESSION[custid]'");
				
					while($row=mysql_fetch_array($sql))
					{
						
						
						$res=mysql_query("select * from products where prod_id='$row[product_id]'");
						$row1=mysql_fetch_array($res);
						echo "<tr>";
						echo "<td>".$row1[product_name]."</td>";
						echo "<td>".$row[quantity]."</td>";
						echo "<td>3-5 days </td>";
						echo "<td>".$row[price]."</td>";
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
                    
                    </table>
                    </font>
          </form>
          
            
        </div>