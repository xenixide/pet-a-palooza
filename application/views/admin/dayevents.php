<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Article</title>

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
                              <h4><i class="fa fa-angle-right"></i>Schedules</h4>
                              <hr>
                              <thead>
                              <tr>
                                  <th>Purpose</th>
                                  <th>Name</th>
                                  <th>Date</th>
                                  <th>Time</th>
                              </tr>
                              </thead>

                              <tbody>
                                <?php if (is_array($events) || is_object($events)){ foreach ($events as $event): 
                                    $start_time = date('g:i A', strtotime($event->time));
                                    $end_time = date('g:i A', strtotime($event->end_time));
                                    $time = $start_time. '-' .$end_time;
                                ?>
                              <tr>
                                  <td><?= $event->title ?></td>
                                  <td><?= $event->name ?></td>
                                  <td><?= date('F d, Y', strtotime($event->start)) ?></td>
                                  <td><?= $time ?></td>
                              </tr>
                              </tbody>
                              <?php endforeach; } ?> 
                          </table>
                      </div><!-- /col-md-4 -->
                      <a class="btn btn-primary" href="<?= base_url(); ?>admin/Reservation">Back to Calendar</a>
                </div>
            </div>
        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
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
