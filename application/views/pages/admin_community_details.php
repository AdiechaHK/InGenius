<div class="container">
  <?=anchor("admin/community", "Back to Community", array('class'=> "btn btn-info"))?>
  <h1>Details of <?=$community->name?></h1>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <?php if(isset($active_tab) && $active_tab == "post" || !isset($active_tab)) { ?>
    <li class="active"><a href="#post" role="tab" data-toggle="tab">Posts</a></li>
    <?php } else { ?>
    <li><a href="#post" role="tab" data-toggle="tab">Posts</a></li>
    <?php } ?>
    <?php if(isset($active_tab) && $active_tab == "discussion") { ?>
    <li class="active"><a href="#discussion" role="tab" data-toggle="tab">Discussion</a></li>
    <?php } else { ?>
    <li><a href="#discussion" role="tab" data-toggle="tab">Discussion</a></li>
    <?php } ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <?php if(isset($active_tab) && $active_tab == "post" || !isset($active_tab)) { ?>
    <div class="tab-pane active" id="post">
    <?php } else { ?>
    <div class="tab-pane" id="post">
    <?php } ?>
      <div class="row" style="margin-top: 20px">
        <div class="col-md-3">
          <ul class="list-group">
            <li class='list-group-item'><?=anchor("admin/comm_details/".$community->id, "Add New Post", array("class"=>"btn btn-primary"))?></li>
          <?php if(isset($posts)) {  foreach ($posts as $key => $value) {
            # code...
            echo "<li class='list-group-item'>".anchor("admin/comm_details/".$community->id."/post/".($value->id), "(".($key+1).") ".$value->title)."</li>";
          }} ?>
          </ul>
        </div>
        <div class="col-md-9">
          <?=(isset($post)?form_open("admin/comm_post/".$community->id."/".$post->id, array('role'=>"form")):form_open("admin/comm_post/".$community->id, array('role'=>"form")))?>
            <fieldset>

            <!-- Form Name -->
            <legend>Post Details</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="title">Title</label>
              <div class="controls">
                <input id="title" class="form-control" name="title" type="text" placeholder="Title text goes here" class="input-medium" required="" value=<?=(isset($post)?'"'.htmlentities($post->title).'"':'""')?> />
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="control-label" for="description">Description</label>
              <div class="controls">                     
                <textarea id="description" rows="10" style="resize: none;" class="form-control" name="description" placeholder="Description contents goes here"><?=(isset($post)?$post->description:"")?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label" for="details">Activation</label>
              <div class="controls">                     
                <div class="btn-group" data-toggle="buttons">
                  <label class=<?=(isset($post) ? ($post->active == 0 ? "'btn btn-primary active'" : "'btn btn-primary'") : "'btn btn-primary active'")?> >
                    <input type="radio" name="active" id="option1" value="0" <?=(isset($post) ? ($post->active == 0 ? "checked" : "") : "checked")?> > In active
                  </label>
                  <label class=<?=((isset($post) && $post->active == 1) ? "'btn btn-primary active'" : "'btn btn-primary'")?>>
                    <input type="radio" name="active" id="option2" value="1" <?=((isset($post) && $post->active == 1) ? "checked" : "")?> > Active
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="controls">
                <input class="btn btn-success" type="submit" value="Save"/> <?=isset($post)?anchor("admin/remove_comm_post/".$post->id, "Delete", array('class'=> "btn btn-danger")):NULL?>
              </div>
            </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <?php if(isset($active_tab) && $active_tab == "discussion") { ?>
    <div class="tab-pane active" id="discussion">
    <?php } else { ?>
    <div class="tab-pane" id="discussion">
    <?php } ?>
      this is sample content under discussion 
      <!-- 
      <?=var_dump($discussion)?> 
       -->
      <div class="row" style="margin-top: 20px">
        <div class="col-md-3">
          <ul class="list-group">
            <li class='list-group-item'><?=anchor("admin/comm_details/".$community->id."/discussion", "Add New Discussion", array("class"=>"btn btn-primary"))?></li>
          <?php if(isset($discussions)) {  foreach ($discussions as $key => $value) {
            # code...
            echo "<li class='list-group-item'>".anchor("admin/comm_details/".$community->id."/discussion/".($value->id), "(".($key+1).") ".$value->title)."</li>";
          }} ?>
          </ul>
        </div>
        <div class="col-md-9">
          <?=(isset($discussion)?form_open("admin/comm_discussion/".$community->id."/".$discussion->id, array('role'=>"form")):form_open("admin/comm_discussion/".$community->id, array('role'=>"form")))?>
            <fieldset>

            <!-- Form Name -->
            <legend>Discussion Details</legend>

            <!-- Text input-->
            <div class="form-group">
              <label class="control-label" for="title">Title</label>
              <div class="controls">
                <input id="title" class="form-control" name="title" type="text" placeholder="Title text goes here" class="input-medium" required="" value=<?=(isset($discussion)?'"'.htmlentities($discussion->title).'"':'""')?> />
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="control-label" for="description">Description</label>
              <div class="controls">                     
                <textarea id="description" rows="10" style="resize: none;" class="form-control" name="description" placeholder="Description contents goes here"><?=(isset($discussion)?$discussion->description:"")?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label" for="details">Activation</label>
              <div class="controls">                     
                <div class="btn-group" data-toggle="buttons">
                  <label class=<?=(isset($discussion) ? ($discussion->active == 0 ? "'btn btn-primary active'" : "'btn btn-primary'") : "'btn btn-primary active'")?> >
                    <input type="radio" name="active" id="option1" value="0" <?=(isset($discussion) ? ($discussion->active == 0 ? "checked" : "") : "checked")?> > In active
                  </label>
                  <label class=<?=((isset($discussion) && $discussion->active == 1) ? "'btn btn-primary active'" : "'btn btn-primary'")?>>
                    <input type="radio" name="active" id="option2" value="1" <?=((isset($discussion) && $discussion->active == 1) ? "checked" : "")?> > Active
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="controls">
                <input class="btn btn-success" type="submit" value="Save"/> <?=isset($discussion)?anchor("admin/remove_comm_discussion/".$discussion->id, "Delete", array('class'=> "btn btn-danger")):NULL?>
              </div>
            </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>