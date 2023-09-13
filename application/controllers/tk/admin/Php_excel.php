<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Php_excel extends CI_Controller {

	public $nama_tabel = 'poin';
    private $_template = "admin/template_admin/template_admin";

	public function __construct()
	{
		parent::__construct();
		$this->load->library("PHPExcel");
		$this->load->model("admin/admin_model");
	}

	public function index(){
        $data['title']  = "Gamma Poin - zonalistrik.com";
		$data['header'] = "Import Gamma Poin";

        $data['page']   = 'admin/import';
		$this->load->view($this->_template,$data);
	}

	public function import($success=""){
        $data['title']  = "Gamma Poin - zonalistrik.com";
		$data['header'] = "Import Gamma Poin";
		$data['output'] = "<h4>Sebelum mengupload, pastikan file anda berformat <strong>.xls/.xlsx</strong></h4>";
		$data['output'] .= form_open_multipart('admin/php_excel/do_upload');
		$form = array(
					'name'        => 'userfile',
					'style'       => 'position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=0);opacity:0;background-color:transparent;color:transparent;',
					'onchange'	=> "$('#upload-file-info').html($(this).val());"
				);
		$data['output'] .= "<div style='position:relative;'>";
		$data['output'] .= "<a class='btn btn-primary' href='javascript:;'>";
		$data['output'] .= "Browse… ".form_upload($form);
		$data['output'] .= "</a>";
		$data['output'] .= "&nbsp;";
		$data['output'] .= "<span class='label label-info' id='upload-file-info'></span>";
		$data['output'] .= "</div>";
		$data['output'] .= "<br>";
		$data['output'] .= form_submit('name', 'Go !', 'class = "btn btn-default"');
		$data['output'] .= form_close();
		if ($success) {
			$data['pesan'] = '<div class="alert alert-success alert-dismissible">';
			$data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
			$data['pesan'] .= '<h4><i class="icon fa fa-check"></i> Alert!</h4>';
			$data['pesan'] .= 'Success alert preview. This alert is dismissable.';
			$data['pesan'] .= '</div>';
		}
        print_r($data);die;
		$this->load->view('admin/import', $data, FALSE);
	}

	public function do_upload(){
		$config['upload_path'] = './upload/';
        $config['allowed_types'] = 'xlsx|xls|xlxs';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $filename = $upload_data['file_name'];
            $this->admin_model->upload_data($filename);
            unlink('./upload/'.$filename);
            redirect('php_excel/import/success','refresh');
		}
	}

	public function export(){ 
            //membuat objek
            $objPHPExcel = new PHPExcel();
            $data = $this->db->get($this->nama_tabel);

            // Nama Field Baris Pertama
        	$fields = $data->list_fields();
        	$col = 0;
	        foreach ($fields as $field)
	        {
	            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
	            $col++;
	        }
	 
	        // Mengambil Data
	        $row = 2;
	        foreach($data->result() as $data)
	        {
	            $col = 0;
	            foreach ($fields as $field)
	            {
	                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
	                $col++;
	            }
	 
	            $row++;
	        }
	        $objPHPExcel->setActiveSheetIndex(0);

            //Set Title
            $objPHPExcel->getActiveSheet()->setTitle('Gamma Poin');
 
            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //Header
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

            //Nama File
            header('Content-Disposition: attachment;filename="gamma-poin.xlsx"');

            //Download
            $objWriter->save("php://output");
 
        }

}

/* End of file Phpexcel.php */
/* Location: ./application/controllers/Phpexcel.php */