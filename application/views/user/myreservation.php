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
                            <h4><i class="fa fa-angle-right"></i> My Reservations</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Purpose</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                              <tbody>
                                <?php foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td><?= $reservation->resrve_fname .' '.$reservation->reserve_lname ?></a></td>
                                    <td><?= $reservation->purpose ?></a></td>
                                    <td><?= date('F d, Y', strtotime($reservation->date)) ?></a></td>
                                    <td><?= $reservation->time .' - '.$reservation->end_time ?></a></td>
                                    <td><?= $reservation->status ?></a></td>
                                    <td>
                                    <?php
                                        $date = date('d');
                                        $day_reserved = date('d', strtotime($reservation->date));
                                        $valid_date = $day_reserved - $date;
                                        $valid_date;
                                        if($valid_date != 1){
                                    ?>
                                        <a class="btn btn-danger btn-sm" href="<?=base_url().'user/cancelAppointment/'.$reservation->reserve_id.'/'.$reservation->appform_id ?>" role="button">
                                            Cancel Reservation
                                        </a>
                                    <?php } ?>                                   
                                    </td> 
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
