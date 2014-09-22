<div class="container">
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class=<?="'".$tabs["category"]."'"?>><a href="#cat" role="tab" data-toggle="tab">Category</a></li>
  <li class=<?="'".$tabs["media_content"]."'"?>><a href="#cont" role="tab" data-toggle="tab">Media Contents</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class=<?="'tab-pane ".$tabs["category"]."'"?> id="cat">
    <table id="cat_table" class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(isset($media_cat_list) && sizeof($media_cat_list) > 0) { 
          foreach ($media_cat_list as $key => $media_cat) { ?>
        <tr>
          <td><?=($key+1)?></td>
          <td><a href="#" class="xeditable" data-type="text" data-pk=<?="'".$media_cat->id."'"?> data-url=<?="'".site_url("admin/edit_media_cat_name")."'"?> data-title="Category Name"><?=$media_cat->name?></a></td>
          <td><a href="#" class="xeditable" data-type="textarea" data-pk=<?="'".$media_cat->id."'"?> data-url=<?="'".site_url("admin/edit_media_cat_desc")."'"?> data-title="Category Description"><?=$media_cat->description?></a></td>
          <td><?=anchor("admin/remove_media_cat/".$media_cat->id,"Remove", array('class'=>"btn btn-danger"))?></td>
        </tr>
        <?php }  } ?>
        <?=form_open("admin/add_media_cat")?>
        <tr>
          <td></td>
          <td><input name="name" class="form-control" /></td>
          <td><textarea name="description" class="form-control"></textarea></td>
          <td><input type="submit" class="btn btn-success"></td>
        </tr>
        </form>
      </tbody>
    </table>
  </div>
  <div class=<?="'tab-pane ".$tabs["media_content"]."'"?> id="cont"><br>

  <?php if(isset($media_cat_list) && sizeof($media_cat_list) > 0) { 
    foreach ($media_cat_list as $key => $media_cat) { ?>
    <div class="panel panel-default" id=<?='"pan_'.$media_cat->id.'"'?> >
      <div class="panel-heading">
        <h3 class="panel-title"><?=$media_cat->name?></h3>
      </div>
      <div class="panel-body">
        <div class="row mc-rows">
        <?php $i = 0;
          foreach ($media_content_list as $key => $media) { 
          if($media->cat == $media_cat->id) { 
            $i++;
            ?>
        <div class="section">
          <div class="panel panel-default">
            <div class="panel-body" style="height: 230px;">
              <center>
                <?php switch ($media->type) {
                  case 0:
                    ?><img src=<?="'".$media->link."'"?> />
                    <?php
                    break;
                  case 1:
                    ?><video src=<?="'".$media->link."'"?>  autoload control ></video>
                    <?php
                    break;
                  default:
                    # code...
                    break;
                } ?>
              </center>
            </div>
            <div class="panel-footer">
              <a href="#" class="xeditable" data-type="text" data-pk=<?="'".$media->id."'"?> data-url=<?="'".site_url("admin/edit_media_name")."'"?> data-title="Media name"><?=$media->name?></a>
              <?=anchor("admin/remove_media_content/".$media->id, "<i class='glyphicon glyphicon-trash'></i>", array('title'=>"Remove media", 'class'=> "btn btn-xs btn-danger pull-right"))?>
            </div>
          </div>
        </div>
        <?php if($i % 4 == 0) { ?>
          </div>
          <div class="row mc-rows">
        <?php } } } ?>
        <div class="section form">
          <div class="panel panel-default">
            <?=form_open_multipart("admin/add_media_content")?>
              <div class="panel-body" style="height: 230px;">
                  <input type="file" name="media_file"><br />
                  <input class="form-control" name="name"><br />
                  <input type="hidden" name="cat" value=<?="'".$media_cat->id."'"?> />
                  <select class="form-control" name="type">
                    <option value="0">Image</option>
                    <option value="1">Video</option>
                  </select><br/>
              </div>
              <div class="panel-footer">
                  <input type="submit" class="btn btn-xs btn-success" value="Upload" />
                  <input type="reset" class="btn btn-xs btn-info" value="Reset" />
              </div>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
    <?php }} ?>
  </div>
</div>
</div>