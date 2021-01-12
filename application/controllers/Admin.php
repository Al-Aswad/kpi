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
}/* End of file Admins.php */
