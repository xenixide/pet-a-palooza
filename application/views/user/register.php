<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet"  href="<?= base_url()?>css/nicedate.css" type="text/css"/>
    <script src="<?php echo base_url(); ?>css/nicedate.js"></script>  
</head>

<style>
.mt{
    margin-top:10%;
}
.container{
    width:85%;
}
.mx{
    padding-left:10%;
    padding-right:10%;
}
p{
    font-size:15px;
    text-align: justify;
    color:#000;
}
.asd{
    background-color:#fff;
    padding-left:5%;
    padding-right:5%;
    padding-top:3%;
    padding-bottom:3%;
    -webkit-box-shadow: 0px 0px 20px 10px rgba(0,0,0,0.19);
    -moz-box-shadow: 0px 0px 20px 10px rgba(0,0,0,0.19);
    box-shadow: 0px 0px 20px 10px rgba(0,0,0,0.19);
}
h2, h4, h5{
    color:#000;
    font-weight:700;
    font
}
</style>

<body>
<div class="container">
    <div class="row mt asd">
        <div class="col-sm-5">
            <center>
                <h2><strong>Registration</strong></h2>
            </center>
            <form action="<?= base_url().'registration/add'?>" method="post">
                <div class="form-group">
                    <input type="text" name="fname" value="<?=set_value('fname')?>" id="" class="form-control" placeholder="Firstname">
                    <?= form_error('fname', '<span class="label label-danger">', '</span>') ?>
                </div>
                <div class="form-group">
                    <input type="text" name="lname" value="<?=set_value('lname')?>" id="" class="form-control" placeholder="Lastname">
                    <?= form_error('lname', '<span class="label label-danger">', '</span>') ?>
                </div>
                <div class="form-group">
                    <select name="gender" id=""class="form-control">
                        <option selected >Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="email" value="<?=set_value('email')?>" id="" class="form-control" placeholder="Email Address">
                    <?= form_error('email', '<span class="label label-danger">', '</span>') ?>
                </div>
                <div class="form-group">
                    <input id="datepicker" type="text" name="birth" class="form-control date" placeholder="Birthday" required/>
                    <script>
                    $('#datepicker').datepicker({
                        format: "yyyy-mm-dd",
                        autoclose: true,
                        todayHighlight: true,
                        toggleActive: true,
                        startDate: '-100y',
                        endDate: new Date(),
                        orientation: "bottom right",
                    });
                    </script>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="" class="form-control" placeholder="Password">
                    <?= form_error('password', '<span class="label label-danger">', '</span>') ?>
                </div>
                <div class="form-group">
                    <input type="password" name="repass" placeholder="Confirm Password" class="form-control" data-vali="novalidation" />
                    <?= form_error('repass', '<span class="label label-danger">', '</span>') ?>
                </div>
                <div class="form-group">
                    <label for="">Do you want to be a volunteer?</label>
                    <label class="radio-inline"><input type="radio" name="volunteer" value="yes" checked>Yes</label>
                    <label class="radio-inline"><input type="radio" name="volunteer" value="no">No</label>
                </div>
                <div class="form-inline">
                    <?= $captchainput ?><?= $image ?>
                </div>
                <div class="form-group" style="margin-top:2%;">
                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                </div>
            </form>
        </div>
        <div class="col-sm-7 mx">
            <center>
                <strong>
                    <h2>Shelter of Bacoor</h3>
                </strong>
            </center>
            <p>
            Shelter of Hope is an organization to help people to understand the importance of adopting a pet. 
            This is a platform to help people who wants to adopt and to help the furkids, find a forever loving home. Let's help one another to give 
            the animals the reason to live, love, and trust again. The Philippines has more than 10,000 (and still counting) of stary animals who 
            doesn't have house and loving family. There is a lot of ways to help this poor animals you can donate, volunteer, and foster. 
            You can do that all here in The Shelter of Hope.
            </p>
            <p class="right">
                <h4><img class="ttr_uniform" class="ttr_image" src="<?= base_url('assets/img/45.png') ?>"/></h4>
                <h4>Shelter of Hope</h4>
                <h5>Bacoor, Cavite Philippines</h5>
                <h5>Have a nice day.</h5>
                <h5>Be kind to one another.</h5>
            </p>
        </div>
    </div>
</div>
</body>
</html>