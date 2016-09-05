<?php
session_start();
include("sqlcon.php");


if(isset($_POST[submit]))
{
$rep="insert into report(productname,customername,quantity,total,purchasedate,deliverydate) values('$_POST[proname]','$_POST[custname]','$_POST[quantity]','$_POST[total]','$_POST[purdate]','$_POST[deldate]')";

if(mysql_query($rep)) 
echo "record inserted";
}
include("header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
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
        <div id="content" class="float_r" style="background-color:white; color:black;">
<body>
<form action="" method="post" name="reports">
<table width="546" height="245" border=1 align="center">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th height="47" colspan=2 >Product Purchase Report</th>
</tr><br /><br />
<tr>
<td>Product Name</td><td align="center"><input type="text" name="proname"/></td></tr>
<tr>
<td>Customer Name</td><td align="center"><input type="text" name="custname"/></td></tr>
<tr>
<td>Quantity</td><td align="center"><input type="text" name="quantity"/></td></tr>
<tr>
<td>Total</td><td align="center"><input type="text" name="total"/></td></tr>
<tr>
<td>Purchase Date </td><td align="center"><input type="text" name="purdate"/></td></tr>
<tr>
<td>Delivery Date</td><td align="center"><input type="text" name="deldate"/></td></tr>

<tr>
<td colspan="2" align="center"><input type="submit"  name="submit"/></td></tr>

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

