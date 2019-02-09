 <!Doctype HTML>
 <html>
 <head>
<?php
session_start();
define('DB_HOST', 'localhost');
define('DB_NAME', 'trial');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
if($_SESSION['turn']==0){
   echo "<script>window.location='background.php'</script>";
}

$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db = mysql_select_db(DB_NAME, $con) or die("Failed to connect to MySQL: " . mysql_error());
$query = mysql_query("SELECT * FROM answer;"  );
$row = mysql_fetch_array($query);
if($row[0]!=$_SESSION['name']&&$_SESSION['turn']==1){
    $words=["garbage","australia","weed","shit","boobs","mitsuha","fuck","variety"];

    $_SESSION['ans']=$words[rand(1,7)];
    $query = mysql_query("DELETE FROM answer" ) ;

    
    $query = mysql_query("INSERT INTO answer (name,ans) VALUES ('".$_SESSION['name']."','".$_SESSION['ans']."')" ) ;
}
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <?php if(isset($_GET['logout'])){ 
     
    //Simple exit message
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
    fclose($fp);
     
    session_destroy();
    header("Location: background.php");
}

    ?>

    <script type="text/javascript">  //script for the drawing window
      
    var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;

    var x = "black",
        y = 2;
    
    function redirectall(){
    var msg="<script>window.location='turnchange.php'</sc"+"ript>";
    
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById('usermsg').value="";
         }
    };
    xmlhttp.open("GET", "post.php?q="+msg, true);
    xmlhttp.send();}
  



    function increment(){
        attempt+=1;
        if (attempt!=3){
        document.getElementById('attempts').innerHTML=(3-attempt).toString()+" Attempts remaining"; }
        else{ 
            redirectall();
            window.location="turnchange.php";}
    }

    function init() {
        canvas = document.getElementById('can');
        ctx = canvas.getContext("2d");
        w = canvas.width;
        h = canvas.height;
    
        canvas.addEventListener("mousemove", function (e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function (e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function (e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function (e) {
            findxy('out', e)
        }, false);
    }
    
    function color(obj) {
        switch (obj.id) {
            case "green":
                x = "green";
                break;
            case "blue":
                x = "blue";
                break;
            case "red":
                x = "red";
                break;
            case "yellow":
                x = "yellow";
                break;
            case "orange":
                x = "orange";
                break;
            case "black":
                x = "black";
                break;
            case "white":
                x = "white";
                break;
        }
        if (x == "white") y = 14;
        else y = 2;
    
    }
    
    function draw() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = y;
        ctx.stroke();
        ctx.closePath();
    }
    
    function erase() {
        var m = confirm("Want to clear");
        if (m) {
            ctx.clearRect(0,0, w, h);
            document.getElementById("canvasimg").style.display = "none";
        }
    }
    
    function save() {
        document.getElementById("canvasimg").style.border = "2px solid";
        var dataURL = canvas.toDataURL();
        document.getElementById("canvasimg").src = dataURL;
        document.getElementById("canvasimg").style.display = "inline";
    }
    
    function findxy(res, e) {
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - canvas.offsetLeft;
            currY = e.clientY - canvas.offsetTop;
    
            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - canvas.offsetLeft;
                currY = e.clientY - canvas.offsetTop;
                draw();
            }
        }
    }
    </script>
    <style>
   button {
        border:none;
        height:40px;
        width:80px;
        color:white;
        text-align:center;
        background-color:#333333;
        transition:0.2s;
    
    }
    button:hover {
        cursor:pointer;
        background-color:#111111;
    }
    button:active {
        background-color:white;
        color:black;
    }
        body {
        background: url('images/final.gif');
        background-repeat: none;
        background-size: 100%;
        margin:0;
     }
    
    .icon-bar {
  position:fixed;      
  z-index: 5;      
  height:100%;      
  width: 90px; 
  background-color: #555; 
}

.icon-bar a {
  display: block; 
  text-align: center;
  padding: 16px; 
  transition: all 0.3s ease; 
  color: white; 
  font-size: 36px; 
}

.icon-bar a:hover {
  background-color: #000; 
}

.active {
  background-color: #4CAF50; 
   }
   #usermsg { font:12px arial; }
  
#exit {
    color:#white;
    text-decoration:none; }
  
    a:hover { text-decoration:underline; }
.butt{
    border-style:none;
    background-color:white;
    color:#111111;
    opacity:0.9;
    transition:0.2s;
}
.butt:hover{
    opacity:1;
    color:white;
}
.butt:active{
    background-color:#111111;
    color:white;
}
.butt#submitmsg{
    height:30px;
    width:30px;
    border-radius:50%;
}

#wrapper, #loginform {
    right:0px;
    top:25px;
    position:fixed;
    z-index:5;
    margin:0 auto;
    padding-bottom:25px;
    background:#333333;
    width:400px;
    border:1px solid #ACD8F0;
    padding:0; }
  
#loginform { padding-top:18px; }
  
    #loginform p { margin: 5px; }
  
#chatbox {
    text-align:left;
    margin:0 auto;
    padding:10px;
    background:#fff;
    height:350px;
    width:430px;
    border:1px solid #ACD8F0;
    overflow:auto; }
  
#usermsg {
    width:395px;
    border:1px solid #ACD8F0; }
  
#submit { width: 60px; }
  
.error { color: #ff0000; }
  
#menu { padding:12.5px 25px 12.5px 25px; }
  
.welcome { float:left; color:white;}
  
.logout { float:right; }
  
.msgln { margin:0 0 2px 0; }
    </style>
</head>
    <body onload="init()">
        <div class="icon-bar">
  <a class="active" href="#"><i class="fa fa-home"></i></a> 
  <a href="#"><i class="fa fa-search"></i></a> 
  <a href="#"><i class="fa fa-envelope"></i></a> 
  <a href="#"><i class="fa fa-globe"></i></a>
  <a href="#"><i class="fa fa-trash"></i></a> 
</div>
<div style="background-color:white; width:100%">

    
<canvas id="can" width="700" height="500" style="left:50%; margin-left:-350px; margin-top:25px; border-style:solid; border-width:2px; position:relative; border-color:black; z-index:3;"></canvas>
        
        <h2 id="demo2" align="center"></h2>
        <div style="position:absolute;top:12%;left:7%; font-family:helvetica;"><b>Choose Color</b></div>
        
        <img src="images/green.png" style="position:absolute;top:15%;left:7%;width:30px;height:30px;" id="green" onclick="color(this)"></img>
        <img src="images/blue.png" style="position:absolute;top:15%;left:9%;width:30px;height:30px;" id="blue" onclick="color(this)"></img>
        <img src="images/red.png" style="position:absolute;top:15%;left:11%;width:30px;height:30px;" id="red" onclick="color(this)"></img>
        <img src="images/yellow.png" style="position:absolute;top:19%;left:7%;width:30px;height:30px;" id="yellow" onclick="color(this)"></img>
        <img src="images/orange.png" style="position:absolute;top:19%;left:9%;width:30px;height:30px;" id="orange" onclick="color(this)"></img>
        <img src="images/black.png" style="position:absolute;top:19%;left:11%;width:30px;height:30px;" id="black" onclick="color(this)"></img>
        
        <div style="position:absolute;top:12%;left:16%; font-family:helvetica;"><b>Eraser</b></div>
        <div style="position:absolute;top:15%;left:16.5%;width:30px;height:30px;background:white;border:2px groove;" id="white" onclick="color(this)"> 
        </div>
        
        <div style="width:15%; height:20%; background-color:#00cc00; position:absolute; box-sizing: border-box;  left:7%; top:25%; z-index:3; font-family:calibri; color:white; font-size:150%; text-align: center;">
             <div ><h1 id="word" align="center" style="position:relative; top:50%;"><?php echo strtoupper($_SESSION['ans']); ?></h1></div>
        </div>
        <div id="wrapper">
    <div id="menu">
        <p class="welcome"><b>Welcome, <?php echo $_SESSION['name']; ?></b></p>
        <p class="logout"><a id="exit" href="#"><button class="butt"><strong>Exit Chat</strong></button></a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox">
        <?php
if(file_exists("log.html") && filesize("log.html") > 0){
    $handle = fopen("log.html", "r");
    $contents = fread($handle, filesize("log.html"));
    fclose($handle);
     
    echo $contents;
}
?>
    </div>
     

</div>

       <div style="position:absolute;top:50%; left:7%;"><h2 id="attempts" align="center" style="color:#00cc00; position:relative;">Attempts remaining<br>3</h2></div>
        
        
        <img id="canvasimg" style="position:fixed; top:25px;left:50%; margin-left:210px; height:100px; width:140px;" style="display:none;">
        <button style="margin-left:45%;" id="saver">Save</button>
        <button onclick="erase()">Clear</button>
 </div>

 
<script>
    var attempt=0;
    document.getElementById('saver').addEventListener("click",save);
    document.getElementById('saver').addEventListener("click",increment);  



    setInterval (loadLog, 100);

function loadLog(){     
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; 
        $.ajax({
            url: "log.html",
            cache: false,
            success: function(html){        
                $("#chatbox").html(html);   
                
                //Auto-scroll           
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
                if(newscrollHeight > oldscrollHeight){
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); 
                }               
            },
        });
    }
$(document).ready(function(){

    $("#exit").click(function(){
        var exit = confirm("Are you sure you want to end the session?");

        if(exit==true){window.location = 'index.php?logout=true';}      
    });
});

</script>

</body>
</html>