<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Donation</title>

    <link href="<?=base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url(); ?>css/font-awesome.css" rel="stylesheet"/>
    <link href="<?=base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?=base_url(); ?>css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<style>
.row{
    margin-top:10%;
    background-color:#fff;
    padding:4%;
}
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>List of Donors <a class="pull-right btn btn-primary" href="<?=base_url('admin/pdfDonor')?>">Download PDF</a></h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name of Donator</th>
                            <th>Type of Donation</th>
                            <th>Date Donated</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($donations)){ $count=1; foreach($donations as $donation){ ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $donation->name ?></td>
                            <td><?= $donation->donation_type ?></td>
                            <td><?= date('F d, Y', strtotime($donation->created_at)) ?>               
                        </tr>
                    <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>