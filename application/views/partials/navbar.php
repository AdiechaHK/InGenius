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