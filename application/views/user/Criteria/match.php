<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/criteria/criteria.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/criteria/pick.css">

<br><br><br> 


<div class="container-fluid zero-pad div-header">
    <h2 class="text-center" style="color:black;background-color:white;margin:0;padding-bottom:10px;padding-top:10px">Match Making</h2>
</div>
<div class="container-fluid zero-pad div-content">
<div class="col-sm-7 zero-pad">

    <center>
        <div class="col-sm-6 col-md-4 col-lg-3 mt-4"></div>

    <div class="container">
        <div class="row">
   <?php 
      if($items){
        foreach($items as $item){
    ?>

            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card card-inverse card-info">
                     <img class="card-img-top" src="<?=base_url().'assets/img/'.$item->picpath?>">
                    <div class="card-block">
                        
                        <h4 class="card-title"><?= $item->petname ?></h4>
                        <div class="card-content">
                            <?= $item->pettrait ?>
                        </div>
                
                        <div class="card-text">
                            <?= $item->petbreed ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">Know More!</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-default btn-sm">Adopt!</button>
                    </div>
                </div>
            </div>
             <?php
        }
      }
    ?>
        </div>
</div>

   

</div>
</div>