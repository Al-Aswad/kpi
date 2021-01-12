<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

     public function index()
     {
          $this->load->view('admin/v_dashboard');
     }
}/* End of file Admins.php */
