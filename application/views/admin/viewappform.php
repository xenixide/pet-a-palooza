<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Adopt Animal</title>

    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">
  </head>
  <style>
  .asd{
    margin-top:10%;
    margin-bottom:10%;
  }
  </style>
<body>
<div class="container">
    <div class="row asd" style="background-color:#fff;">
        <div class="col-xs-12">
            <section class="wrapper">
                <center>
                <h1>SHELTER OF HOPE BACOOR</h1>
                <h2>Adoption Application Form</h2>
                <h5>all applicaions must meet adoption guidelenes, we reserve the right to deny any application.</h5>
                </center>
                    <div class="form-group">
                        <label class="control-label" for="">Name</label>
                        <input type="text" value="<?=$appform->name?>" name="name" class="form-control" placeholder="name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" value="<?=$appform->email?>" name="email" class="form-control" placeholder="name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Complete Address</label>
                        <input type="text" value="<?=$appform->address?>" name="address" class="form-control" placeholder="Present Address" readonly>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="work">Work:</label>
                                <input type="text" value="<?=$appform->work?>" name="work" class="form-control" readonly placeholder="Work">
                            </div>
                            <div class="col-sm-4">
                                <label for="cell">Cell:</label>
                                <input type="text" value="<?=$appform->cellphone?>" name="cellphone" class="form-control" readonly placeholder="Cellphone number">
                            </div>
                            <div class="col-sm-4">
                                <label for="phone">Phone:</label>
                                <input type="text" value="<?=$appform->telephone?>" name="telephone" class="form-control" readonly placeholder="Telephone number">
                            </div>
                        </div>
                    </div>
                    <hr>
                    PLEASE COMPLETE THE FOLLOWING QUESTIONS
                    <div class="form-group">
                        <label for="">1. Check the type of dwelling you live in:</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input <?php if($appform->checkHome != NULL){ echo 'checked'; } ?> type="checkbox" name="checkHome" disabled value="Home">Home</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input <?php if($appform->checkApartment != NULL){ echo 'checked'; } ?> type="checkbox" name="checkApartment" disabled value="Apartment">Apartment</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input <?php if($appform->checkTownhouse != NULL){ echo 'checked'; } ?> type="checkbox" name="checkTownhouse" disabled value="Townhouse">Townhouse</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input <?php if($appform->checkCondo != NULL){ echo 'checked'; } ?> type="checkbox" name="checkCondo" disabled value="Condo">Condo</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input <?php if($appform->checkDorm != NULL){ echo 'checked'; } ?> type="checkbox" name="checkDorm" disabled value="Dorm">Dorm</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Do you own? Rent</label>
                        <div class="radio">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label><input type="radio" <?php if($appform->rentown == 'Own'){ echo 'checked'; } ?> value="Own" name="rentown" disabled>Own</label>
                                </div>
                                <div class="col-sm-2">
                                    <label><input type="radio" <?php if($appform->rentown == 'Rent'){ echo 'checked'; } ?> value="Rent" name="rentown" disabled>Rent</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Living with relatives?</label>
                        <div class="radio">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label><input type="radio" <?php if($appform->living == 'Yes'){ echo 'checked'; } ?> value="Yes" name="living" disabled>Yes</label>
                                </div>
                                <div class="col-sm-2">
                                    <label><input type="radio" <?php if($appform->living == 'No'){ echo 'checked'; } ?> value="No" name="living" disabled>No</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="form-inline">
                                            <label for="">How Long?</label>
                                            <input type="text" value="<?=$appform->howlong?>" name="howlong" class="form-control" style="width:10%;" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        (We want to make sure the dog is truly allowed in your home. We need a document stating that this is a fact. Please bring a document or letter with landlord or parents’ permission upon going to the shelter.) 
                    </div>
                    <hr>
                    <div class="form-group form-inline">
                        <label for="">How many adults in the household?</label>
                        <input type="text" name="adults" value="<?= $appform->adults?>" class="form-control" style="width:5%;" disabled>

                        <label for="">Children?</label>
                        <input type="text" name="childrens" value="<?= $appform->childrens?>" class="form-control" style="width:5%;" disabled>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>Do children have allergies?</p>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="Yes" name="allergy" disabled <?php if($appform->allergy == 'Yes'){ echo 'checked'; } ?>>Yes</label>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="No" name="allergy" disabled <?php if($appform->allergy == 'No'){ echo 'checked'; } ?>>No</label>
                            </div>
                            <div class="col-sm-2">
                                <p>If yes, please specify</p>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" value="<?=$appform->specifyallergy?>" name="specifyallergy" class="form-control" placeholder="Allergies" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-5">
                                <p>Are all members of the family supportive of this pet adoption?</p>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="Yes" name="support" disabled <?php if($appform->support == 'Yes'){ echo 'checked'; } ?>>Yes</label>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="No" name="support" disabled <?php if($appform->support == 'No'){ echo 'checked'; } ?>>No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-inline">
                            <label class="mr">Are you planning to move in the future?</label>
                            <label class="mr"><input disabled <?php if($appform->move == 'Yes'){ echo 'checked'; } ?> type="radio" value="Yes" name="move">Yes</label>
                            <label class="mr"><input disabled <?php if($appform->move == 'No'){ echo 'checked'; } ?> type="radio" value="No" name="move">No</label>
                            <label class="mr">If yes, when?</label>
                            <input type="text" disabled value="<?=$appform->moveDate?>" name="moveDate" class="form-control">
                        </div>
                    <hr>
                    <div class="form-group">
                        <label for="">2. Who will be responsible for the pets care?</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input type="checkbox" <?php if($appform->checkMyself != NULL){ echo 'checked'; } ?> disabled name="checkMyself" value="Myself" checked>Myself</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input type="checkbox" <?php if($appform->checkChildren != NULL){ echo 'checked'; } ?> disabled name="checkChildren" value="Children">Children</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input type="checkbox" <?php if($appform->checkRelatives != NULL){ echo 'checked'; } ?> disabled name="checkRelatives" value="Relatives">Relatives</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input type="checkbox" <?php if($appform->checkOthers != NULL){ echo 'checked'; } ?> disabled name="checkOthers" value="Others">Others</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">3. What is your source of income?</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input type="checkbox" <?php if($appform->checkEmployed != NULL){ echo 'checked'; } ?> disabled name="checkEmployed" value="Employed">Employed</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input type="checkbox" <?php if($appform->checkSelfEmp != NULL){ echo 'checked'; } ?> disabled name="checkSelfEmp" value="Self-Employed">Self-Employed</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="checkbox-inline"><input type="checkbox" <?php if($appform->checkNone != NULL){ echo 'checked'; } ?> disabled name="checkNone" value="None">None</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">4. Have you ever adopted an animal from a shelter?</label>
                        <div class="row">
                            <div class="col-sm-1">
                                <label><input type="radio" value="Yes" name="adopted" disabled <?php if($appform->adopted == 'Yes'){ echo 'checked'; } ?>>Yes</label>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="No" name="adopted" disabled <?php if($appform->adopted == 'No'){ echo 'checked'; } ?>>No</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-inline">
                            <label class="mr">5. Do you plan to give this pet as a gift?</label>
                            <label class="mr"><input disabled <?php if($appform->gift == 'Yes'){ echo 'checked'; } ?> type="radio" value="Yes" name="gift">Yes</label>
                            <label class="mr"><input disabled <?php if($appform->gift == 'No'){ echo 'checked'; } ?> type="radio" value="No" name="gift">No</label>
                            <label class="mr">If Yes, To whom?</label>
                            <input type="text" disabled value="<?= $appform->giftToWhom ?>" name="giftToWhom" id="" class="form-control">
                        </div>
                    <hr>
                    <div class="form-group">
                        <label for="">6. Where will the pet be kept during the day?</label>
                        <div class="row">
                            <div class="col-sm-1">
                                <p>At Day:</p>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="Indoors" name="atDay"  disabled <?php if($appform->atDay == 'Indoors'){ echo 'checked'; } ?>>Indoors</label>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="In/Out" name="atDay"  disabled <?php if($appform->atDay == 'In/Out'){ echo 'checked'; } ?>>In/Out</label>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="Patio" name="atDay"  disabled <?php if($appform->atDay == 'Patio'){ echo 'checked'; } ?>>Patio</label>
                            </div>
                            <div class="col-sm-3">
                                <label><input type="radio" value="Outside with proper shelter" name="atDay"  disabled <?php if($appform->atDay == 'Outside with proper shelter'){ echo 'checked'; } ?>>Outside with proper shelter</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1">
                                <p>At Night:</p>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="Indoors" name="atNight"  disabled <?php if($appform->atNight == 'Indoors'){ echo 'checked'; } ?>>Indoors</label>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="In/Out" name="atNight"  disabled <?php if($appform->atNight == 'In/Out'){ echo 'checked'; } ?>>In/Out</label>
                            </div>
                            <div class="col-sm-1">
                                <label><input type="radio" value="Patio" name="atNight"  disabled <?php if($appform->atNight == 'Patio'){ echo 'checked'; } ?>>Patio</label>
                            </div>
                            <div class="col-sm-3">
                                <label><input type="radio" value="Outside with proper shelter" name="atNight"  disabled <?php if($appform->atNight == 'Outside with proper shelter'){ echo 'checked'; } ?>>Outside with proper shelter</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">7. Length of time during the day the pet will be left alone?</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <label><input type="radio" value="0" name="leftDuration" disabled <?php if($appform->leftDuration == '0'){ echo 'checked'; } ?>>0</label>
                            </div>
                            <div class="col-sm-2">
                                <label><input type="radio" value="1-3" name="leftDuration" disabled <?php if($appform->leftDuration == '1-3'){ echo 'checked'; } ?>>1-3 Hours</label>
                            </div>
                            <div class="col-sm-2">
                                <label><input type="radio" value="3-6" name="leftDuration" disabled <?php if($appform->leftDuration == '3-6'){ echo 'checked'; } ?>>3-6 Hours</label>
                            </div>
                            <div class="col-sm-2">
                                <label><input type="radio" value="6+" name="leftDuration" disabled <?php if($appform->leftDuration == '6+'){ echo 'checked'; } ?>>6+ Hours</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">8. What type of diet/food you plan to feed the dog?</label>
                        <div class="row">
                            <div class="col-sm-2">
                                <label><input type="radio" value="Dry Food" name="food" disabled <?php if($appform->food == 'Dry Food'){ echo 'checked'; } ?>>Dry Food</label>
                            </div>
                            <div class="col-sm-2">
                                <label><input type="radio" value="Canned Food" name="food" disabled <?php if($appform->food == 'Canned Food'){ echo 'checked'; } ?>>Canned Food</label>
                            </div>
                            <div class="col-sm-2">
                                <label><input type="radio" value="Home Cooked" name="food" disabled <?php if($appform->food == 'Home Cooked'){ echo 'checked'; } ?>>Home Cooked</label>
                            </div>
                            <div class="col-sm-2">
                                <label><input type="radio" value="Others" name="food" disabled <?php if($appform->food == 'Others'){ echo 'checked'; } ?>>Others</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-inline">
                        <label for="" style="margin-right:2%;">12. Do you have a veterinarian?</label>
                        <label style="margin-right:2%;"><input type="radio" value="Yes" name="vet" disabled <?php if($appform->vet == 'Yes'){ echo 'checked'; } ?>>Yes</label>
                        <label style="margin-right:2%;"><input type="radio" value="No" name="vet" disabled <?php if($appform->vet == 'No'){ echo 'checked'; } ?>>No</label>
                    </div>
                    <div class="form-inline">
                            <label class="mr">9. How tall is the fence you currently have?</label>
                            <label class="mr"><input disabled type="radio" <?php if($appform->fenceHeight == 'Tall'){ echo 'checked'; } ?> value="Tall" name="fenceHeight">Tall</label>
                            <label class="mr"><input disabled type="radio" <?php if($appform->fenceHeight == 'Average'){ echo 'checked'; } ?> value="Average" name="fenceHeight">Average</label>
                            <label class="mr"><input disabled type="radio" <?php if($appform->fenceHeight == 'Short'){ echo 'checked'; } ?> value="Short" name="fenceHeight" >Short</label>
                        </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Share past experience of having pets? What are the challenges you have and how did you overcome them?</label>
                        <textarea readonly name="pastExp" id="" cols="15" rows="4" class="form-control"><?= $appform->pastExp ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">PLEASE GIVE US A BRIEF EXPLANATION OF YOUR REASONS FOR WANTING TO ADOPT THIS PET </label>
                        <textarea  readonly name="reason" id="" cols="15" rows="4" class="form-control"><?= $appform->reason ?></textarea>
                    </div>
                    <a class="btn btn-primary" href="<?=base_url('admin/manageadoptions/')?>">Back</a>
            </section>
        </div>
    </div>
</div>

