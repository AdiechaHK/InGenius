<div class="clearfix">
  <div class="container">
    <header class="header clearfix">
      <img src=<?="'".base_url("public/img/logo.png")."'"?> class="logo-w">
      <ul class="navbar navbar-right custom-nav-margin-top">
        <li><a href="#" class="active-tab">HOME</a></li>
        <li><?=anchor("welcome/blog", "BLOG")?></li>
        <li><?=anchor("welcome/media", "MEDIA")?></li>
        <li><?=anchor("welcome/community", "COMMUNITY")?></li>
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
        <!--             <li><?=anchor("welcome/user", "USER")?></li>
          <?php if (isset($user)) { ?>
          <li><?=anchor("user/logout", "LOGOUT")?></li>
          <?php } ?>
          -->          
      </ul>
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
    </header>
  </div>
</div>
<br><br>
<section class="banner1 clearfix">
  <div class="container text-center">
    <span class="class1">PROFFERING</span>
    <br><br><br><br>
    <div class="clearfix">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
        <hr class="hr-cus12">
      </div>
      <div class="col-lg-4"></div>
    </div>
    <span class="class2">PRACTICAL SOLUTIONS</span>
    <div class="clearfix">
      <div class="row">
        <div class="row row-position">
          <div class="col-lg-12">
            <hr class="hr-cus12">
          </div>
        </div>
        <div class="col-lg-12 categories" style="margin-top: -10px">
          <span class="cat12">AGRICULTURE , HEATHCARE , ART , EDUCATION , POWER & TECHNOLOGY</span>
        </div>
        <div class="row">
          <div class="col-lg-12"  style="margin-top: -10px">
            <hr class="hr-cus12">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="clearfix about-us" style="background-color: #990000">
  <div class="container text-center">
    <span class="class1 class11">About Us</span>
    <br>
    <div class="clearfix">
      <div class="col-sm-4 col-xs-4"></div>
      <div class="col-sm-4 col-xs-4">
        <hr class="hr-cus12 hr-cus121">
      </div>
      <div class="col-sm-4 col-xs-4"></div>
    </div>
    <div class="clearfix">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">
        <h3 style="text-align: justify">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including of liked.
        </h3>
      </div>
      <div class="col-sm-3"></div>
    </div>
    <br>
    <div>
      <!-- <img src="images/1.png"> -->
    </div>
  </div>
  <br><br><br><br>
</section>
<footer class="footer clearfix">
  <span class="f2">copyright protected all rights reserved</span>
  <div class="foo-text"><span class="footer-time">0245PM |</span><span class="copyright">Team Akron UK submits the 51st idea in the power category</span></div>
  <img src=<?="'".base_url("public/img/footer.png")."'"?> >
</footer>