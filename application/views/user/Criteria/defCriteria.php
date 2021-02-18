<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/criteria/criteria.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/criteria/pick.css">

<br><br><br> 


<div class="container-fluid zero-pad div-header">
    <h2 class="text-center" style="color:black;background-color:white;margin:0;padding-bottom:10px;padding-top:10px">Match Making</h2>
</div>
<div class="container-fluid zero-pad div-content">
<div class="col-sm-7 zero-pad">

<center>
    
</div>
<div class="col-sm-5"> 
    <form class="form-horizontal" action='<?= base_url()."def/results" ?>' method = "post">
        <div class="form-group">
            <label class="col-xs-6">Breed</label>
            <div class="col-xs-6">
                    <label for="petbreed">Choose a Breed: </label>
                        <select class="form-control" name="petbreed">
                            <option value="labrador">Labrador</option>
                            <option value="beagle">Beagle</option>
                            <option value="shitzu">Shitzu</option>
                            <option value="persiancat">Persian Cat</option>
                            <option value="any">Any Kind</option>
                        </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-6">Color</label>
            <div class="col-xs-6">  
                    <label for="petcolor">Choose a Color: </label>
                        <select class="form-control" name="petcolor">
                            <option value="gold">Gold</option>
                            <option value="white">White</option>
                            <option value="white/brown">White/Brown</option>
                            <option value="white/black">White/Black</option>
                            <option value="brown">Brown</option>
                            <option value="black">Black</option>
                            <option value="any">Any Kind</option>
                        </select>
            </div>
        </div>
        <div class="form-group">
        <div class="col-xs-6"></div>
        <button class="btn btn-info" >Matching</button>
    </div>
    </form>

</div>
</div>
</center>
