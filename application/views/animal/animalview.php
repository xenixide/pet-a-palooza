<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Members</title>

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

            <form class="form-horizontal" action="<?= base_url() . 'item/view' ?>" method = "post">
                <fieldset>

                    <!-- Form Name -->
                   <section id="container" >
      <!--main content start-->
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Pet Information</h4>
        
                    <?= form_hidden('petid', $animals->petid) ?>
                    <font color="red"><?=isset($error)?$error: ""?></font>
                    <center><img src="<?= base_url() . 'assets/img/' . $animals->picpath ?>" class="img-thumbnail"></center>
                    <hr>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="id">Pet ID</label>  
                        <label class="col-md-4 control-label" for="id"><?= $animals->petid ?></label>  
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Pet's Name:</label>
                        <label class="col-md-4 control-label" for="name"><?= $animals->petname ?></label>  
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Pet's Age:</label>
                        <label class="col-md-4 control-label" for="description"><?= $animals->petage ?></label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Description:</label>
                        <label class="col-md-4 control-label" for="description"><?= $animals->description ?></label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Date of Rescue:</label>
                        <label class="col-md-4 control-label" for="description"><?= $animals->daterescue ?></label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Location of Rescue:</label>
                        <label class="col-md-4 control-label" for="description"><?= $animals->locationrescue ?></label>
                    </div>

                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="price">Health:</label>
                        <label class="col-md-4 control-label" for="price"><?= $animals->health ?></label>
                    </div>

                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="price">Pet Trait:</label>
                        <label class="col-md-4 control-label" for="price"><?= $animals->pettrait ?></label>
                    </div>

                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="price">Pet Color:</label>
                        <label class="col-md-4 control-label" for="price"><?= $animals->petcolor ?></label>
                    </div>

                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="price">Pet Breed:</label>
                        <label class="col-md-4 control-label" for="price"><?= $animals->petbreed ?></label>
                    </div>
                    <br>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <a class="btn btn-info" href="<?= base_url() . 'admin/animals' ?>" role="button">
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
