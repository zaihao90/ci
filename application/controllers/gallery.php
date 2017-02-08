<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class gallery extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function get_event_gallery(){  	    
        $this->load->model('gallery_user_model');	
        $eventPictures = $this->gallery_user_model->getEventGallery();      		
	    $this->load->view('template/header');
		$this->load->view('gallery/galleries_events',$eventPictures);
		$this->load->view('template/footer');
    }
	
	public function get_event_GalleryDetails(){		
	   
		$this->load->view('template/header');
		$this->load->view('gallery/gallery_event_Details');	
	}
	
	public function get_article_gallery(){  
        $this->load->model('gallery_user_model');	
		$articlePictures = $this->gallery_user_model->getArticleGallery();   
	    $this->load->view('template/header');
		$this->load->view('gallery/galleries_events',$articlePictures);
		$this->load->view('template/footer');
    }
	
	public function get_article_GalleryDetails(){		
		$this->load->view('template/header');
		$this->load->view('gallery/gallery_event_Details');	
	}
	
	public function get_others_gallery(){	
        $this->load->model('gallery_user_model');	
		$otherPictures = $this->gallery_user_model->getOtherGallery();  
	    $this->load->view('template/header');
		$this->load->view('gallery/galleries_events',$otherPictures);
		$this->load->view('template/footer');
    }
	
	public function get_others_GalleryDetails(){		
		$this->load->view('template/header');
		$this->load->view('gallery/gallery_event_Details');	
	}
}