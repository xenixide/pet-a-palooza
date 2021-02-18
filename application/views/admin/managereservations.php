<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Reservations</title>

    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
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
                            <h4><i class="fa fa-angle-right"></i> Reservation List</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th><i class=" fa fa-edit"></i>Customer Name</th>
                                <th><i class=" fa fa-edit"></i>Customer Lastname</th>
                                <th><i class=" fa fa-edit"></i>Purpose</th>
                                <th><i class=" fa fa-edit"></i>Date</th>
                                <th><i class=" fa fa-edit"></i>Time</th>
                                <th><i class=" fa fa-edit"></i>End Time</th>
                                <th><i class=" fa fa-edit"></i>Status</th>
                            </tr>
                            </thead>

                              <tbody>
                                <?php foreach ($appoints as $appoint): ?>
                              <tr>
                              
                                  <td><?= $appoint->resrve_fname ?></a></td>
                                  <td><?= $appoint->reserve_lname ?></a></td>
                                  <td><?= $appoint->purpose ?></a></td>
                                  <td><?= $appoint->date ?></a></td>
                                  <td><?= $appoint->time ?></a></td>
                                  <td><?= $appoint->end_time ?></a></td>
                                  <td><?= $appoint->status ?></a></td>
                                
                              <?php if($appoint->status != 'Approved'){ ?>
                              <td>  <a class="btn btn-primary btn-sm" href="<?=base_url().'admin/addappoint/'.$appoint->reserve_lname ?>/<?= $appoint->date?>/<?=$appoint->time?>/<?=$appoint->purpose?>/<?=$appoint->reserve_id?>/<?=$appoint->user_id?>/<?=$appoint->resrve_fname?>/<?=$appoint->time?>/<?=$appoint->end_time?>/<?=$appoint->reserve_id?>" role="button">
                                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Accept Reservation
                                  </a>                                   
                              </td> 
                              <td>  <a class="btn btn-danger btn-sm" href="<?=base_url().'admin/cancelappoint/'.$appoint->reserve_lname ?>/<?=$appoint->date?>/<?=$appoint->time?>/<?=$appoint->purpose?>/<?=$appoint->reserve_id?>/<?=$appoint->user_id?>/<?=$appoint->resrve_fname?>/<?=$appoint->reserve_id?>" role="button">
                              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Cancel Reservation
                              </a>                                   
                          </td> 
                          <?php } ?>
                              </tr>
                              </tbody>
                              <?php endforeach; ?> 
                          </table>
                      </div><!-- /col-md-4 -->
                </div>
            </div>

            
        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
