<?php 
session_start();

define('DB_HOST', 'localhost');
define('DB_NAME', 'trial');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME, $con) or die("Failed to connect to MySQL: " . mysql_error());
$query = mysql_query("SELECT * FROM chat;"  );
$row = mysql_fetch_array($query);

echo $row[1]." - ".$row[2].$row[3]."<br>";
$row = mysql_fetch_array($query);

echo $row[1]." - ".$row[2].$row[3]."<br>";
$row = mysql_fetch_array($query);

echo $row[1]." - ".$row[2].$row[3]."<br>";
$row = mysql_fetch_array($query);

echo $row[1]." - ".$row[2].$row[3]."<br>";
/*

$query = mysql_query("SELECT * FROM chat WHERE turn=1;"  );
$row = mysql_fetch_array($query);
$query= mysql_query("UPDATE chat SET turn = 0 WHERE turn = 1;");
$dummy=1+((int)$row[0])%4;
$query= mysql_query("UPDATE chat SET turn = 1 WHERE id = ".$dummy.";");
*/

?>