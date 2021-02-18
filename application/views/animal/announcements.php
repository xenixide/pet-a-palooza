<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
  </head>

<section id="container" >
    <section class="wrapper">
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                        <h4><i class="fa fa-angle-right"></i> List of Announcement</h4>
                        <hr>
                        <thead>
                            <tr>
                                <th>ID No#</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($announcements)){ foreach ($announcements as $announcement){ ?>
                                <tr>
                                    <td><a href="<?=base_url('admin/viewAnnouncement/'.$announcement->announcementid)?>"><?= $announcement->announcementid ?></a></td>
                                    <td><?= $announcement->announcementheader ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="<?=base_url().'admin/viewAnnouncement/'.$announcement->announcementid ?>" role="button">View</a>
                                        <a class="btn btn-danger btn-sm" href="<?=base_url('admin/deleteAnnouncement/'.$announcement->announcementid)?>">Delete</a>   
                                    </td>
                                </tr>
                            <?php } } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <a class="btn btn-info btn-sm" href="<?=base_url('admin/addAnnouncement/')?>" role="button">Add Announcement</a>
    </section>
</section>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
