    <!DOCTYPE html>
    <html lang="en">
    <?php
    if(!isset($_SESSION)){session_start();$_SESSION['errormessage'] = "";	 }  
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Community Connect</title>


        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"> 
        <link href="<?php echo base_url(); ?>assets/css/lightbox.css" rel="stylesheet"> 
        <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet">

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightbox.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>   

        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->       
        <img href="<?php echo base_url(); ?>assets/images/ico/favicon.ico">


        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-57-precomposed.png">

    </head><!--/head-->

        <header id="header">      
            <div class="container"> 
                <div class="row">
                    <div class="col-sm-12 overflow">
                       <div class="social-icons pull-right">
                            <ul class="nav nav-pills">
                                <li>
                                 <?php   if(isset($_SESSION['errormessage']))
                                        {   
                                            if($_SESSION['errormessage'] == "Register Successfully")
                                            {
                                                $_SESSION['errormessage']="";
                                            }
                                            else
                                            echo '<span style="color:red;">'.$_SESSION['errormessage'].'</span>';
                                            $_SESSION['errormessage']="";
                                        } ?>
                                </li>

                              <?php  if(isset($_SESSION['email'])){ ?>
                                <li><?php if(!isset($_SESSION['admin'])){ ?>
                                    <a href="<?php echo base_url(); ?>index.php/pages/myprofile"><?php echo "Welcome ". $_SESSION['name']; ?></a>
                                    <?php }else{ echo "Welcome ". $_SESSION['name']; }?></li>


                                   <?php  if(isset($_SESSION['userid'])) { ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/pages/myprofile"> <img src="//graph.facebook.com/<?php echo $_SESSION['userid']; ?>/picture">
                                        </a>
                                    </li>
                                    <?php }else{ ?>
                                     <li>
                                         <?php if (!file_exists("assets/images/profileimage/".$_SESSION['profileimage'])) { ?> 
                                          <img style="border-radius: 100%;" src="<?php echo base_url(); ?>assets/images/profileimage/emptyheaderprofile.png"  class="img-responsive"  height="40" width="50" alt="Profile Picture">
                                         
                                         <?php }else{ ?>
                                         <img style="border-radius: 100%;" src="<?php echo base_url(); ?>assets/images/profileimage/<?php if(isset($_SESSION['profileimage'])){echo $_SESSION['profileimage']?><?php }else{ ?>emptyheaderprofile.png<?php } ?>" class="img-responsive"  height="40" width="50" alt="Profile Picture">
                                         <?php } ?>
                                    </li>
                                  <?php } ?>
                                    <li><a href="<?php echo base_url(); ?>index.php/pages/logout"> Logout </a></li>
                                <?php } 
                                else
                                {?>
                                    <li><a href="<?php echo base_url(); ?>index.php/pages/login" style="color:black;"> Login </a></li>
                                <?php } ?>
                               <!-- <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>   -->
                            </ul>
                        </div> 
                    </div>
                 </div>
            </div>
            <div class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>">
                            <h1>Community Connect</h1>
                        </a>                    
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <!--<li class="active"><a href="index.html">Home</a></li>-->
                            <?php if(isset($_SESSION['admin'])){ ?>
                            <li class="active"><a href="<?php echo base_url(); ?>index.php/pages/adminpage">Home</a></li>
                            <?php }else{ ?>
                            <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <?php } ?>
                            <li class="dropdown"><a href="<?php echo base_url(); ?>index.php/article/getArticles">Article</a></li>                  
                            <li class="dropdown"><a href="<?php echo base_url(); ?>index.php/events/getEvents">Events</a>             
                            </li>
                            <li class="dropdown"><a href="#">Gallery<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?php echo base_url(); ?>index.php/gallery/getgallery">Events</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/gallery/getgallery">Articles</a></li>                              
                                    <li><a href="<?php echo base_url(); ?>index.php/gallery/getgallery">Others</a></li>
                                </ul>
                            </li>                         
                            <li><a href="<?php echo base_url(); ?>index.php/pages/aboutus">About Us</a></li>   

                        </ul>
                    </div>
                    <!--<div class="search">
                        <form role="form">
                            <i class="fa fa-search"></i>
                            <div class="field-toggle">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                            </div>
                        </form>
                    </div>-->
                </div>
            </div>
        </header>
        <!--/#header-->