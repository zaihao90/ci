<?php
/*
* File Name: EventsModel.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class EventsModel extends Model
{

	function __construct()
	{
	// Call the Model constructor
	parent::__construct();
	}
	 //fetch all event records
	 function get_events_list()
	 {
	 $this->db->from('events');
	 $this->db->join('events', 'events.idevents = events.idevents');
	 $query = $this->db->get();
	 return $query->result();
	 }
	 
	//fetch student record by event id
	 function get_events_record($idevents)
	 {
	 $this->db->where('idevents', $idevents);
	 $this->db->from('events');
	 $query = $this->db->get();
	 return $query->result();
	 }
//get event table to populate the event name dropdown
 function get_events()
 {
 $this->db->select('idevents');
 $this->db->select('eventname');
 $this->db->select('eventstartdate');
 $this->db->from('events');
 $query = $this->db->get();
 $result = $query->result();
 
 //array to store event id & event name
 //$sch_id = array('-SELECT-');
 //$sch_name = array('-SELECT-');
 
 //for ($i = 0; $i < count($result); $i++)
 //{
	 //array_push($event_id, $result[$i]->idevents);
	 //array_push($event_name, $result[$i]->eventname);
 //}
 //return $school_result = array_combine($event_id, $event_name);
 }
}
?>