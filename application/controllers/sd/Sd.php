<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sd extends CI_Controller {

	public function index()
	{
		$this->load->view('sd/view_menu_v2');
	}
}
