<!Doctype HTML>
<html>
<head>
<style>
body
{
margin:0px;

 font-family:helvetica;
 animation: back_animate 40s infinite linear;
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
#cont{
	border-radius:30px;
	height:400px;
	width:400px;
	position:fixed;
	top:50%;
	left:50%;
	margin-top: -200px;
	margin-left: -200px;
	background-color: rgba(255,255,255,0.1);
}
h1{
	text-align: center;
}
span{
	margin-left:30px;
}
#lol{
	font-size:20px;
}
</style>
</head>
<body>
<div id="cont">
<h1>LOBBY</h1><br><br>
<span id="lol">Players Connected-</span>
<p id="roster"></p>
<p id="debug"></p>
<script>
setInterval (refresh, 1000); //refreshing the list of players that are signed in
setInterval (players, 3000); //checking if the number of players is 4

function refresh(){
	var xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if(this.responseText!=document.getElementById('roster').innerHTML){	
	
            document.getElementById('roster').innerHTML=this.responseText;

        }

		
	};
	xmlhttp.open("GET","lobby1.php",true);
	xmlhttp.send();
}

function players(){
	var xmlhttp2= new XMLHttpRequest();
	xmlhttp2.onreadystatechange=function(){

	   if(this.responseText == 4){
	
		window.location="game.php";
	  }
	  
	};
	 xmlhttp2.open("GET","numberofplayers.php",true); //numberofplayers.php returns the number of players is 4 and "no" otherwise
       xmlhttp2.send();
}
</script>
</div>
</body>
