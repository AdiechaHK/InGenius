<br>
<br>

<div class="row border-class">
	<br>
	<div class="col-sm-4 col-xs-12">
		<div class="user-image">
    	<img src=<?="'".base_url("public/img/user-photo.png")."'"?> >
      <div class="basic-color">Basic Details</div>
    </div>
	</div>
	<div class="col-sm-8 col-xs-12">
		<?=anchor('welcome/user_form', "> Edit Profile",array('class'=>"info-color pull-right hidden-xs"))?>
		<?=anchor('welcome/user_form', "Edit Profile",array('class'=>"info-color xs-margin-left visible-xs"))?>
    <div class="visible-xs">
    	 <br>
    </div>
		<div class="">
      <div>
        <div class="info-color">Name: <?=isset($user->username)?$user->username:"Undefine - username"?></div>
      </div>
      <div>
				<div class="info-color">Email address: <?=isset($user->email)?$user->email:"Undefine - email"?></div>
        <div class="info-color">Location: <?=isset($user->location)?$user->location:"Undefine - location"?></div>
        <div class="info-color">Age: <?=isset($user->dob)?$user->dob:"Undefine - dob"?></div>
        <div class="info-color">Gender: <?=isset($user->gender)?($user->gender==0?"Male":"Female"):"Undefine - gender"?></div>
        <div class="info-color">Work Place: <?=isset($user->workplace)?$user->workplace:"Undefine - workplace"?></div>
        <div class="info-color">Bio: <?=isset($user->bio)?$user->bio:"Undefine - bio"?></div>
        <br>
      </div>
    
    </div>
    
	</div>
	<br>
<br>
</div>
<br>
<br>
</div>