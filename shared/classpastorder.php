
<?php
class past_orders
{
    private static $conn=null;
    public static function  connect()
    {
        self::$conn=mysqli_connect("localhost","root","","priya_store");
        return self::$conn;
    }
    public static function disconnect()
    {
        mysqli_close($conn);
        self::$conn=null;
    }
    public function selectOne($uid){
        $cnn=past_orders::connect();
        $q="select po.*,pc.cat_name,p.product_name from past_order_tbl as po join product_tbl as p on p.product_id=po.product_id join product_cat as pc on pc.cat_id=p.fk_cat_id where po.user_id=".$uid;
        $result=$cnn->query($q);
        return $result;
        past_orders::disconnect();
    }
}
?>
