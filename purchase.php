<?php
session_start();
include("sqlcon.php");

if(isset($_POST[submit]))
{
$purchase="insert into purchase(purchase_id,product_id,cust_id,quantity,total,purchase_date,delivery_date,comments) values('$_POST[purid]','$_POST[proid]','$_POST[custid]','$_POST[quantity]','$_POST[total]','$_POST[purdate]','$_POST[deldate]','$_POST[comments])";

if(mysql_query($purchase)) 
{
echo "record inserted";
}
else
die(mysql_error());
}
if(isset($_GET["purid"]))
{
	$p=mysql_query("select * from purchase where purchase_id='$_GET[purid]'");
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

	}
	
		
}
$res=mysql_query("select * from purchase");
$new_token=md5(time().rand(0,100));
$_SESSION["token"]=$new_token;

include("header.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
function validate()
{
	if(document.purchase.purid.value=="")
	{
		alert("enter the purchase id");
		return false;
	}
	else if(document.purchase.proid.value=="")
	{
		alert("enter the product id");
		return false;
	}
	else if(document.purchase.custid.value=="")
	{
		alert("enter the customer id");
		return false;
	}
	else if(document.purchase.quantity.value=="")
	{
		alert("select the quantity");
		return false;
	}
	else if(document.purchase.total.value=="")
	{
		alert("enter the total");
		return false;
	}
	else if(document.purchase.purdate.value=="")
	{
		alert("enter the purchase date");
		return false;
	}
	else if(document.cust.deldate.value=="")
	{
		alert("enter the delete date");
		return false;
	}
	else if(document.cust.comments.value=="")
	{
		alert("enter comments");
		return false;
	}
	
		
	return true;
}
</script>
</head>

<body>
<form action="" method="post" name="purchase">
<table width="546" height="245" border=1 align="center">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<th height="47" colspan=2 >Purchase Detail</th>
</tr><br /><br />
<tr>
<td>
Purchase_id</td><td align="center"><input type="text" name="purid"/></td></tr>
<tr>
<td>
Product_id</td><td align="center"><input type="text" name="proid"/></td></tr>
<tr>
<td>
Customer_id</td><td align="center"><input type="text" name="custid"/></td></tr>
<tr>
<td>
Quantity</td><td align="center"><input type="text" name="quantity"/></td></tr>
<tr>
<td>
Total</td><td align="center"><input type="text" name="total"/></td></tr>
<tr>
<td>
Purchase Date</td><td align="center"><input type="text" name="purdate"/></td></tr>

<tr>
<td>
Delivery Date</td><td align="center"><input type="text" name="deldate"/></td></tr>
<tr>
<td>
Comments</td><td align="center"><textarea name="comments"></textarea></td></tr>


<tr>
<td colspan="2" align="center"><input type="submit"  name="submit" onclick="return validate()"/></td></tr>




</table>



</body>
</html>