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
	 function get_article_list()
	 {
	 $this->db->from('tbl_article');
	 $this->db->join('events', 'tbl_article.event_id = events.idevents');
	 $query = $this->db->get();
	 return $query->result();
	 }
 //fetch participant record by participant no
	 function get_article_record($participantno)
	 {
	 $this->db->where('participant_no', $participantno);
	 $this->db->from('tbl_article');
	 $query = $this->db->get();
	 return $query->result();
	 }
 //get earticle table to populate the event name dropdown
	 function get_event()
	 {
	 $this->db->select('idevents');
	 $this->db->select('eventname');
	 $this->db->from('events');
	 $query = $this->db->get();
	 $result = $query->result();
	 //array to store department id & department name
	 $idevents = array('-SELECT-');
	 $eventname = array('-SELECT-');
	 for ($i = 0; $i < count($result); $i++)
	 {
	 array_push($idevents, $result[$i]->idevents);
	 array_push($eventname, $result[$i]->eventname);
	 }
	 return $event_result = array_combine($idevents, $eventname);
	}
}
?>