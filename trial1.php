<!Doctype HTML>
<html>
<head>
	<style>
	button {
        border:none;
        height:40px;
        width:80px;
        color:white;#333333
        text-align:center;
        background-color:#333333;
        transition: background-color 0.2s;
        
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
        background-color:powderblue;
        margin:0;
     }
    #topnav {
        height:40px;
        width:100%;
        position:fixed;
        margin-top:0px;
        background-color: #333333;
        opacity:0.8;
        overflow:hidden;
    }
   
    </style>
</head>
<body>
	<div id="topnav">
<a href="https://www.magicbricks.com/"><button>Home</button></a>
<a href="https://www.youtube.com/watch?v=yzshoDMBkqE"><button>News</button></a>
<button>Contact</button>
<button>About</button>
</div>
<br><br><br>
<input type="text" id="num1">
<input type="text" id="num2" >
<button onclick="func()">sum</button>

<Script>
	var a=document.getElementById('num1').value;
    var b=document.getElementById('num2').value;
    function func(){
    	var a=parseInt(document.getElementById('num1').value);
        var b=parseInt(document.getElementById('num2').value);
    	s=a+b;
        document.getElementById('demo').innerHTML=s;
    }
</Script>	
<p id="demo"></p>
<script>
	document.getElementById('demo').innerHTML=s;
</script>	

</body>
</html>