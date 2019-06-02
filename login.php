<?php 
session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Riya Foods</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php
		require './shared/individual_components/header_component.php';
	?>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							
                            <input type="email" name="txtemail" placeholder="Email Address" title=" Ex. riya12@domain.com" required/>
                            <input type="password" name="txtpass" pattern=".{6,12}" title="6 to 12 characters" placeholder="Password" required/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit"  name="loginbtn" class="btn btn-default">Login</button>
                        </form>
						<!--/forget password-->
						<form method="post" action="emaildemo.php">
							
                            <input type="email" name="txtemail" placeholder="Email Address" title=" Ex. riya12@domain.com" required/>
                            
							<button type="submit"  name="log" class="btn btn-default">Get Password</button>
                        </form>
                        <?php

$_email="";
$_password="";

if(isset($_POST["loginbtn"])){
    $_password=base64_encode($_POST["txtpass"]);
    $_email=$_POST["txtemail"];
    require 'shared/classsignup.php';
    $conn=new user;
    $result=$conn->login($_email,$_password);
    if($result->num_rows ==1)
    {
        $row=$result->fetch_assoc();
        $_SESSION["id"]=$row["user_id"]; 
        header('location:login.php');
    }     
    else
    {
        echo $sql;
        echo " Not Successfully login";
        header('location:index.php');
    }

}

?>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                            
                            <input type="text" name="txtname" pattern="[A-Za-z]{1,50}" title=" Name should only contain Letters Ex. parth" placeholder="Your Name" required/>
                            <input type="text" name="txtcompany" pattern="[A-Za-z]{1,50}" title=" Company Name should only contain Letters ex.MAQ" placeholder="Company Name" required/>
                            <input type="email" name="txtid" placeholder="Email Address" title=" Ex. riya12@domain.com" required/>
                            <input type="password" name="txtpassword" pattern=".{6,12}" title="6 to 12 characters" placeholder="Password" data-toggle="password" required/>
                            <input type="text" pattern="{1,15}" name="txtcontact" placeholder="Contact Number"/>
							<input type="text" name="txtotp" placeholder="OTP"/>
							<input type="text" name="txttp" placeholder="Timestamp"/>
							<button type="submit" name="btnsubmit" class="btn btn-default">Signup</button>
                        </form>
<?php

$_eid="";
$_name="";
$_contact="";
$_cname="";
$_pass="";
$_otp="";
$_tp="";


if(isset($_POST["btnsubmit"]))
{

    
    include_once 'password_compat-master/lib/password.php';
    $_eid=$_POST["txtid"];
    $_name=$_POST["txtname"];
    $_contact=$_POST["txtcontact"];
    $_cname=$_POST["txtcompany"];
    
 //   $_pass= PASSWORD_HASH($_POST["txtpassword"], PASSWORD_DEFAULT);
  $_pass=$_POST["txtpassword"];  
 $hash=base64_encode($_pass);
 
 
  $_otp=$_POST["txtotp"];
    $_tp=$_POST["txttp"];

    require 'shared/classsignup.php';
    $conn=new user;
    $result=$conn->insert($_eid,$_name,$_cname,$_contact,$hash,$_otp,$_tp);

    if($result===true)
    {
         header('location:login.php');
    }     
    else
    {
        echo $sql;
        echo " Not Successfully Insert";
        header('location:login.php');
    }

}

?>

					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
<?php
		require './shared/individual_components/footer_component.php';
?>
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>