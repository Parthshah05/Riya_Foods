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
    <title>My Profile | E-Shopper</title>
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
            $name=$_POST["uname"];
            $ucname=$_POST["cname"];
            $ucontact=$_POST["contact"];
            $user=new user;
            $res=$user->updateOne($_SESSION["id"],$name,$ucname,$ucontact);
            if($res){
                echo '<h3>Profile Updated Successfully!!!</h3>';
            }
            else{
                echo '<h3>Profile can`t updated Successfully!!! Please contact us.</h3>';
            }
        }
    ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">My Profile</li>
				</ol>
            </div><!--/breadcrums-->
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<div class="shopper-informations">
				<div class="row">
					<table class="col-sm-12">
						<div class="shopper-info">
                            <p>Profile Information</p>
                            <!-- <table> -->
                                <?php
                                    require_once './shared/classsignup.php';
                                    $user=new user;
                                    $result=$user->selectOne($_SESSION["id"]);
                                    if($result){
                                        $row=$result->fetch_assoc();
                                    }
                                    else{
                                        echo '<h1>Please try after some time.</h1>';
                                    }
                                ?>
							<form>
                                <tr><td>Email Id</td><td><input value="<?php echo $row["user_email"]; ?>" class="form-control" type="text" disabled="true" placeholder="Email Id"></td></tr>
                                <tr><td>Name</td><td><input name="uname" value="<?php echo $row["user_name"]; ?>" class="form-control" type="text" placeholder="Name"></td></tr>
                                <tr><td>User Company Name</td><td><input name="cname" class="form-control" value="<?php echo $row["user_company_name"]; ?>" type="text" placeholder="Company Name"></td></tr>
                                <tr><td>User Contact</td><td><input class="form-control" name="contact" type="number" value="<?php echo $row["user_contact"]; ?>" placeholder="Contact No"></td></tr>
                                <tr><td><input type="submit" class="btn btn-primary" value="Update Profile" name="sub"></td><td><a class="btn btn-primary" href="changepass.php">Change Password</a></td></tr>
                            </form>
                            <!-- </table> -->
							
							
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