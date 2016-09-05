
<?php
session_start();
include("sqlcon.php");
include("header.php");
if(isset($_GET[purid]))
{
mysql_query("update purchase set status='$_GET[status]' where purchase_id='$_GET[purid]'");
}
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


<?php $perpage = 5;

if(isset($_GET["page"]))

{

$page = intval($_GET["page"]);

}

else

{

$page = 1;

}

$calc = $perpage * $page;

$start = $calc - $perpage;

$result = mysql_query("select * from purchase  order by purchase_id desc Limit  $start, $perpage ");

$rows = mysql_num_rows($result);

if($rows)

{

$i = 0;
?>
<table width="546" height="54" border=1 align="center" class="listing">

<tr>
<th colspan=9><center> <h3><font color="white">Report Details</font></h3></center></th></tr>

<tr><th height="65" >Purchase Id</th><th>Product Name</th><th>Customer Name</th><th>Quantity</th><th>Price</th><th>Total</th><th>Purchase Date</th><th>Delivery Date</th><th>Status</th></tr>
<?php
while($row=mysql_fetch_array($result))
{
	$rep=mysql_query("select * from products where prod_id='$row[product_id]'");
	 $row1=mysql_fetch_array($rep);
	 
	 $pur=mysql_query("select * from  customerregistration where custid='$row[custid]'");
	 $row2=mysql_fetch_array($pur);
	 
	 echo "<tr>";
	 echo "<td>".$row[purchase_id]."</td>";
	 echo "<input type='hidden' name='purid[]' value='$row[purchase_id]'/>";
	  echo "<td>".$row1[product_name]."</td>";
	   echo "<td>".$row2[name]." ".$row2[lname]."</td>";
	 
	  echo "<td>".$row[quantity]."</td>";
	 echo "<td>".$row[price]."</td>";
	  echo "<td>".$row[total]."</td>";
	 echo "<td>".$row[purchase_date]."</td>";
	  echo "<td>".$row[delivery_date]."</td>";
	  	  echo "<td>".$row[status]."</td>";

	 	 
		 echo "<td><a href='purreport.php?purid=$row[purchase_id]&status=Delivered'>Delivered</a><br />
		 <a href='purreport.php?purid=$row[purchase_id]&status=Shipped'>Shipped</a>
		 </td></tr>";
}
}
?>
</table><br>
<br>

 <?php


if(isset($page))
{
$result = mysql_query("select Count(*) As Total from purchase");
  $rows = mysql_num_rows($result);
  if($rows)
  {
   $rs = mysql_fetch_array($result);
   $total = $rs["Total"];
  }
  $totalPages = ceil($total / $perpage);
  if($page <=1 )
  {
   echo "<span id='page_links' style='font-weight:bold;border:1px solid black;margin:3px;padding:4px' >&nbsp;Pre&nbsp;</span>";
  }
  else
  {
   $j = $page - 1;
   echo "<span><a id='page_a_link' href='purreport.php?page=$j'>&nbsp;Pre&nbsp;</a></span>";
  }
  for($i=1; $i <= $totalPages; $i++)
  {
   if($i<>$page)
   {
    echo "<span><a href='purreport.php?page=$i' id='page_a_link'>&nbsp;$i&nbsp;</a></span>";
   }
   else
   {
    echo "<span id='page_links' style='font-weight:bold;border:1px solid black;margin:3px;padding:4px' >&nbsp;$i&nbsp;</span>";
   }
  }
  if($page == $totalPages )
  {
   echo "<span id='page_links'style='font-weight:bold;border:1px solid black;margin:3px;padding:4px' >&nbsp;Next&nbsp;</span>";
  }
  else
  {
   $j = $page + 1;
   echo "<span ><a href='purreport.php?page=$j' id='page_a_link'>Next</a></span>";
  }
 }?>
 
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
