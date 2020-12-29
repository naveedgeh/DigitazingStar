<?php

class DBConnection3{

public $db_host="localhost";
public $db_user="merioidr_newdstar";
public $db_password="C00leyes";
public $db_name = "merioidr_newdstar";
// $db_port = 3306;

public function Connect(){

  $obj_db=new Mysqli();

  $obj_db->connect($this->db_host,$this->db_user,$this->db_password);
  
  if($obj_db->connect_errno){
    throw new Exception("DB Connect error $obj_db->connect_error");
}
$obj_db->select_db($this->db_name);
if($obj_db->errno){
    throw new Exception("DB Select error $obj_db->connect_errno");
}
return $obj_db;
}
}
 ?>
