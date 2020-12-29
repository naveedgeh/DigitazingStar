<?php
include_once 'dbConnection.php';
class Order{
    private $design_name;
    private $order_type;
    private $required_formate;
    private $width;
    private $height;
    private $Measure;
    private $fabric_type;
    private $placement;
    private $color;
    private $blending;
    private $urgent_work;
    private $additional_work;
    private $work_file;
    private $user_id;
    private $user_name;
    private $db_obj;
    private $order_date;
    private $status;
    private $reject;
    private $order_id;
    
   public function __construct(){
       try{
           $db=new DBConnection();
        $this->db_obj=$db->Connect();
       }catch(Exception $ex){
           throw new Exception($ex);
       }
        
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
    private function set_design_name($design_name){

        $reg="/^[a-z\s]+$/i";
        
        if(!preg_match($reg,$design_name)){
            throw new Exception("Please Check Design Name");
            
        }
        $this->design_name=$design_name;
    }
    private function get_design_name(){
        return $this->design_name;
    }
    private function set_order_type($order_type){

        $reg="/^[a-z\s]+$/i";
        if(!preg_match($reg,$order_type)){
            throw new Exception("Please Check Order Type");
            
        }
        $this->order_type=$order_type;
    }
    private function get_order_type(){
        return $this->order_type;
    }
    private function set_required_formate($required_formate){

        $reg="/^[a-z0-9\s]+$/i";
        if(!preg_match($reg,$required_formate)){
            throw new Exception("Please Check Requried Format ");
            
        }
        $this->required_formate=$required_formate;
    }
    private function get_required_formate(){
        return $this->required_formate;
    }
    private function set_width($width){

        $reg="/^[a-z 0-9\s\/]+$/i";
        if(!preg_match($reg,$width)){
            throw new Exception("Please Check Width");
            
        }
        $this->width=$width;
    }
    private function get_width(){
        return $this->width;
    }
    
    private function set_height($height){

        $reg="/^[a-z 0-9\/\s]+$/i";
        if(!preg_match($reg,$height)){
            throw new Exception("Please Check Height");
            
        }
        $this->height=$height;
    }
    private function get_height(){
        return $this->height;
    }
    
    private function set_Measure($Measure){

        $reg="/^[a-z 0-9\s\/]+$/i";
        if(!preg_match($reg,$Measure)){
            throw new Exception("Please Check Measure");
            
        }
        $this->Measure=$Measure;
    }
    private function get_Measure(){
        return $this->Measure;
    }
    private function set_fabric_type($fabric_type){

        $reg="/^[a-z 0-9\s\/]+$/i";
        if(!preg_match($reg,$fabric_type)){
            throw new Exception("Please Check Fabric Type");
            
        }
        $this->fabric_type=$fabric_type;
    }
    private function get_fabric_type(){
        return $this->fabric_type;
    }
    private function set_placement($placement){

        $reg="/^[a-z 0-9\s\/]+$/i";
        if(!preg_match($reg,$placement)){
            throw new Exception("Please Check Placement");
            
        }
        $this->placement=$placement;
    }
    private function get_placement(){
        return $this->placement;
    }
    private function set_color($color){

        $reg="/^[a-z 0-9\s\/]+$/i";
        if(!preg_match($reg,$color)){
            throw new Exception("Please Check Color");
            
        }
        $this->color=$color;
    }
    private function get_color(){
        return $this->color;
    }
    private function set_blending($blending){

        $reg="/^[a-z 0-9\s]+$/i";
        if(!preg_match($reg,$blending)){
            throw new Exception("Please Check Blending");
            
        }
        $this->blending=$blending;
    }
    private function get_blending(){
        return $this->blending;
    }
    private function set_urgent_work($urgent_work){

        $reg="/^[a-z 0-9\s]+$/i";
        if(!preg_match($reg,$urgent_work)){
            throw new Exception("Please Check Urgent Work");
            
        }
        $this->urgent_work=$urgent_work;
    }
    private function get_urgent_work(){
        return $this->urgent_work;
    }
    private function set_additional_work($additional_work){

        $reg="/^[a-z 0-9\s\@\-\_\+\']+$/i";
        if(!preg_match($reg,$additional_work)){
            throw new Exception("Please Check Additional Work");
            
        }
        $this->additional_work=$additional_work;
    }
    private function get_additional_work(){
        return $this->additional_work;
    }
    private function set_work_file($work_file){
        if($work_file['error']==4){
            throw new Exception("Your File  is not selected");
        }
       //$image = getimagesize($work_file['tmp_name']);
       
        // if($profile_image['size']==50000){
        //     throw new Exception("Must be select 5MB image");
        // }

        // if($profile_image['type']!=$image['mime']){
        //     throw new Exception("corrept image");
        // }
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "zip" => "application/x-zip-compressed");

        if (!in_array($work_file['type'],$allowed)) {
            throw new Exception("This file is not Allow Please select only Jpg or zip");
       }
        // if(is_null($this->username)){
        //     throw new Exception("Falide to generete username");
        // }
        $path_info=pathinfo($work_file['name']);
       $number=rand(10,10000);
        $work="workfile".$number;
        extract($path_info);
        $this->work_file="$work" . "." .$extension;
        
    }
    private function get_work_file(){

        return $this->work_file;
    }
    public function upload_work_file($source_name){
        $str_path="../userswork/$this->work_file";
        if(!is_dir("../userswork")){
            if(!mkdir("../userswork")){
                throw new Exception("Failde to create folder");
            }
        }
        
        $result=@move_uploaded_file($source_name, $str_path);
        if(!$result){
            throw new Exception("Your file is not upload");
        }
    }
    private function set_user_id($user_id){
        $reg="/^[a-z0-9]+$/i";
        if(!preg_match($reg,$user_id)){
            throw new Exception("Please Check Additional Work");
        }
        $this->user_id=$user_id;
        }
    private function get_user_id(){
        return $this->user_id;
    }
    private function set_user_name($user_name){
        $reg="/^[a-z0-9\.\_\-]+$/i";
        if(!preg_match($reg,$user_name)){
            throw new Exception("Please Check Additional Work");
            
        }
        $this->user_name=$user_name;
    
        }
    private function get_order_date(){
        return $this->order_date;
    }
    private function get_status(){
        return $this->status;
    }
    private function get_reject(){
        return $this->reject;
    }
    private function get_order_id(){
        return $this->order_id;
    }
    private function get_user_name(){
            return $this->user_name;
        }

   
    public function PostOrder(){
        
        $message=$this->db_obj->real_escape_string($this->additional_work);
       echo  $postorder = "INSERT INTO `order_tb`(`design_name`,"
        ." `order_type`, `required_format`, `width`,"
        ." `height`, `measure_type`, `fabric_type`, "
        ." `placement`, `colors`, `blending`, `additional_details`,"
        ." `image_files`,`user_id`,`usernameid`,`urgent_work`)"
        ."VALUES"
        ."('$this->design_name','$this->order_type','$this->required_formate',"
        ."'$this->width','$this->height','$this->Measure','$this->fabric_type',"
        ."'$this->placement','$this->color','$this->blending','$message',"
        ."'$this->work_file','$this->user_id','$this->user_name','$this->urgent_work')";
   
        $result=$this->db_obj->query($postorder);
        if(!$result){
           die($this->db_obj->error);
            // throw new Exception("Please check our query is not run error $this->db_obj->error");
            
        }
        // else{
        //     throw new Exception("Order succefully submited");
            
        // }
    }
    public function SendMail($resp){
        $to='mastermind@gmail.com';
        $from = 'noreply@digitizing.com';
        $subject="New Order";
        $body='
                please check email and asked designer to design Email Template
              ';
        $headers = "From: " . strip_tags($from) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        mail($to,$subject,$body,$headers);
        
    }
    public function GetAllOrder($user_id){
        
        $allOrder="SELECT * FROM `order_tb` WHERE `user_id`='$user_id'";
        $result=$this->db_obj->query($allOrder);
        $orders =array();
        while($data = $result->fetch_object()){
            $temp=new Order();
            $temp->order_id=$data->order_id;
            $temp->design_name=$data->design_name;
            $temp->order_type=$data->order_type;
            $temp->required_formate=$data->required_format;
            $temp->reject=$data->reject;
            $temp->order_date=$data->order_date;
            $temp->status=$data->statuss;

            $orders[]=$temp;
            


        }
        return $orders;


    }
    public function AllDeleteOrder($orderid){
        

        foreach ($orderid as  $value) {
           
            $AllDelete="DELETE FROM `order_tb` where `order_id`='$value'";
            $result=$this->db_obj->query($AllDelete);
            
        }

    }
    public function SingleOrderDelete($single_id){

        $singleorderdelte="DELETE FROM `order_tb` where `order_id`='$single_id'";
            $result=$this->db_obj->query($singleorderdelte);
            if($result){
                   // 
            }
            header("Location:../UserProfile.php");
        }

    public function SingleOrderDetails($id){

        $singleOrderDetails="SELECT * FROM `order_tb` where `order_id`='$id'";
        $result=$this->db_obj->query($singleOrderDetails);

        $data=$result->fetch_object();

        $this->design_name=$data->design_name;
        $this->order_type=$data->order_type;
        $this->required_formate=$data->required_format;
        $this->height=$data->height;
        $this->Measure=$data->measure_type;
        $this->fabric_type=$data->fabric_type;
        $this->width=$data->width;
        $this->placement=$data->placement;
        $this->color=$data->colors;
        $this->blending=$data->blending;
        $this->urgent_work=$data->urgent_work;
        $this->work_file=$data->image_files;
        $this->additional_work=$data->additional_details;
        return $this;


    }

}


?>