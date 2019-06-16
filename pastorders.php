<?php
    session_start();
    if(!isset($_SESSION["id"]))
    {
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Past Orders | Riya Foods</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<!--/head-->

<body>
    <?php
        require './shared/individual_components/header_component.php';
    ?>
    <script>
function addToKart(pid,quantity) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "addToKart.php?productId=" + pid + "&quantity=" + quantity, true);
        xmlhttp.send();
    }
    </script>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Past Orders</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Product Category</td>
                            <td class="description">Product Name</td>
                            <td class="price">Quantity</td>
                            <td class="quantity">Date</td>
                            <td class="quantity">Action</td>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
								require './shared/classpastorder.php';
                                $conn=new past_orders;
                                $uid=$_SESSION["id"];
                                $result=$conn->selectOne($uid);
								if($result->num_rows>0)
								{
									while($row=$result->fetch_assoc()){
                                    echo '<tr>
                                          <td class="cart_description"><h4><p>'.$row["cat_name"].'</p></h4></td>
                                          <td class="cart_description"><h4>'.$row["product_name"].'</h4></td>
                                          <td class="cart_description"><h4>'.$row["product_qty"].'</h4></td>
                                          <td class="cart_description"><h4>'.$row["order_date"].'</h4></td>
                                          <td class="cart_description">
                                          <button href="#" onclick="addToKart('.$row["product_id"].','.$row["product_qty"].')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                          </td>
                                          </tr>';
									}
								}
								else{
									echo '<span class="cart_description"><h4>You havn`t ordered anything.Do it now!!!</h4></span>';
								}
						?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    
    
    </div>
    </div>
    </section>
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