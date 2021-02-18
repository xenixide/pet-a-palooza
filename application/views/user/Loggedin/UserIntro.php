<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <meta name="author" content="sumit kumar"> 
  <title>Shelter of Hope|Home</title> 
  <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>css/home/home.css" rel="stylesheet" type="text/css">
    </head>
    <br><br>
    <div class="container">
    <section id="blog-section" >
     <div class="container">
       <div class="row">
         <div class="col-sm-8">
             <aside>
              <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fshelterofhopebacoor%2Fposts%2F1557251631017806&width=500" width="500" height="786" style="border:none;overflow:hidden" scrolling="no" frameborder="5" allowTransparency="true"></iframe>
                <br>
              <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fshelterofhopebacoor%2Fposts%2F1556314177778218&width=500" width="500" height="770" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
             </aside>
          </div>
           
         <div class="col-sm-4">
                <center><h3 style="color:#16A085; margin-top:10%;">// RECENT ARTICLES</h4></center>
                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                    <ul>
                      <?php if(!empty($article)){ ?>
                       <?php foreach ($article as $articles): ?>
                     <li class="recent-post">
                        <div class="post-img">
                          <img src='<?= base_url()."assets/article_img/".$articles->article_img ?>' class="img-responsive">
                         </div>
                         <a href="#"><h5><?= $articles->article_title ?></h5></a>
                         <a><small><?= substr($articles->article_desc, 0, 80).'...' ?></small></a>
                        </li>
                        <hr style="height:1px;border:none;color:#333;background-color:#333;">
                          <br>
                         <?php endforeach; ?>     
                        <?php } ?>                  
                    </ul>
                   </div>
                 </div>                
             </div>
           </div>
         </div>
    </section>
    </div>
</body>
</html>