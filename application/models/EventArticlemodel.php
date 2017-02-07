<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class EventArticlemodel extends CI_Model{
 function __construct()
 {
 // Call the Model constructor
 parent::__construct();
 }
 //read the department list from db
 function get_earticle_list()
 {
 $sql = 'select * from tbl_earticle';
 $query = $this->db->query($sql);
 $result = $query->result();
 return $result;
 }
  //fetch all participant records
	 function get_participant_list()
	 {
	 $this->db->from('tbl_article');
	 $this->db->join('tbl_earticle', 'tbl_article.event_id = tbl_earticle.event_id');
	 $query = $this->db->get();
	 return $query->result();
	 }
 //fetch participant record by participant no
	 function get_participant_record($participantno)
	 {
	 $this->db->where('participant_no', $participantno);
	 $this->db->from('tbl_article');
	 $query = $this->db->get();
	 return $query->result();
	 }
}
?>