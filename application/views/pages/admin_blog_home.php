<div class="container">
  <h1>Blogs</h1>
  <div class="row">
    <div class="col-md-3">
      <ul class="list-group">
        <li class='list-group-item'><?=anchor("admin/blog", "Add New Post", array("class"=>"btn btn-primary"))?></li>
        <?php if(isset($posts)) {  foreach ($posts as $key => $value) {
          # code...
          echo "<li class='list-group-item'>".anchor("admin/blog/".($value->id), "(".($key+1).") ".$value->title)."</li>";
          }} ?>
      </ul>
    </div>
    <div class="col-md-9">
      <?=(isset($post)?form_open("admin/submit_post/".$post->id, array('role'=>"form")):form_open("admin/submit_post", array('role'=>"form")))?>
      <fieldset>
        <!-- Form Name -->
        <legend>Post Details</legend>
        <!-- Text input-->
        <div class="form-group">
          <label class="control-label" for="title">Title</label>
          <div class="controls">
            <input id="title" class="form-control" name="title" type="text" placeholder="Title text goes here" class="input-medium" required="" value=<?=(isset($post)?"'".$post->title."'":"''")?> />
          </div>
        </div>
        <!-- Textarea -->
        <div class="form-group">
          <label class="control-label" for="details">Details</label>
          <div class="controls">                     
            <textarea id="details" rows="10" style="resize: none;" class="form-control" name="details" placeholder="Details contents goes here"><?=(isset($post)?$post->details:"")?></textarea>
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
            <input class="btn btn-success" type="submit" value="Save"/> <?=isset($post)?anchor("admin/remove_post/".$post->id, "Delete", array('class'=> "btn btn-danger")):NULL?>
          </div>
        </div>
      </fieldset>
      <!-- 
        <label>Title</label>
        <input name="title" type="text" value=<?=(isset($post)?"'".$post->title."'":"''")?> />
        <label>Detail</label>
        <textarea name="details"><?=(isset($post)?$post->details:"")?></textarea>
        <input type="submit" />
        -->      </form>
    </div>
  </div>
</div>