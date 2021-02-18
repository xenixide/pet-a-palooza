<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/community/community.css">
    <link rel="stylesheet" href="<?= base_url()?>css/nicedate.css" type="text/css"/>
    <script src="<?= base_url() ?>css/nicedate.js"></script>  
    <link href="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.css" rel="stylesheet"/>
    <script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
</head>

<style>
.mt{
    margin-top:10%;
}
</style>

<body>
<div class="container">
    <div class="row mt" style="background-color:#fff; padding:4%;">
        <?php if($this->session->flashdata('success_msg')){ ?>
        <div class="alert alert-success" role="alert"><?=$this->session->flashdata('success_msg')?></div>
        <?php } ?>
        <div class="col-sm-6">
            <h3>Hi <?=$this->session->fname?> <?=$this->session->lname?>!</h3>
            <h4>Feel free to reserve at any available date in calendar.</h4>
            <hr>
            <form action="<?= base_url()."user/addappoint" ?>" method="post">
                <div class="form-group">
                    <label for="">Purpose</label>
                    <select name="purpose" class="form-control" required>
                        <?php if($approved > 0){ ?>
                            <?php foreach($approves as $appros){ ?>
                                <option value = "For Adoption of <?=$appros->pet_name?>|<?=$appros->id?>">For Adoption of <?=$appros->pet_name?></option>
                            <?php } ?>
                        <?php } ?>
                        <option value ="Drop-off of Donation">Drop-off of Donation</option>
                        <option value = "Visit">Visit</option>
                    </select>                            
                </div>
                <div class="form-group">
                    <label class="control-label" for="date">Date</label>  
                    <input id="datepicker" type="text" name="date" class="form-control date" required/>
                    <script>
                    var disabledDateTime = {
                        <?php foreach($events as $event){ ?>
                        '<?= date('Y-n-d', strtotime($event->start)) ?>':[
                            ['<?= $event->time ?>','<?= $event->end_time ?>'],
                        ],
                        <?php } ?>
                        };

                        $(function(){
                            $('#pickTime').timepicker({
                                setTime: '8:00am',
                                step: 60,
                                minTime: '8:00am',
                                maxTime: '3:00pm',
                            });
                            $('#datepicker').datepicker({
                                format: "yyyy-mm-dd",
                                orientation: "bottom right",
                                autoclose: true,
                                todayHighlight: true,
                                toggleActive: true,
                                startDate: new Date(),
                                endDate: '+1m',
                                daysOfWeekDisabled: "0",
                                datesDisabled: 
                                [
                                <?php foreach($days as $day): ?>
                                    '<?= $day->disable_day ?>',
                                <?php endforeach; ?>
                                ]
                            }).on('changeDate',function(e){
                            var ts = new Date(e.date);
                            var m = ts.getMonth()+1;
                            var dt = ts.getFullYear() + '-' + m + '-' + ts.getDate();
                            var opt = {'disableTimeRanges': []}
                            if(typeof(disabledDateTime[dt])!='undefined'){
                            $('#pickTime').timepicker({
                                setTime: '8:00am',
                                step: 60,
                                minTime: '8:00am',
                                maxTime: '3:00pm',
                                });
                            opt = {'disableTimeRanges': disabledDateTime[dt]};
                            }
                            $('#pickTime').timepicker('option',opt);
                            });
                        });
                    </script>
                </div>
                <div class="form-group">
                <label class="control-label" for="date">Time</label>
                    <input id="pickTime" type="text" name="time" class="form-control time" required/>
                </div>
                <a data-toggle="modal" class="btn btn-primary" type="button" href="#myModal">Reserve</a>
        </div>

                                     <!-- Modal -->
                <form action="<?= base_url()."user/addappoint" ?>" method="post">
                  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Booking a date at Shelter of Hope Bacoor</h4></a><br>
                              </div>
                              <div class="modal-body">
                                  <p>Are you sure you want to book this date?</p>
                              </div>
                              <div class="modal-footer">
                                  <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                  <button id="savebuton" name="savebuton" class="btn btn-theme" type="submit">Yes</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>




        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>Reminders</h4>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">1. You can only reserve date within one month.</li>
                    <li class="list-group-item">2. You can't cancel one day before the reserved date.</li>
                    <li class="list-group-item">3. Please choose the most appropriate purpose for your reservation.</li>
                </ul>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4>For Approved Adoptions</h4>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">1. Just select the pet that is approved by the Administrator.</li>
                    <li class="list-group-item">2. If you have two or more approved adoption, just reserve in any day you desire.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>