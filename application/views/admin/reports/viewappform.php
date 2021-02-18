<!DOCTYPE html>
<html>
<head>
<style>
html{
    font-family: Arial !important;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<table>
    <tr>
        <td colspan="2">
            <center><h1>Shelter of Bacoor</h1></center>
            <center><h2>Adoption for <?=$animal->petname?></h2></center>
        </td>
    </tr>

    <tr>
        <td width="50%">Name: <?=$appform->name?></td>
        <td width="50%">Email: <?=$appform->email?></td>
    </tr>
    <tr>
        <td>Address: <?=$appform->address?></td>
        <td>Work: <?=$appform->work?></td>
    </tr>
    <tr>
        <td>Cellphone: <?=$appform->cellphone?></td>
        <td>Telephone: <?=$appform->telephone?></td>
    </tr>
    <tr>
        <td>
            <h4>1. Check the type of dwelling you live in:</h4><br>
            <?php 
                if($appform->checkHome != NULL){
                    echo $appform->checkHome;
                }
                if($appform->checkApartment != NULL){ 
                    echo $appform->checkApartment;
                } 
                if($appform->checkTownhouse != NULL){ 
                    echo $appform->checkTownhouse;
                }
                if($appform->checkCondo != NULL){ 
                    echo $appform->checkCondo;
                }
                if($appform->checkCondo != NULL){ 
                    echo $appform->checkCondo;
                }
            ?> 
        </td>
        <td>
            <h4>Do you own? Rent</h4><br>
            <?php 
                if($appform->rentown == 'Own'){ 
                    echo 'Own'; 
                }else{
                    echo 'Rent';
                } 
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <h4>Living with relatives?</h4>
            <?php 
                if($appform->living == 'Yes'){ 
                    echo 'Yes'; 
                }else{
                    echo 'No'; 
                } 
            ?>
            <label class="mr">How Long?</label>
            <input type="text" value="<?=$appform->howlong?>" name="howlong" class="form-control" style="width:10%;">
        </td>
        <td>
            <h4>How many adults in the household?</h4>
            <input type="text" value="<?= $appform->adults?>" name="adults" class="form-control" style="width:5%;">
            <label class="mr">Children?</label>
            <input type="text" value="<?= $appform->childrens?>" name="childrens" class="form-control" style="width:5%;">
        </td>
    </tr>
    <tr>
        <td>
            <h4>Do children have allergies?</h4>
            <?php 
                if($appform->allergy == 'Yes'){ 
                    echo 'Yes'; 
                }else{
                    echo 'No';
                }
            ?>
            <label class="mr">If yes, please specify</label>
            <input type="text" value="<?=$appform->specifyallergy?>" name="specifyallergy" class="form-control" placeholder="Allergies">
        </td>
        <td>
            <h4>Are all members of the family supportive of this pet adoption?</h4>
            <?php 
                if($appform->support == 'Yes'){ 
                    echo 'Yes'; 
                }else{
                    echo 'No';
                }
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <h4>Are you planning to move in the future?</h4>
            <?php 
                if($appform->move == 'Yes'){ 
                    echo 'Yes'; 
                }else{
                    echo 'No';
                }
            ?>
            <label class="mr">If yes, when?</label>
            <input type="text" value="<?=$appform->moveDate?>" name="specifyallergy" class="form-control" placeholder="Allergies">
        </td>
        <td>
            <h4>2. Who will be responsible for the pets care?</h4>
            <?php 
                if($appform->checkMyself != NULL){
                    echo 'Me Myself';
                }
                if($appform->checkChildren != NULL){ 
                    echo 'Children';
                } 
                if($appform->checkRelatives != NULL){ 
                    echo 'Relatives';
                }
                if($appform->checkOthers != NULL){ 
                    echo 'Others';
                }
            ?> 
        </td>
    </tr>
    <tr>
        <td>
            <h4>3. What is your source of income?</h4>
            <?php 
                if($appform->checkEmployed != NULL){
                    echo 'Employed';
                }
                if($appform->checkSelfEmp != NULL){ 
                    echo 'Self Employed';
                } 
                if($appform->checkNone != NULL){ 
                    echo 'None';
                }
            ?> 
        </td>
        <td>
            <h4>4. Have you ever adopted an animal from a shelter?</h4>
            <?php 
                if($appform->adopted == 'Yes'){ 
                    echo 'Yes'; 
                }else{
                    echo 'No';
                }
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <h4>5. Do you plan to give this pet as a gift?</h4>
            <?php 
                if($appform->gift == 'Yes'){ 
                    echo 'Yes'; 
                }else{
                    echo 'No';
                }
            ?>
            <label class="mr">If Yes, To whom?</label>
            <input type="text" value="<?= $appform->giftToWhom ?>" name="giftToWhom" id="" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
            <label for="">6. Where will the pet be kept during the day?</label>
            <div class="row">
                <div class="col-sm-1">
                    <p>At Day:</p>
                </div>
                <div class="col-sm-2">
                    <?php if($appform->atDay == 'Indoors'){ echo 'Indoors'; } ?>
                </div>
                <div class="col-sm-2">
                    <?php if($appform->atDay == 'In/Out'){ echo 'In/Out'; } ?>
                </div>
                <div class="col-sm-2">
                    <?php if($appform->atDay == 'Patio'){ echo 'Patio'; } ?>
                </div>
                <div class="col-sm-3">
                    <?php if($appform->atDay == 'Outside with proper shelter'){ echo 'Outside with proper shelter'; } ?>
                </div>
            </div>
        </td>
        <td>
            <div class="row">
                <div class="col-sm-1">
                    <p>At Night:</p>
                </div>
                <div class="col-sm-2">
                    <?php if($appform->atNight == 'Indoors'){ echo 'Indoors'; } ?>
                </div>
                <div class="col-sm-2">
                    <?php if($appform->atNight == 'In/Out'){ echo 'In/Out'; } ?>
                </div>
                <div class="col-sm-2">
                    <?php if($appform->atNight == 'Patio'){ echo 'Patio'; } ?>
                </div>
                <div class="col-sm-3">
                    <?php if($appform->atNight == 'Outside with proper shelter'){ echo 'Outside with proper shelter'; } ?>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <h4>List all the pets you have owned in the past Five years</h4>
            <textarea class="form-control" name="listown" id="" cols="100" rows="5" placeholder="Breed/Age/Gender/Name"><?=$appform->listown?></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <h4>7. Length of time during the day the pet will be left alone?</h4>
            <?php 
                if($appform->leftDuration == '0'){ echo '0'; } 
                if($appform->leftDuration == '1-3'){ echo '1-3 Hours'; }
                if($appform->leftDuration == '3-6'){ echo '3-6 Hours'; }
                if($appform->leftDuration == '6+'){ echo '6+ Hours'; }
            ?>
        </td>
        <td>
            <h4>8. What type of diet/food you plan to feed the dog?</h4>
            <?php 
                if($appform->food == 'Dry Food'){ echo 'Dry Food'; }
                if($appform->food == 'Canned Food'){ echo 'Canned Food'; }
                if($appform->food == 'Home Cooked'){ echo 'Home Cooked'; }
                if($appform->food == 'Others'){ echo 'Others'; }
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <h4>9. Do you have a veterinarian?</h4>
            <?php 
                if($appform->vet == 'Yes'){ 
                    echo 'Yes'; 
                }else{
                    echo 'No';
                }
            ?>
        </td>
        <td>
            <h4>10. How tall is the fence you currently have?</h4>
            <?php
                if($appform->fenceHeight == 'Tall'){ echo 'Tall'; }
                if($appform->fenceHeight == 'Average'){ echo 'Average'; }
                if($appform->fenceHeight == 'Short'){ echo 'Short'; }
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <h4>Share past experience of having pets? What are the challenges you have and how did you overcome them?</h4>
            <textarea name="pastExp" id="" cols="100" rows="4" class="form-control"><?= $appform->pastExp ?></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <h4>PLEASE GIVE US A BRIEF EXPLANATION OF YOUR REASONS FOR WANTING TO ADOPT THIS PET</h4>
            <textarea name="reason" id="" cols="100" rows="4" class="form-control"><?= $appform->reason ?></textarea>
        </td>
    </tr>
</table>
<br><br><br>

_________________________________________________<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>SIGNATURE OVER PRINTED NAME</b> 
<br><br><br><br><br>
<hr>
<center>
<h4>SHELTER OF BACOOR MANAGEMENT</h5>
</center>
<hr>
</html>