<?php
session_start();
if(isset($_SESSION["id"]))
{
    require './shared/classcart.php';
    $pid=$_GET["productId"];
    $quant=$_GET["quantity"];
    $uid=$_SESSION["id"];
    $conn=new cart;
    $result=$conn->addToCart($uid,$pid,$quant);
    if($result===true){
            echo "Item added to kart successfully";
    }
    else{
        echo "Item can`t added to kart successfully";
    }
}
else{
    echo "Please Login then try again";
}
?>