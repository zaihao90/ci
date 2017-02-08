<?php 
class article_user_model extends CI_Model{
   
  function __construct() {
        parent::__construct();
        $this->load->database();        
       if(!isset($_SESSION)){session_start();}
  }
	
 function get_articles(){	 
	  $sql = "SELECT * FROM tbl_article";
	  $query = $this->db->query($sql);
      $result = $query->result();
      return $result;
 }
 
 function get_article_details($article_id){	 
	 $this->db->where('participant_id', $article_id);
	 $this->db->from('tbl_article');	
	 $query = $this->db->get();
	 return $query->result();	 
 } 
 
 function get_article_comments_counts ($article_id){
  $query = $this->db->query("SELECT COUNT(id) as count FROM article_comments where article_id = '".$article_id."'");
  if($query->num_rows() >0)
  { 
    $row =  $query->row();
    return $row->count; // return the count
  }
  return 0; // if we get there We don't have anything.	 
	 
 }
 
 function get_article_fav_counts ($article_id){
  $query = $this->db->query("SELECT COUNT(id) as count FROM article_fav where article_id = '".$article_id."'");
  if($query->num_rows() >0)
  { 
    $row =  $query->row();
    return $row->count; // return the count
  }
  return 0; // if we get there We don't have anything.	 
	 
 }
 
 function get_all_comments_details ($article_id){
	 $this->db->where('article_id', $article_id);
	 $this->db->from('article_comments');	
	 $query = $this->db->get();
	 return $query->result(); 
 }
 
 function getAllComments(){		
	  $sql = "SELECT * FROM article_comments";
	  $query = $this->db->query($sql);
      $result = $query->result();
      return $result;
 }
}
 



?>