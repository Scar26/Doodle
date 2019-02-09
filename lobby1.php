<?php
session_start();
define('DB_HOST', 'localhost');
define('DB_NAME', 'trial');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME, $con) or die("Failed to connect to MySQL: " . mysql_error());
$query = mysql_query("SELECT * FROM chat;"  );
$ret="";
$lol="";
$row=1;
$indice=$_SESSION['id']+1;
while($row){
$row = mysql_fetch_array($query);
if($_SESSION['name']==$row[1]){
	$lol='style="color:#00cc00; margin-left 30px; font-weight:bolder"';
}
else
{
	$lol="";
}
	$ret =$ret."<span ".$lol.">".$row[1]."</span><br>";
}
echo $ret;
?>