<?php
session_start();
if(isset($_SESSION["id"]))
{
    require './shared/classcart.php';
    $pid=$_GET["productId"];
    $kid=$_GET["kartId"];
    $quant=$_GET["quantity"];
    $conn=new cart;
    $result=$conn->updateQuant($pid,$kid,$quant);
    if($result===true){
            echo true;
    }
    else{
        echo "Quantity can`t successfully updated to cart.";
    }
}
else{
    echo "Please Login then try again";
}
?>