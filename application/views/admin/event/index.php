<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet"  href="<?= base_url()?>css/nicedate.css" type="text/css"/>
  <script src="<?php echo base_url(); ?>css/nicedate.js"></script>  
</head>

<body>
<section id="container" >
  <section class="wrapper">
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <h4>Events</h4>
            <hr>
            <thead>
              <tr>
                <th>No.</th>
                <th>Event Title</th>
                <th>Event Date</th>
                <th>Required Respondents</th>
                <th>Total Respondents</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php $count = 1; foreach($events as $event) { ?>
              <tr>
                <td><?= $count++ ?></td>
                <td><?= $event->title ?></td>
                <td><?= date('F d, Y', strtotime($event->event_date)) ?></td>
                <td><?= $event->respondents ?></td>
                <td><?= $event->total_respondents ?></td>
                <td>
                  <a class="btn btn-primary btn-sm" href="<?= base_url('admin/viewAdminEvent/'.$event->id); ?>" role="button">View</a>
                  <a class="btn btn-warning btn-sm" href="<?= base_url('admin/editAdminEvent/'.$event->id); ?>" role="button">Edit</a>
                  <a class="btn btn-danger btn-sm" href="<?= base_url('admin/deleteAdminEvent/'.$event->id); ?>" role="button">Delete</a>
                </td> 
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Create Event</button>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create Event</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/createAdminEvent')?>" method="post">
                            <div class="form-group">
                                <label for="">Event Title</label>
                                <input value="<?php echo set_value('title'); ?>" type="text" name="title" id="" class="form-control">
                                <?= form_error('title', '<span class="label label-danger">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Event Date</label>
                                <input id="datepicker" value="<?php echo set_value('event_date'); ?>" type="text" name="event_date" id="" class="form-control">
                                <?= form_error('event_date', '<span class="label label-danger">', '</span>') ?>
                                <script>
                                $('#datepicker').datepicker({
                                    format: "yyyy-mm-dd",
                                    autoclose: true,
                                    todayHighlight: true,
                                    toggleActive: true,
                                    startDate: new Date(),
                                    endDate: '+5m',
                                    orientation: "bottom right",
                                });
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="">Number of respondents</label>
                                <input value="<?php echo set_value('respondents'); ?>" type="text" name="respondents" id="" class="form-control">
                                <?= form_error('respondents', '<span class="label label-danger">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Event Description</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control"><?php echo set_value('description'); ?></textarea>
                                <?= form_error('description', '<span class="label label-danger">', '</span>') ?>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Event</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
