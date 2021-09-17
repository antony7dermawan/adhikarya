<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_arduino_update_distance extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('m_t_video_capture');
  }

  public function index()
  {
    
   

  }

  public function update($distance)
  {
    $data = array(
      'DISTANCE' => $distance
    );
    $this->m_t_video_capture->update_distance($data);


  }





}
