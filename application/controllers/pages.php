<?php

class Pages extends CI_Controller {


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

    function __construct() {
    parent::__construct();

    // Load url helper
    $this->load->helper('url');
    $this->load->helper('form'); //loading form helper
	
	$this->load->library('session');
	$this->load->database();
	$this->load->library('form_validation');
	
    }
	
    public function index()
    {       
        $this->load->view('template/header');
        $this->load->view('index');
        $this->load->view('template/footer');
    }	

    public function login()
    {
        //go to login page
        $this->load->view('template/header');
        $this->load->view('loginusingfb');
        $this->load->view('template/footer');
    }
    public function myprofile()
    {
        //go to profile page    getfbprofiledata

        $this->load->model('userprofiledata');
        $dataprofile = $this->userprofiledata->getfbprofiledata();      
        $this->load->view('template/header');
        $this->load->view('myprofile',$dataprofile);
        $this->load->view('template/footer');
    }
    public function updateprofile()
    {
        
        $this->load->model('userprofiledata');
         $dataprofile =   $this->userprofiledata->updateprofile();  //calling your method from model
       
    }
    public function logout()
    {
        //logout
        $this->load->view('template/header');
        $this->load->view('logout');
        $this->load->view('template/footer');
    }
    public function manregi()
    {
        //go to manual register
        $this->load->view('template/header');
        $this->load->view('manregi');
        $this->load->view('template/footer');
    }
	
    public function aboutus()    {
		$this->load->view('template/header');
        $this->load->view('aboutus');
	}	

    public function adminpage()
    {
        $this->load->view('template/header');
        $this->load->view('adminpage');
        $this->load->view('template/footer');
    }

	public function eventview()
    {
		//load the event model
		 $this->load->model('EventsModel');
		//fetch data from event table
		 //$data['eventname'] = $this->EventsModel->get_eventname();
	 
		 //set validation rules
		$this->form_validation->set_rules('idevents', 'Event ID','trim|required|numeric');
		$this->form_validation->set_rules('eventname', 'Event Name','trim|required');
		$this->form_validation->set_rules('eventstartdate', 'Date of Event','required');

		 if ($this->form_validation->run() == FALSE)
		{
			//fail validation
			$this->load->view('template/header');
			$this->load->view('EventView', $data);
			$this->load->view('template/footer');
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
		//Create event page
        
    }
	
	public function update_event_view()
    {
		//Update event page
        $this->load->view('template/header');
        $this->load->view('update_event_view');
        $this->load->view('template/footer');
    }
	
	public function delete_event_view()
    {
		
		//load the event model
		 $this->load->model('EventsModel');
		 $data = $this->EventsModel->get_events_list();  
		//Delete event page
        $this->load->view('template/header');
        $this->load->view('delete_event_view', $data);
        $this->load->view('template/footer');
    }
	
	//delete event function 
	public function edelete($id){
	echo $id;
	
			//load the event model
		 $this->load->model('EventsModel');
		 $data = $this->EventsModel-> deleteevent($id); 
	}
	
	public function article()
    {
		//Article page
	
		//$this->load->model('article'); 
		//$attributes = $this->article->index(); 		
        $this->load->view('template/header');
        $this->load->view('article_view');
        $this->load->view('template/footer');
    }
	
	public function updateArticle()
    {
		//Article page

        $this->load->view('template/header');
        $this->load->view('update_article_view');
        $this->load->view('template/footer');
    }
		public function deleteArticle()
    {
		//Article page
        $this->load->view('template/header');
        $this->load->view('delete_article_view');
        $this->load->view('template/footer');
    }		
	public function eview()
    {
		//Create event page
        $this->load->view('template/header');
        $this->load->view('eview');
        $this->load->view('template/footer');
		
    }
}

