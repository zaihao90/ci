<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class booking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Bookingmodel');
	}

	function post_booking($event_id)
	{   
	    $this->load->model('Bookingmodel');
		//$data['event'] = $this->Bookingmodel->get_event($event_id);
		$data = array (
				'event_id' => $this->input->post($event_id),
				'booking_date' => $this->input->post(date("Y-m-d")),
				'user_email' => $this->input->post('gmail.com')
				);				
		$this->db->insert('tbl_booking', $data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Successfully joined event!</div>');
		//redirect('events/getEvents');
	}
}
?>