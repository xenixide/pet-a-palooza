<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Member</title>

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
                       
            <form class="form-horizontal" action="<?= base_url() . 'admin/addMember' ?>" method = "post">
                <fieldset>

     <!--main content start-->
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Add Member</h4>
                              <hr>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="fname">First Name</label>  
                        <div class="col-md-4">
                            <input value="<?=set_value('fname','')?>" id="fname" name="fname" type="text" class="form-control input-md">                              
                            <?=form_error('fname','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                                        <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="lname">Last Name</label>  
                        <div class="col-md-4">
                            <input value="<?=set_value('lname','')?>" id="lname" name="lname" type="text" class="form-control input-md">                              
                            <?=form_error('lname','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">Username</label>
                        <div class="col-md-4">                     
                            <input class="form-control" id="username" name="username"><?=set_value('username','')?></input>
                            <?=form_error('username','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="password">Password</label>
                        <div class="col-md-4">                     
                            <input class="form-control" id="password" name="password"></input>
                            <?=form_error('password','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="savebuton"></label>
                        <div class="col-md-4">
                            <button id="savebuton" name="savebuton" class="btn btn-primary">Submit</button>
                            <a class="btn btn-info" href="<?= base_url() . 'admin/members' ?>" role="button">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Cancel
                            </a>
                        </div>
                    </div>

                </fieldset>
            </form>
            
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <h4>ERROR MESSAGE</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?= validation_errors() ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>
</body>
</html>