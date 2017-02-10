<?php
class userprofiledata extends CI_Model{
    
    function __construct() {
        parent::__construct();
         $this->load->database();
        
       if(!isset($_SESSION)){session_start();}
    }
    

    function fbinsert($data){
    $sql = "SELECT * FROM userprofilefb WHERE IdUserProfileFB = '".$data['IdUserProfileFB']."'";
    $query =  $this->db->query($sql);
        if($query->num_rows() < 1)
        {
            //echo $query."1";
            $this->db->insert("userprofilefb", $data);
            
        }
        else
        {
            foreach($query->result() as $row){
                $check = 0;
                //check if the fb data is different from database data

                if($row->Name != $data['Name'])
                {
                    $check +=1;
                }
                if($row->FirstName != $data['FirstName'])
                {
                    $check +=1;
                }
                if($row->LastName != $data['LastName'])
                {
                    $check +=1;
                }
                if($row->Email != $data['Email'])
                {
                    $check +=1;
                }
                if($check >0)
                {
                    echo $check;
                    //update the whole query
                    $this->db->where('IdUserProfileFB', $data['IdUserProfileFB']);
                    $this->db->update('userprofilefb', $data);
                }
            }
        }
        return(1);
    }
    
    function manlogin($data)
    {

        //this to prevent cross site scripting
        $email = $this->security->xss_clean($data['Email']);
        $password = $this->security->xss_clean($data['Password']);
        
        //this to prevent sql injection
        $escapeemail = $this->db->escape($email);
        $escapepass = $this->db->escape($password);

        $sql = "SELECT * FROM userprofile WHERE Email = ".$escapeemail." and Password = ".$escapepass;
        $query =  $this->db->query($sql);
         if($query->num_rows() >0 )
         {
            
            foreach($query->result() as $row){
                if($row->Name != null)
                {
                    $_SESSION['name'] = $row->Name;
                }
                if($row->Email != null)
                {
                    $_SESSION['email'] = $row->Email;
                }
                if($row->Firstname != null)
                {
                    $_SESSION['firstname'] = $row->Email;
                }
                if($row->Userprofileimage != null)
                {
                    $_SESSION['profileimage'] = $row->Userprofileimage;
                }
                $_SESSION['errormessagelogin'] = "";
            redirect('index.php/');
            }    
         }
        elseif($query->num_rows() == 0 )
        {
            $sqladmin = "SELECT * FROM adminprofile WHERE Email = ".$escapeemail." and Password = ".$escapepass;
            $queryadmin =  $this->db->query($sqladmin);
             if($queryadmin->num_rows() >0 )
             {
                foreach($queryadmin->result() as $row){
                if($row->Name != null)
                {
                    $_SESSION['name'] = $row->Name;
                }
                if($row->Email != null)
                {
                    $_SESSION['email'] = $row->Email;
                }
            }    
            $_SESSION['errormessagelogin'] = "";
                 $_SESSION['admin'] = "1";
            redirect('index.php/pages/adminpage');
             }
            elseif($query->num_rows() == 0 )
            {
                $_SESSION['errormessagelogin'] = "Unsuccessfully Login, Please Key in Username and Password again!!";
              
                redirect('index.php/pages/login');
            }
        }else
            {
                $_SESSION['errormessagelogin'] = "Unsuccessfully Login, Please Key in Username and Password again!!";
                redirect('index.php/pages/login');
            }
           
    }
    function manregister($data){
        
        //this to prevent cross site scripting
        $email = $this->security->xss_clean($data['Email']);
        $password = $this->security->xss_clean($data['Password']);
        $firstname = $this->security->xss_clean($data['Firstname']);
        $lastname = $this->security->xss_clean($data['Lastname']);
        $gender = $this->security->xss_clean($data['Gender']);
        $name = $this->security->xss_clean($data['Name']);
        
        //this to prevent sql injection
        $escapeemail = $this->db->escape($email);
        $escapepass = $this->db->escape($password);
        $escapefirstname = $this->db->escape($firstname);
        $escapelastname = $this->db->escape($lastname);
        $escapegender = $this->db->escape($gender);
        $escapename = $this->db->escape($name);


        $sql = "SELECT * FROM userprofile WHERE Email = ".$escapeemail;
        $query =  $this->db->query($sql);
        $result = $query->num_rows();


        $sqlfb = "SELECT * FROM userprofilefb WHERE Email = ".$escapeemail;
        $queryfb =  $this->db->query($sqlfb);
        $resultfb = $queryfb->num_rows();

            if($result !=1 && $resultfb !=1)
            {
                $sql = "INSERT INTO userprofile (Email,Password,Name,Firstname,Lastname,Gender)VALUES (".$escapeemail.",".$escapepass.", ".$escapename.",".$escapefirstname.",".$escapelastname.",".$escapename.")";
                
                $query =  $this->db->query($sql);
               // $this->db->insert("userprofile", $data); 
                if($query)
                {
                   // $_SESSION['errormessagelogin'] = "Register Successfully";
                    //redirect('index.php/pages/login');
                    return(1);
                }
            }
            else
            {
               // $_SESSION['errormessage'] = "Email Have Been Used";
               // redirect('index.php/pages/manregi');
                return(0);
            }
        return(0);
       // }
    }

    function getfbprofiledata(){
      
        //get data for myprofile for fb login
        
       // $userid = $this->session->userdata('userid');
    //$sql = "SELECT * FROM userprofilefb WHERE IdUserProfileFB = '".$_SESSION['userid']."'";
    //$query =  $this->db->query($sql);
        
        
        $fbsql = "SELECT * FROM userprofilefb WHERE Email = '".$_SESSION['email']."'";         
        if ( !$fbsql = $this->db->query($fbsql))
        {
                $error = $this->db->error(); // Has keys 'code' and 'message'
        }
    
        $nonfbsql = "SELECT * FROM userprofile WHERE Email = '".$_SESSION['email']."'";
        if ( !$nonfbsql = $this->db->query($nonfbsql))
        {
                $error = $this->db->error(); // Has keys 'code' and 'message'
        }
        
        if($fbsql->num_rows() == 1)
        {
             $data = array();
             foreach($fbsql->result() as $row){
                 
                if($row->Name != null)
                {
                    $data['Name'] = $row->Name;
                }
                if($row->Email != null)
                {
                    $data['Email'] = $row->Email;
                }
                if($row->Gender != null)
                {
                    $data['Gender'] = $row->Gender;
                }
                if($row->Birthdate != null)
                { 
                    $convert = $row->Birthdate;
                      $convert =  date('d-m-Y', strtotime($convert));
                    $data['Birthdate'] = $convert;
                }
                if($row->Doornum != null)
                {
                    $data['Doornum'] = $row->Doornum;
                }
                if($row->Streetnum != null)
                {
                    $data['Streetnum'] = $row->Streetnum;
                }
                if($row->Routenum != null)
                {
                    $data['Routenum'] = $row->Routenum;
                }
                if($row->Cityname != null)
                {
                    $data['Cityname'] = $row->Cityname;
                }
                if($row->Statename != null)
                {
                    $data['Statename'] = $row->Statename;
                }
                if($row->Zipcodenum != null)
                {
                    $data['Zipcodenum'] = $row->Zipcodenum;
                }
                if($row->Countryname != null)
                {
                    $data['Countryname'] = $row->Countryname;
                }
                 return($data);
             }
        }
        elseif($nonfbsql->num_rows() == 1)
        {
             $data = array();
             foreach($nonfbsql->result() as $row){
                 
                if($row->Name != null)
                {
                    $data['Name'] = $row->Name;
                }
                if($row->Email != null)
                {
                    $data['Email'] = $row->Email;
                }
                if($row->Gender != null)
                {
                    $data['Gender'] = $row->Gender;
                }
                if($row->Birthdate != null)
                { 
                    $convert = $row->Birthdate;
                      $convert =  date('d-m-Y', strtotime($convert));
                    $data['Birthdate'] = $convert;
                }
                if($row->Doornum != null)
                {
                    $data['Doornum'] = $row->Doornum;
                }
                if($row->Streetnum != null)
                {
                    $data['Streetnum'] = $row->Streetnum;
                }
                if($row->Routenum != null)
                {
                    $data['Routenum'] = $row->Routenum;
                }
                if($row->Cityname != null)
                {
                    $data['Cityname'] = $row->Cityname;
                }
                if($row->Statename != null)
                {
                    $data['Statename'] = $row->Statename;
                }
                if($row->Zipcodenum != null)
                {
                    $data['Zipcodenum'] = $row->Zipcodenum;
                }
                if($row->Countryname != null)
                {
                    $data['Countryname'] = $row->Countryname;
                }
                if($row->Userprofileimage != null)
                {
                    $data['Profileimage'] = $row->Userprofileimage;
                }
                
                  return($data);
             }
        }
        else
        {
            // return(0);
            echo "getfbprofiledata problem";
        }
    }
   function updateprofilepicture(){


       
       $error = $_FILES['userfile']['error'];
       if($error > 0)
       {
           $_SESSION['imageerror'] = "Please Select A JPG file to upload!";
            $this->load->model('userprofiledata');
            $dataprofile = $this->userprofiledata->getfbprofiledata();      
            $this->load->view('template/header');
            redirect('index.php/pages/myprofile',$dataprofile);
       }
       else
       {
           $allowed = 'jpg';
           $filename = $_FILES['userfile']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           if( $ext == $allowed)
           {

                $profilepicture= $_FILES['userfile']['name'];
                $profilepic = $this->security->xss_clean($profilepicture);
                $escapeprofilepic = $this->db->escape($profilepic);


                    $upload_dir =  'assets/images/profileimage/';

                    $upload_file = $upload_dir.basename($_FILES['userfile']['name']);
                    move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_file);

                   /* $email= $this->input->post('email');*/
                  $email = $this->security->xss_clean($_SESSION['email']);
                   $escapeemail = $this->db->escape($email);
                  


               $sql = "UPDATE userprofile SET Userprofileimage=".$escapeprofilepic." WHERE Email=".$escapeemail;
                $checkfbsql = $this->db->query($sql);

                if($checkfbsql)
                {
                     $_SESSION['imageerror'] = "Successfully Updated";
                    $_SESSION['profileimage'] = $_FILES['userfile']['name'];
                    $this->load->model('userprofiledata');
                    $dataprofile = $this->userprofiledata->getfbprofiledata();      
                    $this->load->view('template/header');
                    redirect('index.php/pages/myprofile',$dataprofile);
                    //$this->load->view('myprofile',$dataprofile);
                    $this->load->view('template/footer');

               }
               else
               {
                   $_SESSION['imageerror'] = "Image can't be uploaded";
                
                    $this->load->model('userprofiledata');
                    $dataprofile = $this->userprofiledata->getfbprofiledata();      
                    $this->load->view('template/header');
                    redirect('index.php/pages/myprofile',$dataprofile);
                    //$this->load->view('myprofile',$dataprofile);
                    $this->load->view('template/footer');
               }
                
           }else
               {
                   $_SESSION['imageerror'] = "Wrong Image Format. Only Allow JPG";
                
                    $this->load->model('userprofiledata');
                    $dataprofile = $this->userprofiledata->getfbprofiledata();      
                    $this->load->view('template/header');
                    redirect('index.php/pages/myprofile',$dataprofile);
                    //$this->load->view('myprofile',$dataprofile);
                    $this->load->view('template/footer');
               }
       }

   }
    function updateprofile(){
    
         
      if(isset($_SESSION) && !empty($_POST) && isset($_POST['email']))
         {
              
        $name= $this->input->post('name');
        $email= $this->input->post('email');
             
                 
            if($_SESSION['email']  == $email)
            {
       
                $gender= $this->input->post('gender');
                $birthdate= $this->input->post('birthdate');
                
                if(isset($birthdate))
                {
                    $birthdate =  date('Y-m-d', strtotime($birthdate));
                }
                
               
                $doornum= $this->input->post('doornum');
                $streetnum= strtoupper($this->input->post('streetnum'));
                $routename= strtoupper($this->input->post('routename'));
                $cityname= strtoupper($this->input->post('cityname'));
                $statename= strtoupper($this->input->post('statename'));
                $zipcodenum= $this->input->post('zipcodenum');
                $countryname=strtoupper( $this->input->post('countryname'));
                
              
                //this to prevent cross site scripting
          
                $name = $this->security->xss_clean($name);
                $email = $this->security->xss_clean($email);
                $gender = $this->security->xss_clean($gender);
                $birthdate = $this->security->xss_clean($birthdate);
                $doornum = $this->security->xss_clean($doornum);
                $streetnum = $this->security->xss_clean($streetnum);
                $routename = $this->security->xss_clean($routename);
                $cityname = $this->security->xss_clean($cityname);
                $statename = $this->security->xss_clean($statename);
                $zipcodenum = $this->security->xss_clean($zipcodenum);
                $countryname = $this->security->xss_clean($countryname);
            
                //this to prevent sql injection
           
                $escapename = $this->db->escape($name);
                $escapeemail = $this->db->escape($email);
                $escapegender = $this->db->escape($gender);
                $escapebirthdate = $this->db->escape($birthdate);
                $escapedoornum = $this->db->escape($doornum);
                $escapestreetnum = $this->db->escape($streetnum);
                $escaperoutename = $this->db->escape($routename);
                $escapecityname = $this->db->escape($cityname);
                $escapestatename = $this->db->escape($statename);
                $escapezipcodenum = $this->db->escape($zipcodenum);
                $escapecountryname = $this->db->escape($countryname);
              
                $fbsql = "SELECT * FROM userprofilefb WHERE Email = ".$escapeemail;
                $fbsql = $this->db->query($fbsql);
                
    
                $nonfbsql = "SELECT * FROM userprofile WHERE Email = ".$escapeemail;
                $nonfbsql = $this->db->query($nonfbsql);
       
                if($fbsql->num_rows() == 1)
                {
                    
                    $sql = "UPDATE userprofilefb SET Gender=".$escapegender.",Birthdate=".$escapebirthdate.",Doornum=".$escapedoornum.",Streetnum=".$escapestreetnum.",Routenum=".$escaperoutename.",Cityname=".$escapecityname.",Statename=".$escapestatename.",Zipcodenum=".$escapezipcodenum.",Countryname=".$escapecountryname." WHERE Email=".$escapeemail;
                    $checkfbsql = $this->db->query($sql);
                    
                    if($checkfbsql)
                    {
                        $dataprofile['message'] = "Successfully Updated";
                        
                        $this->load->model('userprofiledata');
                        $dataprofile = $this->userprofiledata->getfbprofiledata();      
                        $this->load->view('template/header');
                        redirect('index.php/pages/myprofile',$dataprofile);
                        //$this->load->view('myprofile',$dataprofile);
                        $this->load->view('template/footer');
                   

                    }
                }
                if($nonfbsql->num_rows() == 1)
                {
                    $sql = "UPDATE userprofile SET Gender=".$escapegender.",Birthdate=".$escapebirthdate.",Doornum=".$escapedoornum.",Streetnum=".$escapestreetnum.",Routenum=".$escaperoutename.",Cityname=".$escapecityname.",Statename=".$escapestatename.",Zipcodenum=".$escapezipcodenum.",Countryname=".$escapecountryname." WHERE Email=".$escapeemail;
                    $checkfbsql = $this->db->query($sql);
                    
                    if($checkfbsql)
                    {
                        $dataprofile['message'] = "Successfully Updated";
                            
                        $this->load->model('userprofiledata');
                        $dataprofile = $this->userprofiledata->getfbprofiledata();      
                        $this->load->view('template/header');
                        redirect('index.php/pages/myprofile',$dataprofile);
                        //$this->load->view('myprofile',$dataprofile);
                        $this->load->view('template/footer');
                   

                    }
                }
                

            }
            else
            {
                echo "getfbprofiledata problem";
            }
        }
        else
        {
            echo "getfbprofiledata problem";
        }
    }
         
}
?>