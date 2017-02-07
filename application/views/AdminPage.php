<!DOCTYPE html>
<html lang="en">
<body>
    <section id="home-slider">
        <div class="container">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>Welcome Admin!</h1>
                </div>
				<img src="<?php echo base_url(); ?>assets/images/home/slider/slide1/house.png" class="img-responsive slider-house" alt="slider image">
                <img src="<?php echo base_url(); ?>assets/images/home/slider/slide1/circle1.png" class="slider-circle1" alt="slider image">
                <img src="<?php echo base_url(); ?>assets/images/home/slider/slide1/circle2.png" class="slider-circle2" alt="slider image">
                <img src="<?php echo base_url(); ?>assets/images/home/slider/slide1/cloud1.png" class="slider-cloud1" alt="slider image">
                <img src="<?php echo base_url(); ?>assets/images/home/slider/slide1/cloud2.png" class="slider-cloud2" alt="slider image">
                <img src="<?php echo base_url(); ?>assets/images/home/slider/slide1/cloud3.png" class="slider-cloud3" alt="slider image">
                <img src="<?php echo base_url(); ?>assets/images/home/slider/slide1/sun.png" class="slider-sun" alt="slider image">
                <img src="<?php echo base_url(); ?>assets/images/home/cycle.png" class="slider-cycle" alt="">
            </div>
        </div>
        <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
    </section>
    <!--/#home-slider-->

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
							<i class="fa fa-calendar fa-5x" aria-hidden="true"></i>
                        <p><h2>Upload the details for your events.</h2></p>
						<a href="eventview"><h3>Create Event</h3></a>
						<a href="update_event_view"><h3>Update Event</h3></a>
						<a href="delete_event_view"><h3>Delete Event</h3></a>
						</ul>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="single-service">
							<i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i> 
                        <p><h2>Share articles with the Community.</h2></p>
						<a href="earticle"><h3>Create Article</h3></a>
						<a href="article_view"><h3>Update Article</h3></a>
						<a href="delete_article_view"><h3>Delete Article</h3></a>
                    </div>
                </div>
                <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="single-service">
							<i class="fa fa-users fa-5x" aria-hidden="true"></i>
                         <p><h2>Manage the accessibility of your users.</h2></p>
						<a><h3>Users</h3></a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#services-->

</body>
</html>
