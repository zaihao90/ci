<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Bookingmodel extends CI_Model{
		 
		 function __construct()
		 {
			 // Call the Model constructor
			 parent::__construct();
		 }
		 
		 function get_event($event_id)
		 {			
			 $this->db->from('events');
			 $this->db->where('idevents', $event_id);
			 $query = $this->db->get();
			 $result = $query->result();
			 //array to store event id & event name
			 /*$event_id = array('-SELECT-');
			 for ($i = 0; $i < count($result); $i++)
			 {
				 array_push($event_id, $result[$i]->event_id);
			 }
			 return $event_result = array_combine($event_id);*/
		 }
		 
		 function getIsExistBooking ($user_id , $event_id) {
			 
			  $query = $this->db->query("SELECT * FROM tbl_booking where event_id = '".$event_id."' AND user_email = '".$user_id."'");
			  if($query->num_rows() >0){ 
				$row =  $query->row();
				return $row->count; // return the count			 
			}
			  return 0; // if we get there We don't have anything.	 
		 }	 
		 
	}
?>
