<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Constant_model extends CI_Model
{
    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    } 
    
    // Insert Data to Any Table;
	function InsertData($table, $data){
	  	return $this->db->insert("$table", $data);
  	}
  	
  	// Insert Data to Any Table and get the last id;
	function InsertDataReturnLastId($table, $data){
	  	$this->db->insert("$table", $data);
	  	return $this->db->insert_id();
  	}

  	// Update Data to Any Table;
  	function UpdateData($table, $data, $id){
	  	$this->db->where('id', $id);
		$this->db->update("$table" ,$data);
		return true;
  	}
  	
  	// Delete Data from Any Table;
  	function DeleteData($table, $id){
	  	$this->db->where('id', $id);
	  	$this->db->delete("$table"); 
  	}
  	
}
?>