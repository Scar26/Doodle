<?php 
session_start();
define('DB_HOST', 'localhost');
define('DB_NAME', 'trial');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME, $con) or die("Failed to connect to MySQL: " . mysql_error());
function NewUser()
{   $_SESSION['name']=$_POST['user'];

    $_SESSION['score']=0;
    $named=$_POST['user'];

    $scored=$_SESSION['score'];
    
    $query = mysql_query("SELECT * FROM chat;"  );
    $row = mysql_fetch_array($query);
    $turn=0;
    echo $query;    
    if(!$row){
        $turn=1;
    }

    $_SESSION['turn']=$turn;
    $query = mysql_query("SELECT MAX(id) FROM chat;"  );
    $row = mysql_fetch_array($query);
    $id=0;
    if($row){
    $id=(int)$row[0]+1;
    }
    $query    = "INSERTINTO  chat (id,usrname,score,turn) VALUES ('$id','$named','$scored','$turn')";

    $data = mysql_query($query) or die(mysql_error());

    if ($data) {
        echo '<script type="text/javascript">
                   alert = "You have been resgistered";
                   window.location = "lobby.php";
     </script>';
    }
    $_SESSION['turns']= array(1,0,0,0);
$query = mysql_query("SELECT * FROM chat WHERE usrname = '$_POST[user]'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION['id']=$row[0]-1;

        
}
function SignUp()
{
    $query = mysql_query("SELECT MAX(id) FROM chat;"  );
    $row = mysql_fetch_array($query);
    if($row[0]<=3){
    if (!empty($_POST['user'])) {
            
	        $query = mysql_query("SELECT * FROM chat WHERE usrName = '$_POST[user]'") or die(mysql_error());
    	    if (!$row = mysql_fetch_array($query)) {
        	    newuser();
	        } 
    	    else {
        	    echo "SORRY...USERNAME ALREADY TAKEN...";
	        }
	    }
	    
    }
    else{
        echo "GAMEROOM ALREADY FULL";
    }
}
if (isset($_POST['submit'])) {
    SignUp();

}

?> 