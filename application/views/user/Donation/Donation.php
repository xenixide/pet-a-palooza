<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Donation</title>

    <link href="<?=base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url(); ?>css/font-awesome.css" rel="stylesheet"/>
    <link href="<?=base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?=base_url(); ?>css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style>
.row{
    margin-top:10%;
    background-color:#fff;
    padding:4%;
}
</style>

<body>
<div class="container">
    <div class="row">
        <?php if($this->session->flashdata('success_msg')){ ?>
        <div class="alert alert-success" role="alert"><?=$this->session->flashdata('success_msg')?></div>
        <?php } ?>
        <div class="col-sm-6">
            <h4>Please help us by donating, Thank you!</h4>
            <hr>
        <form action="<?=base_url().'user/submitDonation/'?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" readonly value="<?=$this->session->userdata('fname').' '.$this->session->userdata('lname')?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Type of Donation</label>
                    <select name="donation_type" id="" class="form-control">
                        <option value="Money">Money</option>
                        <option value="Food">Food</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Proof of Donation</label>
                    <input type="file" name="donation_img" id="" class="form-control" onchange="loadFile(event)">
                    <font color="#f44242">
                        <?php
                            if($this->session->flashdata('error')){echo $this->session->flashdata('error');}
                        ?>
                    </font>
                    <br>
                    <img id="output" width="65%" height="65%"/>
                    <script>
                        var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                        };
                    </script>
                </div>
                <div class="row" style="padding:0;">
                    <div class="col-sm-8">
                        <a data-toggle="modal" class="btn btn-primary btn-block" type="button" href="#myModal">Send Donation</a>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-warning btn-block" href="<?= $_SERVER['HTTP_REFERER'] ?>">Cancel</a>
                    </div>
                </div>
     
    

                                      <!-- Modal -->
 <form action="<?=base_url().'user/submitDonation/'?>" method="post" enctype="multipart/form-data">

                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Donation for Shelter of Hope Bacoor</h4></a><br>
                              </div>
                              <div class="modal-body">
                                  <p>Do you want to submit this Donation?</p>
                              </div>
                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                  <button class="btn btn-theme" type="submit">Yes</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
  </div>



        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    For Courier Delivery or Drop-off
                </div>
                <div class="panel-body" style="padding-bottom:0px;">
                </div>
                <ul class="list-group" style="margin-top:0px;">
                    <li class="list-group-item"><b>Name: </b>Jaemee San Juan</li>
                    <li class="list-group-item"><b>Address: </b>Blk 4 Lot 23 Office's Ave. Springville Executive 1, Molino 3, Bacoor Cavite 4102</li>
                    <li class="list-group-item"><b>Contact: </b>09569119100</li>
                </ul>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    For Bank Deposit
                </div>
                <div class="panel-body" style="padding-bottom:0px;">
                </div>
                <ul class="list-group" style="margin-top:0px;">
                    <li class="list-group-item"><b>Bank: </b>BPI Family Savings Bank</li>
                    <li class="list-group-item"><b>Account Name: </b>Rommel Winston Soriano Soria</li>
                    <li class="list-group-item"><b>Account Number: </b>5056-3743-04</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>