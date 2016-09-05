<?php
session_start();
include("sqlcon.php");

$d=date("Y/m/d");
if(isset($_POST["token"]) && ($_POST["token"]==$_SESSION["token"]))
{
if(isset($_POST[submit]))
{
$msg="insert into message (rcvid,subject,msg,sender_id,date) values('$_POST[msgto]','$_POST[sub]','$_POST[msg]','$_SESSION[uid]','$d')";

if(mysql_query($msg))
{ 
echo "Message Sent";
}
else
die(mysql_error());
}
unset($_SESSION["token"]);
}


$res=mysql_query("select * from message");
$new_token=md5(time().rand(0,100));
$_SESSION["token"]=$new_token;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
function validate()
{
	if(document.mesg.msgto.value=="")
	{
		alert("Select Message to");
		return false;
	}
	else if(document.mesg.sub.value=="")
	{
		alert("Enter the subject");
		return false;
	}
	else if(document.mesg.msg.value=="")
	{
		alert("Write Message");
		return false;
	}
	
	
	
	return true;
}
</script>
</head>


<body>
<form action="" method="post" name="mesg">
<br />
<br />
<br />

<table width="546" height="54" border=1 align="center" class="listing">
<tr>
<th colspan=9><center> <h3><font color="white">Message Details</font></h3></center></th></tr>

<input type="hidden" name="token" value="<?= $new_token ?>" />
<tr>
<td>
Message To</td><td align="center"><input type="text" name="msgto" value="<?php echo $_GET['stid'];?>" readonly="readonly"/>
</td></tr>
<tr>
<td >
Subject</td><td align="center"><input type="text" name="sub"   title="Enter subject"  placeholder="Subject"/></td></tr>
<tr>
<td>Message</td><td><textarea name="msg" title="Type Message" placeholder="Message"></textarea></td></tr>


<tr><td colspan=2><center><input type="submit" value="Send Message" name="submit" onclick="return validate()" class="button-1"/></center></td></tr>
</table>
</form>
 


</body>
</html>

