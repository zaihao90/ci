<?php
class userprofiledata extends CI_Model{
    
    function __construct() {
        parent::__construct();
         $this->load->database();
        
       if(!isset($_SESSION)){session_start();}
    }
    

    function fbinsert($data){
      
    // Inserting in Table(students) of Database(college)
       // echo "hhh";
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
                    $this->db->where($data['IdUserProfileFB'], $data['IdUserProfileFB']);
                    $this->db->update('userprofilefb', $data);
                }
            }
        }
        return(1);
    }
    
    function manlogin($data)
    {
        $sql = "SELECT * FROM userprofile WHERE Email = '".$data['Email']."' and Password = '".$data['Password']."'";
        $query =  $this->db->query($sql);
         if($query->num_rows() >0 )
         {
            foreach($query->result() as $row){
                $_SESSION['name'] = $row->Lastname ." ".$row->Firstname;
            }    
            return(1);
         }
        elseif($query->num_rows() == 0 )
        {
            return(0);
        }
        
    }
    function manregister($data){
      

       // echo "hhh";
    $sql = "SELECT * FROM userprofile WHERE Email = '".$data['Email']."'";
    $query =  $this->db->query($sql);
        if($query->num_rows() == 0)
        {
            //echo $query."1";
            $this->db->insert("userprofile", $data);
            return(1);
            
        }
        else
        {
            return(0);
        }
    }

    function getfbprofiledata(){
      
        //get data for myprofile for fb login
        
       // $userid = $this->session->userdata('userid');
    $sql = "SELECT * FROM userprofilefb WHERE IdUserProfileFB = '".$_SESSION['userid']."'";
    $query =  $this->db->query($sql);
        if($query->num_rows() == 1)
        {
             $data = array();
             foreach($query->result() as $row){
                 
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
             }
       
            return($data);
        }
        else
        {
            // return(0);
            echo "getfbprofiledata problem";
        }
    }
    
    function updateprofile(){
         
      if(isset($_SESSION) && !empty($_POST) && isset($_POST['name']))
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

                $fbsql = "SELECT * FROM userprofilefb WHERE Email = '".$_SESSION['email']."'";
                $fbsql = $this->db->query($fbsql);
                
    
                //$nonfbsql = "SELECT * FROM userprofile WHERE Email = '".$_SESSION['email']."'";
               // $nonfbsql = $this->db->query($sql);
         
                if($fbsql)
                {
                    
                    $sql = "UPDATE userprofilefb SET Gender='".$gender."',Birthdate='".$birthdate."',Doornum='".$doornum."',Streetnum='".$streetnum."',Routenum='".$routename."',Cityname='".$cityname."',Statename='".$statename."',Zipcodenum='".$zipcodenum."',Countryname='".$countryname."' WHERE Email='".$email."'";
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
               /* if($nonfbsql == 1)
                {
                    $sql = "UPDATE userprofilefb SET is_close='1' WHERE Email=".$title_id;
                    $this->db->query($sql);
                }*/
                

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