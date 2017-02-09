<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class booking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Bookingmodel');
	}

	function post_booking($event_id, $user_email)
	{   
		$this->load->model('Bookingmodel');
		$result = $this->Bookingmodel->getIsExistBooking($event_id, $user_email);
		if ($result == 0)
		{
			$bookingdata = array (
				'event_id' => $event_id,
				'booking_date' => date('Y-m-d'),
				'user_email' => $user_email
				);				
			$this->db->insert('tbl_booking', $bookingdata);
		}
		else 
		{
			$message = '';
		}
		redirect('/index.php/events/getEvents');
	}

	function get_booking($user_email)
	{
		$data['booking_list'] = $this->Bookingmodel->get_booking_list($user_email);
		$this->load->view('template/header');
		$this->load->view('booking_view', $data);
		$this->load->view('template/footer');
	}
	
	function delete_booking($id, $user_email)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_booking');
		redirect('index.php/booking/get_booking/'.$user_email);
	}
}
?>