<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
.mt{
  margin-top:8%;
}
.bgc{
  background-color:#fff;
  padding-top:1%;
  padding-bottom:3%;
  padding-left:1%;
  padding-right:1%;
  -webkit-box-shadow: 0px 0px 6px 5px rgba(0,0,0,0.16);
  -moz-box-shadow: 0px 0px 6px 5px rgba(0,0,0,0.16);
  box-shadow: 0px 0px 6px 5px rgba(0,0,0,0.16);
}
a.list-group-item:hover{
  color: #555;
  text-decoration: none;
  background-color: #E3FFFF;
}
</style>

<body>
<section id="container" >
  <section class="wrapper">
    <div class="row mt">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 bgc">
        <center>
          <h3>Notifications</h3>
          <hr>
        </center>
        <ul class="list-group">
        <?php foreach ($updates as $update): ?>
          <?php if($update->type == 1){ ?>
            <a href="<?=base_url('user/viewReservePage')?>" class="list-group-item"><?= $update->message ?></a>
          <?php } else { ?>
            <li class="list-group-item"><?= $update->message ?></li>
          <?php } ?>
        <?php endforeach; ?> 
        </ul>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </section>
</section>

</body>
</html>