<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
</head>

<style>
.bg{
    background-color:#fff;
}
h2{
    color:#000;
    font-weight:700;
}
h4{
    text-align:center;
    font-weight:700;
}
</style>

<body>
<section id="container">
    <section class="wrapper">
        <div class="row mt">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 bg">
            <center>
                <h2>Animal Report</h2>
            </center>
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>ADOPTED ANIMALS</h4></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td width="25%"><b>Pet name</b></td>
                            <td width="25%"><b>Status</b></td>
                            <td width="25%"><b>Date Adopted</b></td>
                            <td width="25%"><b>Adopted by</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($adopted)){ foreach($adopted as $adopt){ ?>
                            <tr>
                                <td><?=$adopt->petname?></td>
                                <td><?=$adopt->status?></td>
                                <td><?=$adopt->date_adopted?></td>  
                                <td><?=$adopt->adopter_by?></td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading"><h4>AVAILABLE ANIMALS</h4></div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td width="25%"><b>Pet name</b></td>
                            <td width="25%"><b>Status</b></td>
                            <td width="25%"><b>Date Adopted</b></td>
                            <td width="25%"><b>Adopted by</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($unadopted)){ foreach($unadopted as $unadopt){ ?>
                            <tr>
                                <td><?=$unadopt->petname?></td>
                                <td>Available</td>
                                <td>---------------------</td>  
                                <td>No owner</td>
                            </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-2"></div>
        </div>
    </section>
</section>
</body>
</html>