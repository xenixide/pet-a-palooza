<!DOCTYPE html>
<html lang="en">
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
                              <h4><i class="fa fa-angle-right"></i> Discover Administrator</h4>
                              <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> ID No#</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>

                              <tbody>
                                <?php foreach ($members as $member): ?>
                              <tr>
                                  <td><a href="<?=base_url().'admin/membersee/'.$member->id ?>"><?= $member->id ?></a></td>
                                  <td class="hidden-phone"><?= $member->fname ?> <?= $member->lname ?></td>
                                  
                                  <td>
                                      <a class="btn btn-success btn-sm" href="<?=base_url().'admin/membersee/'.$member->id ?>" role="button">
                                      <span class="glyphicon glyphicon-search" aria-hidden="true"></span> View
                                      </a>
                                      <a class="btn btn-primary btn-sm" href="<?=base_url().'admin/editMember/'.$member->id ?>" role="button">
                                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit
                                      </a>  
                                     <!-- <a class="btn btn-warning btn-sm" href="<?=base_url().'admin/deleteAdmin/'.$member->id ?>" role="button">
                                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Delete
                                      </a> -->
                                      <a class="btn btn-warning btn-sm" data-toggle="modal" href="#myModal" role="button">
                                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Delete
                                      </a> 
                                     
                                  </td>
                              </tr>
                              </tbody>
                              <?php endforeach; ?> 
                          </table>
                      </div><!-- /col-md-4 -->
                </div>
            </div>


              <a class="btn btn-info btn-sm" href="<?=base_url().'admin/addMember/'.$member->id ?>" role="button">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Administrator
              </a>
            

             <!-- Modal -->
                <form action='<?=base_url().'admin/deleteAdmin/'.$member->id ?>' method='POST'>
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Delete Admin ?</h4></a><br>
                          </div>
                          <div class="modal-body">
                              <p>Are you sure to delete?</p>
    
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <button class="btn btn-theme" type="submit">Delete</button>
                          </div>
                      </div>
                  </div>
              </div>
          
            <br>
              <!-- modal -->

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
