<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Reservation</title>

    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/reservation.less" rel="stylesheet">

    <link rel="stylesheet"  href="<?= base_url()?>css/nicedate.css" type="text/css"/>
    <script src="<?php echo base_url(); ?>css/nicedate.js"></script>  


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
                              <h4><i class="fa fa-angle-right"></i> Reservation</h4>
                              <hr>
                              
                              <!-- <div class="container theme-showcase">
                            <div class="row">
                              <div class="col-sm-6">
                              <form action="<?= base_url()."admin/disableDay" ?>" method="post">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <input required type="text" name="day" id="datepicker" value ="<?php echo date('Y-m-d') ?>" class="form-control">
                                    <script>
                                    $('#datepicker').datepicker({
                                        format: "yyyy-mm-dd",
                                        autoclose: true,
                                        todayHighlight: true,
                                        toggleActive: true,
                                        startDate: new Date(),
                                        endDate: '+1m',
                                        daysOfWeekDisabled: "0",
                                        datesDisabled: 
                                        [
                                        <?php foreach($days as $day): ?>
                                          '<?= $day->disable_day ?>',
                                        <?php endforeach; ?>
                                        ]
                                    });
                                    </script>
                                  </div>
                                  <div class="col-sm-3">
                                    <button type="submit" class="btn btn-danger">Disable Day</button>
                                  </div>
                                </div>                              
                              </form>
                              </div>                            
                              <div class="col-sm-6">
                              <form action="<?= base_url()."admin/enableDay" ?>" method="post">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <input required type="text" name="day" id="datepicker2" value ="<?php echo date('Y-m-d') ?>" class="form-control">
                                    <script>
                                    $('#datepicker2').datepicker({
                                        format: "yyyy-mm-dd",
                                        autoclose: true,
                                        todayHighlight: true,
                                        toggleActive: true,
                                        startDate: new Date(),
                                        endDate: '+1m',
                                        daysOfWeekDisabled: "0",
                                    });
                                    </script>
                                  </div>
                                  <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary">Vacant Day</button>
                                  </div>
                                </div>                              
                              </form>
                              </div>
                            </div> -->
                              

                              
                              

  <h1>Calendar</h1>

  <div id="calendar">

</div>

  </body>
</html>
