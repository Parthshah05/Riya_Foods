
<?php
class product
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
    public function selectAll()
    {
        $cnn=product::connect();
        $q="select * from product_tbl as pt join product_cat as pc on pt.fk_cat_id=pc.cat_id";
        $result=$cnn->query($q);
        return $result;
        product::disconnect();
    }
    public function selectOne($id){
        $cnn=product::connect();
        $q="select * from product_tbl where product_id=".$id;
        $result=$cnn->query($q);
        return $result;
        product::disconnect();
    }
    public function selectOneByCat($id){
        $cnn=product::connect();
        $q="select * from product_tbl as pt join product_cat as pc on pt.fk_cat_id=pc.cat_id  where pc.cat_id=".$id;
        $result=$cnn->query($q);
        return $result;
        product::disconnect();
    }
}
?>
