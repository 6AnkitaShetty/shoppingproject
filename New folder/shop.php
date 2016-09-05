<?php
$conn=mysql_connect("localhost","root","technology");
if(!$conn)
{
	die("could not connect".mysql_error);
}

mysql_select_db("new",$conn);
/*$sql="insert into person(name,age,salary) values('$_POST[name]','$_POST[age]','$_POST[salary]')";
if(!mysql_query($sql,$conn))
{
	die("error occuered");
}
else
echo("value inserted");*/

//mysql_query("update person set name='jaya', salary=5000 where age=56");

//mysql_query("delete from person where age=25");

$res=mysql_query("select * from person");
echo "no of rows:".mysql_num_rows($res);
echo "<br> no of fields:".mysql_num_fields($res);


echo"<table border=1 width=40%>
<tr>
<th>name</th>
<th>age</th>
<th>salary</th>
</tr>";

while($row=mysql_fetch_array($res))
{
echo "<tr>";
echo "<td>".$row[name]."</td>";
echo "<td>".$row[age]."</td>";
echo "<td>".$row[salary]."</td>";
echo "</tr>";

}
echo "</table>";
?>