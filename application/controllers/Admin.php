<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit', '4000M');

defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
          $this->load->model('M_data');
          // //format tanggal dan waktu
          // date_default_timezone_set('Asia/Jakarta');
          // //cek session
          // //cek session jika tidak sama dengan yang telah login
          // //alihkan ke halaman login
          // if ($this->session->userdata('status') != 'telahLogin') {
          //      redirect(base_url() . 'login?alert=belumLogin');
          // }
     }


     public function index()
     {
          $this->load->view('template_admin/v_header');
          $this->load->view('admin/v_dashboard');
          $this->load->view('template_admin/v_footer');
     }




     //
     public function upload_pod()
     {

          $this->load->view('template_admin/v_header');
          $this->load->view('admin/v_upload_pod');
          $this->load->view('template_admin/v_footer');
     }
     //upload POD aksi
     public function upload_pod_aksi()
     {
          $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          if (isset($_FILES['file_pod']['name']) && in_array($_FILES['file_pod']['type'], $file_mimes)) {
               $arr_file = explode('.', $_FILES['file_pod']['name']);
               $extension = end($arr_file);
               if ('csv' == $extension) {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
               } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
               }
               $spreadsheet = $reader->load($_FILES['file_pod']['tmp_name']);
               $sheetData = $spreadsheet->getActiveSheet()->toArray();

               foreach ($sheetData as $x  => $excel) {
                    //skip judul table
                    if ($x <= 0) {
                         continue;
                    }
                    $data = array(
                         'pod_waybill'                => $excel['0'],
                         'pod_branch'                => $excel['4'],
                         'pod_delivery_courier'                => $excel['6'],
                         'pod_time'      => $excel['12'],
                    );
                    $this->m_data->insertData($data, 'pod');
               }


               $this->session->set_tempdata('import', 'Berhasil ', 15); # 10 means secods
               redirect(base_url('admin'));
          }
     }





     //
     public function upload_return()
     {

          $this->load->view('template_admin/v_header');
          $this->load->view('admin/v_upload_return');
          $this->load->view('template_admin/v_footer');
     }

     public function upload_return_aksi()
     {
          $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          if (isset($_FILES['file_return']['name']) && in_array($_FILES['file_return']['type'], $file_mimes)) {
               $arr_file = explode('.', $_FILES['file_return']['name']);
               $extension = end($arr_file);
               if ('csv' == $extension) {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
               } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
               }
               $spreadsheet = $reader->load($_FILES['file_return']['tmp_name']);
               $sheetData = $spreadsheet->getActiveSheet()->toArray();

               foreach ($sheetData as $x  => $excel) {
                    //skip judul table
                    if ($x <= 0) {
                         continue;
                    }
                    $data = array(
                         'return_waybill'                => $excel['0'],
                         'return_time'                   => $excel['8'],
                         'return_register_branch'        => $excel['9'],
                         'return_confirm_status'         => $excel['17'],
                    );
                    $this->m_data->insertData($data, 'return');
               }


               $this->session->set_tempdata('import', 'Berhasil ', 15); # 10 means secods
               redirect(base_url('admin'));
          }
     }

     public function upload_ssr()
     {

          $this->load->view('template_admin/v_header');
          $this->load->view('admin/v_upload_ssr');
          $this->load->view('template_admin/v_footer');
     }

     public function upload_ssr_aksi()
     {
          $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          if (isset($_FILES['file_ssr']['name']) && in_array($_FILES['file_ssr']['type'], $file_mimes)) {
               $arr_file = explode('.', $_FILES['file_ssr']['name']);
               $extension = end($arr_file);
               if ('csv' == $extension) {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
               } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
               }
               $spreadsheet = $reader->load($_FILES['file_ssr']['tmp_name']);
               $sheetData = $spreadsheet->getActiveSheet()->toArray();

               foreach ($sheetData as $x  => $excel) {
                    //skip judul table
                    if ($x <= 0) {
                         continue;
                    }
                    $data = array(
                         'ssr_waybill'                      => $excel['0'],
                         'ssr_income_city'                  => $excel['2'],
                         'ssr_scan_type'                    => $excel['3'],
                         'ssr_scan_destination'             => $excel['6'],
                         'ssr_input_departement'            => $excel['8'],
                         'ssr_recording_time'               => $excel['9'],
                         'ssr_operation_time'               => $excel['10'],
                    );
                    $this->m_data->insertData($data, 'ssr');
               }


               $this->session->set_tempdata('import', 'Berhasil ', 15); # 10 means secods
               redirect(base_url('admin'));
          }
     }

     public function php()
     {
          phpinfo();
     }
}/* End of file Admins.php */
