<?php
include_once 'dbConnection.php';
class ExtraWork{
    private $userd;
    private $techorder;
    private $work_file;
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

    private function set_userd($userd){
        $reg="/^[0-9]+$/";
        if(!preg_match($reg,$userd)){
                throw new Exception("User id is not valid");
                
        }
        $this->userd=$userd;
    }
    private function get_userd(){
        return $this->userd;
    }
    private function set_techorder($techorder){
        $reg="/^[0-9]+$/";
        if(!preg_match($reg,$techorder)){
                throw new Exception("User id is not valid");
                
        }
        $this->techorder=$techorder;
    }
    private function get_techorder(){
        return $this->techorder;
    }
    private function set_work_file($work_file){
        // if($work_file['error']==4){
        //     throw new Exception("Your File  is not selected");
        // }
       //$image = getimagesize($work_file['tmp_name']);
       
        // if($profile_image['size']==50000){
        //     throw new Exception("Must be select 5MB image");
        // }

        // if($profile_image['type']!=$image['mime']){
        //     throw new Exception("corrept image");
        // }
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg","png" => "image/png", "zip" => "application/x-zip-compressed");

        if($work_file['error']!=4){
             if (!in_array($work_file['type'],$allowed)) {
            throw new Exception("This file is not Allow Please select only Jpg or zip");
       }
       
       
       
        $path_info=pathinfo($work_file['name']);
       $number=rand(10,10000);
        $work="workfile".$number;
        extract($path_info);
        $this->work_file="$work" . "." .$extension;
        }else{
             $this->work_file='';
        }
       
        // if(is_null($this->username)){
        //     throw new Exception("Falide to generete username");
        // }
       
        
    }
    private function get_work_file(){

        return $this->work_file;
    }
    public function upload_work_file($source_name){
        if($this->work_file!=''){
        $str_path="../../Techlog/workfile/$this->work_file";
        if(!is_dir("../../Techlog/workfile")){
            if(!mkdir("../../Techlog/workfile")){
                throw new Exception("Failde to create folder");
            }
        }
        
        $result=@move_uploaded_file($source_name, $str_path);
        if(!$result){
            throw new Exception("Your file is not upload");
        }
        }
    }


    private function get_db_obj(){
        return $this->db_obj;
     }


    public function Deliver(){

        $select="SELECT * FROM `tech_deliver_order` WHERE `tech_order_id`='$this->techorder' and `user_id`='$this->userd'";
        $result=$this->db_obj->query($select);
        
         if($result){
             $data=$result->fetch_object();
        if($data->status!="Deliverd"){
            
            if($this->work_file==''){
               $work=$data->workfile;
            }
            else{
                $work=$this->work_file;
            }
             
            $message=$this->db_obj->real_escape_string($data->comment);
           $insertDeliver="INSERT INTO `admin_deliver_order`(`user_name_id`,`user_id`,`comment`,`workfile`)"
            ."VALUES"
            ."('$data->user_name_id','$data->user_id','$message','$work')";
            $result1=$this->db_obj->query($insertDeliver);
            if($result1){

                $updatestatus="UPDATE `tech_deliver_order` SET `status`='Deliverd' WHERE `tech_order_id`='$this->techorder' and `user_id`='$this->userd'";
                $result2=$this->db_obj->query($updatestatus);

            }else{
                 $this->db_obj->error;
            }
        

          }
       else{
        $_SESSION['d_msg']="Already Deliverd This Order if you want to again send this order please click Enable button";

      }
         }
    }
    public function EnableOrde($d_tech_order,$d_user){
        
        $updatestatus="UPDATE `tech_deliver_order` SET `status`='Not Deliverd' WHERE `tech_order_id`='$d_tech_order' and `user_id`='$d_user'";
        $result2=$this->db_obj->query($updatestatus);
    }
    public function TotalOrder(){

        $request="SELECT * FROM `order_tb` ";

        $result=$this->db_obj->query($request);
        $totalrequest=$result->num_rows;
        echo  $totalrequest;

    }
    public function TotalAssignWork(){

        $assignworked="SELECT * FROM `order_tb` where `technician_id`!='0'";
         

        $result=$this->db_obj->query($assignworked);
        $totalassignworked=$result->num_rows;
        echo  $totalassignworked;

    }
    public function TotalTechnician(){

        $technician="SELECT * FROM `technician_tb`";
         

        $result=$this->db_obj->query($technician);
        $totaltechnician=$result->num_rows;
        echo  $totaltechnician;

    }
    public function TotalUser(){

        $user_register="SELECT * FROM `user_register`";
         

        $result=$this->db_obj->query($user_register);
        $totaluser_register=$result->num_rows;
        echo  $totaluser_register;

    }
    

}
?>