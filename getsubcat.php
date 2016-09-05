
<?php
session_start();
include("sqlcon.php");
$q = ($_GET['q']);

?>
<select name='subcat' id='subcat'>
<option value=" ">--Select--</option>
<?php
$sql=mysql_query("SELECT * FROM subcategory WHERE cid = '$q'");
while($rows = mysql_fetch_array($sql))
  {
		echo "<option value='$rows[subcatid]'>$rows[subname]</option>
";		
		
  }
 echo" </select>";
 

?>
