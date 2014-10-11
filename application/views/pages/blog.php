<div>
  <div class="pos-img-vid clearfix">
    <div class="img-vid">
      <span>&nbsp;&nbsp;&nbsp;<a href="#" title="2 Messages"><i class="glyphicon glyphicon-envelope"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" title="No Notification"><i class="glyphicon glyphicon-bell"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" title="5 chats"><i class="glyphicon glyphicon-comment"></i></a>&nbsp;</span>
    </div>
    <img src=<?="'".base_url("public/img/bottom-img.png")."'"?> >
  </div>
  <!-- this row is for form -->
  <!-- <div class="row"> -->
  <?php if(isset($user)) { ?>
  <div class="row form-container">
    <div class="box">
      <?=form_open("welcome/submit_blog_post", array('role' => "form", 'class' => "form-horizontal" ))?>
      <input type="hidden" name="active" value="1" />
      <div class="form-group">
        <!-- <label for="inputEmail3" class="col-sm-2 control-label">Email</label> -->
        <div class="col-sm-12">
          <a href="#" class="name-1 formSpecialLinks"><span class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-share"></i></span> SHARE UPLOAD</a>&nbsp;&nbsp;&nbsp;
          <!-- <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#uploadMedia">
            <span class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-eye-open"></i></span> UPLOAD MEDIA
            </button> -->
          <a href="#uploadMedia" data-toggle="modal" data-target="#uploadMedia" class="name-1 formSpecialLinks"><span class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-eye-open"></i></span> UPLOAD MEDIA</a>
          <span class="pull-right" >
            Sharing in:
            <div class="btn-group" role="radio" target="post_privacy">
              <span _value="0" class="btn btn-primary btn-xs active"><i class="glyphicon glyphicon-ok"></i>&nbsp; Public &nbsp;</span>
              <!-- <input type="hidden" name="post_privacy" value="0"> -->
              <span _value="1" class="btn btn-primary btn-xs "><i></i>&nbsp; Group &nbsp;</span>
            </div>
          </span>
        </div>
      </div>
      <div class="form-group">
        <!-- <label for="inputEmail3" class="col-sm-2 control-label">Email</label> -->
        <div class="col-sm-4">
          <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
        <!-- <label for="inputEmail3" class="col-sm-2 control-label">Email</label> -->
        <div class="col-sm-6">
          <input type="text" class="form-control" name="details" placeholder="Body">
          <!-- <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea> -->
        </div>
        <div class="col-sm-2">
          <button type="submit" class=" btn btn-danger btn-enter pull-right">Share</button>
        </div>
      </div>
      <!-- <input class="form-control" /> -->
      <!-- <textarea class="form-control"></textarea> -->
      </form>
    </div>
  </div>
  <?php } ?>
  <span id="currentTime" time=<?='"'.(time()).'"'?> ></span>
  <!-- </div> -->
  <!-- this row is to list out all blog post -->
  <div class="row box">
    <div class="clearfix col-sm-12 top-spacing">
      <img class="img-size-c1" src=<?='"'.(isset($blog_posted_by->profile_pic)?$blog_posted_by->profile_pic:base_url("public/img/user-icon.png")).'"'?> />
      <span class="name-1"><?=$blog_posted_by->username?></span>
      <span class="title-c1" ><?=$blog_posted_by->location?></span>
      <span class="post-time-span pull-right" postTime=<?='"'.strtotime($blog_post->post_at).'"'?> ></span>
      <hr class="hr-pos" />
    </div>
    <div class="clearfix col-sm-4 top-spacing">
      <div class="title-c4"><?=$blog_post->title?></div>
    </div>
    <div class="clearfix col-sm-5 top-spacing justify">
      <div class="title-c41"><?=str_replace("\n", "<br>",  $blog_post->details)?></div>
    </div>
    <div class="clearfix col-sm-3 top-spacing">
      <?php if(isset($user)) { ?>
      <?=anchor("welcome/blog_like/".$blog_post->id, (isset($liked) && $liked==1) ?"Unlike":"Like", array('class'=>"see-all-1"))?>&nbsp;&nbsp;|&nbsp;&nbsp;<?=anchor("#", "Share")?>
      <?=form_open("welcome/blog_comment/$blog_post->id")?>
      <!-- <div class="col-sm-12"> -->
      <!-- <input type="text" class="form-control" name="body" placeholder="Body"> -->
      <textarea class="col-sm-12 form-control commentTextArea" rows="3" name="comment" placeholder="Write your comment here"></textarea>
      <button type="submit" class="col-sm-12 btn btn-danger btn-enter btn-enter-margin">Comment</button>
      <!-- </div> -->
      <?=form_close()?>
      <div style="margin-top: 150px;">
        <?php } else { ?>
        <div>
          <?php } ?>
          <span ><?=$like_count?>&nbsp;<?=$like_count>1?"Likes":"Like"?></span>&nbsp;&nbsp;|&nbsp;&nbsp;
          <?php $comment_count = sizeof($comments); ?>
          <span ><?=$comment_count?>&nbsp;<?=$comment_count>1?"Comments":"Comment"?></span>
        </div>
        <hr />
        <?php foreach($comments as $comment) { ?>
        <div>
          <div class="c-name"><?=$comment->user?></div>
          <div class="c-des"><?=$comment->comment?></div>
          <?php if(isset($user)) { ?>
          <div class="like-comment hide">
            <span class="like"><a href="">Like</a></span>&nbsp;&nbsp;<span class="u-comment"><a href=""><strong>Reply</strong></a></span>
          </div>
          <?php } ?>
        </div>
        <hr>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- <div class="col-sm-6"> -->
    <?=(isset($prev))?anchor("welcome/blog/".$prev->id, " << Previous", array('class'=>"btn btn-default pull-left", 'title'=> $prev->title)):""?>
    <!--     </div>
      <div class="col-sm-6">
      -->      <?=(isset($next))?anchor("welcome/blog/".$next->id, "Next >>", array('class'=>"btn btn-default pull-right", 'title'=> $next->title)):""?>
    <!-- </div> -->
  </div>
  <br/>
</div>