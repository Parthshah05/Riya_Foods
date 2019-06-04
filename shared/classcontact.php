
<?php
class contact
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
    public function insert($wname,$wemail,$wsub,$wmsg)
    {
        $cnn=contact::connect();
        $q="insert into contact_us values (null,'". $wname."','". $wemail ."','". $wsub ."','". $wmsg ."')";
        $result=$cnn->query($q);
        return $result;
        contact::disconnect();

    }
    
    
    

}
?>
