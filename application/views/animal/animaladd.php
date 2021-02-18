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
                       
            <form class="form-horizontal" action="<?= base_url() . 'admin/insert' ?>" method = "post">
                <fieldset>
      <!--main content start-->
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Add New Pet</h4>
                              <hr>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Pet's Name</label>  
                        <div class="col-md-4">
                            <input value="<?=set_value('petname','')?>" id="petname" name="petname" type="text" class="form-control input-md">                              
                            <?=form_error('petname','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                    <!-- Textarea 
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Pet's Age</label>
                        <div class="col-md-4">                     
                            <textarea class="form-control" id="petage" name="petage"><?=set_value('petage','')?></textarea>
                            <?=form_error('petage','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Pet's Description</label>
                        <div class="col-md-4">                     
                            <input value="<?=set_value('description','')?>" id="description" name="description" type="text" class="form-control input-md">                              
                            <?=form_error('description','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Date of Rescue</label>
                        <div class="col-md-4">                     
                            <input value="<?=set_value('daterescue','')?>" id="daterescue" name="daterescue" type="date" class="form-control input-md">                              
                            <?=form_error('daterescue','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Location of Rescue</label>
                        <div class="col-md-4">                     
                            <input value="<?=set_value('locationrescue','')?>" id="locationrescue" name="locationrescue" type="text" class="form-control input-md">                              
                            <?=form_error('locationrescue','<span class="label label-danger">','</span>') ?>
                        </div> 
                    </div>   

                    <!-- Prepended text-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="health">Pet's Health</label>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input value="<?=set_value('health','')?>" id="health" name="health" class="form-control" type="text">
                                <?=form_error('health','<span class="label label-danger">','</span>') ?>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="pettrait">Trait:</label>  
                        <div class="col-md-4">
                            <select name="pettrait" class="form-control" required>
                            <option value = "aggressive">Aggressive</option>
                            <option value = "playful">Playful</option>
                            <option value = "energetic">Energetic</option>
                            <option value = "shy">Shy</option>
                            <option value = "any">Any</option>
                                            
                            </select>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="petbreed">Breed:</label>  
                        <div class="col-md-4">
                            <select name="petbreed" class="form-control" required>
                            <option value = "shitzu">Shitzu</option>
                            <option value = "beagle">Beagle</option>
                            <option value = "labrador">Labrador</option>
                            <option value = "persiancat">Persian Cat</option>
                            <option value = "any">Any</option>
                                            
                            </select>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="petcolor">Color:</label>  
                        <div class="col-md-4">
                            <select name="petcolor" class="form-control" required>
                            <option value = "gold">Gold</option>
                            <option value = "white">White</option>
                            <option value = "white/brown">white/brown</option>
                            <option value = "white/black">white/black</option>
                            <option value = "brown">Brown</option>
                            <option value = "black">Black</option>
                            <option value = "any">Any</option>
                                            
                            </select>                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="petage">Age:</label>  
                        <div class="col-md-4">
                            <select name="petage" class="form-control" required>
                            <option value = "1">1</option>
                            <option value = "2">2</option>
                            <option value = "3">3</option>
                            <option value = "4">4</option>
                            <option value = "5">5</option>
                            <option value = "6">6</option>
                            <option value = "7">7+</option>
                                            
                            </select>                            
                        </div>
                         
                        <label class="col-md-4 control-label" for="agemetric">Month or Year:</label> 
                        <div class="col-md-4">
                            <select name="agemetric" class="form-control" required>
                            <option value = "months">Months</option>
                            <option value = "years">Years</option>
                                            
                            </select>                            
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="savebuton"></label>
                        <div class="col-md-4">
                            <button id="savebuton" name="savebuton" class="btn btn-primary">Submit</button>
                            <a class="btn btn-info" href="<?= base_url() . 'admin/announcement' ?>" role="button">
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