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
                        <h4>Edit: <?=$event->title?></h4>
                    </div>
                    <div class="panel-body">
                        <form action="<?=base_url('admin/updateAdminEvent/'.$event->id)?>" method="post">
                            <div class="form-group">
                                <label for="">Event Title</label>
                                <input value="<?=$event->title?>" type="text" name="title" id="" class="form-control">
                                <?= form_error('title', '<span class="label label-danger">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Event Date</label>
                                <input id="datepicker" value="<?=$event->event_date?>" type="text" name="event_date" id="" class="form-control">
                                <?= form_error('event_date', '<span class="label label-danger">', '</span>') ?>
                                <script>
                                $('#datepicker').datepicker({
                                    format: "yyyy-mm-dd",
                                    autoclose: true,
                                    todayHighlight: true,
                                    toggleActive: true,
                                    startDate: new Date(),
                                    endDate: '+5m',
                                    orientation: "bottom right",
                                });
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="">Number of Respondents</label>
                                <input value="<?=$event->respondents?>" type="text" name="respondents" id="" class="form-control">
                                <?= form_error('respondents', '<span class="label label-danger">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Event Description</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control"><?=$event->description?></textarea>
                                <?= form_error('description', '<span class="label label-danger">', '</span>') ?>
                            </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="btn btn-warning btn-block" href="<?=base_url('admin/adminEvents')?>">Back</a>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary btn-block" type="submit">Update Event</button>
                            </div>
                            </form>
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
