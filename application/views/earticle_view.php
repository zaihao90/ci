<html>
 <head>
 <title>Community Connect</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
       <div class="container">
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
 <div class="col-lg-12 col-sm-12">
 <div class= "article" style="width: 1000px; height: 400px;" border="3" cellpadding="3">

 <?php for ($i = 0; $i < count($earticlelist); ++$i) { ?>
	
	<p>Event Name<?php echo $earticlelist[$i]->event_name; ?></p>
	<p>Participant Name : <?php echo $earticlelist[$i]->participant_name; ?> </p>
	<p>Article</br><?php echo $earticlelist[$i]->article; ?></p>
 </div>
 <?php } ?>
 <!--<table class="table table-striped table-hover" style="width: 1000px; height: 400px;" border="3" cellpadding="3">
 <thead>
 <tr>
 <th>#</th>
 <th>Event Name</th>
 <th>Participant Name</th>
 <th>Article</th>
 </tr>
 </thead>
 <tbody>

 </tbody>
 </table>
-->
  </div>
 </div>
 </div>
 </body>
 </section>
 </html>