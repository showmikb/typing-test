<?php
require_once 'api/db.php';

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $username = trim($username);
    $email    = trim($email);
    $password = trim($password);
    $confirmpassword = trim($confirmpassword);

    $username = htmlspecialchars($username);
    $email    = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $confirmpassword = htmlspecialchars($confirmpassword);

    $username = mysql_real_escape_string($username);
    $email    = mysql_real_escape_string($email);
    $password = mysql_real_escape_string($password);
    $confirmpassword = mysql_real_escape_string($confirmpassword);


    $password = md5($password);
    $confirmpassword = md5($confirmpassword);

echo "<center>";
    if($username == ''){
        echo "<span id='error'>Username is empty</span>";
    }else if($email == ''){
        echo "<span id='error'>Email is empty</span>";
    }else if($password == ''){
        echo "<span id='error'>Password is empty</span>";
    }else if($confirmpassword == ''){
            echo "<span id='error'>Confirm password is empty</span>";
        
    }else{
        if($password == $confirmpassword){
        $sql = "INSERT INTO user(email,username,password) VALUES('".$email."', '".$username."', '".$password."')";
        $query = mysql_query($sql);

        echo "<span id='success'>You are registered successfully...</span>";
         }else{
            echo "<span id='success'>Password not matched</span>";
         }

    }
echo "</center>";

}








?>






<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>

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
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


     <style type="text/css">
    #error{
        color: #f00;
        font-size: 25px;
        text-align: center;
        font-family: Ruluko, Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
        position: absolute;
        top: 100px;
        left: 40%;
        z-index: 99999;
    }
    #success{
        color: green;
        font-size: 25px;
        text-align: center;
        font-family: Ruluko, Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;;
        position: absolute;
        top: 100px;
        left:40%;
        z-index: 99999;
    }
    </style>

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
                <li><a href="index.html">HOME</a>
                </li>
                <li><a href="register.php">REGISTER</a>
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
                    <h1><strong>SIGN UP </strong> here</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Sign Up at our site</h3>
                            <p>Enter your details below to sign up</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="register.php" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-email">E-mail</label>
                                <input type="text" name="email" placeholder="E-mail..." class="form-email form-control" id="form-email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Username</label>
                                <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                            <label class="sr-only" for="form-password">Password</label>
                            <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="confirm-form-passwordform-password">Confirm Password</label>
                                <input type="password" name="confirmpassword" placeholder="Confirm Password..." class="form-password form-control" id="confirm-form-password">
                            </div><br>
                            <input type="submit" class="btn" name="register" value="Sign up!">
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 social-login">
                    <h3>   <a href="login.php">Already a member ?</a></h3>
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
<script type="text/javascript">
	jQuery(function(){
			$("#confirm-form-password").keyup(function(){
			$(".error").hide();
			var hasError = false;
			var passwordVal = $("#form-password").val();
			var checkVal = $("#confirm-form-password").val();
			if (passwordVal == '') {
				$("#form-password").after('<span class="error">Please enter a password.</span>');
				hasError = true;
			} else if (checkVal == '') {
				$("#confirm-form-password").after('<span class="error">Please re-enter your password.</span>');
				hasError = true;
			} else if (passwordVal != checkVal ) {
				$("#confirm-form-password").after('<span class="error">Passwords do not match.</span>');
				hasError = true;
			}
			if(hasError == true) {return false;}
		});
	});
</script>


</body>

</html>