<div>
  <h1>User Profile</h1>
  <p><strong>Username: </strong><?=isset($user->username)?$user->username:"Undefine - username"?></p>
  <p><strong>Email address: </strong><?=isset($user->email)?$user->email:"Undefine - email"?></p>
  <p><strong>Date of birth: </strong><?=isset($user->dob)?$user->dob:"Undefine - dob"?></p>
  <p><strong>Gender: </strong><?=isset($user->gender)?($user->gender==0?"Male":"Female"):"Undefine - gender"?></p>
  <p><strong>Location: </strong><?=isset($user->location)?$user->location:"Undefine - location"?></p>
  <p><strong>Workplace: </strong><?=isset($user->workplace)?$user->workplace:"Undefine - workplace"?></p>
  <p><strong>Bio: </strong><?=isset($user->bio)?$user->bio:"Undefine - bio"?></p>
  <p><?=anchor('welcome/user_form', "Edit")?></p>
</div>
</div>