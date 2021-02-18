<br><br><br><br><br><br><br>
<div class="container">
<div class="row">
  <div class="col-sm-12">
    <div class="thumbnail">
      <img src="<?= base_url()."assets/article_img/".$article->article_img ?>" alt="...">
      <div class="caption">
        <h3><?= $article->article_title?></h3>
        <p><?= $article->article_desc?></p>
        <h4><span class="label label-success likes<?=$article->article_id?>">Likes: <?= $article->likes ?></span></h4>

        <div class="row">
            <div class="col-sm-4">
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
            <?php } else {?>
                <a href="<?= base_url() . 'user/articleDisLike1/'?>" data-aid="<?=$article->article_id?>" type="submit" class="btn btn-primary btn-block btnunlike">Liked</a>
            <?php } ?>
            </div>
            <div class="col-sm-8">
                <a href="<?= base_url().'user/Article'?>" class="btn btn-default btn-block pull-right" role="button">Back</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
