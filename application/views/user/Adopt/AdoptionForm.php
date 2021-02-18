<!-- <!DOCTYPE html>
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
  </head>
  <style>
  .asd{
    margin-top:8%;
    margin-bottom:10%;
    padding-bottom:20px;
  }
  .mr{
      margin-right:3%;
  }
  </style>
<body>
<div class="container">
    <div class="row asd" style="background-color:#fff;">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <center>
                <h2>SHELTER OF HOPE BACOOR</h2>
                <h3>Adoption Application Form</h3>
                <h5>all applicaions must meet adoption guidelenes, we reserve the right to deny any application.</h5>
            </center>
            <hr>
            <form action="<?= base_url('user/sendAdoptionForm/'.$animals->petid.'/'.$animals->petname)?>" method="post">
            <ul class="nav nav-tabs" style="margin-bottom:2%">
                <li id="stepp1" class="active"><a data-toggle="tab" href="#step1">Contact Information</a></li>
                <li id="stepp2"><a data-toggle="tab" href="#step2">Questions Part 1</a></li>
                <li id="stepp3"><a data-toggle="tab" href="#step3">Questions Part 2</a></li>
                <li id="stepp4"><a data-toggle="tab" href="#step4">Questions Part 3</a></li>
                <li id="stepp5"><a data-toggle="tab" href="#step5">Questions Part 4</a></li>
                <li id="stepp6"><a data-toggle="tab" href="#step6">Experience</a></li>
            </ul>

                <div class="tab-content">
                    <div id="step1" class="tab-pane fade in active">
                        <div class="form-group">
                            <label class="control-label" for="">Name</label>
                            <input type="text" value="<?=$this->session->userdata('fname').' '.$this->session->userdata('lname')?>" name="name" class="form-control" placeholder="name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="<?= $this->session->userdata('email')?>" name="email" class="form-control" placeholder="name" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Complete Address</label>
                            <input type="text" value="<?php echo set_value('address'); ?>" name="address" class="form-control" placeholder="Present Address">
                            <?= form_error('address', '<span class="label label-danger">', '</span>') ?>
                        </div>
                        <h4>Contact Information</h4>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="work">Work:</label>
                                    <input type="text" value="<?php echo set_value('work'); ?>" name="work" class="form-control" placeholder="Work">
                                    <?= form_error('work', '<span class="label label-danger">', '</span>') ?>
                                </div>
                                <div class="col-sm-4">
                                    <label for="cell">Cell:</label>
                                    <input type="text" value="<?php echo set_value('cellphone'); ?>" name="cellphone" class="form-control" placeholder="Cellphone number">
                                    <?= form_error('cellphone', '<span class="label label-danger">', '</span>') ?>
                                </div>
                                <div class="col-sm-4">
                                    <label for="phone">Phone:</label>
                                    <input type="text" value="<?php echo set_value('telephone'); ?>" name="telephone" class="form-control" placeholder="Telephone number">
                                    <?= form_error('telephone', '<span class="label label-danger">', '</span>') ?>
                                </div>
                            </div>
                        </div>
                        <a id="next1" class="btn btn-primary pull-right" data-toggle="tab" href="#step2">NEXT</a>
                    </div>
                    <div id="step2" class="tab-pane fade">
                        <h4>PLEASE COMPLETE THE FOLLOWING QUESTIONS</h4>
                        <div class="form-inline">
                            <label class="mr">1. Check the type of dwelling you live in:</label>
                            <label class="mr"><input type="checkbox" name="checkHome" value="Home">Home</label>
                            <label class="mr"><input type="checkbox" name="checkApartment" value="Apartment">Apartment</label>
                            <label class="mr"><input type="checkbox" name="checkTownhouse" value="Townhouse">Townhouse</label>
                            <label class="mr"><input type="checkbox" name="checkCondo" value="Condo">Condo</label>
                            <label class="mr"><input type="checkbox" name="checkDorm" value="Dorm">Dorm</label>
                        </div>
                        <div class="form-inline">
                            <label class="mr">Do you own? Rent</label>
                            <label class="mr"><input type="radio" value="Own" name="rentown" checked>Own</label>
                            <label class="mr"><input type="radio" value="Rent" name="rentown">Rent</label>
                        </div>
                        <div class="form-inline">
                            <label class="mr">Living with relatives?</label>
                            <label class="mr"><input type="radio" value="Yes" name="living" checked>Yes</label>
                            <label class="mr"><input type="radio" value="No" name="living">No</label>
                            <label class="mr">How Long?</label>
                            <input type="text" value="<?php echo set_value('address'); ?>" name="howlong" class="form-control" style="width:10%;">
                            <?= form_error('howlong', '<span class="label label-danger">', '</span>') ?><br><br>
                            (We want to make sure the dog is truly allowed in your home. We need a document stating that this is a fact. Please bring a document or letter with landlord or parents’ permission upon going to the shelter.) 
                        </div>
                        <hr>
                        <div class="form-inline">
                            <label class="mr">How many adults in the household?</label>
                            <input type="text" name="adults" class="form-control" style="width:5%;">
                            <label class="mr">Children?</label>
                            <input type="text" name="childrens" class="form-control" style="width:5%;">
                        </div>
                        <div class="form-inline">
                            <label class="mr">Do children have allergies?</label>
                            <label class="mr"><input type="radio" value="Yes" name="allergy" checked>Yes</label>
                            <label class="mr"><input type="radio" value="No" name="allergy" >No</label>
                            <label class="mr">If yes, please specify</label>
                            <input type="text" value="<?php echo set_value('specifyallergy'); ?>" name="specifyallergy" class="form-control" placeholder="Allergies">
                            <?= form_error('specifyallergy', '<span class="label label-danger">', '</span>') ?>
                        </div>
                        <hr>
                        <div class="row">
                            <a id="next2" style="margin-left:1%;" class="btn btn-warning pull-right" data-toggle="tab" href="#step3">NEXT</a>
                            <a id="prev2" class="btn btn-primary pull-right" data-toggle="tab" href="#step1">PREVIOUS</a>
                        </div>
                    </div>
                    <div id="step3" class="tab-pane fade">
                        <div class="form-inline">
                            <label class="mr">Are all members of the family supportive of this pet adoption?</label>
                            <label class="mr"><input type="radio" value="Yes" name="support" checked>Yes</label>
                            <label class="mr"><input type="radio" value="No" name="support" >No</label>
                        </div>
                        <div class="form-inline">
                            <label class="mr">Are you planning to move in the future?</label>
                            <label class="mr"><input type="radio" value="Yes" name="move">Yes</label>
                            <label class="mr"><input type="radio" value="No" name="move" checked>No</label>
                            <label class="mr">If yes, when?</label>
                            <input type="text" name="moveDate" class="form-control">
                        </div>
                        <hr>
                        <div class="form-inline">
                            <label class="mr">2. Who will be responsible for the pets care?</label>
                            <label class="mr"><input type="checkbox" name="checkMyself" value="Myself" checked>Myself</label>
                            <label class="mr"><input type="checkbox" name="checkChildren" value="Children">Children</label>
                            <label class="mr"><input type="checkbox" name="checkRelatives" value="Relatives">Relatives</label>
                            <label class="mr"><input type="checkbox" name="checkOthers" value="Others">Others</label>
                        </div>
                        <div class="form-inline">
                            <label class="mr">3. What is your source of income?</label>
                            <label class="mr"><input type="checkbox" name="checkEmployed" value="Employed">Employed</label>
                            <label class="mr"><input type="checkbox" name="checkSelfEmp" value="Self-Employed">Self-Employed</label>
                            <label class="mr"><input type="checkbox" name="checkNone" value="None">None</label>
                        </div>
                        <hr>
                        <div class="form-inline">
                            <label class="mr">4. Have you ever adopted an animal from a shelter?</label>
                            <label class="mr"><input type="radio" value="Yes" name="adopted" checked>Yes</label>
                            <label class="mr"><input type="radio" value="No" name="adopted" >No</label>
                        </div>
                        <div class="form-inline">
                            <label class="mr">5. Do you plan to give this pet as a gift?</label>
                            <label class="mr"><input type="radio" value="Yes" name="gift">Yes</label>
                            <label class="mr"><input type="radio" value="No" name="gift" checked>No</label>
                            <label class="mr">If Yes, To whom?</label>
                            <input type="text" name="giftToWhom" id="" class="form-control">
                        </div>
                        <hr>
                        <div class="row">
                            <a id="next3" style="margin-left:1%;" class="btn btn-warning pull-right" data-toggle="tab" href="#step4">NEXT</a>
                            <a id="prev3" class="btn btn-primary pull-right" data-toggle="tab" href="#step2">PREVIOUS</a>
                        </div>
                    </div>
                    <div id="step4" class="tab-pane fade">
                        <div class="form-group">
                            <label for="">6. Where will the pet be kept during the day?</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <p>At Day:</p>
                                </div>
                                <div class="col-sm-2">
                                    <label><input type="radio" value="Indoors" name="atDay" checked>Indoors</label>
                                </div>
                                <div class="col-sm-2">
                                    <label><input type="radio" value="In/Out" name="atDay">In/Out</label>
                                </div>
                                <div class="col-sm-2">
                                    <label><input type="radio" value="Patio" name="atDay">Patio</label>
                                </div>
                                <div class="col-sm-3">
                                    <label><input type="radio" value="Outside with proper shelter" name="atDay">Outside with proper shelter</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                    <p>At Night:</p>
                                </div>
                                <div class="col-sm-2">
                                    <label><input type="radio" value="Indoors" name="atNight" checked>Indoors</label>
                                </div>
                                <div class="col-sm-2">
                                    <label><input type="radio" value="In/Out" name="atNight">In/Out</label>
                                </div>
                                <div class="col-sm-2">
                                    <label><input type="radio" value="Patio" name="atNight">Patio</label>
                                </div>
                                <div class="col-sm-3">
                                    <label><input type="radio" value="Outside with proper shelter" name="atNight">Outside with proper shelter</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="">List all the pets you have owned in the past Five years</label>
                            <textarea class="form-control" name="listown" id="" cols="30" rows="5" placeholder="Breed/Age/Gender/Name"></textarea>
                        </div>
                        <div class="row">
                            <a id="next4" style="margin-left:1%;" class="btn btn-warning pull-right" data-toggle="tab" href="#step5">NEXT</a>
                            <a id="prev4" class="btn btn-primary pull-right" data-toggle="tab" href="#step3">PREVIOUS</a>
                        </div>
                    </div>
                    <div id="step5" class="tab-pane fade">
                        <div class="form-inline">
                            <label class="mr">7. Length of time during the day the pet will be left alone?</label>
                            <label class="mr"><input type="radio" value="0" name="leftDuration" checked>0</label>
                            <label class="mr"><input type="radio" value="1-3" name="leftDuration">1-3 Hours</label>
                            <label class="mr"><input type="radio" value="3-6" name="leftDuration">3-6 Hours</label>
                            <label class="mr"><input type="radio" value="6+" name="leftDuration">6+ Hours</label>
                        </div>
                        <div class="form-inline">
                            <label class="mr">8. What type of diet/food you plan to feed the dog?</label>
                            <label class="mr"><input type="radio" value="Dry Food" name="food" checked>Dry Food</label>
                            <label class="mr"><input type="radio" value="Canned Food" name="food">Canned Food</label>
                            <label class="mr"><input type="radio" value="Home Cooked" name="food">Home Cooked</label>
                            <label class="mr"><input type="radio" value="Others" name="food">Others</label>
                        </div>
                        <hr>
                        <div class="form-inline">
                            <label class="mr">9. Do you have a veterinarian?</label>
                            <label class="mr"><input type="radio" value="Yes" name="vet" checked>Yes</label>
                            <label class="mr"><input type="radio" value="No" name="vet" >No</label>
                        </div>
                        <div class="form-inline">
                            <label class="mr">10. How tall is the fence you currently have?</label>
                            <label class="mr"><input type="radio" value="Tall" name="fenceHeight">Tall</label>
                            <label class="mr"><input type="radio" value="Average" name="fenceHeight" checked>Average</label>
                            <label class="mr"><input type="radio" value="Short" name="fenceHeight" >Short</label>
                        </div>
                        <hr>
                        <div class="row">
                            <a id="next5" style="margin-left:1%;" class="btn btn-warning pull-right" data-toggle="tab" href="#step6">NEXT</a>
                            <a id="prev5" class="btn btn-primary pull-right" data-toggle="tab" href="#step4">PREVIOUS</a>
                        </div>
                    </div>
                    <div id="step6" class="tab-pane fade">
                        <div class="form-group">
                            <label for="">Share past experience of having pets? What are the challenges you have and how did you overcome them?</label>
                            <textarea name="pastExp" id="" cols="15" rows="4" class="form-control"><?php echo set_value('pastExp'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">PLEASE GIVE US A BRIEF EXPLANATION OF YOUR REASONS FOR WANTING TO ADOPT THIS PET </label>
                            <textarea name="reason" id="" cols="15" rows="4" class="form-control"><?php echo set_value('reason'); ?></textarea>
                        </div>
                        <div class="form-inline">
                            <input type="checkbox" required class="mr"> I certify that all information provided as part of this application is true and correct to the best of my knowledge.
                        </div>
                        <hr>
                        <a data-toggle="modal" href="#myModal">Submit Application</a>
                        <a id="prev6" style="margin-right:1%;"class="btn btn-warning pull-right" data-toggle="tab" href="#step5">PREVIOUS</a>
                    </div>
                </div>

                              <!-- Modal -->
<form action="<?= base_url('user/sendAdoptionForm/'.$animals->petid.'/'.$animals->petname)?>" method="post">

                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Adoption Form</h4></a><br>
                              </div>
                              <div class="modal-body">
                                  <p>Do you want to submit this Adoption Form?</p>
                              </div>
                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                  <button class="btn btn-theme" type="submit">Submit Application</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>

        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
$( "#next1" ).click(function(){
    $('#stepp1').removeClass('active');
    $('#stepp2').addClass('active');
});

$( "#next2" ).click(function(){
    $('#stepp2').removeClass('active');
    $('#stepp3').addClass('active');
});

$( "#next3" ).click(function(){
    $('#stepp3').removeClass('active');
    $('#stepp4').addClass('active');
});

$( "#next4" ).click(function(){
    $('#stepp4').removeClass('active');
    $('#stepp5').addClass('active');
});

$( "#next5" ).click(function(){
    $('#stepp5').removeClass('active');
    $('#stepp6').addClass('active');
});

$("#prev2").click(function(){
    $('#stepp2').removeClass('active');
    $('#stepp1').addClass('active');
});

$("#prev3").click(function(){
    $('#stepp3').removeClass('active');
    $('#stepp2').addClass('active');
});

$("#prev4").click(function(){
    $('#stepp4').removeClass('active');
    $('#stepp3').addClass('active');
});

$("#prev5").click(function(){
    $('#stepp5').removeClass('active');
    $('#stepp4').addClass('active');
});

$("#prev6").click(function(){
    $('#stepp6').removeClass('active');
    $('#stepp5').addClass('active');
});
</script>
</body>
</html> -->