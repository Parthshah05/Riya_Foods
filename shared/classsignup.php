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
        $q="insert into user_tbl values ('".null."','".$uemail."','". $uname ."','". $ucname ."','". $ucontact ."','". $upass ."','". $uotp ."',null,0)";
        $result=$cnn->query($q);
        return $result;
        user::disconnect();

    }
    public function login($id,$upass)
    {
        $cnn=user::connect();
        $q="select * from user_tbl where user_email='". $id ."' and user_password='". $upass ."' and IsVerified=1";
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
    public function verify($token){
        $cnn=user::connect();
        $q="select user_email from user_tbl where user_otp='".$token."' and MINUTE(CURRENT_TIMESTAMP-otp_timestamp)<16" ;
        $result=$cnn->query($q);
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            $mail=$row["user_email"];
            $q="update user_tbl set IsVerified=1 where user_email='".$mail."'";
            $result=$cnn->query($q);
            if($result){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            user::disconnect();
            return false;
        }
    }
     
     

}
?>