<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class earticle extends CI_Controller {
 public function __construct()
 {
 parent::__construct();
 $this->load->helper('url');
 $this->load->database();
  }
 public function index()
 {
 //load the EventArticlemodel
 $this->load->model('EventArticlemodel');
 //call the model function to get the Event data
 $earticleresult = $this->EventArticlemodel->get_participant_list();
 $data['earticlelist'] = $earticleresult;
 //load the event_view
 $this->load->view('earticle_view',$data);
 }
}