
<?php
class category
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
        $cnn=category::connect();
        $q="select * from product_cat";
        $result=$cnn->query($q);
        return $result;
        category::disconnect();
    }
    public function selectOne($id){
        $cnn=category::connect();
        $q="select * from product_cat where cat_id=".$id;
        $result=$cnn->query($q);
        return $result;
        category::disconnect();
    }
}
?>
