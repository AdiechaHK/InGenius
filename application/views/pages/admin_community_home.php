<div class="container">
  <h1>Categories</h1>
  <table role="table" class="table">
    <tr>
      <th>Icon</th>
      <th>Name</th>
      <th>Small Description</th>
      <th>Action</th>
    </tr>
    <?php foreach ($communities as $comm) {?>
    <tr>
      <td><?="<img src='".$comm->icon."' width='64' height='64' />"?></td>
      <td><?=$comm->name?></td>
      <td><?=$comm->small_desc?></td>
      <td>
        <?=anchor("admin/del_community/".$comm->id, "Delete", array('class'=> "btn btn-danger"))?>
        <?=anchor("admin/comm_details/".$comm->id, "Details", array('class'=> "btn btn-info"))?>
      </td>
    </tr>
    <?php } ?>
    <?=form_open_multipart("admin/add_community_category")?>
    <tr>
      <td><input type="file" name="icon_file" /></td>
      <td><input type="text" name="name" class="form-control" /></td>
      <td><textarea name="small_desc" class="form-control"></textarea></td>
      <td><input type="submit" class="btn btn-success" value="Save" /></td>
    </tr>
    </form>
  </table>
</div>