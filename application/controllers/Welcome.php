<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        $data['title'] = "Sekolah Anak Saleh Malang";
		$this->load->view('view_menu_v2', $data);
	}
    
    public function coba()
	{
		$this->load->view('datatable');
	}
    
    public function hal404()
	{
		$this->load->view('404');
	}
}
