<?php
/*
* File Name: EventsModel.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class eventsmodel extends CI_Model
{

	function __construct()
	{
	// Call the Model constructor
	parent::__construct();
	}
	 //fetch all event records
	 function get_events_list()
	 {
	 //$this->db->from('events');
	 //$this->db->join('events', 'events.idevents = events.idevents');
	//$query = $this->db->get();
	// return $query->result();
	       $event = "SELECT * FROM events";
        if ( !$event = $this->db->query($event))
        {
                $error = $this->db->error(); // Has keys 'code' and 'message'
        }
        $data[] = array();
		
        if($event->num_rows() > 0)
        {
		
             $i = 0;
             foreach($event->result() as $row){
                 
				if($row->idevents != null)
                {
                    $data["idevents".$i] = $row->idevents;
                }
                if($row->eventname != null)
                {
                    $data["eventname".$i] = $row->eventname;
                }
                if($row->eventstartdate != null)
                {
                    $data["estartdate".$i] = $row->eventstartdate;
                }
                 if($row->eventenddate != null)
                {
                    $data["eenddate".$i] = $row->eventenddate;
                }      
					$data["number"] = $i;
				$i++;
             }return($data);
			
	 }
	}
	//fetch event record by event id
	 function get_events_record($idevents)
	 {
	 $this->db->where('idevents', $idevents);
	 $this->db->from('events');
	 $query = $this->db->get();
	 return $query->result();
	 }
	  function deleteevent($id)
	 {

	     $event = "DELETE FROM events WHERE idevents = ".$id;
        if ( !$event = $this->db->query($event))
        {
                $error = $this->db->error(); // Has keys 'code' and 'message'
        }

		echo "1";
        if($event->num_rows == 0)
        {
			redirect('index.php/pages/delete_event_view');
        }

		return(0);
			 echo "3";
	 
	}
	//fetch event record by event id
	 //function get_events_record($idevents)
	 //{
	 //$this->db->where('idevents', $idevents);
	 //$this->db->from('events');
	 //$query = $this->db->get();
	 //return $query->result();
	 //}
//get event table to populate the event name dropdown
 //function get_events()
 //{
 //$this->db->select('idevents');
//$this->db->select('eventname');
 //$this->db->select('eventstartdate');
 //$this->db->from('events');
 //$query = $this->db->get();
 //	$result = $query->result();
 
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

?>