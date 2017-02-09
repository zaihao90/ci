<!DOCTYPE html>
<?php 
if(!isset($_SESSION)){session_start();}  
?>
<html lang="en">
<body>
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                        <h1 class="title">Events</h1>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

    <section id="blog" class="padding-top">
	<center>
        <div class="container">
		
            <div class="row">
				
                    <div class="row">
					
						<table class="table table-striped table-hover">
							<thead>
								<tr class="bg-primary" style="background-color:#FAD7A0">
									<th>#</th>
									<th>Event Name</th>
									<th>Event Start Date</th>
									<th>Event End Date</th>
									<th>Location</th>
									<th>Date Booked</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
							<?php for ($i = 0; $i < count($booking_list); $i++) { ?>
								<tr>
									<td><?php echo ($i+1); ?></td>
									<td><?php echo $booking_list[$i]->eventname; ?></td>
									<td><?php echo $booking_list[$i]->eventstartdate; ?></td>
									<td><?php echo $booking_list[$i]->eventenddate; ?></td>
									<td><?php echo $booking_list[$i]->location; ?></td>
									<td><?php echo $booking_list[$i]->booking_date; ?></td>
									<td><a href="<?php echo base_url(); ?>index.php/booking/delete_booking/<?php echo $booking_list[$i]->id;?>/<?php echo $booking_list[$i]->user_email;?>">Delete</a></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
						
                    </div>
					
            </div>
        </div>
		</center>
    </section>
    <!--/#blog-->
 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/lightbox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>   
</body>
</html>
