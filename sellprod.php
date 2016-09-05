<?php
session_start();
include("sqlcon.php");
$UPLOAD="products/";
$category=mysql_query("select * from maincategory");
$subcategory=mysql_query("select * from subcategory");
$comp=mysql_query("select * from supplier");
if(isset($_POST["submit"]))
{
	
$image=rand().$_FILES["file"]["name"];
$image_file="{$UPLOAD}{$image}";
	move_uploaded_file($_FILES["file"]["tmp_name"],$image_file);
$sql="insert into products(cat_id,subcat_id,supplier_id,product_name,price,warranty,stock_status,delivered_in,prod_specification,imge,start_at,end_at,qty) values('$_POST[catid]','$_POST[subcat]','$_POST[compname]','$_POST[prodnm]','$_POST[price]','$_POST[prodwar]','$_POST[stkstate]','$_POST[delin]','$_POST[prspec]','$image_file','$_POST[strtat]','$_POST[endat]','$_POST[qty]')";
if(mysql_query($sql))
{
	$msg="Product added successfully";
}
else
die(mysql_error());
}

if(isset($_POST["update"])) 
{
	if($_FILES["file"]["name"]=="")
	{
		$image_file=$_POST[imge];
	}
	else
	{
		$image=rand().$_FILES["file"]["name"];
$image_file="{$UPLOAD}{$image}";
	move_uploaded_file($_FILES["file"]["tmp_name"],$image_file);
	}
$update="update products set cat_id='$_POST[catid]',subcat_id='$_POST[subcat]',product_name='$_POST[prodnm]',price='$_POST[price]',warranty='$_POST[prodwar]',stock_status='$_POST[stkstate]',delivered_in='$_POST[delin]',prod_specification='$_POST[prspec]',imge='$image_file',start_at='$_POST[strtat]',end_at='$_POST[endat]',qty='$_POST[qty]' where prod_id='$_POST[prodid]'";
if(mysql_query($update))
{
?>
<script language="javascript">
alert("Products information updated successfully");
</script>

<?php
header("Location: supplierview.php");
}
else
die(mysql_error());

}
	

if(isset($_GET["prodid"]))
{
	$p=mysql_query("select * from products where prod_id='$_GET[prodid]'");
	while($row=mysql_fetch_array($p))
	{
		$a=$row[0];
		$b=$row[1];
		$c=$row[2];
		$d=$row[3];
		$e=$row[4];
		$f=$row[5];
		$g=$row[6];
		$h=$row[7];
		$i=$row[8];
		$j=$row[9];
		$k=$row[10];
		$l=$row[11];
		$m=$row[12];
		$n=$row[13];
	}
	
		
}
include("supplierheader.php");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
function validate()
{
	if(document.sell.catidvalue=="" || document.sell.subcat.value=="" || document.sell.compname.value=="" || document.sell.prodnm.value=="" || document.sell.price.value=="" || document.sell.prodwar.value=="" || document.sell.stkstate.value=="" || document.sell.delin.value=="" || document.sell.prspec.value=="" || document.sell.file.value=="" || document.sell.strtat.value=="" || document.sell.endat.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	else if(document.sell.catid.value=="")
	{
		alert("Select the category");
		return false;
	}
	else if(document.sell.subcat.value=="")
	{
		alert("Select the sub category");
		return false;
	}
	else if(document.sell.compname.value=="")
	{
		alert("Select the company name");
		return false;
	}
	else if(document.sell.prodnm.value=="")
	{
		alert("Enter the product name ");
		return false;
	}
	else if(document.sell.price.value=="")
	{
		alert("Enter the price");
		return false;
	}
	else if(document.sell.prodwar.value=="")
	{
		alert("Enter the product warranty");
		return false;
	}
	else if(document.sell.stkstate.value=="")
	{
		alert("Select the stock status");
		return false;
	}
	else if(document.sell.delin.value=="")
	{
		alert("Enter the delivery days");
		return false;
	}
	else if(document.sell.prspec.value=="")
	{
		alert("Enter the product specification");
		return false;
	}
	else if(document.sell.file.value=="")
	{
		alert("Select the image");
		return false;
	}
	else if(document.sell.strtat.value=="")
	{
		alert("Enter the start date");
		return false;
	}
	else if(document.sell.endat.value=="")
	{
		alert("Enter the end date");
		return false;
	}
	
	
	return true;
}
function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            {
				window.event.returnValue = false; 
alert("Enter only Numbers");
			}
         return true;
      }

</script>
<script>
function show(str)
{
	if (str.length==0)
  { 
  document.getElementById("txt").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txt").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getsubcat.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>



<body>
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
        <div id="content" class="float_r" style="background-color:white; color:black">


<form action="" method="post" name="sell" enctype="multipart/form-data">
<center><?php echo $msg; ?><center>


<table width="546" height="359" border=1 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<input type="hidden" name="prodid" value="<?php echo $a; ?>"/>
<input type="hidden" name="imge" value="<?php echo $j;?>" />
<tr>
<th colspan=2><center> <h3><font color="white">Add Products</font></h3></center></th></tr>
<tr>
<td>
Category</td><td align="center"><select name="catid" onChange="show(this.value)">
<option value="">--SELECT--</option>
<?php
while($row=mysql_fetch_array($category))
{
	if($b==$row[cid])
	{
		echo "<option value='$row[cid]' selected='selected'>$row[catname]</option>";
	}
	else
	{
	echo "<option value='$row[cid]'>$row[catname]</option>";
    }
}

?>
</select>

</td></tr>

 <td width="61">Sub Category</td>
      <td align ="center" width="284"><label for="subcat"></label>
        <span id="txt">
          <select name="subcat" id="subcat">
		  <option value="">--Select--</option>
          <?php
while($row=mysql_fetch_array($subcategory))
{
	if($c==$row[subcatid])
	{
		echo "<option value='$row[subcatid]' selected='selected'>$row[subname]</option>";
	}
	else
	{
	echo "<option value='$row[subcatid]'>$row[subname]</option>";
    }
}

?>
          
		  </select>
        </span></td>
    </tr>

<tr>
<td>
Company Name</td><td width=="312" align="center"><input type="text" name="compname" value="<?php echo $_SESSION[compname];?>"  readonly="readonly"/ >
</td> </tr>
<tr>
<td>
Product Name</td><td align="center"><input type="text" name="prodnm" value="<?php echo $e;?>" title="Enter Product name"  placeholder="Product Name"/></td></tr>
<tr>
<td>
Price</td><td width=="312" align="center"><input type="text" name="price" value="<?php echo $f;?>" title="Enter the price"  placeholder="Product price"  onkeypress="return isNumberKey(event)"/></td> </tr>
<tr>
<td>
Product warrenty</td><td width=="312" align="center"><input type="text" name="prodwar" value="<?php echo $g;?>" title="Enter product warranty"  placeholder="Product Warranty" /></td> </tr>
<tr>
<td>
Stock Status</td><td width=="312" align="center"><select name="stkstate">
<option value="">--SELECT--</option>
<option value="Available"
<?php
if($h=="Available")
{
	echo "selected";
}
?>
>Available</option>
<option value="Not Available"
<?php
if($h=="Not Available")
{
	echo "selected";
}
?>
>Not Available</option>
</select></td> </tr>
<tr>
<td>
Delivered In</td><td width=="312" align="center"><input type="text" name="delin" value="<?php echo $k;?>" title="Enter delivery days"  placeholder="Delivery Day"/></td> </tr>
<tr>
<td>
Product Specification</td><td width=="312" align="center"><textarea name="prspec" title="Enter product specification" placeholder="Product specification"><?php echo $i;?> </textarea></td> </tr>
<tr><td>
Product Quantity</td><td width=="312" align="center"><input type="text" name="qty" onKeyPress="return isNumberKey(event)" title="Enter Product Quantity"  placeholder="Product Quantity" value="<?php echo $n;?>"/></td> </tr>

<?php
if(isset($_GET["prodid"]))
{

?><tr>
<td>Image</td><td width=='312' align='center'><input type='file' name='file' id='file' /><br />

<img src='<?php echo $j;?>' width='100' height='100' />
</td></td> </tr>
<?php }
else
{
	?>
    <tr>
<td>Image</td><td width=='312' align='center'><input type='file' name='file' id='file' />

</td></tr>
    <?php
}
?>
<tr>
<td>
Start_At</td><td><input type="date" name="strtat" value="<?php echo $l;?>" title="Enter Start Date"  placeholder="Start Date"/></td> </tr>
<tr>
<td>
End_At</td><td width=="312" align="center"><input type="date" name="endat" value="<?php echo $m;?>" title="Enter End Date"  placeholder="End Date"/></td> </tr>
<?php
if(isset($_GET[prodid]))
{
	?>
<tr>	
<td colspan="2" align="center"><center><input type="submit"  name="update" value="update" class="button-1"/></center></td></tr>
<?php
}
else

{
	?>
<tr><td colspan=2><center><input type="submit" value="submit" name="submit" onClick="return validate()" class="button-1"/></center></td></tr>
<?php
}
?>
</table></form>
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