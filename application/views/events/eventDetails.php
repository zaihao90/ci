<!DOCTYPE html>
<html lang="en">
<body>
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
									<?php 
									  if (count($comments)> 0){ ?>
										   <h2 class="bold"><?php echo 'Comments'; ?></h2>
									 <?php }									
									?>                                   
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
