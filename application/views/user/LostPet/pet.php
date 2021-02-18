<link rel="stylesheet"  href="<?= base_url()?>css/LostPet/Pet.css" type="text/css" media="screen"/>
<style>
.margin{
    margin-top: 10%;
    background-color:#fff;
}
.page-header{
    padding-top:2%;
    padding-bottom:2%;
    padding-left:4%;
    padding-right:4%;
}
</style>
<div class="container">
<div class="page-header margin">
  <h1>Lost Pets <small>in case you found some of the pets below</small></h1>
  <hr>
</div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <?php if(!empty($lost)){ foreach ($lost as $losts){ ?>
                <div class="panel panel-primary">
                    <div class="panel-heading"><h4><?= $losts->lost_title ?></h4></div>
                    <div class="panel-body">
                        <center>
                            <img src= '<?= base_url('assets/img/'.$losts->lost_pic) ?>' alt="">
                        </center>
                    </div>
                    
                    <ul class="list-group">
                        <li class="list-group-item"><b>Name of Pet:</b> <?= $losts->lost_name ?></li>
                        <li class="list-group-item"><b>Breed:</b> <?= $losts->lost_breed ?></li>
                        <li class="list-group-item"><b>Last Seen:</b> <?= $losts->lost_seen ?></li>
                        <li class="list-group-item"><b>Description:</b> <?= $losts->lost_desc ?></li>
                        <li class="list-group-item"><b>If seen please contact</b> <?= $losts->lost_cname ?><b> in</b> <?= $losts->lost_contact ?></li>
                        <li class="list-group-item"><b>By: </b> <?= $losts->lost_uname ?> | <?= date('F d,\'Y', strtotime($losts->lost_time)) ?></li>
                    </ul>
                </div>
            <?php }} ?>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>