<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class events extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 
	 */
	 
	 public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('session');		
		 $this->load->helper('url');
		 $this->load->database();		 
	}

	public function getEvents(){
		$this->load->model('Event_User_Model');
		$events= $this->Event_User_Model->get_events();  
        $data['events'] = $events;		
	    $this->load->view('template/header');
		$this->load->view('events/all_events' ,$data);
		$this->load->view('template/footer');
    }
	
	public function getEventDetails($event_no){
        $this->load->model('Event_User_Model');
		$event['event_detail'] = $this->Event_User_Model->get_event_details($event_no);
		$event['fav_count'] = $this->Event_User_Model->get_article_fav_counts($event_no);
		$event['comment_count'] = $this->Event_User_Model->get_article_comments_counts($event_no);
		$event['comments'] = $this->Event_User_Model->get_all_comments_details($event_no);
		$this->load->view('template/header');
		$this->load->view('events/eventDetails' ,$event);	
	}
    public function invitefriendevent($id)
    {
        echo $id;
        //go to invite event page
        $this->load->view('template/header');
        $this->load->view('events/inviteevent');
        $this->load->view('template/footer');
    
    }
}