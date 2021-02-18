<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Shelter of Hope Bacoor|Article</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
     
      <!--main content start-->
          <section class="wrapper">
              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4><i class="fa fa-angle-right"></i> Article</h4>
                              <hr>
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> ID No#</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Title</th>
                                  <th>Likes</th>
                                  <th><i class=" fa fa-edit"></i> Date</th>
                                  <th><i class=" fa fa-edit"></i> Action</th>
                                  <th></th>
                              </tr>
                              </thead>

                              <tbody>
                                <?php if (!empty($articles)){ foreach ($articles as $article){ ?>
                              <tr>
                                  <td><a href="<?=base_url().'admin/articlesee/'.$article->article_id ?>"><?= $article->article_id ?></a></td>
                                  <td class="hidden-phone"><?= $article->article_title ?></td>
                                  <td><?= $article->likes ?></td>
                                  <td class="hidden-phone"><?= date('M d Y', strtotime($article->article_date)) ?></td>
                                  <td>
                                      <a class="btn btn-success btn-sm" href="<?=base_url().'admin/Articlesee/'.$article->article_id ?>" role="button">
                                      <span class="glyphicon glyphicon-search" aria-hidden="true"></span> View
                                      </a>
                                      <a class="btn btn-primary btn-sm" href="<?=base_url().'admin/editArticle/'.$article->article_id ?>" role="button">
                                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit
                                      </a>  
                                      <a class="btn btn-danger btn-sm" href="<?=base_url().'admin/deleteArticle/'.$article->article_id ?>">
                                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Delete
                                      </a>                                   
                                  </td>
                              </tr>
                              </tbody>
                              <?php } } ?> 
                          </table>
                      </div>
                </div>
            </div>
            <a class="btn btn-info btn-sm" href="<?=base_url().'admin/addArticle/'?>" role="button">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Article
              </a>
        </section>
      </section>
  </section>
  </body>
</html>
