    <div id="media-page">
      <div>
        <div class="pos-img-vid clearfix">
          <div class="img-vid">
            <span><img src=<?="'".base_url("public/img/camara.png")."'"?> >&nbsp;&nbsp;<a onClick="showImage()" class="img-vid-active">image</a></span>&nbsp;&nbsp;
            <span><img src=<?="'".base_url("public/img/video.png")."'"?> >&nbsp;&nbsp;<a onClick="showVideos()">Video</a></span>
          </div>
          <img src=<?="'".base_url("public/img/bottom-img.png")."'"?> >
        </div>
        <div class="title-event">
          Meetings/Events
        </div>
        <div  class="row">
          <div id="media-gallary-image" class="col-lg-6 gallary images">
            <!-- {{media_content}} -->
            <?php foreach ($images as $key => $value) { ?>
              <div class="img-thumb"><img src=<?='"'.$value->link.'"'?> title=<?='"'.$value->name.'"'?> ></div>
            <?php } ?>
            
          </div>
          <div id="media-gallary-video" class="col-lg-6 gallary video" style="display: none">
            <!-- {{media_content}} -->
            <?php foreach ($videos as $key => $value) { ?>
              <div class="img-thumb"><video src=<?='"'.$value->link.'"'?> title=<?='"'.$value->name.'"'?> ></div>
            <?php } ?>
            
          </div>
          <div class="col-lg-6">
            <div class="img-thumb-p"><img src=""></div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12"><br/>
            <?=anchor('welcome/media', "Back", array('class'=> "btn btn-danger btn-enter"))?>
          </div>
        </div>
      </div>
    </div>
  </div>