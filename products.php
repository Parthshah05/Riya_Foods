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
    function increaseQuantity(pid){
        var element=document.getElementById(pid)
        var value=parseInt(element.value);
        value+=1;
        element.value=value;
    }
    function decreaseQuantity(pid){
        var element=document.getElementById(pid)
        var value=parseInt(element.value);
        if(value>1)
        value-=1;
        else
        value=1;
        element.value=value;
    }
    function addToKart(pid) {
        var xmlhttp = new XMLHttpRequest();
        var quantity=document.getElementById(pid);
        quantity=parseInt(quantity.value);
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "addToKart.php?productId=" + pid + "&quantity=" + quantity, true);
        xmlhttp.send();
    }
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Our Products</li>
                </ol>
            </div>
            <div class="search_box">
            <input id="myInput" type="text" placeholder="Search Product Here">
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Product Category</td>
                            <td class="description">Product Name</td>
                            <td class="price">Quantity</td>
                            <td class="quantity">Add to Cart</td>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
								require './shared/classproduct.php';
                                $conn=new product;
                                if(isset($_GET["cat_id"])){
                                    $result=$conn->selectOneByCat($_GET["cat_id"]);
                                }
                                else{
                                    $result=$conn->selectAll();    
                                }
								if($result->num_rows>0)
								{
									while($row=$result->fetch_assoc()){
                                    echo '<tr>
                                          <td class="cart_description"><h4><p>'.$row["cat_name"].'</p></h4></td>
                                          <td class="cart_description"><h4><a href="">'.$row["product_name"].'</a></h4></td>
                                          <td class="cart_quantity">
                                          <div class="cart_quantity_button">
		                                    <button onclick="increaseQuantity('.$row["product_id"].')" class="cart_quantity_up" href=""> + </button>
		                                    <input class="cart_quantity_input" id="'.$row["product_id"].'" type="text" name="quantity" value="1" autocomplete="off" size="2">
		                                    <button onclick="decreaseQuantity('.$row["product_id"].')" class="cart_quantity_down" href=""> - </button>
	                                      </div>
                                          </td>
                                          <td class="cart_delete">
                                          <button href="#" onclick="addToKart('.$row["product_id"].')" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                          </td>
                                          </tr>';
									}
								}
								else{
									echo '<span class="cart_description"><h4>Right Now we don`t have any products!!!</h4></span>';
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