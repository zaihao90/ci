<?php
class userprofiledata extends CI_Model{
    
    function __construct() {
        parent::__construct();
         $this->load->database();
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
                    $this->db->where($data['IdUserProfileFB'], $id);
                    $this->db->update('userprofilefbs', $data);
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
      
    // Inserting in Table(students) of Database(college)
       // echo "hhh";
    $sql = "SELECT * FROM userprofile WHERE WHERE Email = '".$data['email']."'";
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
}
?>