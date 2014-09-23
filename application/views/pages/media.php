<div service="getMediaCat" url=<?="'".site_url("api/get_media_cat")."'"?> ></div>
<div service="getMediaContent" url=<?="'".site_url("api/get_media")."'"?> ></div>
<div id="media-cat-page" >
  <div class="pos-img-vid clearfix">
    <div class="img-vid">
      <span>Categories</a></span>
    </div>
    <img src=<?="'".base_url("public/img/bottom-img.png")."'"?> >
  </div>
  <div  class="row" ng-controller="media">
    <div >
      <?php foreach ($mcat_list as $mcat) { ?>
      <?=anchor("welcome/media_cat_show/".$mcat->id, "<div class='img-thumb-cat'><br/><span onClick='showDetails(".$mcat->id.")'>".$mcat->name."</span></div>", array('catid'=>$mcat->id))?>
      <!-- <a catid=<?="'".$mcat->id."'"?> href=<?='"'.site_url('welcome/media_cat_show/{{mcat.id}}').'"'?> > -->
      <?php } ?>
      <!--               <div class="img-thumb-cat">
        <br/>
          <span ng-click="showDetails(mcat.id)">{{mcat.name}}</span>
        </div>
        </a>
        -->          
    </div>
  </div>
</div>
</div>