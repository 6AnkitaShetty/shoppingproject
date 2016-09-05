<?php
session_start();
include("sqlcon.php");

$d=date("Y/m/d");
if(isset($_POST["token"]) && ($_POST["token"]==$_SESSION["token"]))
{
if(isset($_POST[submit]))
{
$msg="insert into message (msgto,subject,msg,sender_id,date) values('$_POST[msgto]','$_POST[sub]','$_POST[msg]','$_SESSION[sup_id]','$d')";

if(mysql_query($msg))
{ 
$msg= "Message sent successfully";
}
else
die(mysql_error());
}
unset($_SESSION["token"]);
}


$new_token=md5(time().rand(0,100));
$_SESSION["token"]=$new_token;

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
	if(document.sell.msgto.value=="" || document.sell.sub.value=="" || document.sell.msg.value=="" )
	{
		alert("Enter all the fields");
		return false;
		}
	
	else if(document.sell.msgto.value=="")
	{
		alert("Select Message to");
		return false;
	}
	else if(document.sell.sub.value=="")
	{
		alert("Enter the subject");
		return false;
	}
	else if(document.sell.msg.value=="")
	{
		alert("Write Message");
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
			include("suppliersidebar.php");
			?>
                </div>
          </div>
   		</div>
        <div id="content" class="float_r" style="background-color:white; color:black;">

<body>
<?php echo $msg;?>
<a href="msgview.php">Inbox</a>
<form action="" method="post" name="sell">
<table width="546" height="54" border=1 align="center" class="listing">
<tr>
<th colspan=9><center> <h3><font color="white">Message Details</font></h3></center></th></tr>

<input type="hidden" name="token" value="<?= $new_token ?>" />

<tr>
<td>
To</td><td align="center"><input type="text" name="msgto" title="Enter subject"  placeholder="Subject"/></td></tr>
<tr>
<td>
Subject</td><td align="center"><input type="text" name="sub"title="Type Message" placeholder="Message"></textarea></td></tr>
<tr>
<td>
Message</td><td align="center"><textarea name="msg" title="Type Message" placeholder="Message"></textarea></td></tr>



<tr><td colspan=2><center><input type="submit" value="Send Message" name="submit" onclick="return validate()" class="button-1"/></center></td></tr>
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

