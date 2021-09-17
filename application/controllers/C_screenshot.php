<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_screenshot extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

   
  }

  public function index()
  {
    $screen = imagegrabscreen();
    if($screen)
    {
      $nameimg = 'photos/'.rand(1,99999).'screenshot.png';
      imagepng($screen,$nameimg);
    }
  }

  
}
