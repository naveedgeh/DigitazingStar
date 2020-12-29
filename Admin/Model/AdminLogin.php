<?php
include_once 'dbConnection.php';
class AdminLogin{

    private $username;
    private $password;
    private $loginstatus;
    private $db_obj;

    public function __construct(){
        $db=new DBConnection2();
        $this->db_obj=$db->Connect();
    }
    public function __set($name,$value){
        $method_name="set_$name";
        if(!method_exists($this,$method_name)){
            throw new Exception("Set:Property of $name does not exists");
            
        }
        $this->$method_name($value);
    }
    public function __get($name){
        $method_name="get_$name";
        if(!method_exists($this,$method_name)){
            throw new Exception("GET:Property of $name does not exists");
            
        }
        return $this->$method_name();
    }
    private function set_username($username){
        $reg="/^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$/";
        if (!preg_match($reg, $username)) {
            throw new Exception("Invalid/Missing Email");
        }
        $this->username=$username;

    }
    private function get_username(){
        return $this->username;
    }
    private function set_password($password){
        $reg = "/^[a-z][a-z0-9]{6,15}$/i";

        if (!preg_match($reg, $password)) {
            throw new Exception("Invalid/Missing Password");
        }
        $this->password = sha1($password);
    }
    
    private function get_password(){
        return $this->password;
    }

    private function get_db_obj(){
        return $this->db_obj;
    }
    private function get_loginstatus(){
        return $this->loginstatus;
    }

    public function Login(){
        
       $adminlogin="SELECT * FROM `adminlogin_tb`
        WHERE `a_email`='$this->username' And `a_password`='$this->password'";
        $result=$this->db_obj->query($adminlogin);
        if($this->db_obj->errno){
         //   die("DB  Admin Login Error---$this->db_obj->error");
            throw new Exception("DB  Admin Login Error---$this->db_obj->error");
        }
        if($result->num_rows==0){
            throw new Exception("Login Failed");
        }
        $data=$result->fetch_object();
        $_SESSION['adminname']=$data->a_name;
        $_SESSION['adminemail']=$this->username=$data->a_email;
        $_SESSUION['password']=$this->password=$data->password;
        $_SESSION['loginstatus']=$this->loginstatus=TRUE;
        $straAdmin = serialize($this);

         $_SESSION['objadmin']=$straAdmin;
        // if($remember){
        //     $expire=time()+(60*60*24*15);
        //     setcookie("objadmin",$straAdmin,$expire,"/");
        // }
       
    }
    public function logout(){
        if(isset($_SESSION['objadmin'])){
            unset($_SESSION['objadmin']);
        }
        if(isset($_COOKIE['objadmin'])){
            setcookie("objadmin","",1,"/");
        }
}
}  
?>