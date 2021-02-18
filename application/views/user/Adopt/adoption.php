<section id="container" >
    <section class="wrapper">
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                        <h4><i class="fa fa-angle-right"></i> My Adoptions</h4>
                        <hr>
                        <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i>ID</th>
                                <th><i class=" fa fa-edit"></i>Pet Name</th>
                                <th>Status</th>
                                <th>Adopted By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; foreach ($adoptions as $adoption): $count++?>
                            <tr>
                                <td><?= $count ?></td>
                                <td><?= $adoption->pet_name ?></td>
                                <td><?= $adoption->status ?></td>
                                <td>
                                    <?php 
                                        if($adoption->already_adopted == 0)
                                        {
                                            echo 'Searching for the Best Owner';
                                        }
                                        elseif($adoption->already_adopted != $this->session->userdata('id'))
                                        {
                                            echo 'Already Adopted by someone';
                                        }
                                        else
                                        {
                                            echo 'You';
                                        } 
                                        ?>
                                </td>
                                <td>
                                    <a href="<?=base_url().'user/AnimalView/'?>" data-id="<?=$adoption->pet_id?>" class="btn btn-primary btn-sm viewanimal">View Pet</a>
                                    <?php if($adoption->already_adopted == 0){ ?>
                                        <?php if($adoption->status != 'Adoption Accepted'){ ?>
                                            <a class="btn btn-danger btn-sm" href="<?=base_url().'user/canceladopt/'.$adoption->id.'/'.$adoption->pet_name ?>" role="button">Cancel Adoption</a>
                                        <?php } ?>
                                    <?php } ?>
                                </td> 
                            </tr>
                            <?php endforeach; ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>

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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
$(document).on('click', '.viewanimal', function(e){
    e.preventDefault();
    $id = $(this).data('id');
    $url = $(this).attr('href');
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
</script>
