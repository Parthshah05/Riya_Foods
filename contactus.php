<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Riya Foods</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
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
    <?php
    if(isset($_POST["submit_contact"])){
    $_eid=$_POST["email"];
    $_name=$_POST["name"];
    $_sub=$_POST["subject"];
    $_msg=$_POST["message_desc"];
    require './shared/classcontact.php';
    $conn=new contact;
    $result=$conn->insert($_name,$_eid,$_sub,$_msg);
	if($result){
        $message="We got your resonse.We will contact you very soon.Thank you!!!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
    else
    {
        $message="Please contact us on phone or email.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        // header('location:lndex.php');
    }

}
    ?>
    <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
				</div>			 		
			</div>    	
			<div class="row">
    			<div class="col-sm-8">
	    			<div class="contact-form">
	        				<h2 class="title text-center">Get In Touch</h2>
	        				<div class="status alert alert-success" style="display: none"></div>
                                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
	                            <input type="text" name="name" class="form-control" required="required" placeholder="Name" pattern="[A-Za-z]{1,20}" data-error="Name is required.">
	                            <input type="email" name="email" class="form-control" required="required" placeholder="Email" data-error="Valid email is required.">
	                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject" pattern="{1,25}">
	                            <textarea name="message_desc" id="message" required="required" class="form-control" rows="8" pattern="{1,300}" placeholder="Your Message Here"></textarea>
	                            <input type="submit" name="submit_contact" class="btn btn-primary pull-right" value="Submit">
                                </form>
                            </div>
                    </div>
                <!-- </div> -->
                <div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>Riya Foods Ltd.</p>
							<p>195a Kenton Road, Harrow, Middlesex, England</p>
						
							<p>Mobile: 020 8998 4665</p>
							<p>Fax: </p>
							<p>Email: rkishor59@yahoo.co.uk</p>
	    				</address>
	    			</div>
    			</div>    			
	    	</div>  
        </div>	
    </div><!--/#contact-page-->
    <?php
		require './shared/individual_components/footer_component.php';
	?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>