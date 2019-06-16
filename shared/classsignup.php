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
    public function checkUserExist($email)
    {
        $cnn=user::connect();
        $q="select user_email from user_tbl where user_email='".$email."'";
        $result=$cnn->query($q);
        if($result->num_rows==1){
            return true;
        }
        else{
            return false;
        }
        // return $result;
        user::disconnect();
    }
    public function selectOne($uid)
    {
        $cnn=user::connect();
        $q="select user_email,user_name,user_company_name,user_contact from user_tbl where user_id=".$uid;
        $result=$cnn->query($q);
        return $result;
        user::disconnect();
    }   
    public function updateOne($uid,$uname,$cname,$ucontact)
    {
        $cnn=user::connect();
        $q="update user_tbl set user_name='".$uname."',user_company_name='".$cname."',user_contact='".$ucontact."' where user_id=".$uid;
        $result=$cnn->query($q);
        return $result;
        user::disconnect();
    }   
    public function check($id,$upass)
    {
        $cnn=user::connect();
        $q="select * from user_tbl where user_id='". $id ."' and user_password='". $upass ."' and IsVerified=1";
        $result=$cnn->query($q);
        return $result;
        user::disconnect();
    }
    public function updatePass($uid,$oldpass,$newpass)
    {
        $cnn=user::connect();
        $result=$this->check($uid,$oldpass);
        if($result->num_rows==1){
            $q="update user_tbl set user_password='".$newpass."' where user_id=".$uid;    
            $result=$cnn->query($q);
            return $result;
        }
        else{
            return false;
        }
        user::disconnect();
    }   

    public function login($id,$upass)
    {
        $cnn=user::connect();
        $q="select * from user_tbl where user_email='". $id ."' and user_password='". $upass ."' and IsVerified=1";
        // echo $q;
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