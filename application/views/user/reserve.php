<div class="container">
<div class="row">
</br></br></br></br></br>

        <?php if($this->session->flashdata('success_msg')){ ?>
        <div class="alert alert-success" role="alert"><?=$this->session->flashdata('success_msg')?></div>
        <?php } ?>

    <form class="form-horizontal" action='<?= base_url()."user/addrescue" ?>' method = "post" enctype="multipart/form-data">
    <fieldset>
                
        <!-- Form Name -->
                <legend><h2 class="module-title align-center font-alt">Hi <?=$this->session->lname?>, <?=$this->session->fname?>! <br>
                Our Volunteers here at Shelter of Hope Bacoor are willing to help.</h2></legend>

                <div class="row">


                <div class="col-sm-6 col-md-4 col-md-offset-0 m-b-md-20">
                    <div class="team-item">
					
					 <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="rname">Reported by:</label>  
                        <div class="col-md-12">
                            <input value="<?=$this->session->userdata('fname').' '.$this->session->userdata('lname')?>" id="rname" name="rname" class="form-control input-md" readonly>                              
                            <?=form_error('rname','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>
					
					 <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="address">Address of Rescue(Location of where you found the pet):</label>  
                        <div class="col-md-12">
                            <input value="<?=set_value('address','')?>" id="address" name="address" type="text" class="form-control input-md">                              
                            <?=form_error('address','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>

					<!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="description">Description:</label>  
                        <div class="col-md-12">
                            <input value="<?=set_value('description','')?>" id="description" name="description" type="text" class="form-control input-md">                              
                            <?=form_error('description','<span class="label label-danger">','</span>') ?>
                        </div>
                    </div>
                        <!-- Text input-->

                        <div class="col-md-12 form-group">
                        <label class="control-label" for="name">Type of Pet:</label>  
                        <div>
                            <select name="type" class="form-control" required>
                            <option value = "dog">Dog</option>
                            <option value = "cat">Cat</option>
							<option value = "bunny">Bunny</option>
                            
                            </select>                            
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="">Rescue Image</label>
                    <input type="file" name="rescue_img" id="" class="form-control" onchange="loadFile(event)">
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
					<!--

                        <div class="col-md-12 form-group">
                        <label class="control-label" for="date">Date</label>  
                        <div>
                            <input type="date" name="date" placeholder="date" class="form-control input-md">                              
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label" for="time">Time:</label>  
                        <div>
                            <input type="time" name="times" placeholder="times" class="form-control input-md">                              
                        </div>
                    </div>-->
              

                                       

                <div class="row" style="padding:0;">
                    <div class="col-sm-8">
                        <button class="btn btn-primary btn-block" type="submit">Send Rescue</button>
                    </div>
                </div>
                       
                    </div>
                </div>
                

              

                        <br>                           
                    </div>
                </div>
           
            </div>

    </fieldset>
    </form>

        </br></br></br></br>
</div>
</div>
