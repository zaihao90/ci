<?php
/*
* File Name: updateEvents.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class updateEvent	 extends CI_Controller
{
	public function __construct()
	{
	 parent::__construct();
	 $this->load->library('session');
	 $this->load->helper('form');
	 $this->load->helper('url');
	 $this->load->database();
	 $this->load->library('form_validation');
	 //load the student model
	 $this->load->model('EventsModel');
	}
	function index($idevents)
	
		{
	 $data['idevents'] = $idevents;

	 //fetch data from events table
	 $data['events'] = $this->EventsModel->get_events();

	 //fetch events record for the given event ID.
	 $data['eventname'] = $this->EventsModel->get_events_record($idevents);

	 //set validation rules
	$this->form_validation->set_rules('eventname', 'Event Name','trim|required|callback_alpha_only_space');
	$this->form_validation->set_rules('eventstartdate', 'Date of Event', 'required');

	 if ($this->form_validation->run() == FALSE)
	 {
	//fail validation
	$this->load->view('update_event_View', $data);
	 }
	 else
	 {
	//pass validation
	$data = array(
	'eventname' => $this->input->post('Title of Event'),
	'eventstartdate' => @date('Y-m-d', @strtotime($this->input->post('Date'))),
	);
	//update event record
	$this->db->where('idevents', $idevents);
	$this->db->update('events', $data);
	//display success message
	$this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Event Record is Successfully Updated!</div>');
	redirect('updateEvents/index/' . $idevents);
	 }
	}
	//custom validation function for dropdown input
	//function combo_check($str)
	//{
	 //if ($str == "-SELECT-")
	 //{
	//$this->form_validation->set_message('combo_check', 'Valid %s Name is
	//required');
	//return FALSE;
	 //}
	 //else
	 
	 {
	//return TRUE;
	 }
	}
	//custom validation function to accept only alpha and space input
	function alpha_only_space($str)
	{
	 if (!preg_match("/^([-a-z ])+$/i", $str))
	 {
	$this->form_validation->set_message('alpha_only_space', 'The %s field must
	contain only alphabets or spaces');
	return FALSE;
	 }
	 else
	 {
	return TRUE;
	 }
	}
	}
	?>