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
                <h3>List of Volunteer <a class="pull-right btn btn-primary" href="<?= base_url('admin/pdfVolunteer') ?>">Download PDF</a></h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($volunteers)){ $count=1; foreach($volunteers as $volunteer){ ?>
                        <tr>
                            <td><?=$count++?></td>
                            <td><?=$volunteer->fname?> <?=$volunteer->lname?></td>
                            <td><?=$volunteer->email?></td>
                            <td><?=$volunteer->gender?></td>
                        </tr>
                    <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>