<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />    
    <title>ADMIN || Shelter of Hope Bacoor</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/admin.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>https://github.com/FortAwesome/Font-Awesome">
</head>
<body>
    
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        Welcome to the Admin side of Shelter of Hope!
                    </div>
                </div>

            </div>
            <div class="row">
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-venus dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
  </div>
                           
</div>
                         <h5>There are 3 Users </h5>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="fa fa-edit dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
  </div>
                           
</div>
                         <h5>Inbox </h5>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="fa fa-cogs dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
  </div>
                           
</div>
                         <h5>Database </h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <i  class="fa fa-bell-o dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
  </div>
                           
</div>
                         <h5>Notification </h5>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           Adoption Notice Panel 
                                <div class="pull-right" >
                                    <div class="dropdown">
  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    <span class="glyphicon glyphicon-cog"></span>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Refresh</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
  </ul>
</div>
                                </div>
                            </div>
                            <div class="panel-body">
                               
                                <ul >
                                   
                                     <li>
                                            <a href="#">
                                     <span class="glyphicon glyphicon-edit  text-danger" ></span> 
                                                  Alyssa Caparas submit Adoption Form
                                                 <span class="label label-warning" > Just now </span>
                                                 <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                                    View
                                                 </button>
                                            </a>
                                    </li>

                                    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Adoption Form</h4>
      </div>
      <div class="modal-body">
        Name: <br>
        Email: <br>
        Phone: <br>
        Cell: <br>
        Facebook Account: <br>
        Complete Address: <br>
        <hr>
        Where you live in: <br>
        Do you own? Rent? Living with relatives?: <br>
        How long?: <br>
        if renting, Landlord Name/ Phone: <br>
        How many adults in the household?: <br>
        Children: <br>
        Ages of Children: <br>
        Are all members of the family supportive of this pet adoption?:  <br>
        Are you planning to move in the future?: <br>
        Who will be responsible for the pets care?: <br>
        What is your source of income?: <br>
        <hr>
        Have you ever adopted an animal from a shelter?:  <br>
        If you returned an animal, what was the reason?: <br>
        Do you plan to give this pet as a gift?:  <br>
        If yes, to whom?: <br>
        Where will the pet be kept during the day?: <br>
        If outside, describe the shelter you will provide: <br>
        Length of time during the day the pet will be left alone?: <br>
        Who is your veterinarian?: <br>
        Contact number: <br>
        <hr>
        Share past experience of having pets? What are the challenges you have and how did you overcome them?: 
        <br>
        <hr>
        PLEASE GIVE US A BRIEF EXPLANATION OF YOUR REASONS FOR WANTING TO ADOPT THIS PET: 
       <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning">Reject Form</button>
        <button type="button" class="btn btn-primary">Accept Form</button>
      </div>
    </div>
  </div>
</div>
                            
                                </ul>
                            </div>
                        </div>
           </div>
           </div></div>
            <div class="row">
                <div class="col-md-6">
                      <div class="notice-board">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                           Active  Notice Panel 
                                <div class="pull-right" >
                                    <div class="dropdown">
  <button class="btn btn-success dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    <span class="glyphicon glyphicon-cog"></span>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Refresh</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Logout</a></li>
  </ul>
</div>
                                </div>
                            </div>
                            <div class="panel-body">
                               
                                <ul >
                                   
                                     <li>
                                            <a href="#">
                                     <span class="glyphicon glyphicon-align-left text-success" ></span> 
                                                  There is new registered user
                                                 <span class="label label-warning" > Just now </span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-comment  text-warning" ></span> 
                                          Alyssa Caparas message you
                                          <span class="label label-info" > 2 min ago</span>
                                            </a>
                                    </li>
                                     <li>
                                          <a href="#">
                                     
                                     <span class="glyphicon glyphicon-info-sign text-danger" ></span>  
                                          Weekly maintance of Website
                                          <span class="label label-success" >GO! </span>
                                            </a>
                                    </li>
                                    <li>
                                          <a href="#">
                                     <span class="glyphicon glyphicon-edit  text-danger" ></span>  
                                          Michael Jackson booked a visit
                                          <span class="label label-success" >Let me see </span>
                                            </a>
                                    </li>
                                   </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="panel-footer">
                                <a href="#" class="btn btn-default btn-block"> <i class="glyphicon glyphicon-repeat"></i> Refresh</a>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="text-center alert alert-warning">
                        <a href="#" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="#" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google</a>
                        <a href="#" class="btn btn-social btn-twitter">
                            <i class="fa fa-twitter"></i>&nbsp; Twitter </a>
                        <a href="#" class="btn btn-social btn-linkedin">
                            <i class="fa fa-linkedin"></i>&nbsp; Linkedin </a>
                    </div>
                     
                    <hr />
                      <center>Registered User</center>
                     <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Birthday</th>
                                            <th>Status </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach ($users as $user): ?>

                                        <tr>
                                            <td><?= $user->id ?></td>
                                            <td><?= $user->fname ?> <?= $user->lname ?></td>
                                            <td><?= $user->email ?> </td> 
                                            <td><?= $user->birth ?></td>
                                            <td><?= $user->status ?></td>
                                            <td><?= $user->status ?></td>
                                        </tr>
                                        
                                    </tbody>
                                    <?php endforeach; ?> 
                                </table>
                            </div>
                </div>
                <div class="col-md-6">
                     <div class="Compose-Message">               
                <div class="panel panel-success">
                    <div class="panel-heading">
                        Compose New Message 
                    </div>
                    <div class="panel-body">
                        
                        <label>Enter Recipient Name : </label>
                        <input type="text" class="form-control" />
                        <label>Enter Subject :  </label>
                        <input type="text" class="form-control" />
                        <label>Enter Message : </label>
                        <textarea rows="9" class="form-control"></textarea>
                        <hr />
                        <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-envelope"></span> Send Message </a>&nbsp;
                      <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-tags"></span>  Save To Drafts </a>
                    </div>
                    <div class="panel-footer text-muted">
                        <strong>Note : </strong>Please note that we track all messages so don't send any spams.
                    </div>
                </div>
                     </div>
                </div>


            </div>

        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2017 Shelter of Hope | By : <a href="#" target="_blank">The Vision</a>
                </div>

            </div>
        </div>
    </footer>

 <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-1.11.1.js"></script>
 <script type='text/javascript' src="<?php echo base_url(); ?>js/bootstrap.js"></script>




<!--<div class="container">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <h3>Item Management</h3>
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>IMAGE</th>
                    <th>NAME</th>
                    <th>QUANTITY</th>
                    <th>PRICE</th>
                    <th>ACTION</th>
                </tr>


                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $item->id ?></td>
                        <td><img src="<?=base_url().'images/'.$item->picpath?>" width = "50px" alt="..." class="img-thumbnail"></td>
                        <td><?= $item->name ?></td>
                        <td><?= $item->qty ?> </td> 
                        <td><?= $item->price ?></td>
                        <td>
                            <a class="btn btn-info" href="#" role="button">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> View
                            </a>
                            <a class="btn btn-warning" href="<?=base_url().'item/edit/'.$item->id ?>" role="button">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                            </a>
                            <a class="btn btn-danger" href="<?=base_url().'item/delete/'.$item->id ?>" role="button">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <?php echo $links ?>

            <br/>
            <a class="btn btn-success" href="<?=base_url().'item/add' ?>" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Item
            </a>
           
        </div>
    </div>
</div>
-->
</body>
</html>