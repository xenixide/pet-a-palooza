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
<div class="container">
        <div class="row">
   
 <?php foreach ($items as $item): ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card card-inverse card-info">
                
                    <img class="card-img-top" src="<?=base_url().'assets/img/'.$item->picpath?>">
                    <div class="card-block">
                        
                        <h4 class="card-title"><?= $item->petname ?></h4>
                        <div class="card-content">
                            <?= $item->description ?>
                        </div>
                
                        <div class="card-text">
                            <?= $item->petage ?> year(s) old
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?=base_url().'def/AnimalView/'.$item->petid ?>" type="button" class="btn btn-info btn-sm" >Know More!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Adopt!</button>
                    </div>

                                   <!-- Modal -->
                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Message from the Admin</h4><br>
                              </div>
                              <div class="modal-body">
                                  <p>Sorry you must login first!</p>       
                              </div>
                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                  <a href='<?= base_url()."login/login"?>'><button class="btn btn-theme" type="button">Login</button></a>
                              </div>
                          </div>
                      </div>
                      <!-- ENd of Modal -->
                  </div>
               </div>
            </div>
       <?php endforeach; ?> 
     </div>
<?php echo $links ?>           
            <!-- /.control-box -->   

<link rel="javascript" type="text/js" href="<?php echo base_url(); ?>js/home/carousel.js">
       <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

</script>
</body>
</html>
