<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>Community Connect | Update Event</title>
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
	 $("#eventstartdate").datepicker();
	 });
	 </script>
</head>

<body>
	<div class="container">
	<div class="row">
	<div class="col-md-6 col-md-offset-3 well">
		<legend>Update Events Database</legend>
<?php
	$attributes = array("class" => "form-horizontal", "id" => "eventform", "name" =>"eventform");
	echo form_open("updateEvents/index/" . $idevents, $attributes);?>
<fieldset>
		 <div class="form-group">
		 <div class="row colbox">
		<div class="col-md-4">
			<label for="idevents" class="control-label">Event ID</label>
		</div>
		<div class="col-md-8">
		<input id="idevents" name="idevents" placeholder="ID" type="text" class="form-control" value="<?php echo set_value('idevents', $eventrecord[0]->idevents) ?>" />
		<span class="text-danger"><?php echo form_error('idevents'); ?></span>
		</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row colbox">
		<div class="col-md-4">
		<label for="eventname" class="control-label">Event Name</label>
		</div>
		<div class="col-md-8">
		<input id="eventname" name="eventname" placeholder="Title of Event" type="text" class="form-control" value="<?php echo set_value('eventname', $eventrecord[0]->event_name); ?>" />
	 <span class="text-danger"><?php echo form_error('eventname'); ?></span>
		</div>
		</div>
		</div>

	 <div class="form-group">
	 <div class="row colbox">
	 <div class="col-md-4">
		<label for="eventstartdate" class="control-label">Date of Event</label>
	 </div>
	 <div class="col-md-8">
	<input id="eventstartdate" name="eventstartdate" placeholder="Date" type="text" class="form-control" value="<?php echo set_value('eventstartdate', @date('d-m-Y', @strtotime($eventrecord[0]->eventstartdate))); ?>" />
	 <span class="text-danger"><?php echo form_error('eventstartdate'); ?></span>
	 </div>
	 </div>
	 </div>

	 <div class="form-group">
	 <div class="col-sm-offset-4 col-md-8 text-left">
	<input id="btn_update" name="btn_update" type="submit" class="btn btn-primary"value="Update" />
	<input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger"value="Cancel" />
	<FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>
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