<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('get_message'))
{
  
  function get_message($key)
  {
    $messages = array();
    $messages['admin_error_not_allowed'] = "Sorry, you are not allowed to access this page.";
    $messages['admin_error_already_logedin'] = "You are already logged in.";
    $messages['admin_error_already_logedin_signup'] = "You are already logged in, you need to log out first for sign up.";
    return $messages[$key];
  }
}


if ( ! function_exists('render_page'))
{
  
  function render_page($controller, $name, $data = array(), $additional_module = array(), $admin_page = false)
  {
    $_additional_modules_info = array(
      'x-editable' => array(
        'css'=> array("bootstrap-editable"),
        'js' => array("bootstrap-editable.min")
        )
      /*
      'module_name'=> array(
        'css'=> array('css1', 'css2'),
        'js'=> array('js1', 'js2')
        )
      */
    );

    $css_list = array();
    $js_list = array();
    if(isset($data['load_self']) && $data['load_self']) {
      array_push($css_list, $name);
      array_push($js_list, $name);
    }
    foreach ($additional_module as $module) {
      if (array_key_exists($module, $_additional_modules_info)) {
        $module_details = $_additional_modules_info[$module];
        # adding css related to module;
        foreach ($module_details['css'] as $css) {
          array_push($css_list, $css);
        }
        # adding js related to module;
        foreach ($module_details['js'] as $js) {
          array_push($js_list, $js);
        }
      } else {
        // echo $module." module need to add in util helper";
      }

    }
    $controller->load->view('common/header', array('css'=> $css_list));
    if($admin_page) {
      $controller->load->view('common/admin_header', $data);
    }
    $controller->load->view('pages/'.$name, $data);
    $controller->load->view('common/footer', array('js'=> $js_list));
  }

}



if ( ! function_exists('client_page_render'))
{
  
  function client_page_render($controller, $name, $data = array(), $additional_module = array(), $side_bar = true)
  {
    $_additional_modules_info = array(
      'x-editable' => array(
        'css'=> array("bootstrap-editable"),
        'js' => array("bootstrap-editable.min")
        )
      /*
      'module_name'=> array(
        'css'=> array('css1', 'css2'),
        'js'=> array('js1', 'js2')
        )
      */
    );

    $css_list = array();
    $js_list = array();
    if(isset($data['load_self']) && $data['load_self']) {
      array_push($css_list, $name);
      array_push($js_list, $name);
    }
    foreach ($additional_module as $module) {
      if (array_key_exists($module, $_additional_modules_info)) {
        $module_details = $_additional_modules_info[$module];
        # adding css related to module;
        foreach ($module_details['css'] as $css) {
          array_push($css_list, $css);
        }
        # adding js related to module;
        foreach ($module_details['js'] as $js) {
          array_push($js_list, $js);
        }
      } else {
        // echo $module." module need to add in util helper";
      }

    }
    $header_special_data = array('next_page_link'=> getPageLink($name, "next"), 'previous_page_link'=> getPageLink($name, "prev"));
    $header_data = array_merge($data, $header_special_data);
    $controller->load->view('common/header', array('css'=> $css_list));
    // $controller->load->view('common/client_header', array_merge($data, $header_special_data));
    $controller->load->view('common/client_header_before_nav', $header_data);
    $controller->load->view('partials/navbar', $header_data);
    $controller->load->view('common/client_header_after_nav', $header_data);
    $controller->load->view('pages/'.$name, $data);
    if($side_bar) {
      $controller->load->view('common/client_sidebar', $data);
    }
    $controller->load->view('common/client_footer', $data);
    $controller->load->view('common/footer', array('js'=> $js_list));
  }

}

if ( ! function_exists('getPageLink'))
{
  
  function getPageLink($name, $type) {
    $list = array(
      "index",
      "blog",
      "media",
      "community",
      "user"
      );
    $index = array_search($name, $list);
    $index = $type == "next" ? ($index >= sizeof($list) - 1 ? 0: $index + 1) : ($index <= 0 ? sizeof($list) - 1 : $index - 1);
    return "welcome/".$list[$index];
  }
}
