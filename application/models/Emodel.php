<?php
/*
* File Name: Emodel.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emodel extends CI_Model
{
	 function __construct()
	 {
	 // Call the Model constructor
	 parent::__construct();
	 }
	 
	 function get_event_list()	
	 {
	 $this->db->from('tbl_events');
	 $query = $this->db->get();
	 return $query->result();
	 }
	
	//fetch event record by event id
	 function get_events_record($eventsid)
	 {
	 $this->db->where('events_id', $eventsid);
	 $this->db->from('tbl_events');
	 $query = $this->db->get();
	 return $query->result();
	 }
	 
	 function deleteevent($id)
	 {
	 $this->db->where('events_id', $id);
	 $this->db->delete('tbl_events');
	 redirect('index.php/pages/delete_event_view');
	 }
	/*
	//get duration table to populate the duration option dropdown
	 function get_duration()
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