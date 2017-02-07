<?php
/*
* File Name: deleteArticle.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class deleteArticle extends CI_Controller
{
public function __construct()
 {
 parent::__construct();
 $this->load->helper('url');
 $this->load->database();
 //load the article model
 $this->load->model('Articlemodel');
 }
 //index function
 function index()
 {
 //get the participant list
 $data['participant_list'] = $this->Articlemodel->get_participant_list();
 $this->load->view('delete_article_view', $data);
 }
 //delete article record from db
 function delete_article($id)
 {
 //delete article record
 $this->db->where('participant_id', $id);
 $this->db->delete('tbl_article');
 redirect('deleteArticle/index');
 }
}
?>