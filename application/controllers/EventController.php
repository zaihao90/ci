<?php
/*
* File Name: EventController.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class event extends Controller
{
	public function __construct()
	{
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->helper('form');
		 $this->load->helper('url');
		 $this->load->database();
		 $this->load->library('form_validation');
		 //load the event model
		 $this->load->model('EventsModel');
	}

	function index()
	{
	//fetch data from event table
	 $data['eventname'] = $this->EventsModel->get_eventname();
 
	 //set validation rules
	$this->form_validation->set_rules('idevents', 'Event ID','trim|required|numeric');
	$this->form_validation->set_rules('eventname', 'Event Name','trim|required|callback_alpha_only_space');
	$this->form_validation->set_rules('eventstartdate', 'Date of Event','required');

	 if ($this->form_validation->run() == FALSE)
		 {
		//fail validation
		$this->load->view('EventView', $data);
		 }
		 else
		 {
			//pass validation
			$data = array(
			 'idevents' => $this->input->post('ID'),
			 'eventname' => $this->input->post('Title of Event'),
			 'eventstartdate' => @date('Y-m-d', @strtotime($this->input->post('Date'))),);

		 //insert the form data into database
		$this->db->insert('events', $data);

		//display success message
		$this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Event details added to Database.</div>');
		redirect('event/index');
		 }
		}
	}

	//custom validation function for dropdown input
	//function combo_check($str)
	//{
	 //if ($str == "-SELECT-")
	 //{
		//$this->form_validation->set_message('combo_check', 'Valid %s Event name is required');
		//return FALSE;
		//}
		 //else
		 //{
		//return TRUE;
		 //}
	//}
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