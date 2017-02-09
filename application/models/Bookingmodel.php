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
			 return $result;
		 }
		 
		function getIsExistBooking ($event_id, $user_email) 
		{		 
			$query = $this->db->query("SELECT * FROM tbl_booking where event_id = '".$event_id."' AND user_email = '".$user_email."'");
			if($query->num_rows() > 0){ 
				return $query->num_rows(); // return the count			 
			}
			return 0; // if we get there We don't have anything.	 
		}	 
		
		function get_booking_list($user_email)
		{
			$this->db->from('tbl_booking');
			$this->db->join('events', 'tbl_booking.event_id = events.idevents');
			$where = "user_email = '".$user_email."'";
			$this->db->where($where);
			$query = $this->db->get();
			return $query->result();
		}
		 
	}
?>
