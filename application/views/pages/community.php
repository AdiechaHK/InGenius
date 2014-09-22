<div>
  <!-- Services list -->
  <div service="getCommunitiesList" url=<?="'".site_url('api/getCommunitiesList')."'"?> ></div>

  <div class="pos-img-vid clearfix">
    <div class="img-vid">
      <span>Categories</a></span>
    </div>
    <img src=<?="'".base_url("public/img/bottom-img.png")."'"?> >
  </div>
  <div ng-controller="communityController">

<!--     <div ng-repeat="comm in communities">
      {{comm.name}}
    </div>
 -->

    <!-- Previous code - using angular js -->
    <!--
    <div class="imgWrap" ng-repeat="comm in communities">
      <img class="img-models-1" src="{{comm.icon}}" alt="polaroid" />
      <div class="imgDescription">
        <div class="img-hover-text">
          <div class="bk-color">
            <div><?=anchor("welcome/community_detail/{{comm.id}}", "{{comm.name}}")?></div>
            <div>644 Discuss</div>
          </div>
        </div>
      </div>
    </div>
    -->

    <div>
      <?php foreach ($communities as $comm) { ?>
      <div class="imgWrap" ng-repeat="comm in communities">
        <img class="img-models-1" src=<?='"'.$comm->icon.'"'?> alt=<?='"'.$comm->name.'"'?> />
        <div class="imgDescription">
          <div class="img-hover-text">
            <div class="bk-color">
              <div style="padding: 5px 0px;"><?=anchor("welcome/community_detail/".$comm->id, $comm->name)?></div>
              <div style="padding:0px 10px;">
                <span class="pull-left" title=<?="'".$comm->posts." posts and ".$comm->debate." debates'"?> ><?=intval($comm->posts) + intval($comm->debate)?>&nbsp;Discuss</span>
                <?=anchor("welcome/toggle_community_like/".$comm->id, "<i class='glyphicon glyphicon-star".(isset($comm->c_likes)?"'":"-empty'")."></i>", array('class' => "pull-right"))?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
</div>