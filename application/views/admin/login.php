<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<style>
.container{
    margin-top:10%;
}

i.fas {
  display: inline-block;
  border-radius: 100%;
  box-shadow: 0px 0px 10px #000;
  padding: 0.5em 0.6em;

}
.panel-body{
    margin-top:3%;
    margin-bottom:3%;
}

.panel{
    box-shadow: 0px 0px 8px #000;
}
</style>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center><h4>SHELTER OF BACOOR ADMIN</h4></center>
                    <hr>
                    <center><i class="fas fa-dog fa-3x"></i></center>
                    <hr>
                    <form action="<?= base_url()."admin/signin"?>" method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" value='<?=set_value('username','')?>' placeholder="Username" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control" />
                        </div>
                        <button class="btn btn-danger btn-block" type="submit">LOGIN</button>
                    </form>
                </div>
            </div>
            <?php if (isset($message)): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <p>MESSAGE</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?= $message ?>
                </div>
            <?php endif ?>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
</body>
</html>