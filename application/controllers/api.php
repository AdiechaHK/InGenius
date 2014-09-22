<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

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
    // echo "hello";
    render_page($this, "api_help");
  }

  public function get_media_cat($page = 1) {
    $data = array('status'=>"FAIL");
    $this->load->model('media_cat');
    $data['data'] = array('page'=> $page,
      'total_record'=> $this->media_cat->get_list_count(),
      'list'=> $this->media_cat->get_list_by_page($page));
    $data['status'] = "SUCCESS";
    echo json_encode($data);
  }

  public function get_media($cat, $type, $page = 1) {
    $data = array('status'=>"FAIL");
    $this->load->model('media_content');
    $data['data'] = array('page'=> $page,
      'total_record'=> $this->media_content->get_list_count(),
      'list'=> $this->media_content->get_list_by_cat_and_page($cat, $type, $page));
    $data['status'] = "SUCCESS";
    echo json_encode($data);
  }

  public function get_blog_post_list() {
    $this->load->model('blog_post');
    $data = $this->blog_post->get_list();
    echo json_encode(array('status'=>"SUCCESS", 'data'=>$data));
  }

  public function getCommunitiesList() {
    $this->load->model('community');
    $data = $this->community->get_list();
    echo json_encode(array('status'=>"SUCCESS", 'data'=>$data));
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */