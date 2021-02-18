<link rel="styesheet" type="text/css" href="<?= base_url()?>css/login.css">
<div class="container">

          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Please Reset your Password</h4>
                              <hr>
                  <?php if (isset($message)): ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                             
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $message ?>
                            </div>
                        <?php endif ?>
                <form class="form-signin" action='<?= base_url()."login/passwordresetprocess"?>' method='POST'>
        
                <input type ="hidden" name="token" value = '<?=$token?>'/>
                <div class="form-group">
                    <input type="password" name="newpassword" class="form-control" placeholder="New Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm The Password" required>
                </div>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Reset Your Password">
                    </div>

                </div>
            </fieldset>
        </form>
    </div>
</div>

</div>

