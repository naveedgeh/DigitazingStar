<?php
include_once 'dbConnection.php';
class ExtraFunction{

    private $db_obj;
    private $workfile;
    private $workstatus;
    private $received_date;
    private $received_id;
    private $invoice_number;
    private $payment_status;
    private $invoice_date;
    private $invoice_type;
    private $invoice_id;
    public function __construct(){
        $db=new DBConnection();
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
    private function get_workfile(){
        return $this->workfile;
    }
    private function get_workstatus(){
        return $this->workstatus;
    }
    private function get_received_date(){
        return $this->received_date;
    }
    private function get_received_id(){
        return $this->received_id;
    }
    private function get_invoice_number(){
        return $this->invoice_number;
    }
    private function get_payment_status(){
        return $this->payment_status;
    }
    private function get_invoice_date(){
        return $this->invoice_date;
    }
    private function get_invoice_type(){
        return $this->invoice_type;
    }
    private function get_invoice_id(){
        return $this->invoice_id;
    }
    public function ShowReceivedOrder($user_id){

        $receivedorder="SELECT `admin_deliver_id`, `workfile`,`work_status`,`received_date`"
        ." FROM"
        ." `admin_deliver_order` where `user_id`='$user_id'"
        ." ORDER BY"
        ."`admin_deliver_id` desc";
    
        $result=$this->db_obj->query($receivedorder);
    
            $received=array();
        while($data=$result->fetch_object()){
            $temp=new ExtraFunction();
    
            $temp->received_id=$data->admin_deliver_id;
            $temp->workfile=$data->workfile;
            $temp->workstatus=$data->work_status;
            $temp->received_date=$data->received_date;
    
            $received[]=$temp;
        }
        return $received;
    
    }
    public function AllDeleteReceivedOrder($receivedid){

        foreach ($receivedid as  $value) {
           
            $AllDelete="DELETE FROM `admin_deliver_order` where `admin_deliver_id`='$value'";
            $result=$this->db_obj->query($AllDelete);
            
        }
    }
    public function SingleReceivedOrderDelete($single_id){

        $singleorderdelte="DELETE FROM `admin_deliver_order` where `admin_deliver_id`='$single_id'";
            $result=$this->db_obj->query($singleorderdelte);
          
        }
    public function DownloadStatusChange($downlodid){

        $statuschange="UPDATE `admin_deliver_order` SET `work_status`='CHECKED' WHERE `admin_deliver_id`='$downlodid'";
        $result=$this->db_obj->query($statuschange);

    }
    public function GetAllInvoies($user_id){

        $invoice_data="SELECT * FROM `invoice` JOIN `user_register` ON (invoice.user_id=user_register.user_id) where invoice.user_id='$user_id' ORDER BY `invoice_id` DESC";

        $result=$this->db_obj->query($invoice_data);

        $invoices=array();
        while($data=$result->fetch_object()){
            $temp=new ExtraFunction();
            $temp->invoice_id=$data->invoice_id;
            $temp->invoice_number=$data->invoice_number;
            $temp->payment_status=$data->payment_status;
            $temp->invoice_type=$data->invoice_type;
            $temp->invoice_date=$data->submittd_date;


            $invoices[]=$temp;
        }
        return $invoices;

    }
    public function AllInvoiceDelete($invoiceids){

        foreach ($invoiceids as  $value) {
           
            $AllDelete="DELETE FROM `invoice` where `invoice_id`='$value'";
            $result=$this->db_obj->query($AllDelete);
            
        }
    

    }
    public function SingleInvoiceDelete($id){

        $singleinvoice="DELETE FROM `invoice` where `invoice_id`='$id'";
        $result=$this->db_obj->query($singleinvoice);
        
    }


}

?>