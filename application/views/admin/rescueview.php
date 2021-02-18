<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Rescue View</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">

            <form class="form-horizontal" action="<?= base_url() . 'admin/rescuesee' ?>" method = "post">
                <fieldset>

                    <!-- Form Name -->
                   <section id="container" >
      <!--main content start-->
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Rescue Information</h4>
        
                    <?= form_hidden('rescues', $rescues->rescue_id) ?>
                   
                    <hr>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="id">Rescue Image</label>  
                        <img width="30%" src="<?=base_url().'assets/images/'.$rescues->rescue_img?>" alt="Image">
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="id">Rescue ID</label>  
                        <label class="col-md-4 control-label" for="id"><?= $rescues->rescue_id ?></label>  
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Reported by:</label>
                        <label class="col-md-4 control-label" for="name"><?= $rescues->rname ?></label>  
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Location of the pet:</label>
                        <label class="col-md-4 control-label" for="description"><?= $rescues->address ?></label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Description:</label>
                        <label class="col-md-4 control-label" for="description"><?= $rescues->description ?></label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Date and Time Reported:</label>
                        <label class="col-md-4 control-label" for="description"><?= $rescues->time ?></label>
                    </div>

                    
                    <br>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <a class="btn btn-info" href="<?= base_url() . 'admin/Rescue' ?>" role="button">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Go Back
                            </a>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>
