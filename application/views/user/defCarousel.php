<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home/carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/criteria/criteria.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/criteria/pick.css">
</head>

<style>
.mt{
    margin-top:10%;
}
.mb{
    margin-bottom:10%;
}
.container{
    width:90%;
}
</style>

<body>
<div class="container">
    <div class="row mt">
        <div class="col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Adopt Pet</h3>
                    <h4>Don't buy, just Adopt</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <?php foreach($items as $item){ ?>
                            <div class="col-sm-3">
                                <div class="thumbnail">
                                <img class="card-img-top" src="<?=base_url().'assets/img/'.$item->picpath?>">
                                    <div class="caption">
                                        <h5><?= $item->petname ?></h5>
                                        <p><?= $item->description ?></p>
                                        <p><?= $item->petage ?> year(s) old</p>
                                    </div>
                                    <div class="panel-footer" style="background-color:#fff;">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="<?=base_url().'user/AnimalView/'?>" data-id="<?=$item->petid?>" type="button" class="btn btn-warning btn-sm btn-block viewanimal" >Know More</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <a data-toggle="modal" data-target="#myModall" type="button" class="btn btn-primary btn-sm btn-block">Adopt</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php echo $links ?> 
        </div>
        <div class="col-sm-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="match" action="<?= base_url('user/results')?>" method="post">
                        <center>
                            <h4>
                                <strong>MATCHMAKING</strong> 
                            </h4>
                        </center>
                        <div class="form-group">
                            <label for="">Choose Breed</label>
                            <select class="form-control" name="petbreed">
                                <option value="labrador">Labrador</option>
                                <option value="beagle">Beagle</option>
                                <option value="shitzu">Shitzu</option>
                                <option value="persiancat">Persian Cat</option>
                                <option value="any">Any Kind</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Choose Color</label>
                            <select class="form-control" name="petcolor">
                                <option value="gold">Gold</option>
                                <option value="white">White</option>
                                <option value="white/brown">White/Brown</option>
                                <option value="white/black">White/Black</option>
                                <option value="brown">Brown</option>
                                <option value="black">Black</option>
                                <option value="any">Any Kind</option>
                            </select>
                        </div>
                        <button id="btnMatch" class="btn btn-primary btn-block" type="submit">Match</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModall" class="modal fade">
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
</div>

<div id="searchModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Search Result</h4>
      </div>
      <br>
      <div class="modal-body-search">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pet</h4>
      </div>
      <div class="modal-body">
        <center><img id="img" src="" alt=""></center><br>
        <table class="table">
            <tr>
                <td>
                    <h5 id="petname">Pet name: </h5>
                </td>
                <td>
                    <h5 id="petage">Pet Age: </h5>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 id="petbreed">Pet Breed: </h5>
                </td>
                <td>
                    <h5 id="petcolor">Pet Color: </h5>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 id="pettrait">Pet Trait: </h5>
                </td>
                <td>
                    <h5 id="health">Health: </h5>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 id="daterescue">Date Rescue: </h5>
                </td>
                <td>
                    <h5 id="locationrescue">Rescue Location: </h5>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h5 id="description">Description: </h5>
                </td>
            </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $(document).on('click', '#btnMatch', function(e){
        e.preventDefault();
        $inputs = $('#match').serialize();
        $url = $('#match').attr('action');
        $('#searchModal').modal('show');
        $.ajax({
            type: 'GET',
            url: $url,
            data: $inputs,
            dataType: 'JSON',
            success: function(data){
                $html = '';
                $count=0;

                $.each(data.anim, function(key, val){
                    $count++;
                    if($count == 3){
                        $html += '<div class="row">';
                        $count =0;
                    }
                    $img = '<?=base_url('assets/img/')?>'+val.picpath+'';
                    $html += '<div class="col-sm-4">';
                    $html += '<div class="thumbnail">';
                    $html += '<img class="card-img-top" src="'+$img+'"';
                    $html += '<div class="caption">';
                    $html += '<h5>'+val.petname+'</h5>';
                    $html += '<p>'+val.description+'</p>';
                    $html += '<p>'+val.petage+' Year(s) old</p>';
                    $html += '<div class="panel-footer" style="background-color:#fff;">';
                    $html += '<div class="row">';
                    $html += '<div class="col-sm-12">';
                    $html += '<a href="<?=base_url().'user/AnimalView/'?>" data-id="'+val.petid+'" type="button" class="btn btn-warning btn-sm btn-block viewanimal" >Know More</a>';
                    $html += '</div>';
                    $html += '</div>';
                    $html += '</div>';
                    $html += '</div>';
                    $html += '</div>';
                    $html += '</div>';
                    if($count == 3){
                        $html += '</div>';
                        $count =0;
                    }
                });
                $('.modal-body-search').html($html);
            }
        })
    });

    $(document).on('click', '.viewanimal', function(e){
        e.preventDefault();
        $id = $(this).data('id');
        $url = $(this).attr('href');
        $('#searchModal').modal('hide');
        $('#myModal').modal('show');
        $.ajax({
            type: 'GET',
            url: $url,
            data: {
                id: $id,
            },
            dataType: 'JSON',
            success: function(res){
                $img = '<?= base_url() . 'assets/img/'?>';
                $age = res.animals.petage+res.animals.agemetric;

                $('#img').attr('src', $img+res.animals.picpath);
                $('#petname').text('Pet name: '+res.animals.petname);
                $('#petage').text('Pet Age: '+$age);
                $('#petbreed').text('Pet Breed: '+res.animals.petbreed);
                $('#petcolor').text('Pet Color: '+res.animals.petcolor);
                $('#pettrait').text('Pet Trait: '+res.animals.pettrait);
                $('#health').text('Health: '+res.animals.health);
                $('#daterescue').text('Date Rescue: '+res.animals.daterescue);
                $('#locationrescue').text('Location Rescue: '+res.animals.locationrescue);
                $('#description').text('Description: '+res.animals.description);
            }
        });
    });
});
</script>
</body>
</html>