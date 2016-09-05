
<?php
 session_start();
include("sqlcon.php");

if(isset($_GET["del"]))
{
	$dl="delete from message where mess_id='$_GET[del]'";
	if(mysql_query($dl))
	{
		$msg= "Deleted successfully";
	}
}



if(isset($_SESSION['sup_id']))
{
	include("supplierheader.php");
}
if(isset($_SESSION['adm_id']))
{
		include("header.php");

	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div id="templatemo_main">
	  <div id="sidebar" class="float_l">
       	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>Navigation</h3>   
                <div class="content"> 
            <?php
			if(isset($_SESSION['sup_id']))
{
	include("suppliersidebar.php");
}
if(isset($_SESSION['adm_id']))
{
		include("sidebar.php");

	
}
			
			?>
                </div>
          </div>
   		</div>
        <div id="content" class="float_r" style="background-color:white; color:black;">
<table width="546" height="54" border=1 align="center" class="listing">
  <tr>
    <td>From</td>
    <td>Subject</td>
    <td>Message</td>
    <td>Date</td>
    <td>Delete</td>
  </tr>
  <?php
   $res=mysql_query("select * from message where rcvid='$_SESSION[uid]'");

   while($row=mysql_fetch_array($res))
 {
	
	  echo "<td>".$row[sender_id]."</td>";
	 echo "<td>".$row[subject]."</td>";
	  echo "<td>".$row[msg]."</td>";
	   echo "<td>".$row[date]."</td>";
 echo"<td><a href='msgview.php?del=$row[0]'>Delete</a></td>";
		  ?>
          <td><a href="javascript:void(0)" onClick="window.open('reply.php?stid=<?php echo $row[sender_id];?>','windowname1','width=500, height=600');return false;">Reply</a></td>	
          
          <?php echo"</tr>";
 }

?>
</table>
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


</body>
</html>