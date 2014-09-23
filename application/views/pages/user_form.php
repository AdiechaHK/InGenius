<div>
  <h1>Modify Personal Details</h1>
  <?=form_open_multipart("user/save_profile/".$user->id)?>
  <img src=<?'"'.(isset($post->profile_pic)?$post->profile_pic:base_url("public/img/user-icon.png")).'"'?> >
  <div class="form-group">
    <label for="profilePic">Select your profile picture</label>
    <input type="file" name="dp" class="" id="profilePic">
  </div>
  <div class="form-group">
    <label for="displayName">Username</label>
    <input type="text" name="username" class="form-control" id="displayName" placeholder="Eg.: Jhone Smith" value=<?='"'.(isset($user->username)?$user->username:"").'"'?>>
  </div>
  <div class="form-group">
    <label for="emailId">Email Address</label>
    <input type="email" name="email" class="form-control" id="emailId" placeholder="Eg.: jhone.smith@codegeeks.in" value=<?='"'.(isset($user->email)?$user->email:"").'"'?>>
  </div>
  <div class="form-group">
    <label for="dob">Date of birth</label>
    <input type="date" name="dob" class="form-control" id="dob" placeholder="Eg.: 23/7/1990" value=<?='"'.(isset($user->dob)?$user->dob:"").'"'?>>
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" class="form-control" id="gender" >
      <option value="0" <?=isset($user->gender) && $user->gender == 0? "selected":""?>>Male</option>
      <option value="1" <?=isset($user->gender) && $user->gender == 1? "selected":""?>>Female</option>
    </select>
  </div>
  <div class="form-group">
    <label for="location">location</label>
    <input type="text" name="location" class="form-control" id="location" placeholder="Eg.: Lagos" value=<?='"'.(isset($user->location)?$user->location:"").'"'?>>
  </div>
  <div class="form-group">
    <label for="workplace">workplace</label>
    <input type="text" name="workplace" class="form-control" id="workplace" placeholder="Eg.: Lagos" value=<?='"'.(isset($user->workplace)?$user->workplace:"").'"'?>>
  </div>
  <div class="form-group">
    <label for="Bio">Bio</label>
    <textarea name="bio" class="form-control" id="bio" placeholder="Eg.: Description of your self"><?=(isset($user->bio)?$user->bio:"")?></textarea>
  </div>
  <div class="form-group">
    <?=anchor("welcome/user", "Back", array('class'=>"btn btn-info"))?>
    <input class="btn btn-success" type="submit" value="Save Changes" />
  </div>
  </form>
</div>
</div>