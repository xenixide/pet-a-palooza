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
                              <h4><i class="fa fa-angle-right"></i>Adoptions</h4>
                              <hr>
                              <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>System Verdict</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php if (is_array($adoptions) || is_object($adoptions)){ foreach ($adoptions as $adoption): ?>
                              <tr>
                                    <td><?= $adoption->name ?></td>
                                    <td><?= $adoption->address ?></td>
                                    <td><?= $adoption->cellphone ?></td>
                                    <td>
                                        <?php 
                                            if($adoption->priority >= 80)
                                            {
                                                echo 'Eligible for Adoption - ';
                                            }
                                            else
                                            {
                                                echo 'Not Eligible - ';
                                            }
                                            echo 'Rate: '.$adoption->priority; 
                                        ?>
                                    </td>
                                    <td><?= $adoption->status ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="<?= base_url().'admin/viewAppForm/'.$adoption->id?>">View Application</a>
                                        <?php if($adoption->already_adopted == 0){ ?>
                                            <?php if($adoption->status != 'Adoption Accepted' && $adoption->status != 'Not eligible'){ ?>
                                                <a class="btn btn-primary btn-sm" href="<?=base_url().'admin/adopted/'.$adoption->id.'/'.$adoption->name.'/'.$adoption->pet_name.'/'.$adoption->user_id.'/'.$adoption->pet_id ?>" role="button">Accept Adoption</a>
                                                <a class="btn btn-danger btn-sm" href="<?=base_url().'admin/canceladopt/'.$adoption->id ?>" role="button">Cancel Adoption</a>
                                            <?php } ?>
                                        <?php } ?>
                                    </td> 
                              </tr>
                              </tbody>
                              <?php endforeach; } ?> 
                          </table>
                      </div><!-- /col-md-4 -->
                      <a class="btn btn-primary" href="<?= base_url(); ?>admin/Animals">Back to Animals</a>
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
