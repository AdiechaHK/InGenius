<div class="container">
  <h1>Admin Panel</h1>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?=anchor("admin", "InGenius", array('class'=>"navbar-brand"))?>
      <!-- <a class="navbar-brand" href="#">InGenius</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php if(isset($menu_item) && $menu_item == "media") { ?>
        <li class="active"><a href="#">Media</a></li>
        <?php } else { ?>
        <li><?=anchor("admin/media","Media")?></li>
        <?php } ?>
        <?php if(isset($menu_item) && $menu_item == "blog") { ?>
        <li class="active"><a href="#">Blog</a></li>
        <?php } else { ?>
        <li><?=anchor("admin/blog","Blog")?></li>
        <?php } ?>
        <?php if(isset($menu_item) && $menu_item == "community") { ?>
        <li class="active"><a href="#">Community</a></li>
        <?php } else { ?>
        <li><?=anchor("admin/community","Community")?></li>
        <?php } ?>
        <li><a href="#">Link</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><?=anchor("user/logout", "Log out&nbsp;&nbsp;")?></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>