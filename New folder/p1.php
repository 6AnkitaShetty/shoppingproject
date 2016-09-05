<?php
session_start();
?>
<html>
<head><title>Welcome</title>
</head>
<body>
<?php
if(isset($_SESSION[uid]))
{
echo "Welcome to Technopulse";
echo "<a href='logout.php'>LOGOUT</a>";
}
else
echo "sessiom is closed log in to continue";

?>
</body>
</html>