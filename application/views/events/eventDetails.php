<!DOCTYPE html>
<html lang="en">
<body>
<style>
.widget-area.blank {
background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
-webkit-box-shadow: none;
-moz-box-shadow: none;
-ms-box-shadow: none;
-o-box-shadow: none;
box-shadow: none;
}
body .no-padding {
padding: 0;
}
.widget-area {
background-color: #fff;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
-webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
-o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
float: left;
margin-top: 30px;
padding: 25px 30px;
position: relative;
width: 100%;
}
.status-upload {
background: none repeat scroll 0 0 #f5f5f5;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
float: left;
width: 100%;
}
.status-upload form {
float: left;
width: 100%;
}
.status-upload form textarea {
background: none repeat scroll 0 0 #fff;
border: medium none;
-webkit-border-radius: 4px 4px 0 0;
-moz-border-radius: 4px 4px 0 0;
-ms-border-radius: 4px 4px 0 0;
-o-border-radius: 4px 4px 0 0;
border-radius: 4px 4px 0 0;
color: #777777;
float: left;
font-family: Lato;
font-size: 14px;
height: 142px;
letter-spacing: 0.3px;
padding: 20px;
width: 100%;
resize:vertical;
outline:none;
border: 1px solid #F2F2F2;
}

.status-upload ul {
float: left;
list-style: none outside none;
margin: 0;
padding: 0 0 0 15px;
width: auto;
}
.status-upload ul > li {
float: left;
}
.status-upload ul > li > a {
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #777777;
float: left;
font-size: 14px;
height: 30px;
line-height: 30px;
margin: 10px 0 10px 10px;
text-align: center;
-webkit-transition: all 0.4s ease 0s;
-moz-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
width: 30px;
cursor: pointer;
}
.status-upload ul > li > a:hover {
background: none repeat scroll 0 0 #606060;
color: #fff;
}
.status-upload form button {
border: medium none;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-ms-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
color: #fff;
float: right;
font-family: Lato;
font-size: 14px;
letter-spacing: 0.3px;
margin-right: 9px;
margin-top: 9px;
padding: 6px 15px;
}
.dropdown > a > span.green:before {
border-left-color: #2dcb73;
}
.status-upload form button > i {
margin-right: 7px;
}

</style>
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Event Details</h1>
                    </div>                                                                                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->

    <section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    <img src="<?php echo base_url(); ?>assets/images/blog/7.jpg" class="img-responsive" alt="">
                                    <div class="post-overlay">
									<?php 
									 $day = substr($event_detail[0]->eventstartdate,8, 2);
									 $month = substr($event_detail[0]->eventstartdate,5, 2);
									 $dateObj = DateTime::createFromFormat('!m', $month);
									 $monthName = $dateObj->format('M');
									 ?>									
                                        <span class="uppercase"><a href="#"><?php echo $day?> <br><small> <?php echo $monthName;?></small></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="#"><b><?php echo $event_detail[0]->eventname; ?></b></a></h2>                                  
									<p>Start Date:<?php echo $event_detail[0]->eventstartdate; ?></p>
									<p>End Date :<?php echo $event_detail[0]->eventenddate; ?><p>
									<p>Location :<?php echo $event_detail[0]->location; ?> </p>
									<p><?php echo $event_detail[0]->description; ?></p>
                                    <div class="post-bottom overflow">
                                        <ul class="nav navbar-nav post-nav">                                          
                                            <li><a href="#"><i class="fa fa-heart"></i><?php echo $fav_count;?> Love</a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i><?php  echo $comment_count;?> Comments</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog-share">
                                        <span class='st_facebook_hcount'></span>
                                        <span class='st_twitter_hcount'></span>
                                        <span class='st_linkedin_hcount'></span>
                                        <span class='st_pinterest_hcount'></span>
                                        <span class='st_email_hcount'></span>
                                    </div>                                    
                                    <div class="response-area">	
								    <h2 class="bold"><?php echo 'Comments'; ?></h2>
							
									<ul class="media-list">
                                        <li class="media">
										    <div class="widget-area no-padding blank">
								<div class="status-upload">
									<form action="" method="post">
										<textarea placeholder="What are you doing right now?" ></textarea>
										<ul>
											<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
											<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
											<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
											<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
										</ul>
										<button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Share</button>
									</form>
								</div><!-- Status Upload  -->
							</div><!-- Widget Area -->
										</li>
									</ul>
								
									<br/>
									<?php for ($i = 0; $i < count($comments); ++$i) { ?>
									<ul class="media-list">
                                        <li class="media">
                                            <div class="post-comment">                                               
                                                <div class="media-body">
                                                    <span><i class="fa fa-user"></i>Posted by <a href="#"><?php echo $comments[$i]->user_id; ?></a></span>
                                                    <p><?php echo $comments[$i]->comments; ?></p>
                                                    <ul class="nav navbar-nav post-nav">
													<?php 
													 $Cday = substr($comments[$i]->time_created,8, 2);
													 $Cmonth = substr($comments[$i]->time_created,5, 2);
													 $Cyear = substr($comments[$i]->time_created, 0,4);
													 $CdateObj = DateTime::createFromFormat('!m', $Cmonth);
													 $CmonthName = $CdateObj->format('F');
													 ?>		
                                                        <li><a href="#"><i class="fa fa-clock-o"></i><?php echo $CmonthName;?>&nbsp;<?php echo $Cday; ?> , <?php  echo $Cyear; ?></a></li>
                                                        <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
									<?php } ?>									
                                </div><!--/Response-area-->
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
					 <?php  if ($comment_count> 0){ ?>
                          <div class="sidebar-item  recent">						    
                             <h3><?php echo 'Comments'; ?></h3>							 	
							 <?php for ($i = 0; $i < count($comments); ++$i) { ?>
                            <div class="media">                                
                                <div class="media-body">
                                    <h4><a href="#"><?php echo $comments[$i]->comments; ?></a></h4>
									<?php 
									  $CSday = substr($comments[$i]->time_created,8, 2);
									  $CSmonth = substr($comments[$i]->time_created,5, 2);
									  $CSyear = substr($comments[$i]->time_created, 0,4);
									  $CSdateObj = DateTime::createFromFormat('!m', $Cmonth);
									  $CSmonthName = $CdateObj->format('F');													 
									 ?>	
                                     <p>posted on  <?php echo $CSday; ?>&nbsp;<?php echo $CSmonthName;?>&nbsp;<?php  echo $CSyear; ?></p>
								</div>
                            </div>
							 <?php }?>                           
                        </div> 
						<?php } ?>
                        <div class="sidebar-item popular">
                            <h3>Latest Photos</h3>
                            <ul class="gallery">
                                <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/portfolio/popular1.jpg" alt=""></a></li>
                                <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/portfolio/popular2.jpg" alt=""></a></li>
                                <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/portfolio/popular3.jpg" alt=""></a></li>
                                <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/portfolio/popular4.jpg" alt=""></a></li>
                                <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/portfolio/popular5.jpg" alt=""></a></li>
                                <li><a href="#"><img src="<?php echo base_url(); ?>assets/images/portfolio/popular1.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>

