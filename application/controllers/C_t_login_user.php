<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_t_login_user extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_t_login_user');
  }



  public function index()
  {
    $data = [
      "c_t_login_user" => $this->m_t_login_user->select(),
      "title" => "User List",
      "description" => "Data user yang akan login"
    ];
    $this->render_backend('template/backend/pages/t_login_user', $data);
  }


  public function delete($id)
  {
    $data = array(
        'UPDATED_BY' => $this->session->userdata('username'),
        'MARK_FOR_DELETE' => TRUE
    );
    $this->m_t_login_user->update($data, $id);
    
    $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Success!</strong> Data Berhasil DIhapus!</p></div>');
    redirect('/c_t_login_user');
  }

  public function undo_delete($id)
  {
    $data = array(
        'UPDATED_BY' => $this->session->userdata('username'),
        'MARK_FOR_DELETE' => FALSE
    );
    $this->m_t_login_user->update($data, $id);
    
    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Dikembalikan!</strong></p></div>');
    redirect('/c_t_login_user');
  }



  function tambah()
  {
   
    $username = ($this->input->post("username"));
    $name = ($this->input->post("name"));
    $password1 = ($this->input->post("password1"));
    $password1c = ($this->input->post("password1c"));


    //Dikiri nama kolom pada database, dikanan hasil yang kita tangkap nama formnya.
    if ($password1 != $password1c or $password1 == '') {
      $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Gagal Membuat User Baru!</strong> Silahkan Mengulang!</p></div>');
    } 

    else {
      $data = array(
        'USERNAME' => $username,
        'PASSWORD' => $password1,
        'NAME' => $username,
       
        'CREATED_BY' => $this->session->userdata('username'),
        'UPDATED_BY' => '',
        'MARK_FOR_DELETE' => FALSE
      );

      $this->m_t_login_user->tambah($data);

      $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Ditambahkan!</strong></p></div>');
    }

    redirect('c_t_login_user');
  }






  public function edit_action()
  {
    $id = $this->input->post("id");








    $name = ($this->input->post("name"));
    if ($level_user_id != '') {
      $data = array(
        
        'NAME' => $name,
        'UPDATED_BY' => $this->session->userdata('username')
      );
      $this->m_t_login_user->update($data, $id);
      $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Diupdate!</strong></p></div>');
    } else {
      $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Gagal Update!</strong> Periksa Ulang Password</p></div>');
    }

    redirect('/c_t_login_user');
  }
}
