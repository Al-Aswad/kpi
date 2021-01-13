<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{

     function cekLogin($table, $where)
     {
          return $this->db->get_where($table, $where);
     }
     function updateData($where, $data, $table)
     {
          $this->db->where($where);
          $this->db->update($table, $data);
     }
     //mengambil data
     function getData($table)
     {
          return $this->db->get($table);
     }
     //menyimpan data
     function insertData($data, $table)
     {
          $this->db->insert($table, $data);
     }
     //edit data
     function editData($where, $table)
     {
          return $this->db->get_where($table, $where);
     }
     //delete data
     function deleteData($where, $table)
     {
          $this->db->delete($table, $where);
     }
     //import data absen
     function importabsen($data)
     {
          // $this->db->table('absensi')->insert($data);
          $this->db->insert('absensi', $data);
     }
}

     /* End of file M_model.php */;
