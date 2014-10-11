<div class="col-sm-6 col-xs-12">
  <div class="clearfix">
    <img class="img-size-c hide" src="images/sutcase.png" />&nbsp;<span class="title-c"><?=$title?></span>
    <span class="pull-right see-all hide"><a href="">See all posts</a></span>
  </div>
  <hr class="hr-pos">
  <br>
  <br>
  <span id="currentTime" time=<?='"'.(time()).'"'?> ></span>
  <?php foreach ($posts as $post) { ?>
  <div class="">
    <div class="clearfix">
      <img class="img-size-c1" src=<?='"'.(isset($post->profile_pic)?$post->profile_pic:base_url("public/img/user-icon.png")).'"'?> >&nbsp;
      <span class="name-1"><?=$post->user?></span>
      <span class="title-c1" ><?=$post->location?></span>
      <span class="post-time-span pull-right" postTime=<?='"'.strtotime($post->post_at).'"'?> ></span>
    </div>
    <div class="clearfix">
      <div class="title-c4"><?=anchor($detail_url.$post->id, $post->title)?></div>
    </div>
    <div class="clearfix">
      <div class="title-c41">
        <?=substr($post->description, 0, 180)?>
      </div>
    </div>
  </div>
  <br><br>
  <?php } ?>
</div>
</div>