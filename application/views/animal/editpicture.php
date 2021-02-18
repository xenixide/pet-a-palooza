<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Animals</title>

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

 <form role="form" method = "post" action="<?= base_url() . 'admin/do_upload' ?>" enctype="multipart/form-data">
                    <!-- Form Name -->
                    <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                            <?= form_hidden('id', $animals->petid) ?>
                              <h4><i class="fa fa-angle-right"></i> Edit <?= $animals->petname ?>'s Image</h4>
                              <hr>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="petid">Pet's ID no.</label>  
                        <label class="col-md-4 control-label" for="petid" id="petid" name="petid"><?= $animals->petid ?></label>  
                    </div>
            <font color="red"><?=isset($error)?$error: ""?></font>
            <img src="<?= base_url() . 'assets/img/' . $pic->picpath ?>" width = "100" height="100" alt="..." class="img-thumbnail">
            <br/><br/>
            <input class="form-control" type="file" name="picture"/>
            <br/>

            <input type="submit" class="btn btn-success" name="userSubmit" value="Upload / Update Image" /> <br> <br>
            <a class="btn btn-inverse pull-left" href="<?= base_url() . 'admin/animals' ?>" role="button">

             <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Go Back</a>    

           
            </form>

                    <?php if (validation_errors()): ?>
            <p>ERROR MESSAGE</p>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?= validation_errors() ?>
            </div>
                     <?php endif ?>

            <br/><br/><br/>
        </div>
    </div>
</div>
