<div>
  <div class="pos-img-vid clearfix">
    <div class="img-vid">
      <span><img src=<?="'".base_url("public/img/sponser.png")."'"?> >&nbsp;&nbsp;Blog posts</span>
    </div>
    <img src=<?="'".base_url("public/img/bottom-img.png")."'"?> >
  </div>
  <br><br>
  <div class="col-lg-4">
    <div data-ng-controller="blog_post_controller">
      <?php foreach ($post_list as $post) { 
        if($post->active == 1) {
        ?>
      <div><?=anchor("welcome/blog/".$post->id, $post->title)?></div>
      <?php } } ?>
    </div>
  </div>
  <div class="col-lg-7" style="background-color: #f4f4f4; padding: 15px">
    <div class="clearfix">
      <img class="img-size-c11" src=<?=isset($user)&&isset($user->profile_pic)?$user->profile_pic:base_url('public/img/user-icon.png')?> >&nbsp;<span class="name-1"><?=$blog_posted_by->username?></span>&nbsp;<span class="title-c1"><?=$blog_post->post_at?></span>
    </div>
    <div class="clearfix">
      <div class="title-c4">
        <?=$blog_post->title?>
      </div>
    </div>
    <div class="clearfix">
      <div class="title-c41">
        <?=$blog_post->details?>
      </div>
    </div>
    <br>
    <div class="icons-social">
      <?php if(isset($user)) { ?>
      <?=anchor("welcome/blog_like/".$blog_post->id, (isset($liked) && $liked==1) ?"Unlike":"Like", array('class'=>"see-all-1"))?>&nbsp;
      <?php } ?>
      <!-- <a class="see-all-1" href=""><span>Like</span></a>&nbsp; -->
      <!-- <a class="see-all-1" href=""><span>Share</span></a>&nbsp; -->
      <!-- <a class="see-all" href=""><span>Comment</span></a> -->
      <span class="pull-right">
        <span class="see-all-1"><?=$like_count?>&nbsp;<?=$like_count>1?"Likes":"Like"?></span>
        <!-- <span class="see-all">44 Share</span> -->
      </span>
    </div>
    <?php if(isset($user)) { ?>
    <div class="clearfix">
      <?=form_open("welcome/blog_comment/$blog_post->id")?>
      <textarea name="comment" class="form-control custom-form" placeholder="Enter Comment" style="resize: vertical;min-height: 84px;"></textarea>
      <br>
      <input type="submit" class="btn btn-danger btn-enter pull-right" value="Comment" />
      </form>
    </div>
    <?php } ?>
    <!-- <br> -->
    <hr>
    <?php foreach($comments as $comment) { ?>
    <div>
      <div class="c-name"><?=$comment->user.":"?><span class="pull-right"><span class="against"><?=$comment->comment_at?></span></span></div>
      <div class="c-des"><?=$comment->comment?></div>
      <?php if(isset($user)) { ?>
      <div class="like-comment hide">
        <span class="like"><a href="">Like</a></span>&nbsp;&nbsp;<span class="u-comment"><a href=""><strong>Reply</strong></a></span>
      </div>
      <?php } ?>
    </div>
    <div class="reply hide">
      <div class="clearfix">
        <?=form_open("welcome/blog_comment/$blog_post->id")?>
        <textarea name="comment" class=" hide form-control custom-form" placeholder="Enter Reply" style="resize: vertical;min-height: 84px;"></textarea>
        <!-- <br> -->
        <input type="submit" class="btn btn-danger btn-enter pull-right hide" value="Reply" />
        </form>
      </div>
      <!-- for loop starts -->
      <div>
        <div class="c-name">UserName:<span class="pull-right"><span class="against">e95t95</span></span></div>
        <div class="c-des">ldkfg;ldkf;gk;dfk;gdf;kg;lfdk</div>
      </div>
      <div>
        <div class="c-name">UserName:<span class="pull-right"><span class="against">e95t95</span></span></div>
        <div class="c-des">ldkfg;ldkf;gk;dfk;gdf;kg;lfdk</div>
      </div>
      <div>
        <div class="c-name">UserName:<span class="pull-right"><span class="against">e95t95</span></span></div>
        <div class="c-des">ldkfg;ldkf;gk;dfk;gdf;kg;lfdk</div>
      </div>
      <!-- for loop ends -->
    </div>
    <hr>
    <?php } ?>
  </div>
  <br><br>
</div>
</div>