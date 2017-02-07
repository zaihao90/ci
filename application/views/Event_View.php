<html>
	<head>
	 <title>Community Connect | Event's List</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <!--link the bootstrap css file-->
	<link rel="stylesheet" href="<?php echo
	base_url("assets/css/bootstrapmin.css"); ?>">
 </head>
	 <body>
	 <div class="container">
	 <div class="row">
	 <div class="col-lg-12 col-sm-12">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Event Name</th>
			</tr>
 </thead>
 <tbody>
	<?php for ($i = 0; $i < count($eventlist); ++$i) { ?>
	<tr>
		<td><?php echo ($i+1); ?></td>
		<td><?php echo $eventlist[$i]->eventname; ?></td>
 </tr>
 <?php } ?>
 </tbody>
 </table>
 </div>
 </div>
 </div>
 </body>