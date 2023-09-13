<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paud extends CI_Controller {

	public function index()
	{
		$this->load->view('paud/view_menu_v2');
	}
}
