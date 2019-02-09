<?php
session_start();
define('DB_HOST', 'localhost');
define('DB_NAME', 'trial');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME, $con) or die("Failed to connect to MySQL: " . mysql_error());
$query = mysql_query("DELETE FROM answer" ) ;
$_SESSION['correct']=0;
$_SESSION['ans']=0;
$i=$_SESSION['id']-1;
  $n= array_search(1,$_SESSION['turns']);
  $file=fopen("log.html",'w');
  fclose($file);
  switch($n){
  	case 0: 

  			$_SESSION['turns']= array(0,1,0,0); 
  			break;
  	case 1: 
  			$_SESSION['turns']= array(0,0,1,0); 
  			break;
  	case 2: 
  			$_SESSION['turns']= array(0,0,0,1); 
  			break;
  	case 3: 
  			$_SESSION['turns']= array(1,0,0,0); 
  			break;
  }
$_SESSION['turn']=$_SESSION['turns'][$i];
echo $_SESSION['turn'];
if($_SESSION['turn']==0){
echo "<script>window.location='background.php';</script>";
}
else{
	echo "<script>window.location='game.php';</script>";
}
?>