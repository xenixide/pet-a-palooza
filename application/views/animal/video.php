<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />    
    <title>ADMIN || Shelter of Hope Bacoor</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/admin.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>https://github.com/FortAwesome/Font-Awesome">

    <script type="text/javascript" src="http://www.expertphp.in/js/jquery.form.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
    
<script>
function preview_images() 
{
 var total_file=document.getElementById("images").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>
 <body>
<section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Pets Video</h4>
                              <hr>
    <div class="col-md-6">
      <a href ="<?= base_url() ?>admin/Animals" type="button" class="btn btn-danger">Back</a>
    </div>

    <br><br>
    
     <div class="col-xs-8">
     
                        <label class="control-label" for="id">Pet ID:</label>  
                        <label class="control-label" for="id"> 1</label>  
                            <br>
                        <label class="control-label" for="id">Pet Name:</label>  
                        <label class="control-label" for="id"> Chewbacca</label>  
<hr>
</div>

<div class="row">
<form role="form" method = "post" action="<?= base_url() . 'admin/addvideo' ?>/<?=$id?>" enctype="multipart/form-data">
  <div class="col-md-6">
  <input class="form-control" type="file" name="file"/>
            </div>
  <div class="col-md-6">
  <input type="submit" class="btn btn-success" name="userSubmit" value="Upload Video" /> <br> <br>
          
  </div>
 </form>
 </div>
 <div class="row" id="image_preview"></div>
</div>

</div>
</body>
</html>
