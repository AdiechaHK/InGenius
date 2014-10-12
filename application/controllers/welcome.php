<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *base_url("public/img/user.png")
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$user = $this->session->userdata('user');
		$data['load_self'] = true;
		if($user != NULL) {
			$data['user'] = $user;
		}
		render_page($this, 'home', $data);
	}

	public function user()
	{
		$user = $this->session->userdata('user');
		if($user != NULL) {
			$data['load_self'] = true;
			$data['user'] = $user;
			client_page_render($this, 'user_profile', $data);
		} else {
			redirect('welcome');
			// client_page_render($this, 'user_login');
		}
	}

	public function user_form()
	{
		$user = $this->session->userdata('user');
		if($user != NULL) {
			$data['load_self'] = true;
			$data['user'] = $user;
			client_page_render($this, 'user_form', $data);
		} else {
			$data['user_error'] = "No user found or user session has been expired.";
			client_page_render($this, 'user_error', $data);
		}
	}

	public function media() {
		$data['load_self'] = true;
		$data['active_tab'] = "media";
		// $data['header_pre_title'] = "";
		$data['page_title'] = "MEDIA";
		$user = $this->session->userdata('user');
    $this->load->model('media_cat');
		$data['mcat_list'] = $this->media_cat->get_list();
		if($user != NULL) {
			$data['user'] = $user;
		} 
		client_page_render($this, 'media', $data);
	}

	public function blog($id = NULL) {
		$data['load_self'] = true;
		$data['active_tab'] = "blog";
		$user = $this->session->userdata('user');
		if($user != NULL) {
			$data['user'] = $user;
		} 
	    $this->load->model('blog_post');
		if($id != NULL) {
		    $this->load->model('blog_comment');
		    $this->load->model('blog_like');
		    $this->load->model('users');
    		$post_list = $this->blog_post->get_list();
    		$prev = null;
    		$next = null;
    		$tmp;
    		$found = false;
    		foreach ($post_list as $i => $row) {
    			# code...
    			if($next != null) {
    				break;
    			}
    			if($row->id == $id) {
    				$prev = $tmp;
    				$found = true;
    				continue;
    			}
    			if($found) {
    				$next = $row;
    			}
    			$tmp = $row;
    		}
    		if($next != null) {
    			$data['next'] = $next;
    		}
    		if($prev != null) {
    			$data['prev'] = $prev;
    		}
			$blog_post = $this->blog_post->get_entry_by_id($id);
			$data['blog_post'] = $blog_post;
			$data['blog_posted_by'] = $this->users->get_entry_by_id($blog_post->post_by);
			$data['comments'] = $this->blog_comment->get_blog_post_comment($id);
			$list = $this->blog_like->get_entry(array('blog_post'=>$id));
			$data['like_count'] = sizeof($list);
			$data['liked'] = 0;
			if($user != NULL) {
				foreach ($list as $like) {
					# code...
					if($like->user == $user->id) {
						$data['liked'] = 1;
						break;
					}
				}
			}
		} else {
			$result = $this->blog_post->get_last_ten_entries();
			foreach ($result as $key => $value) {
				# code...
				$id = $value->id;
			}
			redirect('welcome/blog/'.$id);
		}
    // $data['posts'] = $this->blog_post->get_list();
		client_page_render($this, 'blog', $data);
	}

	public function submit_blog_post($id = NULL) {

		echo var_dump($_POST);
	  //   $user = $this->session->userdata('user');

	  //   if(isset($user) && $user != NULL) {
			// $blog_post = $_POST;
			// $this->load->model('blog_post');
			// if($id == NULL) {
			// 	$blog_post['post_by'] = $user->id;
			// 	$pid = $this->blog_post->insert_entry($blog_post);
			// } else {
			// 	$pid = $id;
			// 	$this->blog_post->update_entry($blog_post, array('id'=>$id));
			// }
			// redirect("welcome/blog/".$pid);
	  //   }
	}



	public function blog_comment($id = NULL) {
		$user = $this->session->userdata('user');
		if($user != NULL && $id != NULL) {
			$insert = array('user' => $user->id,
					'blog_post'=> $id,
					'comment'=> $_POST['comment']);
			$this->load->model('blog_comment');
			$this->blog_comment->insert_entry($insert);
			redirect('welcome/blog/'.$id);
		} else {
			redirect('wwlcome/blog');
		}
	}

	public function blog_like($id = NULL) {
		$user = $this->session->userdata('user');
		if($user != NULL && $id != NULL) {
			$this->load->model('blog_like');
			$list = $this->blog_like->get_entry(array('blog_post'=>$id, 'user'=>$user->id));
			if(sizeof($list) == 0) {
				$insert = array('user' => $user->id,
						'blog_post'=> $id,
						'like'=> 1);
				$this->blog_like->insert_entry($insert);
			} else {
				foreach ($list as $key => $value) {
					# code...
					$this->blog_like->remove_entry($value->id);
				}
			}
			redirect('welcome/blog/'.$id);
		} else {
			redirect('welcome/blog');
		}
	}

	public function test() {
    $this->load->model('community');
		$user = $this->session->userdata('user');
    $data['test'] = $this->community->get_detail_list();
    // $data['test'] = $user;
		$this->load->view('pages/test', $data);	
	}

	public function community() {
		$data['load_self'] = true;
		$data['active_tab'] = "community";
		$data['page_title'] = "COMMUNITY";
		$user = $this->session->userdata('user');
		if($user != NULL) {
			$data['user'] = $user;
		} 
    $this->load->model('community');
    $data['communities'] = $this->community->get_detail_list($user != NULL?$user->id:NULL);
		client_page_render($this, 'community', $data);
	}

	public function media_cat_show($id)
	{
		$data['load_self'] = true;
		$data['active_tab'] = "media";
		$data['page_pre_title'] = "media";
		$this->load->model('media_cat');
		$mCat = $this->media_cat->get_entry_by_id($id);
		$data['page_title'] = $mCat->name;
		$user = $this->session->userdata('user');
		$this->load->model('media_content');
		$data['images'] = $this->media_content->get_list_by_cat($id, 0);
		$data['videos'] = $this->media_content->get_list_by_cat($id, 1);
		if($user != NULL) {
			$data['user'] = $user;
		} 
		client_page_render($this, 'media_detail', $data);
	}

	public function community_detail($id)
	{
		$data['load_self'] = true;
		$data['active_tab'] = "community";
		$data['page_pre_title'] = "COMMUNITY";
		$user = $this->session->userdata('user');
		if($user != NULL) {
			$data['user'] = $user;
		} 
		$this->load->model('community');
		$community = $this->community->get_entry_by_id($id);
		$data['community'] = $community;
		$data['page_title'] = $community->name;

		// echo var_dump($data);
		client_page_render($this, 'community_detail', $data);
	}

	public function community_post_list($community_id) {
		$data['load_self'] = true;
		$user = $this->session->userdata('user');
		$this->load->model('community_post');
		$this->load->model('community_like');
		$like = ($this->community_like->get_like($community_id, isset($user) && $user != false ? $user->id: false) != NULL);
		$data['posts'] = $this->community_post->get_entry_by_cid($community_id, $like);
		$data['title'] = "Posts";
		$data['detail_url'] = "welcome/community_post/";
		render_page($this, 'community_listing_page', $data);
	}

	public function community_post($id) {
		$data['load_self'] = true;
		$data['title'] = "Posts";
		$this->load->model('users');
		$this->load->model('community_post');
		$this->load->model('community_post_comment');
		$post = $this->community_post->get_entry_by_id($id);
		$data['post'] = $post;
		$data['comment_url'] = "welcome/community_post_comment/".$id;
		$data['comments'] = $this->community_post_comment->get_entry_by_post($post->id);
		$data['post_user'] = $this->users->get_entry_by_id($post->user);
		$data['back_link'] = array('title'=>"Back to list", "url"=> "welcome/community_post_list/".$post->c_id);
		render_page($this, 'community_show', $data);
	}

	public function community_post_comment($id = NULL) {
		$user = $this->session->userdata('user');
		if($user != NULL && $id != NULL) {
				$input = $_POST;
			$input['user'] = $user->id;
			$input['post_id'] = $id;
			$this->load->model('community_post_comment');
			$this->community_post_comment->insert_entry($input);
		}
		redirect("welcome/community_post/".$id);
	}

	public function community_debate_list($community_id) {
		$data['load_self'] = true;
		$user = $this->session->userdata('user');
		$this->load->model('community_discussion');
		$this->load->model('community_like');
		$like = ($this->community_like->get_like($community_id, isset($user) && $user != false ? $user->id: false) != NULL);
		// echo var_dump($user);
		$data['posts'] = $this->community_discussion->get_entry_by_cid($community_id, $like);
		$data['title'] = "Debates";
		$data['detail_url'] = "welcome/community_debate/";
		render_page($this, 'community_listing_page', $data);
	}

	public function community_debate($id) {
		$data['load_self'] = true;
		$data['title'] = "Posts";
		$this->load->model('users');
		$this->load->model('community_discussion');
		$this->load->model('community_discussion_comment');
		$post = $this->community_discussion->get_entry_by_id($id);
		$data['post'] = $post;
		$data['comment_url'] = "welcome/community_debate_comment/".$id;
		$data['comments'] = $this->community_discussion_comment->get_entry_by_post($post->id);
		$data['post_user'] = $this->users->get_entry_by_id($post->user);
		$data['back_link'] = array('title'=>"Back to list", "url"=> "welcome/community_debate_list/".$post->c_id);
		render_page($this, 'community_show', $data);
	}
	
	public function community_debate_comment($id) {
		$user = $this->session->userdata('user');
		if($user != NULL && $id != NULL) {
			$input = $_POST;
			$input['user'] = $user->id;
			$input['post_id'] = $id;
			$this->load->model('community_discussion_comment');
			$this->community_discussion_comment->insert_entry($input);
		}
		redirect("welcome/community_debate/".$id);
	}

	public function community_post_submition($comm, $id = NULL) {
    $user = $this->session->userdata('user');
    if($user != NULL) {
      $community_post['title'] = $_POST['title'];
      $community_post['description'] = $_POST['description'];
      $community_post['privacy'] = $_POST['post_privacy'];
      $community_post['active'] = 1;
      $community_post['user'] = $user->id;
      $community_post['c_id'] = $comm;
      $table = $_POST['post_type'];
      $this->load->model($table);
      if($id == NULL) {
        $pid = $this->$table->insert_entry($community_post);
      } else {
        $pid = $id;
        $this->$table->update_entry($community_post, array('id'=>$id));
      }
    } 
    redirect("welcome/community_detail/".$comm);
	}

	public function toggle_community_like($c_id) {
    $user = $this->session->userdata('user');
    if($user != NULL) {
			$this->load->model("community_like");
			$like = $this->community_like->get_like($c_id, $user->id);
			if($like != NULL) {
				$this->community_like->remove_entry($like->id);
			} else {
				$input = array(
					'community' => $c_id,
					'user' => $user->id);
				$this->community_like->insert_entry($input);
			}
		}
		redirect("welcome/community");
	}

	public function community_media_upload() {
		echo "<p id='json'>Hello friends</p>";
	}

	public function search() {
		client_page_render($this, 'search');
	}
}
// Kapur kachli, phudin hara, limbu, mari mithu, sanchar, aaduno ras
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */