<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Change Password | E-Shopper</title>
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
        require_once './shared/individual_components/header_component.php';
        require_once './shared/classsignup.php';
        if(isset($_POST["sub"])){
            $oldpass=$_POST["oldpass"];
            $newpass1=$_POST["newpass1"];
            $newpass2=$_POST["newpass2"];
            $user=new user;
            if($newpass1==$newpass2)
            {
                $newpass1=base64_encode($_POST["newpass1"]);
                $res=$user->updatePass($_SESSION["id"],base64_encode($_POST["oldpass"]),$newpass1);
                if($res){
                    echo '<h3>Password Changed Successfully!!!</h3>';
                }
                else{
                    echo '<h3>Password can`t changed Successfully!!! Enter Valid Old Password.</h3>';
                }
            }
            else{
                echo '<h3>Password do not match.</h3>';
            }
        }
    ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="">Home</a></li>
                  <li><a href="">My Profile</a></li>
                  <li class="active">Change Password</li>
				</ol>
            </div><!--/breadcrums-->
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<div class="shopper-informations">
				<div class="row">
					<table class="col-sm-12">
						<div class="shopper-info">
                            <p>Password Information</p>
							<form>
                                <tr><td>Old Password</td><td><input class="form-control" name="oldpass" placeholder="Enter Password" type="password"></td></tr>
                                <tr><td>New Password</td><td><input name="newpass1" class="form-control" type="password" placeholder="Enter New Password"></td></tr>
                                <tr><td>Confirm New Password</td><td><input name="newpass2" class="form-control" type="password" placeholder="Enter Confirm Password"></td></tr>
                                <tr><td><input type="submit" class="btn btn-primary" value="Change Password" name="sub"></td></tr>
                            </form>
						</div>
                    </table>
				</div>
            </div>
            </form>
		</div>
	</section> <!--/#cart_items-->
    <?php
        require_once './shared/individual_components/footer_component.php';
    ?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>