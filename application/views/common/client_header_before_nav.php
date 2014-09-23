<header class="header clearfix">
<img src=<?="'".base_url("public/img/logo.png")."'"?> class="logo">
<?php if(isset($user)) { ?>
<div class="line"></div>
<img width="80" height="80" src=<?=isset($user)&&isset($user->profile_pic)?$user->profile_pic:base_url('public/img/user-icon.png')?> class="user">
<span class="user_name">
<strong><?=$user->username?></strong>
</span>
<?php } ?>