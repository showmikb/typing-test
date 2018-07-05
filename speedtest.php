<?php 
session_start();
require_once 'api/db.php';
$id = $_SESSION['id'];
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}


        $sql = "SELECT * FROM user WHERE id = '".$id."' ";
        $query = mysql_query($sql);
        $row = mysql_fetch_array($query);




?>

<html lang="en">

<head>
<style type="text/css">
    #success{
        color: green;
        font-size: 25px;
        text-align: center;
        font-family: Segoe Print;
        position: absolute;
        top: 100px;
        left: 50%;
        z-index: 99999;
    }
    </style>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>

<!-- CSS -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/form-elements.css">
<link rel="stylesheet" href="assets/css/style2.css">


<!-- mee added-->
<!--REQUIRED STYLE SHEETS-->
<!-- BOOTSTRAP CORE STYLE CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLE CSS -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
<!-- VEGAS STYLE CSS -->
<link href="assets/scripts/vegas/jquery.vegas.min.css" rel="stylesheet" />
<!-- CUSTOM STYLE CSS -->
<link href="assets/css/style.css" rel="stylesheet" />
<!-- GOOGLE FONT -->
<link href='http://fonts.googleapis.com/css?family=Ruluko' rel='stylesheet' type='text/css' />
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!--mee added-->


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Favicon and touch icons -->
<link rel="shortcut icon" href="assets/ico/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


</head>

<body>
<!-- navigation -->

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">TYPOMETER </a>
        </div>
        <!-- Collect the nav links for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><strong><?php echo $row['email']; ?></strong></a>
                </li>
               

                <li><a href="logout.php">LOGOUT</a>
                </li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<!-- end navigation-->
<!-- Top content -->
<div class="top-content">

<div class="inner-bg">
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2 text">
<h1><strong>TEST </strong> here</h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3 form-box">
<div class="form-top">
<div class="form-top-left" oncopy="return false" oncut="return false" onpaste="return false" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" 
 unselectable="on"
 onselectstart="return false;" 
 onmousedown="return false;">
<h3>TYPE THE PARAGRAPH BELOW </h3>
<p id="para">There isn't much of a background to this code except for the fact that it uses JavaScript as a base to execute and yes, this is completely client side scripted. You could do the same thing in a server side scripting language or environment such as ASP that it uses JavaScript as a base to execute and yes, this is completely client side scripted.</p>
</div>
<div class="form-top-right">
<i class="fa fa-key"></i>
</div>
</div>
<div class="form-bottom">
<form role="form" method="post" class="tipper-form" id="tipper">
<div class="form-group">

 <textarea id="textariffic" style="width:500px;"></textarea>
   
   <p> <span class="label" style="color:black" id="timerlabel">Timer : </span>
 		<span id="timer"></span>
    </p>
   
    <p> <span class="label" style="color:black">Words Per Minute : </span>
 		<span id="WPM">0</span>
    </p>
    
</form>
</div>
</div>
</div>
</div>
</div>

</div>


<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->

<script>
$(function () {
    $('textarea')
        .one("keypress",(checkTime));
	 
	
});

var iLastTime = 0;
var iTime = 0;
var iTotal = 0;
var iKeys = 0;
var wpm=0;
var count=10;
var counter;


			
function checkTime() {
    iTime = new Date().getTime();
	counter=setInterval(timer, 1000);
}setTimeout(checkSpeed,10000); 


function timer()
	{
		  count=count-1;
		  if (count <= 0)
		  {
			  document.getElementById("timer").innerHTML="!! TIME UP !!";
			  clearInterval(counter);
			 return;
		  }

		 document.getElementById("timer").innerHTML=count + " secs"; // watch for spelling
	}



function checkSpeed() {
	
		var iWords = [];
		var pWords = [];
		$('textarea').prop("disabled", true);
        iKeys++; 														// keys typed
        iTotal += iTime - iLastTime;									// total time typed
        iWords  = $('textarea').val().split(" ");				// total words
//		wpm=Math.round(iWords);
       	
		var items = [];

		$('#para').each(function (i, e) {
		  items.push($(e).text());
		});
		
		
		pWords  = items[0].split(" ");
		for(var i=0 ;i < iWords.length; i++)
			{
				if(iWords[i] == pWords[i])
				{
					wpm++;	
				}	
			}
		
		
        $('#WPM').html(wpm);
    

}
</script>
</body>

</html>