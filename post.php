<?php
session_start();
define('DB_HOST', 'localhost');
define('DB_NAME', 'trial');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME, $con) or die("Failed to connect to MySQL: " . mysql_error());
if($_SESSION['ans']==0){
	$query = mysql_query("SELECT * FROM answer;"  );
	$row = mysql_fetch_array($query);
	if($row){
	$_SESSION['ans']=$row[1];
}
else{
	$_SESSION['ans']=0;
}
}
$q=$_REQUEST['q'];
$s=$_SESSION['name'];
$r="<b>".$s.": </b>".$q."<br>";
if($q==$_SESSION['ans'] && $_SESSION['correct']==0){
	  $r="<span style='color:green'>".$_SESSION['name']." answered correctly!</span><br>";
      $_SESSION['score']+=50;
      $query = mysql_query("UPDATE chat SET score= ".$_SESSION['score']." WHERE usrname = '".$_SESSION['name']."';" );
	  $_SESSION['correct']=1;
}
elseif($q==$_SESSION['ans'] && $_SESSION['correct']==1){
	$r="";
}
if($_SESSION['correct']==1){
	$r="<span style='color:orange'>".$r."</span>";
}
$chatlog=fopen("log.html",a);
fwrite($chatlog,$r);


?>