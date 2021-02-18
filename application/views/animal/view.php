<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|User Information</title>

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

            <form class="form-horizontal" action="<?= base_url() . 'admin/view' ?>" method = "post">
                <fieldset>
     <!--main content start-->
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> User Information</h4>
                              <hr>

                    <?= form_hidden('id', $user->id) ?>
                    <font color="red"><?=isset($error)?$error: ""?></font>
            

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Name:</label>
                        <label class="col-md-4 control-label" for="name"><?= $user->fname ?> <?= $user->lname ?></label>  
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Gender:</label>
                        <label class="col-md-4 control-label" for="description"><?= $user->gender ?></label>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Email:</label>
                        <label class="col-md-4 control-label" for="description"><?= $user->email ?></label>
                    </div>

                    <br>
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <a class="btn btn-info" href="<?= $_SERVER['HTTP_REFERER'] ?>" role="button">
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
