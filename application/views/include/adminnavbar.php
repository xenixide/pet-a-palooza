<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">

    <title>Shelter of Hope</title>

    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>css/bootstrap.css">
    <link href="<?=base_url(); ?>css/navbar/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<div class="header black-bg">
    <a href="<?=base_url('admin/members')?>" class="logo"><b>SHELTER OF HOPE</b></a>
    <div class="nav notify-row" id="top_menu">
        <ul class="nav top-menu">
            <li id="header_inbox_bar">
                <a href ="<?=base_url().'admin/Reservation'?>">Calendar</a>
            </li>  
            <li id="header_inbox_bar">
                <a href ="<?= base_url() ?>admin/Donation">Donation</a>
            </li> 
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">Others</a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li><a href ="<?= base_url() ?>admin/managereservations"><i class="fas fa-bookmark fa-lg"></i> Manage Bookings</a></li>
                    <li><a href ="<?= base_url() ?>admin/manageadoptions"><i class="fas fa-dog fa-lg"></i> Manage Adoptions</a></li>
                    <li><a href ="<?= base_url() ?>admin/adminEvents"><i class="fas fa-calendar-alt fa-lg"></i> Manage Events for Volunteer</a></li>
                    <li><a href ="<?= base_url() ?>admin/Animals"><i class="fas fa-paw fa-lg"></i> Manage Animals</a></li>
                    <li><a href ="<?= base_url() ?>admin/User"><i class="fas fa-user fa-lg"></i> Manage Users</a></li>
                    <li><a href ="<?= base_url() ?>admin/Members"><i class="fas fa-unlock-alt fa-lg"></i> Manage Administrators</a></li>
                    <li><a href ="<?= base_url() ?>admin/Article"><i class="fas fa-newspaper fa-lg"></i> Manage Articles</a></li>
                    <li><a href ="<?= base_url() ?>admin/Announcements"><i class="fas fa-bullhorn fa-lg"></i> Manage Announcement</a></li>
                    <li><a href ="<?= base_url().'admin/Rescue'?>"><i class="fas fa-paw fa-lg"></i> Pet Rescue</a></li>
                    <li><a href ="<?= base_url() ?>admin/animalReport"><i class="fas fa-flag fa-lg"></i> Animal Reports</a></li>
                </ul>
            </li>
            <li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">Reports</a>
                <ul class="dropdown-menu extended inbox">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li><a href ="<?= base_url() ?>admin/viewAdopted"><i class="fas fa-dog fa-lg"></i> Pets Adopted</a></li>
                    <li><a href ="<?= base_url() ?>admin/viewAdoption"><i class="fas fa-bookmark fa-lg"></i> Pets for Adoption</a></li>
                    <li><a href ="<?= base_url() ?>admin/viewVolunteers"><i class="fas fa-calendar-alt fa-lg"></i> Volunteer List</a></li>
                    <li><a href ="<?= base_url() ?>admin/viewDonors"><i class="fas fa-paw fa-lg"></i> Donor List</a></li>
                </ul>
            </li>
            <li id="header_inbox_bar" class="dropdown top-menu">
                <li><a href ="<?= base_url().'admin/logout'?>">Logout</a></li>
            </li>
            <li id="header_inbox_bar">
                <a href ="<?= base_url('admin/notif'); ?>"><i class="fas fa-bell"></i><span class="badge"><?= $notifs ?></span></a>
            </li>
        </ul>
    </div>
</div>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
</body>
</html>
