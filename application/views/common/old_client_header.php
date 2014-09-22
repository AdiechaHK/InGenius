   <header class="header clearfix">
    <img src=<?="'".base_url("public/img/logo.png")."'"?> class="logo">
    <?php if(isset($user)) { ?>
    <div class="line"></div>
    <img width="80" height="80" src=<?=isset($user)&&isset($user->profile_pic)?$user->profile_pic:base_url('public/img/user-icon.png')?> class="user">
    <span class="user_name">
      <strong><?=$user->username?></strong>
    </span>
    <?php } ?>
    <ul class="navbar navbar-right">
      <?php if(isset($active_tab) && $active_tab == "home") { ?>
      <li><a href="#" class="active-tab">HOME</a></li>
      <?php } else { ?>
      <li><?=anchor("welcome", "HOME")?></li>
      <?php } ?>
      <?php if(isset($active_tab) && $active_tab == "blog") { ?>
      <li><a href="#" class="active-tab">BLOG</a></li>
      <?php } else { ?> 
      <li><?=anchor("welcome/blog", "BLOG")?></li>
      <?php } ?>
<!--
      <?php if(isset($active_tab) && $active_tab == "competition") { ?>
      <li><a href="#" class="active-tab">COMPETITION</a></li>
      <?php } else { ?>
      <li><?=anchor("welcome/competition", "COMPETITION")?></li>
      <?php } ?>
 -->
      <?php if(isset($active_tab) && $active_tab == "media") { ?>
      <li><a href="#" class="active-tab">MEDIA</a></li>
      <?php } else { ?>
      <li><?=anchor("welcome/media", "MEDIA")?></li>
      <?php } ?>
      <?php if(isset($active_tab) && $active_tab == "community") { ?>
      <li><a href="#" class="active-tab">COMMUNITY</a></li>
      <?php } else { ?>
      <li><?=anchor("welcome/community", "COMMUNITY")?></li>
      <?php } ?>
      <li>
        <div class="dropdown">
          <a data-toggle="dropdown" href="#">USER</a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <?php if(isset($user) && $user != NULL) { ?>
            <li class="dropdown-menu-item" role="presentation"><?=anchor("welcome/user", "Profile")?></li>
            <li class="dropdown-menu-item" role="presentation"><?=anchor("user/logout", "Sign out")?></li>
            <?php } else { ?>
            <li class="dropdown-menu-item" role="presentation"><a href="#" data-toggle="modal" data-target="#signInModal">Sign In</a></li>
            <li class="dropdown-menu-item" role="presentation"><a href="#" data-toggle="modal" data-target="#regModal">Registration</a></li>
            <?php } ?>
          </ul>
        </div>
      </li>

      <!--
      <?php if(isset($active_tab) && $active_tab == "user") { ?>
      <li><a href="#" class="active-tab">USER</a></li>
      <?php } else { ?>
      <li><?=anchor("welcome/user", "USER")?></li>
      <?php } ?>
      <?php if(isset($user)) { ?>
      <li><?=anchor("user/logout", "LOGOUT")?></li>
      <?php } ?>
      -->
    </ul>
   </header>

    <!-- Modal -->
    <div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Sign In</h4>
          </div>
          <?=form_open('user/login')?>
            <div class="modal-body">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Sign In</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Registraion</h4>
          </div>
          <?=form_open('user/signup')?>
            <div class="modal-body">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
              </div>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
              </div>
              <div class="form-group">
                <label for="cpassword">Confirm password</label>
                <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
   <section class="bannner clearfix">
    <?=anchor($previous_page_link, "<span class='glyphicon glyphicon-chevron-left' style='font-size:18px;''></span>", array('class'=> "box-glyficon"))?>
    <?=anchor($next_page_link, "<span class='glyphicon glyphicon-chevron-right' style='font-size:18px;'></span>", array('class'=> "box-glyficon pull-right position-right-glyficon"))?>
    <!-- What tapan did -->
<!-- 
    <div class="box-glyficon">
      <span class="glyphicon glyphicon-chevron-left" style="font-size:18px;"></span>
    </div>
    <div class="box-glyficon pull-right position-right-glyficon">
      <span class="glyphicon glyphicon-chevron-right" style="font-size:18px;"></span>
    </div>
 -->

    <div class="time_version">
      <span class="title">In’GENIUS TIME</span>
      <span class="value"><span class="my-custom-clock" pattern="hh:mm:ss mr" current=<?='"'.time().'"'?> ></span></span>
      <span class="line1"></span>
      <span class="title">VERSION #</span>
      <span class="value">2.0.SPT2013</span>
    </div>
    <div class="big-text"><?=isset($active_tab)?strtoupper($active_tab):""?></div>
    <div class="search pull-right">
      <input type="text" name="search" class="search_field" placeholder="SEARCH In’GENIUS">
      <button class="btn btn-danger btn-enter">ENTER</button>
    </div>
    <div class="text"><img src=<?="'".base_url("public/img/text.png")."'"?> class="pull-right"></div>
   </section>


<section class="container body-contain">
  <div class="row">
    <div class="col-lg-9">