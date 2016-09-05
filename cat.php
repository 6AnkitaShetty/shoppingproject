<?php
session_start();
include("sqlcon.php");
if(isset($_POST["token"]) && ($_POST["token"]==$_SESSION["token"]))
{
if(isset($_POST["submit"]))
{
	$sql="insert into maincategory (catname,catdes) values('$_POST[cname]','$_POST[catdes]')";
if(mysql_query($sql))
{
	$msg="Product category is added successfully";
}
else
die(mysql_error());
}
unset($_SESSION["token"]);
}

if(isset($_GET["caid"]))
{
	$result=mysql_query("select * from maincategory where cid='$_GET[caid]'");
	while($row=mysql_fetch_array($result))
	{
		$id=$row[cid];
		$catname=$row[catname];
		$cdes=$row[catdes];
	}
}
if(isset($_POST["update"]))
{
	$updt="update maincategory set catname='$_POST[cname]', catdes='$_POST[catdes]' where cid='$_POST[cid]'";
	if(mysql_query($updt))
	{
		$msg= "UPDATED SUCCESSFULLY";
	}
	
}
if(isset($_GET["del"]))
{
	$dl="delete from maincategory where cid='$_GET[del]'";
	if(mysql_query($dl))
	{
		$msg= "Deleted successfully";
	}
}
 $res=mysql_query("select * from maincategory");

$new_token=md5(time().rand(0,100));
$_SESSION["token"]=$new_token;
include("header.php");
	?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Category</title>
<script language="javascript">
function validate()
{
	if(document.pcat.cname.value=="" || document.pcat.catdes.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	
	else if(document.pcat.cname.value=="")
	{
		alert("enter the category name");
		return false;
	}
	
	
	
	else if(document.pcat.catdes.value=="")
	{
		alert("enter the category description");
		return false;
	}
	return true;
}
</script>
	
</head>
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
        <div id="content" class="float_r" style="background-color:white; color:black">
<body>
<form name="pcat" action="cat.php" method="post">
<center><?php echo $msg;?></center>
<table width="377" height="176" border=2 align="center" class="listing">
<input type="hidden" name="token" value="<?= $new_token ?>" />
<input type="hidden" name="cid" value="<?php echo $id;?>" /> 
<tr>
<th colspan=2><center> <h3><font color="white">PRODUCT CATEGORY</font></h3></center></th></tr>
<tr>
<td width="97">Category Name:</td><td width="139" align="center"><input type="text" name="cname" value="<?php echo $catname;?>" title="Enter Category name" placeholder="Category" /></td> </tr>

<tr>
<td width="97">Category Description:</td><td width="139" align="center"><input type="text" name="catdes" value="<?php echo $cdes;?>" title="Enter category description" placeholder="Category Description" /></td> </tr>
<?php
if(isset($_GET["caid"]))
{
	?><tr>
<td height="49" colspan=2 align="center">
 <center> <input type="submit" name="update"  value="UPDATE" class="button-2"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="button-1"  /></center>
</td></tr>
<?php
}
else
{
	?>
<tr>
<td height="49" colspan=2>
<center> <input type="submit" name="submit"  value="Add" onclick="return validate()" class="button-2"/>
 <input type="reset"  class="button-1" /></center></td></tr> 


<?php
}
?>
</table>
</form>
<br />
<br />
<br />
 <table width="337" height="57" border="1" align="center" class="listing">
 <tr><th >Category Name</th><th>Category Description</th><th>Action</th></tr>
 <?php 
    while($row=mysql_fetch_array($res))
 {
	 echo "<tr>";
	 echo "<td>".$row[1]."</td>";
	 echo "<td>".$row[2]."</td>";
	 echo"<td><a href='cat.php?caid=$row[0]'>Edit</a>&nbsp;&nbsp;&nbsp;<a href='cat.php?del=$row[0]'>Delete</a></td>";
	 echo"</tr>";
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