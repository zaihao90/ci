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
		 $this->load->helper('url');
		 $this->load->database();
		 $this->load->library('form_validation');
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

	public function postComments($event_id, $email){
		/**
	    $this->load->model('Event_User_Model');
		$event['event_detail'] = $this->Event_User_Model->get_event_details($event_id);
		$event['fav_count'] = $this->Event_User_Model->get_article_fav_counts($event_id);
		$event['comment_count'] = $this->Event_User_Model->get_article_comments_counts($event_id);
		$event['comments'] = $this->Event_User_Model->get_all_comments_details($event_id);
		$this->load->view('template/header');
		$this->load->view('events/eventDetails' ,$event);*/	
		
		$this->form_validation->set_rules('comments' , 'Comments' , 'required');
		
		if($this->form_validation->run() == FALSE){			
			//fail validation
	    $this->load->model('Event_User_Model');
		$event['event_detail'] = $this->Event_User_Model->get_event_details($event_id);
		$event['fav_count'] = $this->Event_User_Model->get_article_fav_counts($event_id);
		$event['comment_count'] = $this->Event_User_Model->get_article_comments_counts($event_id);
		$event['comments'] = $this->Event_User_Model->get_all_comments_details($event_id);
		$this->load->view('template/header');
		$this->load->view('events/eventDetails' ,$event);
		
		}
		else {

           $data = array(		    
		    'comments' => $this->input->post('comments'),
            'user_id' => $this->uri->segment(4),
			'event_id' => $this->uri->segment(3),
			'time_created' => date("Y-m-d"),
		   );		   
		  $this->db->insert('event_comments' ,$data);
		//pass validation
		$this->load->model('Event_User_Model');
		$event['event_detail'] = $this->Event_User_Model->get_event_details($event_id);
		$event['fav_count'] = $this->Event_User_Model->get_article_fav_counts($event_id);
		$event['comment_count'] = $this->Event_User_Model->get_article_comments_counts($event_id);
		$event['comments'] = $this->Event_User_Model->get_all_comments_details($event_id);
		$event['errormsg'] = 'Successfully posted comments';
		$this->load->view('template/header');
		$this->load->view('events/eventDetails' ,$event);
		}
	  
	}
	
	public function deleteComments ($comment_id , $event_id) {
		
		$this->db->where('id',$comment_id);
		$this->db->delete('event_comments');
		$this->load->model('Event_User_Model');
		$event['event_detail'] = $this->Event_User_Model->get_event_details($event_id);
		$event['fav_count'] = $this->Event_User_Model->get_article_fav_counts($event_id);
		$event['comment_count'] = $this->Event_User_Model->get_article_comments_counts($event_id);
		$event['comments'] = $this->Event_User_Model->get_all_comments_details($event_id);
		$event['errormsg'] = 'Successfully posted comments';
		$this->load->view('template/header');
		$this->load->view('events/eventDetails' ,$event);		
	}
	
	public function favEvent(){
		
		
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
