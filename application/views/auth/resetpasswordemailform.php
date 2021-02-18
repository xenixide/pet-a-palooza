<link rel="styesheet" type="text/css" href="<?= base_url()?>css/login.css">
<div class="container">
<br>
<br>
<br>
<br>
<br>
<br>

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <fieldset>
                <h2>Send Email Reset Form</h2>
                  <?php if (isset($message)): ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                             
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $message ?>
                            </div>
                        <?php endif ?>
                <form class="form-signin" action='<?= base_url()."login/sendemailreset"?>' method='POST'>
                <hr class="colorgraph">
                <div class="form-group">
                    <input type="text" value='<?=set_value('email','')?>' name="email" class="form-control" placeholder="Your Email Here" required autofocus>
                </div>
                
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="submit" class="btn btn-lg btn-info btn-block" value="Submit Email Password Reset Link">
                    </div>
                   
                </div>
            </fieldset>
        </form>
    </div>
</div>

</div>

