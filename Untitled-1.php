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