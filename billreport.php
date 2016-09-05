<?php
session_start();
include("sqlcon.php");


$res=mysql_query("select * from purchase");
include("indexheader.php");
   include("orderdetail.php");
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" name="purchase">
<table width="546" height="245" border=1 align="center">
<input type="hidden" name="token" value="<?= $new_token ?>" />


<tr>
<th height="47" colspan=8 >Report</th>
</tr><br /><br />
<tr>
  <th height="65" >Product Name</th>
  <th>Quantity</th><th>Price</th><th>Total</th><th>Purchase Date</th><th>Delivery Date</th></tr>

<?php 
 while($row=mysql_fetch_array($res))
 {
	 
	 echo "<tr>";
   
	      echo "<td>".$row[quantity]."</td>";
		     echo "<td>".$row[price]."</td>";
		   echo "<td>".$row[total]."</td>";
		    echo "<td>".$row[purchase_date]."</td>";
		   echo "<td>".$row[delivery_date]."</td>";
		   
	         
	
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




</table>
</form>
</body>
</html>