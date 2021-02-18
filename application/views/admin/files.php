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
                              <h4><i class="fa fa-angle-right"></i> Files</h4>
                              <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> File No#</th>
                                  <th><i class=" fa fa-edit"></i> File</th>
                                  <th><i class=" fa fa-edit"></i> Download</th>
                                  <th><i class=" fa fa-edit"></i> Delete</th>
                               
                              </tr>
                              </thead>

                              <tbody>
                                <?php foreach ($files as $file): ?>
                              <tr>
                                  <td><?= $file->file_id ?></a></td>
                                  <td><?= $file->filename ?></a></td>
                                  <td>  <a class="btn btn-primary btn-sm" href="<?=base_url().'files/'.$file->filename ?>" role="button">
                                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Download
                                  </a>                                   
                              </td> 
                                  <td>  <a class="btn btn-danger btn-sm" href="<?=base_url().'admin/deleteFiles/'.$file->file_id ?>" role="button">
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

              <a class="btn btn-info btn-sm" href="<?=base_url().'admin/addfiles/'?>" role="button">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Upload File
              </a>
            
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
