<?php session_start(); ?>
<!Doctype HTML> 
<html>
<head>

<style>
body
{
 text-align:center;
margin:0px;

 font-family:helvetica;
 animation: back_animate 20s infinite linear;
}
@keyframes back_animate 
{
 0%{background-color:#0B2161;}
 10%{background-color:#BE81F7;}
 20%{background-color:#170B3B;}
 30%{background-color:#81F7D8;}
 40%{background-color:#088A68;}
 50%{background-color:#5882FA;}
 60%{background-color:#424242;}
 70%{background-color:#3B240B;} 
 80% {background-color:#FF8000;}
 90%{background-color:#ACFA58;}
 100%{background-color:#0B2161;}
}
h1
{
 margin-top:200px;
 color:white;
 font-size:44px;
 line-height:5em;
}
button{
    width:300px;
    height:40px;
    background-color:#1aff1a;
    color:white;
    border-style:none;
    opacity:0.8;
    transition:0.3s;
    border-radius:2px;
  }
  button:hover{
    cursor:pointer;
    background-color:#00cc00;
    opacity:1;
  }
  button:active{
    background-color:#1aff1a;}
    input{
    text-align:center;
    height:40px;
    width:500px;
    border-style:solid;
    border-width:2px;
    border-color:powderblue;
    border-radius:2px;
    color:#333333;
  }
    #main{
    
    position:relative;
    top:200px;
    left:300px;
    align-content:center;
  }
</style>

</head>
<body>
	
	<div id="main">
        <form action="sign.php" method="POST">
		<input type="text" placeholder="Username" style="border-style:solid solid none solid; margin-left:-600px;" name="user" /><br>
		<button type="submit" name="submit" style="position:absolute; left:30%; margin-left:-150px;">Submit</button>
	    </form>
	</div>	
</body>
</html>