<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tk extends CI_Controller {

	public function index()
	{
		$this->load->view('tk/view_menu_v2');
	}
}
