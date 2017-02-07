<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class event extends EventController {
	 public function __construct()
	 {
	 parent::__construct();
	 $this->load->helper('url');
	 $this->load->database();
	 }
 public function index()
 {
 //load the EventsModel
 $this->load->model('EventsModel');
 //call the model function to get the School data
 $schresult = $this->EventsModel->get_events_list();
 $data['eventlist'] = $eventresult;
 //load the event_view
 $this->load->view('Event_View',$data);
 }
}