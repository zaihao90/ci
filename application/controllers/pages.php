<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
    }

    
    
	public function index()
	{
        
        $this->load->view('template/header');
		$this->load->view('index');
        $this->load->view('template/footer');
	
		//$this->load->view('welcome_message');
	}	
    
    public function login()
	{
        $this->load->view('template/header');
        $this->load->view('loginusingfb');
        $this->load->view('template/footer');
        
        //$route['uri-(:any)/(:num)'] = "fbdefaultlogin/index";
		
		//$this->load->view('welcome_message');
	}
    public function logout()
	{
        $this->load->view('template/header');
        $this->load->view('logout');
        $this->load->view('template/footer');
        
        //$route['uri-(:any)/(:num)'] = "fbdefaultlogin/index";
		
		//$this->load->view('welcome_message');
	}

    public function aboutus2()
    {
        $this->load->view('aboutus2.html');
    }
    public function aboutus()
    {
        $this->load->view('aboutus.html');
    }
    


}
