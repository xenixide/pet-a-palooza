<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Shelter of Hope Bacoor|Donation</title>
  <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
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
  <section class="wrapper">
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <h4>Donations</h4>
            <hr>
            <thead>
              <tr>
                <th>#</th>
                <th>Name of Donator</th>
                <th>Type of Donation</th>
                <th>Date Donated</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php if(!empty($donations)){ $count = 0; foreach($donations as $donation) { $count++ ?>
              <tr>
                <td><?= $count ?></td>
                <td><?= $donation->name ?></td>
                <td><?= $donation->donation_type ?></td>
                <td><?= date('F d, Y', strtotime($donation->created_at)) ?>               
                <td>
                  <a class="btn btn-primary btn-sm" href="<?= base_url('admin/viewdonation/'.$donation->id_donation); ?>" role="button">View</a>
                  <a class="btn btn-danger btn-sm" href="<?= base_url('admin/delete/'.$donation->id_donation); ?>" role="button">Delete
                </td> 
              </tr>
            <?php }} ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</section>

<!--main content end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>
<script src="assets/js/common-scripts.js"></script>
<script src="assets/js/sparkline-chart.js"></script>    
<script>
$(function(){
$('select.styled').customSelect();
});

</script>

</body>
</html>
