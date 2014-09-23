<div>
  <br><br>
  <?=anchor("welcome/community", "Back to communities")?><br><br>
  <div class="border-class">
    <div class="row">
      <div class="col-lg-6">
        <iframe src=<?='"'.site_url('welcome/community_post_list/'.$community->id).'"'?> width="100%" height="400" border="0" style="border: none"></iframe>
      </div>
      <div class="col-lg-6">
        <iframe src=<?='"'.site_url('welcome/community_debate_list/'.$community->id).'"'?> width="100%" height="400" border="0" style="border: none"></iframe>
      </div>
    </div>
  </div>
  <div class="row form-container">
    <?=form_open("welcome/community_post_submition/".$community->id, array('role' => "form", 'class' => "form-horizontal" ))?>
    <div class="form-group">
      <!-- <label for="inputEmail3" class="col-sm-2 control-label">Email</label> -->
      <div class="col-sm-12">
        <a href="#" class="name-1 formSpecialLinks"><span class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-share"></i></span> SHARE UPLOAD</a>&nbsp;&nbsp;&nbsp;
        <!-- <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#uploadMedia">
          <span class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-eye-open"></i></span> UPLOAD MEDIA
          </button> -->
        <a href="#uploadMedia" data-toggle="modal" data-target="#uploadMedia" class="name-1 formSpecialLinks"><span class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-eye-open"></i></span> UPLOAD MEDIA</a>
        <span class="pull-right" >
          Sharing in:
          <div class="btn-group" role="radio" target="post_privacy">
            <span _value="0" class="btn btn-primary btn-xs active"><i class="glyphicon glyphicon-ok"></i>&nbsp; Public &nbsp;</span>
            <input type="hidden" name="post_privacy" value="0">
            <span _value="1" class="btn btn-primary btn-xs "><i></i>&nbsp; Group &nbsp;</span>
          </div>
        </span>
      </div>
    </div>
    <div class="form-group">
      <!-- <label for="inputEmail3" class="col-sm-2 control-label">Email</label> -->
      <div class="col-sm-12">
        <input type="text" class="form-control" name="title" placeholder="Title">
      </div>
    </div>
    <div class="form-group">
      <!-- <label for="inputEmail3" class="col-sm-2 control-label">Email</label> -->
      <div class="col-sm-12">
        <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea>
      </div>
    </div>
    <!-- <input class="form-control" /> -->
    <!-- <textarea class="form-control"></textarea> -->
    <div class="btn-group" role="radio" target="post_type">
      <span _value="community_post" class="btn btn-primary active"><i class="glyphicon glyphicon-ok"></i>&nbsp; Post &nbsp;</span>
      <input type="hidden" name="post_type" value="community_post">
      <span _value="community_discussion" class="btn btn-primary "><i></i>&nbsp; Debate &nbsp;</span>
    </div>
    <button type="submit" class="btn btn-danger btn-enter pull-right">Share</button>
    </form>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="uploadMedia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Media upload</h4>
      </div>
      <iframe name="mediaUploadForm"></iframe>
      <?=form_open_multipart("welcome/community_media_upload", array('target' => "mediaUploadForm"))?>
      <!-- <form target="mediaUploadForm" encription="multipart"> -->
      <div class="modal-body">
        <input type="file" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>