<?php
/*
* File Name: Studentmodel.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emodel extends CI_Model
{
	//get duration table to populate the duration dropdown
	 /*function get_duration()
	 {
		 $this->db->select('duration_id');
		 $this->db->select('duration_name');
		 $this->db->from('tbl_duration');
		 $query = $this->db->get();
		 $result = $query->result();
		 
		 //array to store duration id & duration name
		 $duration_id = array('-SELECT-');
		 $duration_name = array('-SELECT-');
		 for ($i = 0; $i < count($result); $i++)
		 {
		 array_push($duration_id, $result[$i]->duration_id);
		 array_push($duration_name, $result[$i]->duration_name);
		 }
		 return $duration_result = array_combine($duration_id, $duration_name);
	 }*/
}
?>