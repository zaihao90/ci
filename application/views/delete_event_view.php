 <!DOCTYPE html>
<html>
	<head>
		 <meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <title>Community Connect | Delete Events</title>
		 <!--link the bootstrap css file-->
		 <link href="<?php echo base_url("assets/css/bootstrapmin.css"); ?>" rel="stylesheet" type="text/css" />
	</head>
<body>
<br><br>
<div class="container">
	 <div class="row">
	 <div class="col-md-8">
<table class="table table-striped table-hover">
 <thead>
	 <tr class="bg-primary">
	 <th>Event ID</th>
	 <th>Event Name</th>
	 <th>Date of Event</th>
	 <th>Update</th>
	 <th>Delete</th>
	 </tr>
 </thead>
 <tbody>
	 <?php for ($i = 0; $i < count($event_list); $i++) { ?>
	 <tr>
		 <td><?php echo ($i+1); ?></td>
		 <td><?php echo $event_list[$i]->event_name; ?></td>
		 <td><?php echo $event_list[$i]->event_startdate; ?></td>
		 <td><a href="<?php echo base_url() ."index.php/pages/update_event_view/" . $event_list[$i]->events_id; ?>">Update</a></td>
		 <td><a href="<?php echo base_url() ."index.php/pages/edelete/" . $event_list[$i]->events_id; ?>">Delete</a></td>
		
	 </tr>
	 <?php } ?>
 </tbody>
</table>
	</div>
	</div>
</div>
	<center><input Type="button" VALUE="Back" onClick="history.go(-1);return true;"></center>
</body>
</html>