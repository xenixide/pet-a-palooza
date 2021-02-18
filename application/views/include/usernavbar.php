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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/navbar/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/navbar/lineicons/style.css">    
    <link href="<?php echo base_url(); ?>css/navbar/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/navbar/style-responsive.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
    <div class="header black-bg">
        <a href="<?=base_url().'user/home'?>" class="logo"><b>SHELTER OF HOPE</b></a>
        <div class="nav notify-row" id="top_menu">
            <ul class="nav top-menu">
                <li id="header_inbox_bar">
                    <a href ="<?= base_url(); ?>user/home">Home</a>
                </li>     
                <li id="header_inbox_bar">
                    <a href="<?= base_url(); ?>user/pet">Adopt</a>
                </li>
                <li id="header_inbox_bar">
                    <a href="<?= base_url(); ?>user/viewReservePage">Booking</a>
                </li> 
                <li id="header_inbox_bar">
                    <a href ="<?= base_url() ?>user/Donation">Donate</a>
                </li> 
                <li id="header_inbox_bar">
                    <a href="<?= base_url(); ?>user/volunteer">Volunteer</a>
                </li>  
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">Others</a>
                    <ul class="dropdown-menu extended inbox">
                            <li><a href ="<?= base_url() ?>user/Article"><i class="fas fa-newspaper fa-lg"></i> Article</a></li>
                            <li><a href ="<?= base_url() ?>user/Community"><i class="fas fa-users fa-lg"></i> Community</a></li>
                            <li><a href ="<?= base_url() ?>user/LostPet"><i class="fas fa-paw fa-lg"></i> Lost Pet</a></li>
                             <!-- <li><a href ="<?= base_url() ?>user/reserve"><i class="fas fa-dog fa-lg"></i> Rescue Pets</a></li>  -->
                            <li><a href ="<?= base_url() ?>user/Forum"><i class="fas fa-map-marker-alt fa-lg"></i> Where to Adopt</a></li>          
                    </ul>
                </li>
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle">Account</a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li><a href ="<?= base_url() ?>user/index"><i class="fas fa-user fa-lg"></i> Profile</a></li>
                        <li><a href ="<?= base_url() ?>user/EditProfile"><i class="fas fa-user-edit fa-lg"></i> Edit Profile</a></li>
                        <li><a href ="<?= base_url() ?>user/viewadoption"><i class="fas fa-paw fa-lg"></i> My Adoptions</a></li>
                        <li><a href ="<?= base_url() ?>user/myreservations"><i class="fas fa-book fa-lg"></i> My Reservations</a></li>
                        <li><a href ="<?= base_url() ?>user/logout"><i class="fas fa-sign-out-alt fa-lg"></i> Logout</a></li>
                    </ul>
                </li>
                <li id="header_inbox_bar">
                    <a href ="<?= base_url(); ?>user/notif"><i class="fas fa-bell"></i><span class="badge"><?= $notifs ?></span></a>
                </li>     
            </ul>
            </div>
        </div>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/navbar/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>js/navbar/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/navbar/common-scripts.js"></script>
<script type="<?php echo base_url(); ?>text/javascript" src="js/navbar/jquery.gritter.js"></script>
<script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/navbar/jquery.dcjqaccordion.2.7.js"></script>
<script src="https://use.fontawesome.com/f12e4a6b3c.js"></script>

</body>
</html>
