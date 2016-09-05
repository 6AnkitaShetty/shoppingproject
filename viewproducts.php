<?php
session_start();
include("sqlcon.php");


if(isset($_GET["del"]))
{
	$dl="delete from products where prod_id='$_GET[del]'";
	if(mysql_query($dl))
	{
		$msg= "Deleted successfully";
	}
}



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
<h4><center><?php echo $msg;?></center></h4>
<table width="546" height="54" border=1 align="center" class="listing">

<input type="hidden" name="token" value="<?= $new_token ?>" />
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

$result=mysql_query("select products.*,supplier.compname,maincategory.catname from products inner join supplier on products.supplier_id=supplier.compname inner join maincategory on products.cat_id=maincategory.cid order by  prod_id desc Limit  $start, $perpage");

$rows = mysql_num_rows($result);

if($rows)

{

$i =0;?>
<tr>
<th colspan=8><center> <h3><font color="white">Product Details</font></h3></center></th></tr>

<tr><th height="65" >Image</th><th>Product Name</th><th>Company</th><th>Category</th><th>Price</th><th>Start At</th><th>End At</th><th>Actions</th></tr>
 <?php 
    while($row=mysql_fetch_array($result))
 {
	 $img=$row[10];
	 echo "<tr>";
	 ?><td align='center'><img src=<?php echo $row[imge];?> width=50 height=50 /></td>
	 <?php echo "<td>".$row[4]."</td>";
	  echo "<td>".$row[compname]."</td>";
	 echo "<td>".$row[catname]."</td>";
	  echo "<td>".$row[price]."</td>";
	 echo "<td>".$row[11]."</td>";
	 	 echo "<td>".$row[12]."</td>";
	 echo"<td><a href='viewproducts.php?del=$row[0]' onclick='return val()'>Delete</a></td>";
	 echo"</tr>";
 }
}
?>

</table>
</form>

<br /><br />
<?php


if(isset($page))
{
$result = mysql_query("select Count(*) As Total from products");
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
   echo "<span><a id='page_a_link' href='viewproducts.php?page=$j'>&nbsp;Pre&nbsp;</a></span>";
  }
  for($i=1; $i <= $totalPages; $i++)
  {
   if($i<>$page)
   {
    echo "<span><a href='viewproducts.php?page=$i' id='page_a_link'>&nbsp;$i&nbsp;</a></span>";
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
   echo "<span ><a href='viewproducts.php?page=$j' id='page_a_link'>Next</a></span>";
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


