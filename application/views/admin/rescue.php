<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Rescue</title>
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url()?>css/nicedate.css" type="text/css"/>
    <script src="<?= base_url() ?>css/nicedate.js"></script>  
  </head>
<body>

<section id="container" >
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                    <div id="success" class="alert alert-success" style="display:none"><h5 id="msg"></h5></div>
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Pets Recued</h4>
                              <hr>
                              <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Reported by</th>
                                    <th>Type of Pet</th>
                                    <th>Date and Time Reported</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if(!empty($rescues)){ $count=1; foreach ($rescues as $rescue){ ?>
                              <tr>
                                  <td><?= $count++ ?></td>
                                  <td><?= $rescue->rescuer_name ?></td>
                                  <td><?= $rescue->type ?></td>
                                  <td><?= date('F d, Y', strtotime($rescue->date)) ?></td>					                 
                                  <td>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <a class="btn btn-primary btn-sm btn-block view" data-id="<?=$rescue->id?>" href="<?=base_url().'admin/rescuesee/'.$rescue->id ?>">View</a>
                                        </div>
                                        <div class="col-sm-3">
                                          <a class="btn btn-success btn-sm btn-block add" data-date="<?= date('F d, Y', strtotime($rescue->date)) ?>" data-id="<?=$rescue->id?>">Add to Adoption</a>
                                        </div>
                                      </div>
                                  </td>
                              </tr>
                              </tbody>
                              <?php }} ?> 
                          </table>
                      </div>
                  </div>
              </div>
        </section>
      </section>
  </section>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rescued Pet</h4>
        </div>
        <div class="modal-body">
          <div style="text-align:center">
            <img id="img" width="70%" src="" alt="">
          </div>
          <br>
          <ul class="list-group">
            <li id="description" class="list-group-item"></li>
            <li id="type" class="list-group-item"></li>
            <li id="date" class="list-group-item"></li>
            <li id="rescuer" class="list-group-item"></li>
            <li id="address" class="list-group-item"></li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add to Adoption</h4>
      </div>
      <div class="modal-body">
        <form id="addForm" action="<?= base_url('admin/insert')?>" method="post">
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <input id="petname" name="petname" type="text" class="form-control" placeholder="Pets name">                              
              </div>
              <div class="col-sm-6">
                <input id="daterescue" name="daterescue" type="text" class="form-control" placeholder="Date Rescue" autocomplete="off">   
                <script>
                $('#daterescue').datepicker({
                  format: "yyyy-mm-dd",
                  orientation: "bottom right",
                  autoclose: true,
                  todayHighlight: true,
                  toggleActive: true,
                  startDate: new Date(),
                  endDate: '+1m',
                  daysOfWeekDisabled: "0",
                });
                </script>                      
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <input id="locationrescue" name="locationrescue" type="text" class="form-control" placeholder="Rescue Location">                              
              </div>
              <div class="col-sm-6">
                <input id="health" name="health" type="text" class="form-control" placeholder="Health">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <select name="pettrait" class="form-control">
                  <option value="aggressive">Aggressive</option>
                  <option value="playful">Playful</option>
                  <option value="energetic">Energetic</option>
                  <option value="shy">Shy</option>
                  <option value="any">Any</option>
                </select>       
              </div>
              <div class="col-sm-6">
                <select name="petbreed" class="form-control">
                  <option value="shitzu">Shitzu</option>
                  <option value="beagle">Beagle</option>
                  <option value="labrador">Labrador</option>
                  <option value="persiancat">Persian Cat</option>
                  <option value="any">Any</option>
                </select>   
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-4">
                <select name="petcolor" class="form-control" required>
                  <option value="gold">Gold</option>
                  <option value="white">White</option>
                  <option value="white/brown">white/brown</option>
                  <option value="white/black">white/black</option>
                  <option value="brown">Brown</option>
                  <option value="black">Black</option>
                  <option value="any">Any</option>
                </select>        
              </div>
              <div class="col-sm-4">
                <select name="petage" class="form-control" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7+</option>
                </select>          
              </div>
              <div class="col-sm-4">
                <select name="agemetric" class="form-control">
                  <option value="months">Months</option>
                  <option value="years">Years</option>
                </select>  
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-12">
                <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Description"></textarea>
                <input id="rescue_id" type="hidden" name="rescue_id" value="">                            
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
      <button id="addButton" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<input id="res_id" type="hidden" name="">

<script>
$(document).ready(function(){
  $(document).on('click', '.view', function(e){
    e.preventDefault();
    $url = $(this).attr('href');
    $id = $(this).data('id');
    $('#myModal').modal('show');

    $.ajax({
      type: 'GET',
      url: $url,
      data: {
        id: $id,
      },
      success: function(data){
        $content = JSON.parse(data);
        $img = '<?=base_url('assets/rescue_img/')?>'+$content.rescue.image;
        $('#img').attr('src', $img)
        $('#description').text('Decription: '+ $content.rescue.description);
        $('#type').text('Type: '+ $content.rescue.type);
        $('#date').text('Date Reported: '+ $content.rescue.date);
        $('#rescuer').text('Reported By: '+ $content.rescue.rescuer_name);
        $('#address').text('Address: '+ $content.rescue.address);
      }
    });
  });

  $(document).on('click', '.add', function(e){
    e.preventDefault();
    $('#addModal').modal('show');  
    $date = $(this).data('date');
    $('#daterescue').val($date);
    $rescue_id = $(this).data('id');
    $('#rescue_id').val($rescue_id);
    $('#res_id').val($rescue_id);
  });

  $(document).on('click', '#addButton', function(e){
    e.preventDefault();
    $form = $('#addForm').serialize();
    $url = '<?=base_url('admin/addanimal')?>';
    $res_id = $('#res_id').val();

    $.ajax({
      type: 'POST',
      url: $url,
      data: $form,
      dataType: 'JSON',
      success: function(data){
        if(data.wp == 1){
          $('.err').remove();
          $('#addForm').trigger('reset');
          $('#addModal').modal('toggle')
          $('#success').attr('style', 'text-align:center')
          $('#msg').text('You have successfully added pet to adoption list');
          $res = $(document).find('[data-id="'+$res_id+'"]');
          $res.parent().parent().parent().parent().parent().remove();
        }else{
          $('.err').remove();
          $.each(data, function(key, val){
            $el = $(document).find('[name="'+key+'"]');
            $el.addClass('is-invalid');
            $el.after(val);
          });
        }
      }
    })
  });
});
</script>
</body>
</html>
