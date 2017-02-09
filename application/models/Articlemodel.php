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
		$this->db->join('tbl_events', 'tbl_article.event_id = tbl_events.events_id');
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
		$this->db->select('events_id');
		$this->db->select('event_name');
		$this->db->from('tbl_events');
		$query = $this->db->get();
		$result = $query->result();
	 //array to store department id & department name
		$events_id = array('-SELECT-');
		$event_name = array('-SELECT-');
		for ($i = 0; $i < count($result); $i++)
		{
			array_push($events_id, $result[$i]->events_id);
			array_push($event_name, $result[$i]->event_name);
		}
		return $event_result = array_combine($events_id, $event_name);
	}
}
?>