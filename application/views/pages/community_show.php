              <div class="clearfix">
                <img class="img-size-c hide" src="images/sutcase.png">&nbsp;<span class="title-c">Posts</span>
                <?php if(isset($back_link)) { ?>
                <span class="pull-right see-all"><?=anchor($back_link['url'], $back_link['title'])?></span>
                <?php } ?>
              </div>
              <hr class="hr-pos">
              <br>
              <br>
              <div class="">
                <div class="clearfix">
                  <img class="img-size-c1" src=<?='"'.(isset($post_user) && isset($post_user->profile_pic)?$post_user->profile_pic:base_url("public/img/user-icon.png")).'"'?> >&nbsp;<span class="name-1"><?=(isset($post_user)? $post_user->username: "Username")?></span>&nbsp;<span class="title-c1"><?=(isset($post)?$post->post_at:"6546446")?></span>
                </div>
                <div class="clearfix">
                  <div class="title-c4"><?=isset($post) ? $post->title: "Sample title"?></div>
                </div>
                <div class="clearfix">
                  <div class="title-c41">
                    <?=isset($post)?$post->description:"Description area"?>
                  </div>
                </div>
              </div>
              <br><br><br><br><br>
              <div class="icons-social hide">

                <a class="see-all-1" href=""><span>Like</span></a>&nbsp;
                <a class="see-all-1" href=""><span>Share</span></a>&nbsp;
                <a class="see-all" href=""><span>Comment</span></a>

                <span class="pull-right">
                  <span class="see-all-1">114 Like</span>
                  &nbsp;&nbsp;
                  <span class="see-all">44 Share</span>
                </span>

              </div>

              <div class="clearfix">
                <?=form_open($comment_url)?>
                <textarea class="form-control custom-form" name="comment" placeholder="Enter text" style="resize: vertical;min-height: 84px;"></textarea>
                <br>
                <button type="submit" class="btn btn-danger btn-enter pull-right">Post</button>
              </div>

              <br>
              <?php if(isset($comments) && sizeof($comments) > 0) { ?>
              <div>

                <div class="comment">Comments</div>
                <hr class="hr-pos">

              </div>

              <br>
              <?php } ?>
              <?php foreach ($comments as $comment) { ?>
              <div>

                <div class="c-name"><?=$comment->user?></div>
                <div class="c-des"><?=$comment->comment?></div>
                <div class="like-comment hide">
                  <span class="like"><a href="">Like</a></span>&nbsp;&nbsp;<span class="u-comment"><a href=""><strong>Reply</strong></a></span>
                </div>                
              </div>

              <hr>
              <?php } ?>