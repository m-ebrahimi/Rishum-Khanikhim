<?php
require('check.php');
if (isset($_GET["ken"])) {
$myken = $_GET['ken'];
} else {
$myken = $_SESSION['ken'];
}

$uid = $_SESSION['uid'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8;" />
<title>מערכת רישום חניכים - השומר הצעיר</title>
<?php require('cssjs.php'); ?>
</head>
<body>
<?php require 'toolbar.php'; ?>
<div id="container">
<div id="sidebar">
<?php
foreach (glob("blocks/*.php") as $filename)
{
    include $filename;
}
?>
</div>
<div id="content">
<?php
echo '<h2>בקרוב כאן יהיה עמוד הגדרות משתמש.</h2>';
require('con.php');

$con = mysql_connect($db_host,$db_user,$db_pass);
if (!$con)
  {
  die('Could not connect to the server! ' . mysql_error());
  }
if (!mysql_select_db($db_name))
  die("Can't select database");

$query = "SELECT column_name FROM information_schema.columns WHERE table_name = 'members';";
$result=mysql_query($query);

while($row = mysql_fetch_row($result)) {
	foreach($row as $cell) {
		if ($cell != 'id')
			echo $cell.'<br>';
	}
}
mysql_free_result($result);
mysql_close($con);
?>
</div>
</div>
</body>
</html>