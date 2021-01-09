<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kpi extends CI_Controller
{
          public function index()
          {
                    $this->load->view('Dashboard/v_dashboard_kpi');
          }
}
