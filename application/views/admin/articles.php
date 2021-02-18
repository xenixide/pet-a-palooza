<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Article</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url()?>css/datepicker.min.css">
    <script src="<?= base_url()?>css/datepicker.min.js"></script>
    <script>
    $(function() {
        $("#select_date").datepicker({
            orientation: "bottom auto",
            autoclose: true,
            todayHighlight: true
            });
        $("#select_date").on('change', function(){
            var date = Date.parse($(this).val());
            if (date > Date.now()){
                alert('Please Select Valid Date');
                $(this).val('');
            }
        });
    });
    </script>



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
                       
            <form class="form-horizontal" action="<?= base_url() . 'admin/addArticle' ?>" method = "post" enctype="multipart/form-data">
                <fieldset>

     <!--main content start-->
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Add Article</h4>
                              <hr>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="article_title">Article Title</label>  
                        <div class="col-md-4">
                            <input value="<?=set_value('article_title','')?>" id="article_title" name="article_title" type="text" class="form-control input-md">                              
                            <?=form_error('article_title','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                                        <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="article_desc">Article Description</label>  
                        <div class="col-md-4">
                            <input value="<?=set_value('article_desc','')?>" id="article_desc" name="article_desc" type="text" class="form-control input-md">                              
                            <?=form_error('article_desc','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" type="date" for="date">Date</label>
                        <div class="col-md-4">     
                            <input type="text" name="article_date" id="select_date" value="" class="form-control" placeholder="Date" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="article_desc">Article Image</label>  
                        <div class="col-md-4">
                            <input value="" id="" name="article_img" type="file" class="input-md" required> 
                            <font color="#f44242">
                                <?php
                                    if($this->session->flashdata('error')){echo $this->session->flashdata('error');}
                                ?>
                            </font>
                        </div>
                    </div>
                    
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="savebuton"></label>
                        <div class="col-md-4">
                            <button id="savebuton" name="savebuton" class="btn btn-primary">Submit</button>
                            <a class="btn btn-info" href="<?= base_url() . 'admin/article' ?>" role="button">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Cancel
                            </a>
                        </div>
                    </div>
                </fieldset>
            </form>
            
            <!-- <?php if (validation_errors()): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <h4>ERROR MESSAGE</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?= validation_errors() ?>
                </div>
            <?php endif ?> -->
        </div>
    </div>
</div>
</body>
</html>