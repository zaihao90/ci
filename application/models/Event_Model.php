<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Event_Model extends EventsModel{
	 function __construct()
	 {
	 // Call the Model constructor
	 parent::__construct();
	 }
	 //read the event list from db
	 function get_events_list()
	 {
	 $sql = 'select * from events';
	 $query = $this->db->query($sql);
	 $result = $query->result();
	 return $result;
 }
}
?>