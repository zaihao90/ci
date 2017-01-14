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

        $this->userprofiledata->fbinsert($data);

        //$datamessage['message'] = 'Data Inserted Successfully';
        //Loading View
        $this->load->view('index');
	}	
    
    
}
?>