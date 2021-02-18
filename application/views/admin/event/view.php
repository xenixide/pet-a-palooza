<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Shelter of Hope Bacoor|Donation</title>
  <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<style>
.mt{
    margin-top:5%;
}
</style>

<body>
<section id="container">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <center><h4><?=$event->title?></h4></center>
                    </div>
                    <div class="panel-body">
                        <center><h5><?=$event->description?></h5></center>
                    </div>
                    <ul class="list-group">
                        <?php foreach($respondents as $respondent){ ?>
                                <li class="list-group-item"><h4></h4><a style="text-decoration:underline;" href="<?=base_url('admin/see/'.$respondent->user_id)?>"><?=$respondent->name?></a></li>
                        <?php } ?>
                    </ul>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-8">
                                <h5>Date of Event: <?=$event->event_date?></h5>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-warning btn-block" href="<?=base_url('admin/adminEvents')?>">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </section>
</section>
</body>
</html>
