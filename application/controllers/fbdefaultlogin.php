<?php
session_start(); 
class fbdefaultlogin extends CI_Controller {
    
    function __construct() {
    parent::__construct();   
    $this->load->model('userprofiledata');
    $this->load->helper('url');

    }
   
    
    public function loginandregister()
	{

        $data = array(
            'Name' => $_SESSION['name'],
            'FirstName' =>   $_SESSION['first_name'],
            'LastName' => $_SESSION['last_name'],
            'Email' =>  $_SESSION['email'],
            'IdUserProfileFB' =>  $_SESSION['userid']
        );
        //Transfering data to Model

       $result = $this->userprofiledata->fbinsert($data);

        //$datamessage['message'] = 'Data Inserted Successfully';
        //Loading View
                //header('Location: http://localhost:8888/ci/index.php');
        if($result == 1)
        {
            $this->load->view('template/header');
		      $this->load->view('index');
            $this->load->view('template/footer');
           // $data['loginmessage'] = 'SuccessFully Login Using Facebook';
        }
        else
        {
            $data['loginmessage'] = 'UnsuccessFully Login , Something Wrong';
        }
        

            //$this->load->view('index');
        
	}	
    public function manualreg()
    {       
        $data = array(
        'Email' => $this->input->post('lemail'),
        'Password' => $this->input->post('lpassword'),
        'Firstname' => $this->input->post('lfirstname'),
        'Lastname' => $this->input->post('llastname'),
        'Gender' => $this->input->post('lgender'),
        'Address' => $this->input->post('laddress'),
        'Postal_Code' => $this->input->post('lpostalcode')
        );
        
        $result = $this->userprofiledata->manregister($data);
        
        if($result == 1)
        {
            $data['loginmessage'] = 'SuccessFully Register , Please Login';
        }
        else
        {
            $data['loginmessage'] = 'UnsuccessFully Register';
        }
        $this->load->view("index", $data);
            
    }
    public function manuallogin()
    {

        $data = array(
        'Email' => $this->input->post('lemail'),
        'Password' => $this->input->post('lpassword')
        ); 
        
        $result = $this->userprofiledata->manlogin($data);
        
        if($result == 1)
        {
            $data['loginmessage'] = 'SuccessFully Login';
        }
        else
        {
            $data['loginmessage'] = 'UnsuccessFully Login';
        }
        $this->load->view("index", $data);
    }
    
}
?>