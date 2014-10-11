<div class="clearfix">
  <header class="header">
    <div class="clearfix">
      <div class="wrap-logo-user-profile">
        <div class="logo-block">
          <img src=<?="'".base_url("public/img/logo.png")."'"?> class="logo">
        </div>
         <?php if(isset($user)) { ?>
        <div class="profile-block">
          <div class="user-photo">
            <img width="80" height="80" src=<?=isset($user)&&isset($user->profile_pic)?$user->profile_pic:base_url('public/img/user-icon.png')?> class="user">
          </div>
          <div class="user_name">
            <div><strong><?=$user->username?></strong></div>
            <div><?=$user->location?></div>
          </div>         
        </div>
        <?php } ?>
      </div>
      <!-- <?=$user->location?> -->
      <div class="navigaton display-block-hide-xs">
        <ul class="custom-navbar">
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
              <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
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
        </ul>
      </div>
      <div class="">
        <nav class="navbar navbar-default display-block-show-lg display-block-show-xs" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <input type="search" class="form-control input-xs" placeholder="Search">
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <?php if(isset($active_tab) && $active_tab == "home") { ?>
                <li><a href="#" class="active">HOME</a></li>
                <?php } else { ?>
                <li><?=anchor("welcome", "HOME")?></li>
                <?php } ?>
                <?php if(isset($active_tab) && $active_tab == "blog") { ?>
                <li><a href="#" class="active">BLOG</a></li>
                <?php } else { ?> 
                <li><?=anchor("welcome/blog", "BLOG")?></li>
                <?php } ?>
                <?php if(isset($active_tab) && $active_tab == "media") { ?>
                <li><a href="#" class="active">MEDIA</a></li>
                <?php } else { ?>
                <li><?=anchor("welcome/media", "MEDIA")?></li>
                <?php } ?>
                <?php if(isset($active_tab) && $active_tab == "community") { ?>
                <li><a href="#" class="active">COMMUNITY</a></li>
                <?php } else { ?>
                <li><?=anchor("welcome/community", "COMMUNITY")?></li>
                <?php } ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">USER <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <?php if(isset($user) && $user != NULL) { ?>
                    <li><?=anchor("welcome/user", "Profile")?></li>
                    <li><?=anchor("user/logout", "Sign out")?></li>
                    <?php } else { ?>
                    <li><a href="#" data-toggle="modal" data-target="#signInModal">Sign In</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#regModal">Registration</a></li>
                    <?php } ?>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container-fluid -->
        </nav>
      </div>
    </div>
  </header>
</div>







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


<div class="left-arrow">
  <?=anchor($previous_page_link, "<span class='glyphicon glyphicon-chevron-left'></span>", array('class'=> "box-glyficon"))?>
</div>
<div class="right-arrow">
  <?=anchor($next_page_link, "<span class='glyphicon glyphicon-chevron-right'></span>", array('class'=> "box-glyficon"))?>
</div>
<div class="time_version">
  <span class="title">In’GENIUS TIME</span>
  <span class="value"><span class="my-custom-clock" pattern="hh:mm:ss mr" current=<?='"'.time().'"'?> ></span></span>
  <span class="line1"></span>
  <span class="title">VERSION #</span>
  <span class="value">2.0.SPT2013</span>
</div>
<!-- <div class="big-text"><?=isset($active_tab)?strtoupper($active_tab):""?></div> -->
<div class="search display-block-hide-xs">
  <input type="text" name="search" class="search_field" placeholder="SEARCH In’GENIUS">
  <button class="btn btn-danger btn-enter">ENTER</button>
</div>
<div class="text display-block-hide-xs"><img src=<?="'".base_url("public/img/text.png")."'"?> class=""></div>
</section>


<section class="container">
<div class="row">
<div class="col-sm-9 col-xs-12">