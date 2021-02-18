<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home/carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/criteria/criteria.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/criteria/pick.css">

<br><br><br>

<div class="container">
    <br>
    <div class="col-xs-12">
<br><br>
        <div class="page-header">
            <h3>Rescue Dog</h3>
            <p>Don't buy just Adopt</p>
        </div>
        <center><h1>Match Result</center></h1>
        <hr>
        <?php 
      if($items){
        foreach($items as $item){
    ?>
<div class="container">
 
        <div class="row">


        <div class="col-sm-6 col-md-4 col-md-offset-0 m-b-md-20">
        <div class="col-md-8 form-group">
                <div class="card card-inverse card-info">
                
                    <img class="card-img-top" src="<?=base_url().'assets/img/'.$item->picpath?>">
                    <div class="card-block">
                        
                        <h4 class="card-title"><?= $item->petname ?></h4>
                        <div class="card-content">
                            <?= $item->petbreed ?>
                        </div>
                
                    </div>
                    <div class="card-footer">
                        <a href="<?=base_url().'user/AnimalView/'.$item->petid ?>" type="button" class="btn btn-info btn-sm" >Know More!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?=base_url().'user/Adopt/'.$item->petid ?>" type="button" class="btn btn-default btn-sm">
                        Adopt!</a>
                    </div>
                  </div>
               </div>
            </div>
            <div>
               <?php
        }
      }
    ?>
     </div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
