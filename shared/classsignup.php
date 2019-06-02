<?php
class user
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
    public function insert($uemail,$uname,$ucname,$ucontact,$upass,$uotp,$utp)
    {
        $cnn=user::connect();
        $vari=0;      
        $q="insert into user_tbl values ('".null."','".$uemail."','". $uname ."','". $ucname ."','". $ucontact ."','". $upass ."','". $uotp ."','". $utp."')";
        $result=$cnn->query($q);
        return $result;
        user::disconnect();

    }
    public function login($id,$upass)
    {
        $cnn=user::connect();
        $q="select * from user_tbl where user_email='". $id ."' and user_password='". $upass ."'";
        
        $result=$cnn->query($q);
        return $result;
        user::disconnect();
    }   
    public function forgetpassword($id)
    {
        $cnn=user::connect();
        $q="select * from user_tbl where user_email='". $id ."' ";
        
        $result=$cnn->query($q);
        return $result;
        user::disconnect();
    }   
     
     

}
?>