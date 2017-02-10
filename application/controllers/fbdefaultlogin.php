<?php

if(!isset($_SESSION)){session_start();}  

class fbdefaultlogin extends CI_Controller {
    
    function __construct() {
    parent::__construct();   
    $this->load->model('userprofiledata');
    $this->load->helper('url');
    $this->load->library('form_validation');
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
        if($result == 1)
        {
            $this->load->view('template/header');
		      $this->load->view('index');
            $this->load->view('template/footer');
        }
        else
        {
            $data['loginmessage'] = 'UnsuccessFully Login , Something Wrong';
        }
        
	}	
    public function manualreg()
    {       
            /*    $this->form_validation->set_rules('authEmail', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('authPassword', 'Password', 'trim|required|matches[password]');

        if($this->form_validation->run() !== false){
        //validation passed
        $email = $this->input->post('authEmail');
        $password = $this->input->post('authPassword');
         // Begin authentication
        };*/
		if(empty($this->input->post('lemail'))|| empty($this->input->post('lpassword'))||  empty($this->input->post('lfirstname'))|| empty($this->input->post('llastname'))|| empty($this->input->post('lgender'))||empty($this->input->post('lpassword'))||empty($this->input->post('lconpassword')))
		{	
				$_SESSION['errormessagelogin'] = "All Fields Must Not Be Empty";
				redirect('index.php/pages/manregi');
		}else
		{
			if($this->input->post('lpassword') == $this->input->post('lconpassword'))
			{
				$data = array(
				'Email' => $this->input->post('lemail'),
				'Password' => $this->input->post('lpassword'),
				'Firstname' => $this->input->post('lfirstname'),
				'Lastname' => $this->input->post('llastname'),
				'Gender' => $this->input->post('lgender'),
				'Name'=> $this->input->post('llastname').$this->input->post('lfirstname')

				);
				
				$result = $this->userprofiledata->manregister($data);
				
				if($result == 1)
				{
					$_SESSION['errormessagelogin'] = "Register Successfully";
					redirect('index.php/pages/login');
				}
				else
				{
					   $_SESSION['errormessagelogin'] = "Email Have Been Used";
					   redirect('index.php/pages/manregi');
				}
				//$this->load->view("index", $data);
				redirect('index.php/pages/login'); 
			}	
			else
			{
				$_SESSION['errormessagelogin'] = "Password and Confirm Password Is Not Match";
				redirect('index.php/pages/manregi');
			}
		}
    }
    public function manuallogin()
    {
       
        if(empty($this->input->post('lemail'))||empty($this->input->post('lpassword')))
        {
                $_SESSION['errormessagelogin'] = 'Please Key in Username and Password again!!';
            redirect('index.php/pages/login');
        }else{
            
        
            $data = array(
            'Email' => $this->input->post('lemail'),
            'Password' => $this->input->post('lpassword')
            ); 

            $result = $this->userprofiledata->manlogin($data);

            if($result == 1)
            {
                $_SESSION['errormessagelogin'] = 'SuccessFully Login';
            }
            else
            {
                $_SESSION['errormessagelogin'] = 'UnsuccessFully Login';
            }
            redirect('index.php/pages/login');
        }
    }
}
?>