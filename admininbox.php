<?php
session_start();
include("sqlcon.php");


if(isset($_GET["del"]))
{
	$dl="delete from products where mess_id='$_GET[del]'";
	if(mysql_query($dl))
	{
		$msg= "Deleted successfully";
	}
}


$res=mysql_query("select * from message ");
include("header.php");
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
			include("sidebar.php");
			?>
                </div>
          </div>
   		</div>
        <div id="content" class="float_r" style="background-color:white; color:black;">

<body>
<form action="" method="post" name="products">
<table width="546" height="54" border=1 align="center" class="listing">

<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th colspan=8><center> <h3><font color="white">Product Details</font></h3></center></th></tr>

<tr><th height="65" >Delete</th><th>From</th><th>Subject</th><th>Message</th></tr>
 <?php 
    while($row=mysql_fetch_array($res))
 {
	
	 echo "<tr>";
     echo "<td>".$row[msgto]."</td>";
	   echo "<td>".$row[subject]."</td>";
	     echo "<td>".$row[msg]."</td>";
		   echo "<td>".$row[senderid]."</td>";
	         
	 echo"<td><a href='sellprod.php?prodid=$row[0]'>Edit</a>&nbsp;&nbsp;&nbsp;<a href='viewproducts.php?del=$row[0]' onclick='return val()'>Delete</a></td>";
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


