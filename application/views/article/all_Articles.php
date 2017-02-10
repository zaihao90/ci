
<html lang="en">
<body>
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Articles</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

    <section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
					   <?php  for ($i = 0; $i < count($article); ++$i) {?>
                         <div class="col-sm-12 col-md-12">
                            <div class="single-blog single-column">
                                <div class="post-thumb">                                  
                                    <div class="post-overlay">
                                       <span class="uppercase"><a href="#">14 <br><small>Feb</small></a></span>
                                   </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="<?php echo base_url(); ?>index.php/article/getArticlesDetails/<?php echo $article[$i]->participant_id ?>"><?php echo $article[$i]->article; ?></a></h2>
                                    <h3 class="post-author"><a href="<?php echo base_url(); ?>index.php/article/getArticlesDetails">Posted On : <?php echo $article[$i]->participated_date; ?></a></h3>
                                    <p><?php echo $article[$i]->article; ?></p>
                                    <a href="<?php echo base_url(); ?>index.php/article/getArticlesDetails" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        <ul class="nav navbar-nav post-nav"> 
                                            <li><a href="#"><i class="fa fa-comments"></i>3 Comments</a></li>
                                        </ul>
                                    </div>
									
                                </div>
                            </div>
                        </div>
					   <?php } ?> 
                    </div>                 
                 </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">					
                         <h3> Latest Comments</h3>
						  <?php for ($i = 0; $i < 3; ++$i) {?>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/portfolio/project1.jpg" alt=""></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="#"><?php echo $articles_comments[$i]->comments; ?></a></h4>
									<?php 
									  $CSday = substr($articles_comments[$i]->time_created,8, 2);
									  $CSmonth = substr($articles_comments[$i]->time_created,5, 2);
									  $CSyear = substr($articles_comments[$i]->time_created, 0,4);
									  $CSdateObj = DateTime::createFromFormat('!m', $CSmonth);
									  $CSmonthName = $CSdateObj->format('F');													 
									 ?>	
                                    <p>posted on  <?php echo $CSday; ?>&nbsp;<?php echo $CSmonthName;?>&nbsp;<?php  echo $CSyear;?></p>
                                </div>
                            </div>
                            <?php  } ?>
                        </div>
                        <div class="sidebar-item popular">
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>   
</body>
</html>
