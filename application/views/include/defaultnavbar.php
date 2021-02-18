<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/navbar/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/navbar/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/navbar/lineicons/style.css">    
    <link href="<?php echo base_url(); ?>css/navbar/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/navbar/style-responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
      <div class="header black-bg">
            <a href="<?=base_url()?>" class="logo"><b>SHELTER OF HOPE</b></a>
            <div class="nav notify-row" id="top_menu">
                <ul class="nav top-menu">
                    <li id="header_inbox_bar">
                     <a href ="<?= base_url(); ?>def/home">
                          <span>Home</span>
                      </a>
                  </li>     
                  <li id="header_inbox_bar">
                      <a href="<?= base_url() ?>def/pet">
                          <span>Adopt</span>
                      </a>
                  </li>               
                  <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <span>Others</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                          <li><a href ="<?= base_url() ?>def/Article">Article</a></li>
                          <li><a href ="<?= base_url() ?>def/Forum">Where to Adopt</a></li>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li id="header_inbox_bar" class="dropdown top-menu">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <span class="badge bg-theme"></span>
                            <span>Account</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                          <li><a href ="<?= base_url() ?>Registration/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                          <li><a href ="<?= base_url() ?>Login/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
  
    <script src="<?php echo base_url(); ?>js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/navbar/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>js/navbar/jquery.nicescroll.js" type="text/javascript"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/navbar/common-scripts.js"></script>
    <script type="<?php echo base_url(); ?>text/javascript" src="js/navbar/jquery.gritter.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/navbar/jquery.dcjqaccordion.2.7.js"></script>
  </body>
</html>




  