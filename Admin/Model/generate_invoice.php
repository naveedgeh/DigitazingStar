<?php
include_once('dbConnection.php');

class Invoice{
    private $total_regular_work;
    private $total_regular_price;
    private $total_urgent_work;
    private $total_urgent_price;
    private $user_id;
    private $invoice_type;
    private $db_obj;
    private $userid;
    private $invoice_id;
    private $username;
    private $customername;
    private $invoice_number;
    private $paymentstatus;
    private $status;
    // New 
    private $complex_logo;
    private $price_complex;
    private $back_logo;
    private $price_backlogo;


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
    private function get_userid(){
        return $this->userid;
    }
    private function get_username(){
        return $this->username;
    }
    private function get_customername(){
        return $this->customername;
    }
    private function get_invoice_number(){
        return $this->invoice_number;
    }
    private function get_paymentstatus(){
        return $this->paymentstatus;
    }
    private function get_invoice_id(){
        return $this->invoice_id;
    }
    private function get_status(){
        return $this->status;
    }
    private function set_total_regular_work($total_regular_work){
            $reg="/^[0-9]+$/";
            if(!preg_match($reg,$total_regular_work)){
                    throw new Exception("Please Check Regular Work");
                    
            }
            $this->total_regular_work=$total_regular_work;
    }
    private function set_complex_logo($complex_logo){
        $reg="/^[0-9]+$/";
        if(!preg_match($reg,$complex_logo)){
                throw new Exception("Please Check Complex Work");
                
        }
        $this->complex_logo=$complex_logo;
}
private function get_complex_logo(){
    return $this->complex_logo;
}
private function set_price_complex($price_complex){
    $reg="/^[0-9]+$/";
    if(!preg_match($reg,$price_complex)){
            throw new Exception("Please Check Complex Work price");
            
    }
    $this->price_complex=$price_complex;
}
 private function get_price_complex(){
return $this->price_complex;
}
private function set_back_logo($back_logo){
    $reg="/^[0-9]+$/";
    if(!preg_match($reg,$back_logo)){
            throw new Exception("Please Check Back Logo");
            
    }
    $this->back_logo=$back_logo;
}
private function get_back_logo(){
return $this->back_logo;
}


private function set_price_backlogo($price_backlogo){
    $reg="/^[0-9]+$/";
    if(!preg_match($reg,$price_backlogo)){
            throw new Exception("Please Check Back Logo");
            
    }
    $this->price_backlogo=$price_backlogo;
}
private function get_price_backlogo(){
return $this->price_backlogo;
}

    private function get_total_regular_work(){
        return $this->total_regular_work;
    }
    
        private function set_total_regular_price($total_regular_price){
            $reg="/^[0-9]+$/";
            if(!preg_match($reg,$total_regular_price)){
                    throw new Exception("Please Check Regular Work");
                    
            }
            $this->total_regular_price=$total_regular_price;
    }
    private function get_total_regular_price(){
        return $this->total_regular_price;
    }
    private function set_total_urgent_work($total_urgent_work){
        $reg="/^[0-9]+$/";
        if(!preg_match($reg,$total_urgent_work)){
                throw new Exception("Please Check Regular Work");
                
        }
        $this->total_urgent_work=$total_urgent_work;
    }
    private function get_total_urgent_work(){
        return $this->total_urgent_work;
        }
    private function set_total_urgent_price($total_urgent_price){
        $reg="/^[0-9]+$/";
        if(!preg_match($reg,$total_urgent_price)){
                throw new Exception("Please Check Regular Work");
                
        }
        $this->total_urgent_price=$total_urgent_price;
    }
    private function get_total_urgent_price(){
        return $this->total_urgent_price;
        }

    private function set_user_id($user_id){
            $reg="/^[0-9]+$/";
            if(!preg_match($reg,$user_id)){
                    throw new Exception("Please Check Regular Work");
                    
            }
            $this->user_id=$user_id;
        }
    private function get_user_id(){
            return $this->user_id;
            }
    private function set_invoice_type($invoice_type){
                $reg="/^[a-z0-9]+$/i";
                if(!preg_match($reg,$invoice_type)){
                        throw new Exception("Please Check Regular Work");
                        
                }
                $this->invoice_type=$invoice_type;
            }
    private function get_invoice_type(){
                return $this->invoice_type;
                }
    public function Addinvoice(){
            $regular_price=$this->total_regular_work*$this->total_regular_price;
            $urgent_price=$this->total_urgent_work* $this->total_urgent_price;
            $complex_price=$this->complex_logo * $this->price_complex;
            $backg_logo_price=$this->back_logo * $this->price_backlogo;
        $grand_total=$regular_price+$urgent_price+$complex_price + $backg_logo_price;
        $number=rand(10,1000);
        $invoice_number="Invoice".$number;
        
     echo    $invoice_insert="INSERT INTO `admin_invoice`(`total_regular_work`,`regular_price`,
        `total_urgent_work`,`urgent_price`,`total_regular_price`,`total_urgent_price`,
        `grand_total`,`user_id`,`invoice_number`,`invoice_type`,`complex_order`,`complex_price`,
        `total_complex_price`,`back_logo`,`back_logo_price`,`total_back_logo_price`)
        values('$this->total_regular_work','$this->total_regular_price','$this->total_urgent_work'
        ,'$this->total_urgent_price','$regular_price','$urgent_price',
        '$grand_total','$this->user_id','$invoice_number','$this->invoice_type',
        '$this->complex_logo','$this->price_complex','$complex_price','$this->back_logo','$this->price_backlogo','$backg_logo_price')";

        $result=$this->db_obj->query($invoice_insert);
        if($result){
        
        }


    }
    public function GetUserInvoice(){

        $getusername="SELECT `user_id`,`username` from `user_register`";
         $result=$this->db_obj->query($getusername); 
         
         $users=array();
         while($data=$result->fetch_object()){

            $temp=new Invoice();
            $temp->userid=$data->user_id;
            $temp->username=$data->username;

            $users[]=$temp;
         }
         return $users;
    }
    public function GetAllInvoice(){

        $allinvoice="SELECT * FROM `admin_invoice` join `user_register`
         on(admin_invoice.user_id=user_register.user_id)  ORDER BY `admin_invoice_id` DESC";
        $result=$this->db_obj->query($allinvoice);

        $invoices=array();
        while($data=$result->fetch_object()){

            $temp=new Invoice();
            $temp->user_id=$data->user_id;
            $temp->username=$data->username;
            $temp->invoice_id=$data->admin_invoice_id;
            $temp->customername=$data->user_name;
            $temp->invoice_number=$data->invoice_number;
            $temp->paymentstatus=$data->payment_status;
            $temp->invoice_type=$data->invoice_type;
            $temp->status=$data->statusadmin;
            $invoices[]=$temp;

        }
        return $invoices;
    }
    public function AllInvoiceDelete($invoiceids){

        foreach ($invoiceids as  $value) {
           
            $AllDelete="DELETE FROM `admin_invoice` where `admin_invoice_id`='$value'";
            $result=$this->db_obj->query($AllDelete);
            
        }
    }
    public function SendInvoice($invoiceid,$uid){

      $getinvoice="SELECT * from `admin_invoice` where `admin_invoice_id`='$invoiceid' and `user_id`='$uid'";
        $result=$this->db_obj->query($getinvoice);
        if($result){
            $data=$result->fetch_object();
           $sendinvoice="INSERT INTO `invoice`"
            ."(`total_regular_work`,`regular_price`,`total_urgent_work`"
            .",`urgent_price`,`total_regular_price`,`total_urgent_price`,"
            ."`grand_total`,`user_id`,`invoice_number`,`invoice_type`,`payment_status`,"
            ."`complex_order`,`complex_price`,"
            ."`total_complex_price`,`back_logo`,`back_logo_price`,`total_back_logo_price`)"
            ."VALUES"
            ."('$data->total_regular_work',"
            ."'$data->regular_price','$data->total_urgent_work','$data->urgent_price',"
            ."'$data->total_regular_price','$data->total_urgent_price',"
            ."'$data->grand_total','$data->user_id','$data->invoice_number',"
            ."'$data->invoice_type','$data->payment_status','$data->complex_order',"
            ."'$data->complex_price','$data->total_complex_price','$data->back_logo','$data->back_logo_price','$data->total_back_logo_price')";
            if($data->status!='Sent'){
                $result1=$this->db_obj->query($sendinvoice);
           
           
            if($result1){
               $update_status="UPDATE  `admin_invoice` SET `statusadmin`='Sent' where `admin_invoice_id`='$invoiceid' And `user_id`='$uid'";
               $result2=$this->db_obj->query($update_status);
               if(!$result2){

                die($this->db_obj->error);

                

               }

            }else{
                //echo "work is done";
            }
        }
        else{

            $_SESSION['sent']="Invoice Already Send";
        }
        }
        

        



    }




}

?>