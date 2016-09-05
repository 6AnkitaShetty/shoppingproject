<html>
<head>
<title>Alvas College</title>
</head>
<body>

<form action="p2.php" method="get">
name:<input type="text" name="name" />
age:<input type="text" name="age" />
<input type="submit"/>
</form>
<?php
echo $_GET["name"]. " ".$_GET["age"];
?>
</body>
</html>