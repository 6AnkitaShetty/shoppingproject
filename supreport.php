<?php
session_start();
include("sqlcon.php");






include("supplierheader.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>
<script language="javascript">
function val()
{
	var flag=confirm("Do you want to delete the record");
	if(!flag)
	return false;
	else
	return true;
}
</script>
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
        <div id="content" class="float_r" style="background-color:white; color:black;">

<body>
<form action="" method="post" name="">
<table width="546" height="54" border=1 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th colspan=9><center> <h3><font color="white">Report Details</font></h3></center></th></tr>

<tr><th height="65" >Purchase Id</th><th>Product Name</th><th>Customer Name</th><th>Quantity</th><th>Price</th><th>Total</th><th>Purchase Date</th><th>Delivery Date</th><th>Status</th></tr>

 <?php 
  $res=mysql_query("select * from purchase");
    while($row=mysql_fetch_array($res))
 {
	 $rep=mysql_query("select * from products where prod_id='$row[product_id]'");
	 $row1=mysql_fetch_array($rep);
	 
	 $pur=mysql_query("select * from  customerregistration where custid='$row[custid]'");
	 $row2=mysql_fetch_array($pur);
	 
	 echo "<tr>";
	 echo "<td>".$row[purchase_id]."</td>";
	  echo "<td>".$row1[product_name]."</td>";
	   echo "<td>".$row2[name]." ".$row2[lname]."</td>";
	 
	  echo "<td>".$row[quantity]."</td>";
	 echo "<td>".$row[price]."</td>";
	  echo "<td>".$row[total]."</td>";
	 echo "<td>".$row[purchase_date]."</td>";
	  echo "<td>".$row[delivery_date]."</td>";
	 	 echo "<td>".$row[status]."</td>";
	 
 }

?>

</table>
</form>
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


