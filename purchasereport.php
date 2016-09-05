<?php
session_start();
include("sqlcon.php");


$res=mysql_query("select * from purchase");
include("header.php");

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
<th height="47" colspan=8 >Purchase Detail</th>
</tr><br /><br />
<tr><th height="65" >Purchase id</th><th>product name</th><th>customer name</th><th>quantity</th><th>total</th><th>purchase date</th><th>delivery date</th><th>status</th></tr>

<?php 
 while($row=mysql_fetch_array($res))
 {
	 
	 echo "<tr>";
     echo "<td>".$row[purchase_id]."</td>";
	   echo "<td>".$row[date]."</td>";
	     echo "<td>".$row[qty]."</td>";
		   echo "<td>".$row[quantity]."</td>";
		   echo "<td>".$row[total]."</td>";
		    echo "<td>".$row[purchase_date]."</td>";
		   echo "<td>".$row[delivery_date]."</td>";
		    echo "<td>".$row[status]."</td>";
		  
	         
	 echo"<td><a href='supplier.php?caid=$row[0]'>Edit</a>&nbsp;&nbsp;&nbsp;<a href='supplier.php?del=$row[0]'onclick='return val()'>Delete</a></td>";
	 echo"</tr>";
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