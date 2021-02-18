<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Members</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
<body>

<section id="container" >
      <!--main content start-->
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h3><i class="fa fa-angle-right"></i> Pet List</h3>
                              <hr>
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>Name</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                              </thead>

                              <tbody>
                                <?php $count=1; foreach ($animals as $animal){ ?>
                              <tr>
                                  <td><?= $count++ ?></td>
                                  <td><?= $animal->petname ?></td>
                                  <td>
                                    <?php if($animal->status == NULL){ ?>
                                        <span class="label label-success label-mini">Available</span>
                                    <?php } else { ?>
                                        <span class="label label-info label-mini">Adopted</span>
                                    <?php } ?>
                                  </td>
                                  <td>
                                        <a href="<?=base_url().'user/AnimalView/'?>" data-id="<?=$animal->petid?>" class="btn btn-success btn-sm viewanimal" >View</a>
                                        <a class="btn btn-primary btn-sm" href="<?=base_url().'admin/animaledit/'.$animal->petid ?>" role="button">Edit</a>
                                        <a class="btn btn-warning btn-sm" href="<?= base_url() . 'admin/editpicture/'.$animal->petid ?>" role="button">Edit Image</a>
                                        <a class="btn btn-info btn-sm" href="<?= base_url() . 'admin/petAdoptions/'.$animal->petid ?>" role="button">Adoptions</a>
                                  </td>
                              </tr>
                              </tbody>
                                <?php } ?> 
                          </table>
                      </div>
                  </div>
              </div>

              <a class="btn btn-info btn-sm" href="<?=base_url().'admin/Animaladd/'.$animal->petid ?>" role="button">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Pet
              </a>

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
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
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
});
</script>
</body>
</html>
