<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Community Connect</title>
 <!--link the bootstrap css file-->
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
 <link href="<?php echo base_url("assets/css/main.css"); ?>" rel="stylesheet"
type="text/css"/>

<style type="text/css">
	 .colbox {
	 margin-left: 0px;
	 margin-right: 0px;
	 }
 </style>
 
</head>
<section id="action" class="responsive">
<body>


<div class="vertical-center">
<div class="container">
 <div class="row">
 <div class="col-md-8">
 </br></br>
 <table class="table table-striped table-hover" border="2" align="center">
 <thead>
 <tr class="bg-primary" style= "background-color:#FAD7A0">
 <th>Participant No</th>
 <th>Participant Name</th>
 <th>Event</th>
 <th>Participated Date</th>
  <th>Article Title</th>
 <th>Article</th>
 <th>Update</th>
 <th>Delete</th>
 </tr>
 </thead>
 <tbody>
 <?php for ($i = 0; $i < count($participantno); $i++) { ?>
 <tr>
 <td><?php echo $participantno[$i]->participant_no; ?></td>
 <td><?php echo $participantno[$i]->participant_name; ?></td>
 <td><?php echo $participantno[$i]->event_name; ?></td>
 <td><?php echo $participantno[$i]->participated_date; ?></td>
 <td><?php echo $participantno[$i]->articletitle; ?></td>
 <td><?php echo $participantno[$i]->article; ?></td>
<td><a href="<?php echo base_url() ."index.php/updateArticle/index/" . $participantno[$i]->participant_no; ?>">Update</a></td>
<td><a href="<?php echo base_url() ."index.php/deleteArticle/delete_article/" . $participantno[$i]->participant_id; ?>">Delete</a></td>
 </tr>
 <?php } ?>
 </tbody>
 </table>
<FORM><INPUT Type="Button" VALUE="Back" id="btn_add" name="btn_add"  style="width: 70px; height: 35px; background-color:#58D68D;"onClick="history.go(-1);return true;"></FORM>
 </div>
 </div>
</div>
</body>
 </section>
</html>