<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>CodeIgniter | Insert Article Details into MySQL Database</title>
 <!--link the bootstrap css file-->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
 <link href="<?php echo base_url("assets/css/main.css"); ?>" rel="stylesheet"
type="text/css"/>
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

 <style type="text/css">
	 .colbox {
	 margin-left: 0px;
	 margin-right: 0px;
	 }
 </style>

 <script type="text/javascript">
	 //load datepicker control onfocus
	 $(function() {
	 $("#participatedDate").datepicker();
	 }); 
  </script>

</head>
<section id="action" class="responsive">
<body>
       <!-- <div class="navbar navbar-inverse" role="banner">-->
            <div class="container" role= "banner">
                <div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    </button>
				<a class="navbar-brand" href="index.html">
                    <h1>Community Connect</h1>
                    </a>  
         </div></div>
</br></br>
    
 <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!--<li class="active"><a href="index.html">Home</a></li>-->
                        <li class="active"><a href="http://localhost:8888/ci/">Home</a></li>
                        <li class="dropdown"><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="http://localhost:8888/ci/index.php/pages/aboutus">About</a></li>
                                <li><a href="http://localhost:8888/ci/index.php/pages/aboutus2">About 2</a></li>
                
                                <li><a href="service.html">Services</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                                <li><a href="contact2.html">Contact us 2</a></li>
                                <li><a href="404.html">404 error</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li>                  
                        <li class="dropdown"><a href="blog.html">Blog <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="blog.html">Blog Default</a></li>
                                <li><a href="blogtwo.html">Timeline Blog</a></li>
                                <li><a href="blogone.html">2 Columns + Right Sidebar</a></li>
                                <li><a href="blogthree.html">1 Column + Left Sidebar</a></li>
                                <li><a href="blogfour.html">Blog Masonary</a></li>
                                <li><a href="blogdetails.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="portfolio.html">Portfolio <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="portfolio.html">Portfolio Default</a></li>
                                <li><a href="portfoliofour.html">Isotope 3 Columns + Right Sidebar</a></li>
                                <li><a href="portfolioone.html">3 Columns + Right Sidebar</a></li>
                                <li><a href="portfoliotwo.html">3 Columns + Left Sidebar</a></li>
                                <li><a href="portfoliothree.html">2 Columns</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                            </ul>
                        </li>                         
                        <li><a href="shortcodes.html ">Shortcodes</a></li>                    
                    </ul>
                </div>
<div class="container">
 <div class="row">
 <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
 <legend>Enter Participant Article Entry</legend>
	<?php
	$attributes = array("class" => "form-horizontal", "id" => "participantform", "name" =>
	"participantform");
	 echo form_open("article/index", $attributes);?>
 <fieldset>

 <div class="form-group">
 <div class="row colbox">

 <div class="col-lg-4 col-sm-4">
 <label for="participantno" class="control-label">Participant No</label>
 </div>
 <div class="col-lg-8 col-sm-8">
<input id="participantno" name="participantno" placeholder="Participant No" type="text"
class="form-control" value="<?php echo set_value('participantno'); ?>" />
 <span class="text-danger"><?php echo form_error('participantno'); ?></span>
 </div>
 </div>
 </div>
 <div class="form-group">
 <div class="row colbox">
 <div class="col-lg-4 col-sm-4">
 <label for="participantname" class="control-label">Participant Name</label>
 </div>
 <div class="col-lg-8 col-sm-8">
<input id="participantname" name="participantname" placeholder="Participant Name" type="text"
class="form-control" value="<?php echo set_value('participantname'); ?>" />
 <span class="text-danger"><?php echo form_error('participantname'); ?></span>
 </div>
 </div>
 </div>

 <div class="form-group">
 <div class="row colbox">
 <div class="col-lg-4 col-sm-4">
 <label for="event" class="control-label">Event</label>
 </div>
 <div class="col-lg-8 col-sm-8">

 <?php
 $attributes = 'class = "form-control" id = "event"';
 echo form_dropdown('event',$event,set_value('event'),$attributes);?>
 <span class="text-danger"><?php echo form_error('event'); ?></span>
 </div>
 </div>
 </div>

 <div class="form-group">
 <div class="row colbox">
 <div class="col-lg-4 col-sm-4">
 <label for="participatedDate" class="control-label">Participated Date</label>
 </div>
 <div class="col-lg-8 col-sm-8">
<input id="participatedDate" name="participatedDate" placeholder="Participated Date"
type="text" class="form-control" value="<?php echo set_value('participatedDate'); ?>" />
 <span class="text-danger"><?php echo form_error('participatedDate'); ?></span>
 </div>
 </div>
 </div>
 
  <div class="form-group">
 <div class="row colbox">
 <div class="col-lg-4 col-sm-4">
 <label for="article" class="control-label">Article</label>
 </div>
 <div class="col-lg-8 col-sm-8">
<input id="article" name="article" placeholder="Share your experience " type="text" 
class="form-control" style=" height:400px;text-align:top-left;padding: 20px;"value="<?php echo set_value('article'); ?>" />
 <span class="text-danger"><?php echo form_error('articles'); ?></span>
 </div>
 </div>
 </div>

 <div class="form-group">
 <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
<input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insert"
/>
<input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger"
value="Cancel" />
 </div>
 </div>

 </fieldset>
 <?php echo form_close(); ?>
 <?php echo $this->session->flashdata('msg'); ?>
 </div>
 </div>
</div>
</section>
</body>
</html>
 