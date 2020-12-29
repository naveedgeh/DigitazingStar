<?php
include_once 'dbConnection.php';
class Technician{

    private $technician_name;
    private $phone_number;
    private $email_address;
    private $technician_username;
    private $technician_password;
    private $technician_image;
    private $db_obj;
    private $tech_id;
    private $status;

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
    private function get_db_obj(){
        return $this->db_obj;
    }
    private function get_tech_id(){
        return $this->tech_id;
    }
    private function get_status(){
        return $this->status;
    }
    private function set_technician_name($technician_name){

        $reg="/^[a-z\s]+$/i";
        
        if(!preg_match($reg,$technician_name)){
            throw new Exception("Please Check Technician Name");
            
        }
        $this->technician_name=$technician_name;
    }
    private function get_technician_name(){
        return $this->technician_name;
    }
    private function set_phone_number($phone_number){

        $reg="/^[a-z0-9\s]+$/i";
        
        if(!preg_match($reg,$phone_number)){
            throw new Exception("Please Check Phone Number");
            
        }
        $this->phone_number=$phone_number;
    }
    private function get_phone_number(){
        return $this->phone_number;
    }
    private function set_email_address($email_address){

        $reg="/^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$/";
        
        if(!preg_match($reg,$email_address)){
            throw new Exception("Please Check Email");
            
        }
        $this->email_address=$email_address;
    }
    private function get_email_address(){
        return $this->email_address;
    }
    private function set_technician_username($technician_username){

        $reg="/^[a-z0-9\s\_]+$/i";
        
        if(!preg_match($reg,$technician_username)){
            throw new Exception("Please Check User Name");
            
        }
        $this->technician_username=$technician_username;
    }
    private function get_technician_username(){
        return $this->technician_username;
    }
    private function set_technician_password($technician_password){

        $reg = "/^[a-z0-9\_]+$/i";
        
        if(!preg_match($reg,$technician_password)){
            throw new Exception("Please Check User Name");
            
        }
        $this->technician_password=$technician_password;
    }
    private function get_technician_password(){
        return $this->technician_password;
    }
    private function set_technician_image($technician_image){
        if($technician_image['error']==4){
            throw new Exception("Your File  is not selected");
        }
       $image = getimagesize($technician_image['tmp_name']);
       
        // if($profile_image['size']==50000){
        //     throw new Exception("Must be select 5MB image");
        // }

        if($technician_image['type']!=$image['mime']){
            throw new Exception("corrept image");
        }
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg");

        if (!in_array($technician_image['type'],$allowed)) {
            throw new Exception("This file is not Allow Please select only Jpg or zip");
       }
        if(is_null($this->technician_username)){
            throw new Exception("Falide to generete username");
        }
        $path_info=pathinfo($technician_image['name']);
       //$number=rand(10,10000);
        $strpath="$this->technician_username";
        extract($path_info);
        $this->technician_image="$strpath" . "." .$extension;
        
    }
    private function get_technician_image(){

        return $this->technician_image;
    }
    public function upload_technician_image($source_name){
        $str_path="../Technician/$this->technician_username/$this->technician_image";
        if(!is_dir("../Technician")){
            if(!mkdir("../Technician")){
                throw new Exception("Failde to create folder");
            }
        }
        if(!is_dir("../Technician/$this->technician_username")){
            if(!mkdir("../Technician/$this->technician_username")){
                die("Filed to create folder users/$this->technician_username");
            }
        }
        
        $result=@move_uploaded_file($source_name, $str_path);
        if(!$result){
            throw new Exception("Your file is not upload");
        }
    }

    public function AddTechnician(){

       $addtechnician="INSERT INTO `technician_tb`"
        ."(`name`,`phone`,`email`,`tech_username`,`tech_password`,`image`)"
        ."VALUES"
        . "('$this->technician_name','$this->phone_number','$this->email_address'"
        .",'$this->technician_username','$this->technician_password','$this->technician_image')";

        $result=$this->db_obj->query($addtechnician);

        if($this->db_obj->errno){
            die($this->db_obj->error);
           // throw new Exception("Query error $this->db_obj->error");
            
        }
        
        
    }
    public function GetTechnician(){


        $gettech="SELECT  * from `technician_tb` ORDER BY `id` DESC";
        $result=$this->db_obj->query($gettech);

        $techs=array();
        while ($data=$result->fetch_object()) {
            $temp=new Technician();
            $temp->tech_id=$data->id;
            $temp->technician_name=$data->name;
            $temp->email_address=$data->email;
            $temp->technician_username=$data->tech_username;
            $temp->phone_number=$data->phone;
            $temp->technician_image=$data->image;
            $temp->status=$data->status;

            $techs[]=$temp;
            
        }
        return $techs;
    }
    public function Enable($id){
        $enable="UPDATE `technician_tb` SET `status`='Enable' WHERE `id`='$id'";
            $result=$this->db_obj->query($enable);
    }
    public function Disable($ids){
        $disable="UPDATE `technician_tb` SET `status`='Disable' WHERE `id`='$ids'";
        $result=$this->db_obj->query($disable);
    }
    public function TechDelete($del){
       $del_technician="DELETE FROM `technician_tb` Where `id`='$del'";
        $result=$this->db_obj->query($del_technician);
        

    }


}


?>