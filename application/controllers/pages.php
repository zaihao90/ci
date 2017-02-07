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
		

    public function adminpage()
    {
        $this->load->view('template/header');
        $this->load->view('adminpage');
        $this->load->view('template/footer');
    }

}
