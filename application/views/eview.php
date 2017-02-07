<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>Community Connect | Create Events</title>
	 <!--link the bootstrap css file-->
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
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
	 $("#event_startdate").datepicker();
	 }); 
	  </script>
	  
</head>
<body>
<div class="container">
	 <div class="row">
	 <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
	 <legend>Add Events Details</legend>
<?php
	$attributes = array("class" => "form-horizontal", "id" => "eventform", "name" =>"eventform");
	 echo form_open("student/index", $attributes);?>
<fieldset>

 <div class="form-group">
 <div class="row colbox">

 <div class="col-lg-4 col-sm-4">
 <label for="events_id" class="control-label">Event ID</label>
 </div>
 <div class="col-lg-8 col-sm-8">
<input id="events_id" name="events_id" placeholder="ID" type="text"
class="form-control" value="<?php echo set_value('events_id'); ?>" />
 <span class="text-danger"><?php echo form_error('events_id'); ?></span>
 </div>
 </div>
 </div>
 <div class="form-group">
 <div class="row colbox">
 <div class="col-lg-4 col-sm-4">
 <label for="event_name" class="control-label">Event Name</label>
 </div>
 <div class="col-lg-8 col-sm-8">
<input id="event_name" name="event_name" placeholder="Title of Event" type="text"
class="form-control" value="<?php echo set_value('event_name'); ?>" />
 <span class="text-danger"><?php echo form_error('event_name'); ?></span>
 </div>
 </div>
 </div>

 <div class="form-group">
 <div class="row colbox">
 <div class="col-lg-4 col-sm-4">
 <label for="school" class="control-label">Duration</label>
 </div>
 <div class="col-lg-8 col-sm-8">

 <?php
 $attributes = 'class = "form-control" id = "duration"';
 echo form_dropdown('duration',$school,set_value('duration'),$attributes);?>
 
 <span class="text-danger"><?php echo form_error('duration'); ?></span>
 </div>
 </div>
 </div>

 <div class="form-group">
 <div class="row colbox">
 <div class="col-lg-4 col-sm-4">
 <label for="event_startdate" class="control-label">Event Date</label>
 </div>
 <div class="col-lg-8 col-sm-8">
<input id="event_startdate" name="event_startdate" placeholder="Date"
type="text" class="form-control" value="<?php echo set_value('event_startdate'); ?>" />
 <span class="text-danger"><?php echo form_error('event_startdate'); ?></span>
 </div>
 </div>
 </div>

 <div class="form-group">
 <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
<input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insert"
/>
<input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger"
value="Cancel" />
 </div>
 </div>

 </fieldset>
 <?php echo form_close(); ?>
 <?php echo $this->session->flashdata('msg'); ?>
 </div>
 </div>
</div>
</body>
</html>