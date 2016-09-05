 <?php
 session_start();
 $del="delete from cart where custid='$_SESSION[custid]'";
	  if(mysql_query($del))
 {
	 ?>
     <script language="javascript">
	 alert("deleted");
	 </script>
     <?php
 }
 header("Location: custlogout.php");
 ?>