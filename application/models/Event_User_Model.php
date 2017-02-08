<?php 
class Event_User_Model extends CI_Model{
   
   function __construct() {
        parent::__construct();
         $this->load->database();
        
       if(!isset($_SESSION)){session_start();}
    }
	
 function get_events(){  
	   $sql = 'select * from events';
       $query = $this->db->query($sql);
       $result = $query->result();
       return $result;
 }
 
 function get_event_details($event_id){	 
	 $this->db->where('idevents', $event_id);
	 $this->db->from('events');	
	 $query = $this->db->get();
	 return $query->result();  
 }
 
 
 function get_article_comments_counts ($event_id){
  $query = $this->db->query("SELECT COUNT(id) as count FROM event_comments where event_id = '".$event_id."'");
  if($query->num_rows() >0)
  { 
    $row =  $query->row();
    return $row->count; // return the count
  }
  return 0; // if we get there We don't have anything.	 
	 
 }
 
 function get_article_fav_counts ($event_id){
  $query = $this->db->query("SELECT COUNT(id) as count FROM fav_events where event_id = '".$event_id."'");
  if($query->num_rows() >0)
  { 
    $row =  $query->row();
    return $row->count; // return the count
  }
  return 0; // if we get there We don't have anything.	 
	 
 }
 
 function get_all_comments_details ($event_id){
	 $this->db->where('event_id', $event_id);
	 $this->db->from('event_comments');	
	 $query = $this->db->get();
	 return $query->result(); 
 }
	
}
 



?>