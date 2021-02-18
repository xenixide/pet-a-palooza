<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|User</title>

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

<section id="container" >
      <!--main content start-->
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Users</h4>
                              <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> ID No#</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>

                              <tbody>
                               <?php if (is_array($users) || is_object($users)){ foreach ($users as $user): ?>
                              <tr>
                                  <td><a href="<?=base_url().'admin/see/'.$user->id ?>"><?= $user->id ?></a></td>
                                  <td class="hidden-phone"><?= $user->fname ?> <?= $user->lname ?></td>
                                  <td><span class="label label-info label-mini"><?= $user->status ?></span></td>
                                  <td>
                                      <a class="btn btn-success btn-sm" href="<?=base_url().'admin/see/'.$user->id ?>" role="button">
                                      <span class="glyphicon glyphicon-search" aria-hidden="true"></span> View
                                      </a>
                                      <?php
                                        if($user->status == 'active'){
                                      ?>
                                      <a class="btn btn-primary btn-sm" href="<?=base_url().'admin/deactivate/'.$user->id ?>" role="button">
                                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> De-Activate
                                      </a>
                                        <?php } else { ?>
                                      <a class="btn btn-info btn-sm" href="<?=base_url().'admin/activate/'.$user->id ?>" role="button">
                                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Activate
                                      </a>
                                        <?php } ?>
                                  </td>
                              </tr>
                              </tbody>
                              <?php endforeach; } ?> 
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

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


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
