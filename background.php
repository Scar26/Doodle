<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();
       
       $_SESSION['correct']=0;

   ?>    
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<title>Chat - Customer Module</title>
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
        background:#333333;
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
    margin:0 auto;
    padding-bottom:25px;
    background:#333333;
    width:504px;
    border:1px solid #ACD8F0; }
  
#loginform { padding-top:18px; }
  
    #loginform p { margin: 5px; }
  
#chatbox {
    text-align:left;
    margin:0 auto;
    margin-bottom:25px;
    padding:10px;
    background:#fff;
    height:270px;
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
<script>
    document.getElementById("send").addEventListener("mousedown",function(){document.getElementById("send").class="fa fa-paper-plane-o"})
    </script>
  



</head>
<body>

    <img id="canvasimg" style="position:fixed; top:25px; left:50%; margin-left:-450px; height:500px; width:700px;" style="display:none;">
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
     
        <input name="usermsg" type="text" id="usermsg" size="63" />

          <button name="submit" class="butt" onclick="sender()"  id="submitmsg"><i id="send" class="fa fa-paper-plane" aria-hidden="true"></i></button>

</div>
    

<script type="text/javascript">
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


function sender(){
    var msg=document.getElementById('usermsg').value;
    if(msg.length<=30){
    var xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById('usermsg').value="";
         }
    };
    xmlhttp.open("GET", "post.php?q="+msg, true);
    xmlhttp.send();}
    else{
      document.getElementById('usermsg').value="";
      alert("The string entered must be less than 30 characters");
    }
}
</script>



</body>
</html>