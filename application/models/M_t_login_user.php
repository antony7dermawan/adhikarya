<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_t_login_user extends CI_Model {
    
    

public function update($data, $id)
{
    $this->db->where('ID', $id);
    return $this->db->update('T_LOGIN_USER', $data);
}







  public function select()
  {
    $this->db->select("*");
    $this->db->from('T_LOGIN_USER');
    

    $this->db->order_by("ID", "asc");

    $akun = $this->db->get ();
    return $akun->result ();
  }

  public function delete($id)
  {
    $this->db->where('ID',$id);
    $this->db->delete('T_LOGIN_USER');
  }

  function tambah($data)
  {
        $this->db->insert('T_LOGIN_USER', $data);
        return TRUE;
  }

}


