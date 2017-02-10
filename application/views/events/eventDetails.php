<!DOCTYPE html>
<html lang="en">
<body>
<script>
</script>
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
 	                          <form id= "commentBox" action="<?php echo base_url(); ?>index.php/events/postComments/<?php echo $event_detail[0]->idevents;?>/<?php echo  $_SESSION['email'];?>" method="post">
										<textarea form="commentBox" name="comments" placeholder="Share your thoughts with us.." ></textarea>										
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
														 if ($_SESSION['name'] == $comments[$i]->user_id ){ ?>															 
															<li><a href="#"><i class="fa fa-clock-o"></i><?php echo $comments[$i]->time_created ?></a></li>	
													        <li><a href="<?php echo base_url(); ?>index.php/events/deleteComments/<?php echo $comments[$i]->id;?>/<?php echo $event_detail[0]->idevents?>"><i class="fa fa-trash" aria-hidden="true">&nbsp;Delete</i></li>
													    
														<?php } else { ?>
															 <li><a href="#"><i class="fa fa-clock-o"></i><?php echo $comments[$i]->time_created ?></a></li>
														<?php } ?>
														
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

