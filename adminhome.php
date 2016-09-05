<?php
session_start();
include("sqlcon.php");


if(!isset($_SESSION["uid"]))
{
	header("Location: login.php");
}

include("header.php");

?>
<div id="templatemo_main">
	 
        <div id="content1" class="float_r" style="background-color:white; color:black;">
<table border="1" align="center" cellspacing="10">
<tr>
<td>
<a href="adminprofile.php"><img src="pics/ewq.jpg" width="163" height="145" /><center>Admin Profile</center></a>
</td>
<td><a href="adchange.php"><img src="pics/pwd.jpg" width="156" height="143" /><center>Change password</center></a></td>
<td><a href="cat.php"><img src="pics/bv.jpg" width="146" height="142" /><center>Category</center></a></td>
<td><a href="subcat.php"><img src="pics/rew.jpg" width="158" height="140" /><center>Sub Category</center></a></td>
<td><a href="viewcustomer.php"><img src="pics/images (7).jpg" width="138" height="141" /><center>View Customer</center></a></td>
</table>

<table border="1" align="center" cellspacing="10">
  <td><a href="viewproducts.php"><img src="pics/vb (2).jpg" width="165" height="146" /><center>View Products</center></a></td>
<td><a href="viewsupplier.php"><img src="pics/uuu.jpg" width="159" height="143" /><center>View Supplier</center></a></td>

<td><a href="purreport.php"><img src="pics/rep.jpg" width="134" height="138" /><center>Report</center></a></td>
<td><a href="message.php">
  <img src="pics/er.jpg" width="142" height="137" />
  <center>
    Message</center></a></td>
<td><a href="logout.php">
  <img src="pics/ty.jpg" width="150" height="138" />
  <center>
    Logout</center></a></td>
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