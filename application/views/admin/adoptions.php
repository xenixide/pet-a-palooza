<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Article</title>
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
  <section id="container" >
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i>Pending Request For adoption</h4>
                              <hr>
                              <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Pet Name</th>
                                    <!-- <th>Contact</th> -->
                                    <th>System Result</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php if (is_array($pending) || is_object($pending)){ foreach ($pending as $pend): ?>
                              <tr>
                                    <td><?= $pend->user_name ?></td>
                                    <td><?= $pend->pet_name ?></td>
                                    <!-- <td><?= $pend->cellphone ?></td> -->
                                    <td>
                                        <?php
                                            $this->db->from('appforms');
                                            $this->db->where('user_id', $pend->user_id);
                                            $q = $this->db->get()->row();
                                            if($q->priority >= 80)
                                            {
                                                echo 'Eligible for Adoption - ';
                                            }
                                            else
                                            {
                                                echo 'Not Eligible - ';
                                            }
                                            echo 'Rate: '.$q->priority; 
                                        ?>
                                    </td>
                                    <td><?= $pend->status ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="<?= base_url().'admin/viewAppForm/'.$pend->user_id?>">View Application</a>
                                        <?php if($pend->already_adopted == 0){ ?>
                                            <?php if($pend->status != 'Adoption Accepted' && $pend->status != 'Not eligible'){ ?>
                                                <a class="btn btn-primary btn-sm" href="<?=base_url().'admin/adopted/'.$pend->id.'/'.$pend->user_name.'/'.$pend->pet_name.'/'.$pend->user_id.'/'.$pend->pet_id ?>" role="button">Accept Adoption</a>
                                                <a class="btn btn-danger btn-sm" href="<?=base_url().'admin/canceladopt/'.$pend->id ?>" role="button">Cancel Adoption</a>
                                            <?php } ?>
                                        <?php } ?>
                                    </td> 
                              </tr>
                              </tbody>
                              <?php endforeach; } ?> 
                          </table>



                          <br>




                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i>Accepted Request for Adoption</h4>
                              <hr>
                              <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Pet Name</th>
                                    <!-- <th>Contact</th>
                                    <th>System Result</th> -->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php if (is_array($accepted) || is_object($accepted)){ foreach ($accepted as $accept): ?>
                              <tr>
                                    <td><?= $accept->user_name ?></td>
                                    <td><?= $accept->pet_name ?></td>
                                    <!-- <td><?= $accept->cellphone ?></td>
                                    <td>
                                        <?php 
                                            if($accept->priority >= 80)
                                            {
                                                echo 'Eligible for Adoption - ';
                                            }
                                            else
                                            {
                                                echo 'Not Eligible - ';
                                            }
                                            echo 'Rate: '.$accept->priority; 
                                        ?>
                                    </td> -->
                                    <td><?= $accept->status ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="<?= base_url().'admin/viewAppForm/'.$accept->user_id?>">View Application</a>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url().'admin/pdfAppForm/'.$accept->user_id.'/'.$accept->pet_id?>">Download PDF</a>
                                        <?php if($accept->already_adopted == 0){ ?>
                                            <?php if($accept->status != 'Adoption Accepted' && $accept->status != 'Not eligible'){ ?>
                                                <a class="btn btn-primary btn-sm" href="<?=base_url().'admin/adopted/'.$accept->id.'/'.$accept->name.'/'.$accept->pet_name.'/'.$accept->user_id.'/'.$accept->pet_id ?>" role="button">Accept Adoption</a>
                                                <a class="btn btn-danger btn-sm" href="<?=base_url().'admin/canceladopt/'.$accept->id ?>" role="button">Cancel Adoption</a>
                                            <?php } ?>
                                        <?php } ?>
                                    </td> 
                              </tr>
                              </tbody>
                              <?php endforeach; } ?> 
                          </table>
                      </div><!-- /col-md-4 -->
                </div>
            </div>
        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
  </script>
  </body>
</html>
