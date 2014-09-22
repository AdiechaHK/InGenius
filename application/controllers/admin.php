<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      // $data['menu_item'] = "media";
      $data = array();
      render_page($this, 'admin_home', $data, array(), true);
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function login() {
    $user = $this->session->userdata('user');
    if($user != NULL) {
      $this->session->set_userdata('admin_error', get_message('admin_error_already_logedin'));
      redirect('admin/admin_error');
    } else {
      render_page($this, 'admin_login_page');
    }
  }

  public function signup() {
    $user = $this->session->userdata('user');
    if($user != NULL) {
      $this->session->set_userdata('admin_error', get_message('admin_error_already_logedin_signup'));
      redirect('admin/admin_error');
    } else {
      render_page($this, 'admin_signup_page');
    }
  }

  public function admin_error() {
    $data['admin_error'] = $this->session->userdata("admin_error");
    $this->session->unset_userdata("admin_error");
    render_page($this, 'admin_error_page', $data);
  }

  public function media() {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {

      $tabs = array('media_content'=>"", 'category'=>"");
      $lt = $this->session->userdata('last_tab');
      $this->session->unset_userdata('last_tab');
      isset($lt) && gettype($lt) == "string"? $tabs[$lt] = "active": $tabs['category'] = "active";
      $data['tabs'] = $tabs;


      $data['menu_item'] = "media";
      $data['load_self'] = true;
      $this->load->model('media_cat');
      $data['media_cat_list'] = $this->media_cat->get_list();
      $this->load->model('media_content');
      $data['media_content_list'] = $this->media_content->get_list();
      render_page($this, 'admin_media', $data, array('x-editable'), true);
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }

  }

  public function add_media_cat() {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $this->load->model('media_cat');
      $this->media_cat->insert_entry($_POST);
      redirect('admin/media');
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function edit_media_cat_name() {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $this->load->model('media_cat');
      $this->media_cat->update_entry(array('name'=> $_POST['value']), array('id'=>$_POST['pk']));
      // echo var_dump($_POST);
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function edit_media_cat_desc() {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $this->load->model('media_cat');
      $this->media_cat->update_entry(array('description'=> $_POST['value']), array('id'=>$_POST['pk']));
      // echo var_dump($_POST);
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function remove_media_cat($id) {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $this->load->model('media_cat');
      $this->media_cat->remove_entry($id);
      redirect('admin/media');

    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function test() {
    // $this->load->helper('directory');
    // $map = directory_map('client_images');
    // foreach ($map as $key => $value) {
    //   # code...
    //   echo (gettype($value)=="string"?$value:"skipped")."<br/><br/>";
    // }
    // echo var_dump($map);

    $config['image_library'] = 'imagemagick';
    $config['source_image'] = "client_images/test_exp.jpg";
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']   = 155;
    $config['height'] = 155;

    $this->load->library('image_lib');
    // Set your config up
    $this->image_lib->initialize($config);

    // Do your manipulation
    $x = $this->image_lib->resize();
    echo var_dump($x);
    if(!$x) {
      echo $this->image_lib->display_errors();
    }

    $this->image_lib->clear();
    echo "done";


  }

  public function add_media_content() {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {

      $allowed_types = array("gif|jpg|png", "mp4");
      $udata = array();
      $udata['name'] = $_POST['name'];
      $udata['cat'] = $_POST['cat'];
      $udata['type'] = $_POST['type'];
      // echo "insertion done";
      $name = "MEDIA_".time()."_".rand(10000, 99999);
      // $condition = array('id'=> $id);

      $config = array(
          'upload_path'=> "./client_images/",
          'allowed_types'=> $allowed_types[$udata['type']],
          'file_name'=> $name,
          // 'max_size'=> "100",
          // 'max_width'=> "1024",
          // 'max_height'=> "768"
        );
      $this->load->library('upload', $config);
      
      // echo var_dump($udata);
      if(!$this->upload->do_upload('media_file')) {
        $error = array('error' => $this->upload->display_errors());
        echo var_dump($error);
        return;
      } else {
        $res_data = $this->upload->data();
        $img_url = base_url("client_images/".$res_data['file_name']);
        $udata['link'] = $img_url;
        $this->load->model('media_content');
        $id = $this->media_content->insert_entry($udata);
      }
      $this->session->set_userdata('last_tab', "media_content");
      redirect('admin/media#pan_'.$_POST['cat']);
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function edit_media_name() {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $this->load->model('media_content');
      $this->media_content->update_entry(array('name'=> $_POST['value']), array('id'=>$_POST['pk']));
      // echo var_dump($_POST);
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function remove_media_content($id) {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $this->load->model('media_content');

      $m = $this->media_content->get_by_id($id);

      $this->media_content->remove_entry($id);
      $this->session->set_userdata('last_tab', "media_content");
      redirect('admin/media#pan_'.$m->cat);
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function blog($post_id = -1) {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $data['menu_item'] = "blog";
      $this->load->model('blog_post');
      $data['posts'] = $this->blog_post->get_list();
      if($post_id > 0) {
        $data['post'] = $this->blog_post->get_entry_by_id($post_id);
      }
      render_page($this, 'admin_blog_home', $data, array(), true);
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function submit_post($id = NULL) {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $blog_post = $_POST;
      $this->load->model('blog_post');
      if($id == NULL) {
        $blog_post['post_by'] = $user->id;
        $pid = $this->blog_post->insert_entry($blog_post);
      } else {
        $pid = $id;
        $this->blog_post->update_entry($blog_post, array('id'=>$id));
      }
      redirect("admin/blog/".$pid);

    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function remove_post($id = NULL) {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      if($id == NULL) {
        echo "Invalid action.";
      } else {
        $this->load->model('blog_post');
        $this->blog_post->remove_entry($id);
        redirect('admin/blog');
      }
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function community()
  {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $data['menu_item'] = "community";
      $this->load->model('community');
      $data['communities'] = $this->community->get_list();
      render_page($this, 'admin_community_home', $data, array(), true);
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function add_community_category()
  {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $name = "COMM_CAT_".time()."_".rand(10000, 99999);
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
      
      echo var_dump($udata);
      if(!$this->upload->do_upload('icon_file')) {
        $error = array('error' => $this->upload->display_errors());
        echo var_dump($error);
      } else {
        $res_data = $this->upload->data();

        $config['image_library'] = 'gd2';
        $config['source_image'] = "/client_images/".$res_data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']   = 155;
        $config['height'] = 155;

        $this->load->library('image_lib', $config); 

        $this->image_lib->resize();


        $img_url = base_url("client_images/".$res_data['file_name']);
        $udata['icon'] = $img_url;
        $udata['name'] = $_POST['name'];
        $udata['small_desc'] = $_POST['small_desc'];
        $this->load->model('community');
        $id = $this->community->insert_entry($udata);
      }
      redirect('admin/community');
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function comm_details($id, $tab = "post", $sub_id = NULL) {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $data['menu_item'] = "community";
      $this->load->model('community');
      $this->load->model('community_post');
      $this->load->model('community_discussion');
      $data['community'] = $this->community->get_entry_by_id($id);
      $data['posts'] = $this->community_post->get_entry(array('c_id'=>$id));
      $data['discussions'] = $this->community_discussion->get_entry(array('c_id'=>$id));
      if($tab == "post" && isset($sub_id)) {
        $data['post'] = $this->community_post->get_entry_by_id($sub_id);
      }
      if($tab == "discussion" && isset($sub_id)) {
        $data['discussion'] = $this->community_discussion->get_entry_by_id($sub_id);
      }
      $data['active_tab'] = $tab;
      // $data['bread_crum'] = array('Community'=> site_url('admin/community'));
      render_page($this, 'admin_community_details', $data, array(), true);
    }
  }

  public function del_community($id) {
    $this->load->model("community");
    $this->community->remove_entry($id);
    redirect('admin/community');
  }

  public function comm_post($comm, $id = NULL)
  {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $community_post = $_POST;
      $community_post['user'] = $user->id;
      $community_post['c_id'] = $comm;
      $this->load->model('community_post');
      if($id == NULL) {
        $pid = $this->community_post->insert_entry($community_post);
      } else {
        $pid = $id;
        $this->community_post->update_entry($community_post, array('id'=>$id));
      }
      redirect("admin/comm_details/".$comm);
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function remove_comm_post($id) {
    $this->load->model('community_post');
    $post = $this->community_post->get_entry_by_id($id);
    $c_id = $post->c_id;
    $this->community_post->remove_entry($id);
    redirect('admin/comm_details/'.$c_id);
  }

// for discussion
  public function comm_discussion($comm, $id = NULL)
  {
    $user = $this->session->userdata('user');
    if($user != NULL && $user->is_admin == 1) {
      $community_post = $_POST;
      $community_post['user'] = $user->id;
      $community_post['c_id'] = $comm;
      $this->load->model('community_discussion');
      if($id == NULL) {
        $pid = $this->community_discussion->insert_entry($community_post);
      } else {
        $pid = $id;
        $this->community_discussion->update_entry($community_post, array('id'=>$id));
      }
      redirect("admin/comm_details/".$comm."/discussion");
    } else {
      if($user == NULL) {
        redirect('admin/login');
      } else {
        $this->session->set_userdata('admin_error', get_message('admin_error_not_allowed'));
        redirect('admin/admin_error');
      }
    }
  }

  public function remove_comm_discussion($id) {
    $this->load->model('community_discussion');
    $post = $this->community_discussion->get_entry_by_id($id);
    $c_id = $post->c_id;
    $this->community_discussion->remove_entry($id);
    redirect('admin/comm_details/'.$c_id."/discussion");
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php 


Hemantbhai R boraniya -



*/