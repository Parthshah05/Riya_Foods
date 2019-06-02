<?php
session_start();
if(isset($_SESSION["id"]))
{
    require './shared/classcart.php';
    $pid=$_GET["productId"];
    $kid=$_GET["kartId"];
    $conn=new cart;
    $result=$conn->removeProductFromKart($pid,$kid);
    if($result===true){
            echo true;
    }
    else{
        echo "Item can`t removed from kart successfully";
    }
}
else{
    echo "Please Login then try again";
}
?>