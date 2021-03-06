<?php
/*
* File Name: eveents.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
{
class eveents extends CI_Controller
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
	function index()
	{	
		//fetch data from duration table
		$data['events'] = $this->Emodel->get_event_list();
		
		//set validation rules
		$this->form_validation->set_rules('eventsid', 'ID','trim|required|numeric');
		//$this->form_validation->set_rules('eventname', 'Title of Event','trim|required|callback_alpha_only_space');
		//$this->form_validation->set_rules('duration', 'Duration','callback_combo_check');
		$this->form_validation->set_rules('event_startdate', 'Date','required');
		
		if ($this->form_validation->run() == FALSE)
		 {
			//fail validation
			 $this->load->view('template/header');
			$this->load->view('eview', $data);
		 }
		 else
		 {
			//pass validation
			$data = array(
			 'events_id' => $this->input->post('eventsid'),
			 'event_name' => $this->input->post('eventname'),
			//'duration_id' => $this->input->post('duration'),
			 'event_startdate' => @date('Y-m-d', @strtotime($this->input->post('event_startdate'))),);
			
			//insert the form data into database
			$this->db->insert('tbl_events', $data);
			
			//display success message
			$this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Event details added to database.</div>');
			redirect('index.php/eveents/index');
		 }

	}
}
	/*
	//custom validation function for dropdown input
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
	}
	
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

	}*/
	}
?>