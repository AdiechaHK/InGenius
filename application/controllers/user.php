<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -  
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in 
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    render_page($this, 'welcome_message');
  }

  public function signup() {
    $_POST['password'] = md5($_POST['password']);
    $this->load->model('users');
    $this->users->insert_entry($_POST);
    redirect("welcome");
  }

  public function login() {
    // $_POST['password'] = md5($_POST['password']);
    $this->load->model('users');
    $res = $this->users->login($_POST);
    switch ($res['status']) {
      case 'SUCCESS':
        $this->session->set_userdata('user', $res['data']);
        redirect('welcome');
        break;
      case 'FAIL':
        $err = "fail: ". $res['data'];
        $this->session->set_userdata('login_err', $err);
        redirect('admin/login');
        break;
      default:
        $err = "not reachable place";
        $this->session->set_userdata('login_err', $err);
        redirect('admin/login');
        break;
    }

  }

  public function logout() {
    $user = $this->session->userdata('user');
    if($user != NULL) {
      $this->session->unset_userdata('user');
    }
    redirect('welcome');
  }

  public function save_profile($id)
  {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->id == $id) {
      $name = "PROFILE_PIC_".$user->id;
      // $condition = array('id'=> $id);

      $config = array(
          'upload_path'=> "./client_images/",
          'allowed_types'=> "mp4|gif|jpg|png",
          'file_name'=> $name,
          // 'max_size'=> "100",
          // 'max_width'=> "1024",
          // 'max_height'=> "768"
        );

      $this->load->library('upload', $config);
      
      // echo var_dump($udata);
      if(!$this->upload->do_upload('dp')) {
        $error = array('error' => $this->upload->display_errors());
        // echo var_dump($error);
      } else {
        $res_data = $this->upload->data();
        $img_url = base_url("client_images/".$res_data['file_name']);
        $_POST['profile_pic'] = $img_url;
      }
      // echo var_dump($_POST);
      $this->load->model('users');
      $this->users->update_entry($_POST, array('id'=>$id));

      // Remove older image before updating session object
      $arr = explode("/", $user->profile_pic);
      $indx = (integer) sizeof($arr);
      // echo $indx;
      $filename = './client_images/' . $arr[$indx - 1];
      // echo $filename;
      if(is_file($filename)) {
          // echo "file found";
          unlink($filename);
      }

      // updating session object
      $user = $this->users->get_entry_by_id($id);
      $this->session->set_userdata('user', $user);
    }
    redirect('welcome/user');
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */