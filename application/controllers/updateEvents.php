<?php
/*
* File Name: updateEvents.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class updateEvent extends CI_Controller
{
	public function __construct()
	{
	 parent::__construct();
	 //$this->load->library('session');
	 $this->load->helper('form');
	 $this->load->helper('url');
	 $this->load->database();
	 $this->load->library('form_validation');
	 //load the events model
	 $this->load->model('Emodel');
	}
	function index($eventsid)
	{
	
	 $data['eventsid'] = $eventsid;

	 //fetch data from events table
	 $data['events'] = $this->Emodel->get_event_list();

	 //fetch events record for the given event ID.
	 $data['eventrecord'] = $this->Emodel->get_events_record($eventsid);

	 //set validation rules
	$this->form_validation->set_rules('eventsid', 'ID','trim|required|numeric');
	$this->form_validation->set_rules('eventname', 'Event Name','trim|required|callback_alpha_only_space');
	$this->form_validation->set_rules('event_startdate', 'Date of Event', 'required');

	 if ($this->form_validation->run() == FALSE)	
	 {
		//fail validation
		 $this->load->view('template/header');
		 $this->load->view('update_event_view', $data);
	 }
	 else
	 {

		//pass validation
		$data = array(
		'events_id' => $this->input->post('eventsid'),
		'event_name' => $this->input->post('eventname'),
		'event_startdate' => @date('Y-m-d', @strtotime($this->input->post('event_startdate'))),);
		
		//update event record
		
		$this->db->update('tbl_events', $data);
		$this->db->where('events_id', $events_id);
		//display success message
		$this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Event Record is successfully updated.</div>');
		redirect('index.php/pages/delete_event_view');
	 }
	}
	
	/*//custom validation function for dropdown input
		function combo_check($str)
	{
		if ($str == "-SELECT-")
	 {
		$this->form_validation->set_message('combo_check', 'Valid %s Name is required');
		return FALSE;
	 }
	 else
	 
	 {
		return TRUE;
	 }
	}*/
	
	//custom validation function to accept only alpha and space input
	function alpha_only_space($str)
{
	 if (!preg_match("/^([-a-z ])+$/i", $str))
	 {
		$this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces');
		return FALSE;
	 }
	 else
	 {
	return TRUE;
	 }
}
}
?>