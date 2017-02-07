<?php
/*
* File Name: deleteEvent.php
*/
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class deleteEvent extends EventController
	{
	public function __construct()
	 {
	 parent::__construct();
	 $this->load->helper('url');
	 $this->load->database();
	 //load the event model
	 $this->load->model('EventsModel');
	 }
	 //index function
	 function index()
	 {
	 //get the event list
	 $data['events_list'] = $this->EventModel->get_events_list();
	 $this->load->view('delete_event_view', $data);
	 }
	 //delete event record from db
	 function delete_event($id)
	 {
	 //delete student record
	 $this->db->where('idevents', $id);
	 $this->db->delete('events');
	 redirect('deleteEvent/index');
	 }
}
?>