<?php
session_start();
include("sqlcon.php");
$res=mysql_query("select * from maincategory");
$dir="subcategory/";


if(isset($_POST["submit"]))
{
	foreach($_FILES as $key=>$value)
	{
		$filename=$value[name];
		$tmpname=$value[tmp_name];
		$filepath="{$dir}{$filename}";
		move_uploaded_file($tmpname,$filepath);
		
	}
$cat="insert into subcategory (cid,subname,subdescription,imge) values('$_POST[maincat]','$_POST[cat_name]','$_POST[des]','$filepath')";

if(mysql_query($cat))
{ 
$msg="RECORD INSERTED";
}
else
die(mysql_error());
}


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
	if(document.subcat.maincat.value=="" || document.subcat.cat_name.value=="" || document.subcat.des.value=="" || document.subcat.file.value=="")
	{
		alert("Enter all the fields");
		return false;
		}
	
	else if(document.subcat.maincat.value=="")
	{
		alert("select the main category");
		return false;
	}
	else if(document.subcat.cat_name.value=="")
	{
		alert("enter the category name");
		return false;
	}
	else if(document.subcat.des.value=="")
	{
		alert("enter the description");
		return false;
	}
	else if(document.subcat.file.value=="")
	{
		alert("select the image");
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
        <div id="content" class="float_r" style="background-color:white; color:black;">

<body>
<form name="subcat" method="post" action="subcat.php" enctype="multipart/form-data">
<center><?php echo $msg;?></center>
<table width="377" height="176" border=2 align="center" class="listing">
<tr>
<th colspan=2><center> <h3><font color="white">PRODUCT SUB CATEGORY</font></h3></center></th></tr>
<tr>
<td width="55%">Main category</td><td width="45%"><select name="maincat">
  <option value="">--SELECT--</option>
  <?php
while($row=mysql_fetch_array($res))
{
	echo "<option value='$row[cid]'>$row[catname]</option>";
}
?>
</select></td></tr>

<tr>
<td>Sub Category Name</td><td><input type="text" name="cat_name" title="Enter the sub category name"  placeholder="Subcategory"/></td></tr>
<tr>
<td>Description</td><td><textarea name="des" title="Enter Description" placeholder="Description"></textarea></td></tr>
<tr><td>Image:</td><td><input type="file" name="file" /></td>
</tr>
<tr>
<td height="49" colspan=2>
<center> <input type="submit" name="submit"  value="SUBMIT" onclick="return validate()" class="button-2"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="button-1"  /></center></center></td></tr>
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

