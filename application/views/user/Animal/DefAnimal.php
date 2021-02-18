<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Railway", sans-serif}
.menu {display: none}
</style>
<body>


<!-- Menu Container -->
<div class="w3-container w3-padding-64 w3-medium" id="menu">
  <div class="w3-content">
  
    <h4 class="w3-center w3-xxlarge" style="margin-bottom:30px">Pet's Information</h4>
    <?= form_hidden('petid', $animals->petid) ?>
    <font color="red"><?=isset($error)?$error: ""?></font>

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
        
                    <?= form_hidden('petid', $animals->petid) ?>
                    <font color="red"><?=isset($error)?$error: ""?></font>
                    <center><img src="<?= base_url() . 'assets/img/' . $animals->picpath ?>" class="img-thumbnail"></center>
                    <hr>

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
                            <a class="btn btn-info" href="<?= base_url() . 'def/pet' ?>" role="button">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Go Back
                            </a>
                        </div>
                    </div>

                </fieldset>
            </form>

</body>
</html>
