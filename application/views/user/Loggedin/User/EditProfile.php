<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
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
      margin-top:10%;
  }
  </style>
<body>

<div class="container">
    <div class="row mt">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
            <div class="panel-heading"><h3>Edit User Information</h3></div>
                <div class="panel-body">
                    <form action="<?php echo base_url('user/update/'.$user->id) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" value="<?=$user->fname?>" name="fname" id="" class="form-control">
                            <?= form_error('fname', '<span class="label label-danger">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Lastname</label>
                            <input type="text" value="<?=$user->lname?>" name="lname" id="" class="form-control">
                            <?= form_error('lname', '<span class="label label-danger">', '</span>') ?>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="<?=$user->email?>" name="email" id="" class="form-control">
                            <?= form_error('email', '<span class="label label-danger">', '</span>') ?>
                        </div> -->
                        <div class="form-group">
                            <label for="">Display Picture</label>
                            <input type="file" name="user_img" id="" class="form-control" onchange="loadFile(event)">
                            <font color="#f44242">
                                <?php
                                    if($this->session->flashdata('error')){echo $this->session->flashdata('error');}
                                ?>
                            </font>
                            <br>
                            <img id="output" width="65%" height="65%"/>
                            <script>
                                var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                };
                            </script>
                        </div>
                        <div class="row" style="padding:0;">
                            <div class="col-sm-8">
                                <button class="btn btn-primary btn-block" type="submit">Update Information</button>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-warning btn-block" href="<?=base_url().'user/index'?>">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>
