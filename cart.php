<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location:login.php");
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | Riya Foods</title>
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
</head>
<!--/head-->

<body>
    <script>
        function changeToKart(pid,kid,quantity){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText) {
                        alert("Quantity changed to cart successfully.");
                    }
                    else{
                        alert(this.responseText);
                    }
                }
            };
            xmlhttp.open("GET", "changeQuant.php?productId=" + pid + "&kartId=" + kid+"&quantity="+quantity, true);
            xmlhttp.send();
        }

        function increaseQuantity(pid,kid) {
            var element = document.getElementById(pid)
            var value = parseInt(element.value);
            value += 1;
            element.value = value;
            changeToKart(pid,kid,element.value);
        }

        function decreaseQuantity(pid,kid) {
            var element = document.getElementById(pid)
            var value = parseInt(element.value);
            if (value > 1)
                value -= 1;
            else
                value = 1;
            element.value = value;
            changeToKart(pid,kid,element.value);
        }

        function removeItem(pid, kid) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText) {
                        var row = document.getElementById(pid).parentNode.parentNode;
                        row.parentNode.removeChild(row);
                    }
                }
            };
            xmlhttp.open("GET", "removePFromKart.php?productId=" + pid + "&kartId=" + kid, true);
            xmlhttp.send();
        }
    </script>
    <?php
    require './shared/individual_components/header_component.php';
    ?>
    <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Cart</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item Category</td>
                                <td class="description">Item Name</td>
                                <!-- <td class="quantity">Quantity</td> -->
                                <td class="quantity">Quantity</td>
                                <td class="quantity">Remove</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            require './shared/classcart.php';
                            $conn = new cart;
                            $result = $conn->selectCartByUid($_SESSION["id"]);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>
                                            <td class="cart_product"><p>' . $row["cat_name"] . '</p></td>
                                            <td class="cart_description"><h4><a href="">' . $row["product_name"] . '</a></h4></td>
                                            <td class="cart_quantity">
	                                        <div class="cart_quantity_button">
                                                <button onclick="increaseQuantity(' . $row["product_id"] . ','.$row["kart_id"].')" class="cart_quantity_up" href=""> + </button>
		                                        <input class="cart_quantity_input" id="' . $row["product_id"] . '" type="text" name="quantity" value="' . $row["product_qty"] . '" autocomplete="off" size="2">
                                                <button onclick="decreaseQuantity(' . $row["product_id"] . ','.$row["kart_id"].')" class="cart_quantity_down" href=""> - </button>
	                                        </div>
                                            </td>
                                            <td class="cart_delete">
	                                            <button onclick="removeItem(' . $row["product_id"] . ',' . $row["kart_id"] . ')" id="' . $row["product_id"] . '" class="cart_quantity_delete" href=""><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>';
                                }
                            } else {
                                echo '<span class="cart_description"><h4>You havn`t added anything to kart!!!</h4></span>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <button class="btn btn-default breadcrumb btn btn-default check_out"><a href="getQuotes.php">Get Quotes</a></button>
                    </div>
                </div>
            </div>
    </section>
    <?php
    include './shared/individual_components/footer_component.php';
    ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

</html>