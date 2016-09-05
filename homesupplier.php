<?php
session_start();
include("sqlcon.php");
if(!isset($_SESSION["sup_id"]))
{
	header("Location: supplierlogin.php");
}

include("supplierheader.php");

?>
<div id="templatemo_main">
	 
        <div id="content1" class="float_r" style="background-color:white; color:black;">
<table border="1" align="center" cellspacing="10">
<tr>
<td>
<a href="supplier.php"><img src="pics/bn.jpg" width="182" height="137" /><center>Supplier Profile</center></a>
</td>
<td><a href="supplierchange.php"><img src="pics/nbhl.jpg" width="144" height="131" /><center>Change password</center></a></td>
<td><a href="sellprod.php"><img src="pics/jjj.jpg" width="185" height="135" /><center>Add Products</center></a></td>
<td><a href="supplierview.php"><img src="pics/sh.jpg" width="142" height="149" /><center>View Products</center></a></td>


</table>
<table border="1" align="center" cellspacing="10">
  <td><a href="supviewcust.php"><img src="pics/images (7).jpg" width="186" height="135" /><center>View customer</center></a></td>
  
<td><a href="supreport.php"><img src="pics/rep.jpg" width="155" height="138" /><center>Report</center></a></td>
<td><a href="message.php">
  <img src="pics/er.jpg" width="165" height="137" />
  <center>
    Message</center></a></td>
<td><a href="logout.php"><img src="pics/ty.jpg" width="158" height="138" /><center>Logout</center></a></td>
</tr> 

  </table>
         
        <!-----end------->
 <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <?php include("footer.php"); ?>
     <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>