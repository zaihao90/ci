<?php
/*
* File Name: article.php
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class article extends CI_Controller
{
	public function __construct()
	{
	 parent::__construct();
	 $this->load->library('session');
	 $this->load->helper('form');
	 $this->load->helper('url');
	 $this->load->database();
	 $this->load->library('form_validation');
	 //load the article model
	 $this->load->model('Articlemodel');
	}
	function index()
	{
	//fetch data from article table
	 $data['event'] = $this->Articlemodel->get_event();
	 
		 //set validation rules
	$this->form_validation->set_rules('participantno', 'Participant No',
	'trim|required|numeric');
	$this->form_validation->set_rules('participantname', 'Participant Name',
	'trim|required|callback_alpha_only_space');
	$this->form_validation->set_rules('event', 'Event',
	'callback_combo_check');
	$this->form_validation->set_rules('participatedDate', 'Participated Date',
	'required');
	$this->form_validation->set_rules('artiletitle', 'Article Title',
	'trim|required|callback_alpha_only_space');
	$this->form_validation->set_rules('article', 'Article'
	);
	
	if ($this->form_validation->run() == FALSE)
		 {
		//fail validation
		$this->load->view('article_view', $data);
		 }
		 else
		 {
		//pass validation
		$data = array(
		 'participant_no' => $this->input->post('participantno'),
		 'participant_name' => $this->input->post('participantname'),
		 'event_id' => $this->input->post('event'),
		'participated_date' => @date('Y-m-d', @strtotime($this->input->post('participatedDate'))),
		 'articletitle' => $this->input->post('articletitle'),
		'article' => $this->input->post('article'),
		);
		
		//insert the form data into database
		$this->db->insert('tbl_article', $data);
		//display success message
		$this->session->set_flashdata('msg', '<div class="alert alert-success textcenter">Article Entry
		details added to Database!!!</div>');
		redirect('index.php/article/index');
		 }

	}
	//custom validation function for dropdown input
		function combo_check($str)
		{
		 if ($str == "-SELECT-")
		 {
		$this->form_validation->set_message('combo_check', 'Valid %s Name
		is required');
		return FALSE;
		 }
		 else
		 {
		return TRUE;
		 }
		}
		
		//custom validation function to accept only alpha and space input
		function alpha_only_space($str)
		{
		 if (!preg_match("/^([-a-z ])+$/i", $str))
		 {
		$this->form_validation->set_message('alpha_only_space', 'The %s field
		must contain only alphabets or spaces');
		return FALSE;
		 }
		 else
		 {
		return TRUE;
		 }
		}	 
		
		
	public function getArticles()
	{   
        $this->load->model('article_user_model');	
		$article['article']=  $this->article_user_model->get_articles(); 	
		$article['articles_comments'] = $this->article_user_model->getAllComments();	
	    $this->load->view('template/header');
		$this->load->view('article/all_Articles' ,$article);
		$this->load->view('template/footer');
    }
	
	public function getArticlesDetails($article_id){
		$this->load->model('article_user_model');	
		$article['article_detail'] = $this->article_user_model->get_article_details($article_id); 	
 		$article['article_fav_counts'] = $this->article_user_model->get_article_fav_counts($article_id);
		$article['article_comment_counts'] = $this->article_user_model->get_article_comments_counts($article_id);
		$article['article_comments'] = $this->article_user_model->get_all_comments_details($article_id);
		$this->load->view('template/header' ,$article);
		$this->load->view('article/articleDetails');
	}
}



?>
