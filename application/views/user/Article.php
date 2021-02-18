<br><br><br><br><br>
<div class="container">
    <div class="row">
        <?php if(!empty($articles)){ ?>
            <?php foreach ($articles as $article){ ?>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img width="50%" src="<?= base_url()."assets/article_img/".$article->article_img ?>" alt="...">
                        <div class="caption">
                            <center><h3><?=$article->article_title?></h3></center>
                            <p><?= substr($article->article_desc, 0, 110) . '...' ?></p>
                            <p>Posted: <?= $article->article_date ?></p>
                            <h5><span class="label label-success likes<?=$article->article_id?>">Likes: <?= $article->likes ?></span></h5>

                            <?php 
                                $sid = session_id();
                                if($sid){
                            ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php
                                        $id = $this->session->userdata('id');
                                        $this->db->from('article_like');
                                        $this->db->where('user_id', $id);
                                        $this->db->where( 'article_id', $article->article_id);
                                        $q = $this->db->count_all_results();
                                        if($q == 0)
                                        {
                                    ?>
                                            <a href="<?= base_url() . 'user/articleLike1/'?>" data-aid="<?=$article->article_id?>" type="submit" class="btn btn-primary btn-block btnlike">Like</a>
                                        <?php }else{ ?>
                                            <a href="<?= base_url() . 'user/articleDisLike1/'?>" data-aid="<?=$article->article_id?>" type="submit" class="btn btn-primary btn-block btnunlike">Liked</a>
                                        <?php } ?>
                                </div>
                                <div class="col-sm-6">
                                    <a href="<?=base_url().'user/articleview/'.$article->article_id ?>" type="button" class="btn btn-default pull-right btn-block">Read More</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                            
                                </div>
                            </div>
                            <?php }else{ ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="<?=base_url().'user/articleview/'.$article->article_id ?>" type="button" class="btn btn-primary pull-right btn-block">Read More</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                            
                                    </div>                            
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="jumbotron">
                    <h2>Hello
                    </h2>
                    <p>Apparently, there are no articles Yet. Visit our other pages</p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        <?php } ?>
    </div>
    <?php echo $links ?>           
</div>
<script>
$(document).ready(function(){
    $(document).on('click', '.btnlike', function(e){
        e.preventDefault();
        $(this).removeClass('btnlike');
        $(this).addClass('btnunlike');
        $(this).text('Liked');
        $article_id = $(this).data('aid');
        $url = $(this).attr('href');

        $.ajax({
            type: 'POST',
            url: $url,
            data: {
                id: $article_id
            },
            dataType: 'JSON',
            success: function(res){
                $url1 = '<?=base_url('user/articleDislike1')?>';
                $('.btnunlike').attr('href', $url1);
                $('.likes'+$article_id).text('Likes: '+res.likes);
            }
        });
    });

    $(document).on('click', '.btnunlike', function(e){
        e.preventDefault();
        $(this).removeClass('btnunlike');
        $(this).addClass('btnlike');
        $(this).text('Like');
        $article_id = $(this).data('aid');
        $url = $(this).attr('href');

        $.ajax({
            type: 'POST',
            url: $url,
            data: {
                id: $article_id
            },
            dataType: 'JSON',
            success: function(res){
                $url1 = '<?=base_url('user/articleLike1')?>';
                $('.btnlike').attr('href', $url1);
                $('.likes'+$article_id).text('Likes: '+res.likes);
            }
        });
    });
});
</script>



