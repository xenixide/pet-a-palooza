<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

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

<style>
.row{
    margin-top:10%;
}
</style>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>User's Donation Information</h3>
                </div>
                <div class="panel-body">
                    <center><img width="50%" src="<?=base_url().'assets/donation_img/'.$donation->donation_img?>" alt="Image"></center>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">Name: <?=$donation->name?></li>
                    <li class="list-group-item">Type of Donation: <?=$donation->donation_type?></li>
                    <li class="list-group-item">Date Donated: <?=date('F d, Y', strtotime($donation->created_at))?></li>
                    <li class="list-group-item"><a class="btn btn-warning btn-block" href="<?= base_url().'admin/Donation' ?>">Back to Donations</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
</body>
</html>
