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

            <form class="form-horizontal" action="<?= base_url() . 'admin/update' ?>" method = "post">
                <fieldset>

                    <!-- Form Name -->
                    <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Edit Pet's Information</h4>
                              <hr>
                    <?= form_hidden('id', $animals->petid) ?>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="petid">Pet's ID no.</label>  
                        <label class="col-md-4 control-label" for="petid" id="petid" name="petid"><?= $animals->petid ?></label>  
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="petname">Pet's Name</label>  
                        <div class="col-md-4">
                            <input value="<?= $animals->petname ?>" id="petname" name="petname" type="text" class="form-control input-md">                              
                            <?= form_error('petname', '<span class="label label-danger">', '</span>') ?>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="petage">Pet's Age</label>
                        <div class="col-md-4">                     
                            <input value="<?= $animals->petage ?>" id="petage" name="petage" type="text" class="form-control input-md"</input>
                            <?= form_error('petage', '<span class="label label-danger">', '</span>') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Description</label>
                        <div class="col-md-4">                     
                            <input value="<?= $animals->description ?>" id="description" name="description" type="text" class="form-control input-md">                              
                            <?=form_error('description','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="daterescue">Date of Rescue</label>
                        <div class="col-md-4">                     
                            <input value="<?= $animals->daterescue ?>" id="daterescue" name="daterescue" type="date" class="form-control input-md">                              
                            <?=form_error('daterescue','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="locationrescue">Location of Rescue</label>
                        <div class="col-md-4">                     
                            <input value="<?= $animals->locationrescue ?>" id="locationrescue" name="locationrescue" type="text" class="form-control input-md">                              
                            <?=form_error('locationrescue','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-4 control-label" for="health">Pet's Health</label>
                        <div class="col-md-4">                     
                            <input value="<?= $animals->health ?>" id="health" name="health" type="text" class="form-control input-md">                              
                            <?=form_error('health','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                    <div class="form-group">
            <label class="col-xs-6">Traits</label>
            <div class="col-xs-6">
                    <label for="pettrait">Choose a Trait: </label>
                        <select class="form-control" id="pettrait" name="pettrait">
                            <option value="playful"> Playful</option>
                            <option value="aggressive"> Aggresive</option>
                            <option value="energetic"> Energetic</option>
                            <option value="shy"> Shy</option>
                            <option value="any"> Any Kind</option>
                        </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-6">Breed</label>
            <div class="col-xs-6">
                    <label for="petbreed">Choose a Breed: </label>
                        <select class="form-control" id="petbreed" name="petbreed">
                            <option value="labrador">Labrador</option>
                            <option value="beagle">Beagle</option>
                            <option value="shitzu">Shitzu</option>
                            <option value="persiancat">Persian Cat</option>
                            <option value="any">Any Kind</option>
                        </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-6">Color</label>
            <div class="col-xs-6">  
                    <label for="color">Choose a Color: </label>
                        <select class="form-control" id="petcolor" name="petcolor">
                            <option value="gold">Gold</option>
                            <option value="white">White</option>
                            <option value="white/brown">White/Brown</option>
                            <option value="white/black">White/Black</option>
                            <option value="brown">Brown</option>
                            <option value="black">Black</option>
                            <option value="any">Any Kind</option>
                        </select>
            </div>
        </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="savebuton"></label>
                        <div class="col-md-4">
                            <button id="savebuton" name="savebuton" class="btn btn-primary">Update</button>
                            <a class="btn btn-info" href="<?= base_url() . 'admin/animals' ?>" role="button">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Go Back
                            </a>
                        </div>
                    </div>

                </fieldset>
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
