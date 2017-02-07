<?php
/*
* File Name: Articlemodel.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Articlemodel extends CI_Model
{
	function __construct()
 {
 // Call the Model constructor
 parent::__construct();
 }
  //fetch all participant records
	 function get_participant_list()
	 {
	 $this->db->from('tbl_article');
	 $this->db->join('tbl_earticle', 'tbl_article.event_id = tbl_earticle.event_id');
	 $query = $this->db->get();
	 return $query->result();
	 }
 //fetch participant record by participant no
	 function get_participant_record($participantno)
	 {
	 $this->db->where('participant_no', $participantno);
	 $this->db->from('tbl_article');
	 $query = $this->db->get();
	 return $query->result();
	 }
 //get earticle table to populate the event name dropdown
	 function get_event()
	 {
	 $this->db->select('event_id');
	 $this->db->select('event_name');
	 $this->db->from('tbl_earticle');
	 $query = $this->db->get();
	 $result = $query->result();
	 //array to store department id & department name
	 $event_id = array('-SELECT-');
	 $event_name = array('-SELECT-');
	 for ($i = 0; $i < count($result); $i++)
	 {
	 array_push($event_id, $result[$i]->event_id);
	 array_push($event_name, $result[$i]->event_name);
	 }
	 return $event_result = array_combine($event_id, $event_name);
	}
}
?>