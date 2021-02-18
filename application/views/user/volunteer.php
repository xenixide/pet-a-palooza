<!DOCTYPE html>
<html lang="en">
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
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style>
.page-header{
    background-color:#fff;
    border-radius:20px;
    padding:4%;
    margin-left:20%;
    margin-right:20%;
}
</style>
  
<body>

<?php 
$id = $this->session->userdata('id');
$row = $this->db->get_where('tbluser', array('id' => $id))->row();
if($row->volunteer == 'yes'){ ?>

<section id="container" >
    <section class="wrapper">
        <div class="row mt">
            <div class="page-header">
                <h2>Hi! Volunteer <?=$this->session->fname?>,
                    <small>if you like to help us, Just respond in any of our help. Thank you.</small>
                </h2>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-md-4">

                <?php foreach ($events as $event): ?>
                <?php 
                    $id = $this->session->userdata('id');
                    $this->db->from('event_responders');
                    $this->db->where('user_id', $id);
                    $this->db->where('event_id', $event->id);
                    $q = $this->db->get();
                    $count = $q->num_rows();
                ?>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class=""><strong><?=$event->title?></strong></h4>
                        </div>
                        <div class="panel-body">
                            <h5><?= $event->description ?></h5>
                            Date of Event: <strong><?=date('F d,Y', strtotime($event->event_date))?></strong>
                        </div>
                        <div class="panel-footer">
                            <?php if($event->total_respondents != $event->respondents){?>
                                <?php if($count > 0){ ?>
                                    <a class="btn btn-warning" href="<?=base_url('user/cancelEvent/'.$event->id.'/'.$event->total_respondents)?>">Cancel Respond</a>
                                <?php }else{ ?>
                                    <a class="btn btn-danger" href="<?=base_url('user/goEvent/'.$event->id.'/'.$event->total_respondents)?>">Respond Going</a>
                                <?php } ?>
                            <?php }else{ ?>
                                <button class="btn btn-warning" disabled="disabled">Event Full</button>
                            <?php } ?>
                        </div>
                    </div>
                <?php endforeach; ?>                               
            </div>
            <div class="col-sm-4"></div>
        </div>
    </section>
</section>
<?php } else { ?>
<section id="container" >
    <section class="wrapper">
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">
                    <center>
                        <table class="table table-striped table-advance table-hover">
                        <h4></i> Hello! Volunteer <?=$this->session->fname?>, Would you like to volunteer to Shelter of Hope Bacoor?</h4>
                        <a class="btn btn-success" href="<?=base_url().'user/bevolunteer/'.$this->session->userdata('id'); ?>">Yes</a>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </section>
</section>
<?php } ?>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/common-scripts.js"></script>
</body>
</html>
