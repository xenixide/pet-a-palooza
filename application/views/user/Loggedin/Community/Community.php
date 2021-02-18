<style>
.container{
    padding-top:5%;
    width:95%;
}
.bg{
    background-color:#fff;
}
.asd{
    padding-left:5%;
    padding-right:5%;
    padding-top: 1%;
    padding-bottom: 1%
}
</style>

<div class="container ss">
    <div class="row">
        <div class="col-sm-6 asd">
            <div class="row">
                <div class="col-sm-12 bg asd">
                    <form class="form-horizontal" action="<?= base_url('user/addPost') ?>" method = "post" enctype="multipart/form-data">
                        <div class="form-group">
                            <h2 style="color:black">Community Posts</h4>
                            <hr>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="What are you doing right now?" class="form-control" name="caption" id="caption" cols="30" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="file" name="uploadimage">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Post</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <br>
            <?php if(!empty($posts)){ foreach($posts as $post){ ?>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h5><b><?=$post->post_name?></b> made a post</h5>
                                </div>
                                <div class="col-sm-3">
                                    <h6 class="pull-right"><b><?= date('F m \'y', strtotime($post->date)) ?></b></h6>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <center>
                                <img src="<?=base_url('assets/community_img/'.$post->pic_loc) ?>" width ="55%">
                            </center>
                            <br>
                            <h5>
                                <p><?= $post->caption ?></p>
                            </h5>
                        </div>
                        <div class="panel-footer">
                            <form action="<?=base_url()?>user/addcomment" method = "post">
                                <input type="hidden" name="post_id" value="<?=$post->post_id?>"/>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Write a comment" name="comment" id="" cols="30" rows="2"></textarea>
                                </div>
                                <div class="form-group clearfix">
                                    <button type="submit" class="btn btn-primary btn-sm pull-right">Comment</button>  
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <ul class="list-group">
                            <?php
                                $CI =& get_instance();
                                $CI->load->model('UserModel');
                                $comments = $CI->UserModel->fetchComments($post->post_id);

                                foreach($comments as $comment){
                            ?>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <h5><p><b><?=$comment->comment_name?></b></p></h5>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="pull-right"><?= date('F m \'y', strtotime($comment->comment_time)) ?></p>
                                        </div>
                                    </div>
                                    <h6><?= $comment->caption ?></h6>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php }} ?>
        </div>
        <div class="col-sm-6 asd">
            <div class="row">
                <div class="col-sm-12 bg asd">
                    <h2 style="color:black">Rescue Posts</h4>
                    <hr>
                    <?php if(!empty($rescues)){ foreach($rescues as $rescue){ ?>
                        <div class="panel panel-warning">
                            <div class="panel-heading"><b><?=$rescue->rescuer_name?></b></div>
                            <div class="panel-body">
                                <center>
                                    <img src="<?=base_url('assets/rescue_img/'.$rescue->image) ?>" width ="55%">
                                </center>
                            </div>

                            <ul class="list-group">
                                <li class="list-group-item"><b>Type:</b> <?=$rescue->type?></li>
                                <li class="list-group-item"><b>Description:</b> <?=$rescue->description?></li>
                                <li class="list-group-item"><b>Address:</b> <?=$rescue->address?></li>
                                <li class="list-group-item"><b>Date:</b> <?=date('F m \'Y', strtotime($rescue->date))?></li>
                            </ul>
                        </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
</div>