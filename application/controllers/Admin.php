<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

     public function index()
     {
          $this->load->view('template_admin/v_header');
          $this->load->view('admin/v_dashboard');
          $this->load->view('template_admin/v_footer');
     }

     public function upload_pod()
     {

          $this->load->view('template_admin/v_header');
          $this->load->view('admin/v_upload_pod');
          $this->load->view('template_admin/v_footer');
     }
     public function upload_return()
     {

          $this->load->view('template_admin/v_header');
          $this->load->view('admin/v_upload_return');
          $this->load->view('template_admin/v_footer');
     }
     public function upload_ssr()
     {

          $this->load->view('template_admin/v_header');
          $this->load->view('admin/v_upload_ssr');
          $this->load->view('template_admin/v_footer');
     }
}/* End of file Admins.php */
