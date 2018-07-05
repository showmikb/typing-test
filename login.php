<?php
session_start();
require_once 'api/db.php';


if(isset($_POST['signin'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = trim($username);
	$password = trim($password);

	$username = htmlspecialchars($username);
	$password = htmlspecialchars($password);

	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$password = md5($password);

echo "<center>";
	if($username == ''){
		echo "<span id='error'>Email is empty</span>";
	}else if($password == ''){
		echo "<span id='error'>Password is empty</span>";
	}else{
		$sql = "SELECT * FROM user WHERE username = '".$username."'";
		$query = mysql_query($sql);
		$row = mysql_fetch_array($query);


			if($password == $row['password']){
				
				$_SESSION['id'] = $row['id'] ;
				header("Location:firstpage.php");
			}else{
				echo "<span id='error'>Bad credentials</span>";
			}

	}
echo "</center>";	
}


?> 

<html lang="en">

<head>
<style type="text/css">
    #error{
        color: #f00;
        font-size: 25px;
        text-align: center;
        font-family: Segoe Print;
        position: absolute;
        top: 100px;
        left: 50%;
        z-index: 99999;
    }
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
<li><a href="index.html#home">HOME</a>
</li>
<li><a href="register.php#about">REGISTER</a>
</li>

<li><a href="login.php">LOGIN</a>
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
<h1><strong>LOGIN </strong> here</h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3 form-box">
<div class="form-top">
<div class="form-top-left">
<h3>Login to our site</h3>
<p>Enter your username and password to log on:</p>
</div>
<div class="form-top-right">
<i class="fa fa-key"></i>
</div>
</div>
<div class="form-bottom">
<form role="form" action="login.php" method="post" class="login-form">
<div class="form-group">
<label class="sr-only" for="form-username">Username</label>
<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
</div>
<div class="form-group">
<label class="sr-only" for="form-password">Password</label>
<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
</div>
<input type="submit" class="btn" name="signin" value="Sign in!">
</form>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3 social-login">
<h3>&nbsp &nbsp <a href="register.php">Not a member ?</a></h3>
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

</body>

</html>
