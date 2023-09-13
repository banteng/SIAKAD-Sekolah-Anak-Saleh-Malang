<?php
use Restserver\Libraries\REST_Controller;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

//class Rest extends REST_Controller {
class Rest extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        //$this->load->model('rest_ws_model');        
    }
    
    public function coba(){
        error_reporting(1);
		$nom_recuiring=0;
		$jj=file_get_contents('php://input');
		$dt=json_decode($jj);
        if($dt){
			$nis=$dt->NIS;
			$nis=(int)$nis;
			$merchant=$dt->Merchants;
			$datetime= $dt->DateTime;
            $trap=0;
            $q=$this->db->query("SELECT * FROM view_siswa WHERE NIS='$nis'");
            if($q->num_rows()>0){
                $q3=$this->db->query("SELECT * FROM tb_enroll_spp WHERE NIS='$nis'");
                if($q3->num_rows()>0){
                    $nom=$q3->row();
                    if($nom->NOMINAL_SPP>0){
                        $datasiswa=$q->row();
                        $pjn=strlen($nis);
                        if($pjn>15)
                        $data['NIM']= substr($nis,0,15);
                        else
                        $data['NIM']= str_pad($nis,15,0,STR_PAD_LEFT);
                        $q2=$this->db->query("SELECT * FROM tb_enroll_kelas WHERE SISWA='$nis' GROUP BY SISWA, TAHUN_AKTIF ORDER BY TAHUN_AKTIF ASC");
                        if($q2->num_rows()>0){
                            $bulanbayar=array(7,8,9,10,11,12,1,2,3,4,5,6);
                            $enroll=$q2->result();
                            if($merchant=="6010")
                            {
                                $pj=strlen($datasiswa->NAMA_SISWA);
                                if($pj>30)
                                $data['Nama']= substr($datasiswa->NAMA_SISWA,0,30);
                                else
                                $data['Nama']= str_pad($datasiswa->NAMA_SISWA,30);
                                $data['DetailTagihan']=array();
                                foreach($enroll AS $e){
                                    $tahunjalan=substr($e->TAHUN_AKTIF,0,4);
                                    $tahun=$tahunjalan;
                                    for($loopbul=0;$loopbul<12;$loopbul++){
                                        if($bulanbayar[$loopbul]==1){
                                            $tahun=(string)($tahun+1);
                                        }
                                        $q2=$this->db->query("SELECT * FROM tb_pembayaran_spp WHERE NIS='$nis' AND BULAN='$bulanbayar[$loopbul]' AND TAHUN='$tahun' ORDER BY TAHUN,BULAN ASC");
                                        if($q2->num_rows()==0){
                                            if($trap==0){
                                                array_push($data['DetailTagihan'],array('Tahun'=>$tahun,'Semester'=>$bulanbayar[$loopbul],'KodeTagihan'=>'SPP','NmTagihan'=>'SPP ','Amount'=>$nom->NOMINAL_SPP));
                                                $trap++;
                                            }
                                        }
                                    }
                                }
                                $data['Status']['isError']="False";
                                $data['Status']['ResponseCode']="00";
                                $data['Status']['ErrorDesc']="Success";
                            } else { //non-ATM
                                $pj=strlen($datasiswa->NAMA_SISWA);
                                if($pj>30)
                                $data['Nama']= substr($datasiswa->NAMA_SISWA,0,30);
                                else
                                $data['Nama']= str_pad($datasiswa->NAMA_SISWA,30);
                                $data['DetailTagihan']=array();
                                foreach($enroll AS $e){
                                    $tahunjalan=substr($e->TAHUN_AKTIF,0,4);
                                    $tahun=$tahunjalan;
                                    for($loopbul=0;$loopbul<12;$loopbul++){
                                        if($bulanbayar[$loopbul]==1){
                                            $tahun=(string)($tahun+1);
                                        }
                                        $q2=$this->db->query("SELECT * FROM tb_pembayaran_spp WHERE NIS='$nis' AND BULAN='$bulanbayar[$loopbul]' AND TAHUN='$tahun' ORDER BY TAHUN,BULAN ASC");
                                        if($q2->num_rows()==0){
                                            array_push($data['DetailTagihan'],array('Tahun'=>$tahun,'Semester'=>$bulanbayar[$loopbul],'KodeTagihan'=>'SPP','NmTagihan'=>'SPP ','Amount'=>$nom->NOMINAL_SPP));
                                        }
                                    }
                                }
                                $data['Status']['isError']="False";
                                $data['Status']['ResponseCode']="00";
                                $data['Status']['ErrorDesc']="Success";
                            }
                        } else { //belum enroll
                            
                        }
                    } else { //belum setting biayane
                        $data['Status']['isError']="True";
                        $data['Status']['ResponseCode']="12";
                        $data['Status']['ErrorDesc']="SPP belum disetting";
                    }
                } else { //belum setting biayane
                    $data['Status']['isError']="True";
                    $data['Status']['ResponseCode']="12";
                    $data['Status']['ErrorDesc']="SPP belum disetting";
                }
            } else { //salah NIS
                $data['Status']['isError']="True";
                $data['Status']['ResponseCode']="12";
                $data['Status']['ErrorDesc']="Siswa Tidak Terdaftar";
            }
        } else { //Salah format
            $data['Status']['isError']="True";
            $data['Status']['ResponseCode']="12";
            $data['Status']['ErrorDesc']="Format salah";
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }
    
    public function inquiry(){
        error_reporting(1);
		$nom_recuiring=0;
		//$jj=file_get_contents('php://input');
		//$dt=json_decode($jj);
        //$dt=$this->input->get();
        $nis=$this->input->get("NIM");
        if($nis){
			//$nis=$dt->NIS;
			$nis=(int)$nis;
			$merchant=$this->input->get("Merchant");
			$datetime= $this->input->get("DateTime");
            $trap=0;
            $q=$this->db->query("SELECT * FROM view_siswa WHERE NIS='$nis'");
            if($q->num_rows()>0){
                $q3=$this->db->query("SELECT * FROM tb_enroll_spp WHERE NIS='$nis'");
                if($q3->num_rows()>0){
                    $nom=$q3->row();
                    if($nom->NOMINAL_SPP>0){
                        $datasiswa=$q->row();
                        $pjn=strlen($nis);
                        //if($pjn>15)
                        $data['NIM']= substr($nis,0,15);
                        //else
                        //$data['NIM']= str_pad($nis,15,0,STR_PAD_LEFT);
                        $q2=$this->db->query("SELECT * FROM tb_enroll_kelas WHERE SISWA='$nis' GROUP BY SISWA, TAHUN_AKTIF ORDER BY TAHUN_AKTIF ASC");
                        if($q2->num_rows()>0){
                            $bulanbayar=array(7,8,9,10,11,12,1,2,3,4,5,6);
                            $enroll=$q2->result();
                            if($merchant!="6010")
                            {
                                $pj=strlen($datasiswa->NAMA_SISWA);
                                if($pj>30)
                                $data['Nama']= substr($datasiswa->NAMA_SISWA,0,30);
                                else{
                                $data['Nama']= $datasiswa->NAMA_SISWA;
                                //$data['Nama']= str_pad($datasiswa->NAMA_SISWA,30);
                                }
                                $jm=0;
                                $data['DetailTagihan']=array();
                                foreach($enroll AS $e){
                                    $idkelas=$e->ID_KELAS;
                                    $tahunjalan=substr($e->TAHUN_AKTIF,0,4);
                                    $tahun=$tahunjalan;
                                    for($loopbul=0;$loopbul<12;$loopbul++){
                                        if($bulanbayar[$loopbul]==1){
                                            $tahun=(string)($tahun+1);
                                        }
                                        $q4=$this->db->query("SELECT * FROM tb_pembayaran_spp WHERE NIS='$nis' AND BULAN='$bulanbayar[$loopbul]' AND TAHUN='$tahun' ORDER BY TAHUN,BULAN ASC");
                                        if($q4->num_rows()==0){
                                            if($trap==0){
                                                array_push($data['DetailTagihan'],array('Tahun'=>$tahun,'Semester'=>sprintf("%03d",$bulanbayar[$loopbul]),'KodeTagihan'=>'SYA','NmTagihan'=>'SYA ','Amount'=>str_pad($nom->NOMINAL_SPP,15,0,STR_PAD_LEFT)));
                                                $trap++;
                                                $jm++;
                                            }
                                        }
                                    }
                                }
                                $data['JumlahTagihan']=$jm;
                                $q5=$this->db->query("SELECT * FROM tb_kelas WHERE ID='$idkelas'");
                                if($q5->num_rows()>0){
                                    $data['ProgramStudy']=$q5->row()->NAMA_KELAS;
                                } else {
                                    $data['ProgramStudy']="-";
                                }
                                $data['Status']['isError']="False";
                                $data['Status']['ResponseCode']="00";
                                $data['Status']['ErrorDesc']="Success";
                            } else { //non-ATM
                                $pj=strlen($datasiswa->NAMA_SISWA);
                                if($pj>30)
                                    $data['Nama']= substr($datasiswa->NAMA_SISWA,0,30);
                                else{
                                    $data['Nama']= $datasiswa->NAMA_SISWA;
                                }
                                $data['DetailTagihan']=array();
                                $jm=0;
                                foreach($enroll AS $e){
                                    $idkelas=$e->ID_KELAS;
                                    $tahunjalan=substr($e->TAHUN_AKTIF,0,4);
                                    $tahun=$tahunjalan;
                                    for($loopbul=0;$loopbul<12;$loopbul++){
                                        if($bulanbayar[$loopbul]==1){
                                            $tahun=(string)($tahun+1);
                                        }
                                        $q2=$this->db->query("SELECT * FROM tb_pembayaran_spp WHERE NIS='$nis' AND BULAN='$bulanbayar[$loopbul]' AND TAHUN='$tahun' ORDER BY TAHUN,BULAN ASC");
                                        if($q2->num_rows()==0){
                                            array_push($data['DetailTagihan'],array('Tahun'=>$tahun,'Semester'=>sprintf("%03d",$bulanbayar[$loopbul]),'KodeTagihan'=>'SYA','NmTagihan'=>'SYA ','Amount'=>str_pad($nom->NOMINAL_SPP,15,0,STR_PAD_LEFT)));
                                            $jm++;
                                        }
                                    }
                                }
                                $data['JumlahTagihan']=$jm;
                                $q5=$this->db->query("SELECT * FROM tb_kelas WHERE ID='$idkelas'");
                                //echo $this->db->last_query();
                                if($q5->num_rows()>0){
                                    $data['ProgramStudy']=$q5->row()->NAMA_KELAS;
                                } else {
                                    $data['ProgramStudy']="-";
                                }
                                $data['Status']['isError']="False";
                                $data['Status']['ResponseCode']="00";
                                $data['Status']['ErrorDesc']="Success";
                            }
                        } else { //belum enroll
                             $data['Status']['isError']="True";
                            $data['Status']['ResponseCode']="12";
                            $data['Status']['ErrorDesc']="Siswa Tidak Terdaftar di Tahun Aktif";
                        }
                    } else { //belum setting biayane
                        $data['Status']['isError']="True";
                        $data['Status']['ResponseCode']="12";
                        $data['Status']['ErrorDesc']="SPP belum disetting";
                    }
                } else { //belum setting biayane
                    $data['Status']['isError']="True";
                    $data['Status']['ResponseCode']="12";
                    $data['Status']['ErrorDesc']="SPP belum disetting";
                }
            } else { //salah NIS
                $data['Status']['isError']="True";
                $data['Status']['ResponseCode']="12";
                $data['Status']['ErrorDesc']="Siswa Tidak Terdaftar";
            }
        } else { //Salah format
            $data['Status']['isError']="True";
            $data['Status']['ResponseCode']="12";
            $data['Status']['ErrorDesc']="Format salah";
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }
    
    public function payment(){
        error_reporting(1);
		$nom_recuiring=0;
		$jj=file_get_contents('php://input');
		$dt=json_decode($jj);
        $qt=$this->db->query("SELECT * FROM tb_tahun_aktif WHERE ID='1'")->row();
        $tahunaktif=$qt->TAHUN.$qt->SEMESTER;
        $now=date("Y-m-d");
        //print_r($dt); exit();
        if($dt){
			$nis=$dt->NIM;
			$nis=(int)$nis;
			//$merchant=$dt->MerchantsType;
			//$datetime= $dt->DateTime;
            $jml=$dt->JumlahTagihan;
            $trap=0;
            $q=$this->db->query("SELECT * FROM view_siswa WHERE NIS='$nis'");
            if($q->num_rows()>0){
                $datasiswa=$q->row();
                $q2=$this->db->query("SELECT * FROM tb_enroll_kelas WHERE SISWA='$nis' GROUP BY SISWA, TAHUN_AKTIF ORDER BY TAHUN_AKTIF DESC");
                $enroll=$q2->row();
                $idkelas=$enroll->ID_KELAS;
                $q3=$this->db->query("SELECT * FROM tb_enroll_spp WHERE NIS='$nis'");
                if($q3->num_rows()>0){
                    $nom=$q3->row();
                    if($nom->NOMINAL_SPP>0){
                        $pjn=strlen($nis);
                        if($dt->DetailTagihan){
                            foreach($dt->DetailTagihan AS $detail){
                                $tahunbayar=$detail->Tahun;
                                $bulanbayar=(int)$detail->Semester;
                                $kodebayar=$detail->KodeTagihan;
                                $nominal=(int)$detail->Amount;
                                $qqq=$this->db->query("SELECT * FROM tb_pembayaran_spp WHERE NIS='$nis' AND BULAN='$bulanbayar' AND TAHUN='$tahunbayar' ORDER BY TAHUN,BULAN ASC");
                                if($qqq->num_rows()==0){
                                    $this->db->query("INSERT INTO tb_pembayaran_spp (NIS,BULAN,TAHUN,NOMINAL,TAHUNAKTIF,TANGGAL,STATUS) VALUES ('$nis','$bulanbayar','$tahunbayar','$nominal','$tahunaktif','$now','1')");
                                    $id=$this->db->insert_id();
                                } else {
                                    
                                }
                            }
                        }
                        $data['KodeVoucher'] = $id;
                        $data['DateTime'] = date("Y-m-d H:i:s");
                        $data['NIM']= substr($nis,0,15);
                        $data['Nama'] = $datasiswa->NAMA_SISWA;
                        $q5=$this->db->query("SELECT * FROM tb_kelas WHERE ID='$idkelas'");
                        //echo $this->db->last_query();
                        if($q5->num_rows()>0){
                            $data['ProgramStudy']=$q5->row()->NAMA_KELAS;
                        } else {
                            $data['ProgramStudy']="-";
                        }
                        /*
                         *  "KodeVoucher": "10", 10 Digit Alphanumeric (di-generate )
                            "DateTime": "2015-11-02 10:56:41",
                            "NIM": "000001510109332",
                            "Nama": "DINI PERMATA PUTRI",
                            "ProgramStudy": "S1 - Akuntansi",
                            "Status": {
                              "IsError": "False",
                              "ResponseCode": "00",
                              "ErrorDesc": "Success"
                            }
                         */
                        $data['Status']['isError']="False";
                        $data['Status']['ResponseCode']="00";
                        $data['Status']['ErrorDesc']="Success";
                    } else { //Tidak ada biayane
                        $data['Status']['isError']="True";
                        $data['Status']['ResponseCode']="12";
                        $data['Status']['ErrorDesc']="SPP belum disetting";
                    }
                } else { //belum setting biayane
                    $data['Status']['isError']="True";
                    $data['Status']['ResponseCode']="12";
                    $data['Status']['ErrorDesc']="SPP belum disetting";
                }
            } else { //salah NIS
                $data['Status']['isError']="True";
                $data['Status']['ResponseCode']="12";
                $data['Status']['ErrorDesc']="Siswa Tidak Terdaftar";
            }
        } else { //Salah format
            $data['Status']['isError']="True";
            $data['Status']['ResponseCode']="12";
            $data['Status']['ErrorDesc']="Format salah";
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }
    
    public function reversal(){
        error_reporting(1);
		$nom_recuiring=0;
		$jj=file_get_contents('php://input');
		$dt=json_decode($jj);
        $qt=$this->db->query("SELECT * FROM tb_tahun_aktif WHERE ID='1'")->row();
        $tahunaktif=$qt->TAHUN.$qt->SEMESTER;
        $now=date("Y-m-d");
        //print_r($dt); exit();
        if($dt){
			$nis=$dt->NIM;
			$nis=(int)$nis;
			//$merchant=$dt->MerchantsType;
			//$datetime= $dt->DateTime;
            $jml=$dt->JumlahTagihan;
            $trap=0;
            $q=$this->db->query("SELECT * FROM view_siswa WHERE NIS='$nis'");
            if($q->num_rows()>0){
                $datasiswa=$q->row();
                $q2=$this->db->query("SELECT * FROM tb_enroll_kelas WHERE SISWA='$nis' GROUP BY SISWA, TAHUN_AKTIF ORDER BY TAHUN_AKTIF DESC");
                $enroll=$q2->row();
                $idkelas=$enroll->ID_KELAS;
                $q3=$this->db->query("SELECT * FROM tb_enroll_spp WHERE NIS='$nis'");
                if($q3->num_rows()>0){
                    $nom=$q3->row();
                    if($nom->NOMINAL_SPP>0){
                        $pjn=strlen($nis);
                        if($dt->DetailTagihan){
                            foreach($dt->DetailTagihan AS $detail){
                                $tahunbayar=$detail->Tahun;
                                $bulanbayar=(int)$detail->Semester;
                                $kodebayar=$detail->KodeTagihan;
                                $nominal=(int)$detail->Amount;
                                $qqq=$this->db->query("SELECT * FROM tb_pembayaran_spp WHERE NIS='$nis' AND BULAN='$bulanbayar' AND TAHUN='$tahunbayar' ORDER BY TAHUN,BULAN ASC");
                                if($qqq->num_rows()>0){
                                    $this->db->query("DELETE FROM tb_pembayaran_spp WHERE NIS='$nis' AND BULAN='$bulanbayar' AND TAHUN='$tahunbayar'");
                                } else {
                                    //not found
                                }
                            }
                        }
                        $data['NIM']= substr($nis,0,15);
                        $data['Nama'] = $datasiswa->NAMA_SISWA;
                        $q5=$this->db->query("SELECT * FROM tb_kelas WHERE ID='$idkelas'");
                        //echo $this->db->last_query();
                        if($q5->num_rows()>0){
                            $data['ProgramStudy']=$q5->row()->NAMA_KELAS;
                        } else {
                            $data['ProgramStudy']="-";
                        }
                        $data['Status']['isError']="False";
                        $data['Status']['ResponseCode']="00";
                        $data['Status']['ErrorDesc']="Success";
                    } else { //Tidak ada biayane
                        $data['Status']['isError']="True";
                        $data['Status']['ResponseCode']="12";
                        $data['Status']['ErrorDesc']="SPP belum disetting";
                    }
                } else { //belum setting biayane
                    $data['Status']['isError']="True";
                    $data['Status']['ResponseCode']="12";
                    $data['Status']['ErrorDesc']="SPP belum disetting";
                }
            } else { //salah NIS
                $data['Status']['isError']="True";
                $data['Status']['ResponseCode']="12";
                $data['Status']['ErrorDesc']="Siswa Tidak Terdaftar";
            }
        } else { //Salah format
            $data['Status']['isError']="True";
            $data['Status']['ResponseCode']="12";
            $data['Status']['ErrorDesc']="Format salah";
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }
	
	public function tagihan_post()
    {
        error_reporting(1);
		$nom_recuiring=0;
		$jj=file_get_contents('php://input');
		$dt=json_decode($jj);
		//$now=$this->system_model->getViewKontrolData();
        //$k=substr($now->SEMESTER,4);
        $data['Status']['isine']="$df";
        $data['Status']['isError']="True";
        $data['Status']['ResponseCode']="12";
        $data['Status']['ErrorDesc']="Format salah2";
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        exit();
		if($dt){
			$nim=$dt->NIM;
			$nim=(int)$nim;
			$merchant=$dt->MerchantsType;
			$datetime= $dt->DateTime;
			$datamhs = $this->rest_ws_model->cekMahasiswa($nim);
			$tagihan = $this->rest_ws_model->tagihanMahasiswa($nim);
			$transaksi = $this->rest_ws_model->transaksiMahasiswa($nim);
			$data['NIM']= $nim;
			$pjn=strlen($nim);
			if($pjn>15)
			$data['NIM']= substr($nim,0,15);
			else
			$data['NIM']= str_pad($nim,15,0,STR_PAD_LEFT);
			if($merchant=="6010")
			{
				if($datamhs){
					$pj=strlen($datamhs->NAMA_MAHASISWA);
					if($pj>30)
					$data['Nama']= substr($datamhs->NAMA_MAHASISWA,0,30);
					else
					$data['Nama']= str_pad($datamhs->NAMA_MAHASISWA,30);
					$pjp=strlen($datamhs->NAMA_PRODI);
					//echo $k;exit();
					$periode = $this->rest_ws_model->getPeriodeKeuBySmt($k);
					
					if($tagihan){
						$pjp=strlen($tagihan->ID);
						if($pjp>20)
							$data['ProgramStudy']= substr($tagihan->ID,0,20);
						else
							$data['ProgramStudy']= str_pad($tagihan->ID,20,0,STR_PAD_LEFT);
						$tag=json_decode($tagihan->DETAIL);
						$kod=json_decode($tagihan->DETAIL_KODE);
								$jml=count($tag);
								$jml_tagihan=($jml-1)/2;
								
								$dibayar="";
								$jml_tag_hitung=0;
								$data['DetailTagihan']=array();
								$t=0;
								$arrnama=array();
								//print_r($kod); exit();
								foreach($tag AS $kk){
									
									$temp=$this->rest_ws_model->getDetailTagihanById($tagihan->ID);
									$nama=$tag[$t]->nama;
									$kodenya=$kod[$t];
									$tahun=substr($tagihan->TAHUN_SEMESTER,0,4);
									$semester=str_pad(substr($tagihan->TAHUN_SEMESTER,4,1),3,0,STR_PAD_LEFT);
									//$kode=$tag[$t]->nama;
									$kode=$tag[$t]->kode;
									//echo "123123";exit();
									//echo $tag[$t]->nominal;
									//exit();
									//$dibayar=$this->rest_ws_model->getSudahDibayarByNimNama($nim,$kodenya,$tag[$t]->nominal);
									$dibayar=$this->rest_ws_model->getSudahDibayarByNimNamaTahunSmt($nim,$kodenya,$tag[$t]->nominal,$tahun);
									//echo $this->db->last_query()."<br>";
									//$lll=$this->rest_ws_model->getSudahDibayarByNimNama($nim,$kode,123);
									//echo "asdasda"; exit();
									//$dibayar=$this->rest_ws_model->getCoba(1,2,3);
									//echo $nim."-".$kode."-".$tag[$t]->nominal."<br>";
									//print_r($dibayar);echo "<br>";
									if($dibayar){
										$sisa=0; //lunas
									} else {
                                        if($kodenya!="SPP"){
                                        $sisa_db=$this->rest_ws_model->getSudahDibayarHitungByNimNamaTahunSmt($nim,$kodenya,$tag[$t]->nominal,$tahun);
										$sisa=str_pad((($sisa_db)),12,0,STR_PAD_LEFT);
                                        } else {
                                            $sisa=str_pad((($tag[$t]->nominal)),12,0,STR_PAD_LEFT);
                                        }
                                        //$sisa=str_pad((($dibayar)),12,0,STR_PAD_LEFT);
                                        //$sisa=$dibayar;
									}
									if($sisa>0){
										//echo $tag[($t)]->nama."==".$tag[($t)]->nominal."<br>";
										 if($tag[($t)]->rec == '1'){
											
											$nom_recuiring += $tag[($t)]->nominal;
											array_push($arrnama,$tag[($t)]->nama);
										} else {
											//$nama=$this->rest_ws_model->getDetailByKodeBank($kodenya);
											$nama=$this->rest_ws_model->getDetailKodeBank($kodenya);
											if($nama){
												//$nama=strtoupper(substr($kode,0,3));
												array_push($data['DetailTagihan'],array('Tahun'=>$tahun,'Semester'=>$semester,'KodeTagihan'=>$kodenya,'NmTagihan'=>$nama,'Amount'=>$sisa));
											} else {
												$nama=strtoupper(substr($kode,0,3));
												array_push($data['DetailTagihan'],array('Tahun'=>$tahun,'Semester'=>$semester,'KodeTagihan'=>$kodenya,'NmTagihan'=>$kode,'Amount'=>$sisa));
											}
											$jml_tag_hitung++;
										}
									}
									$t++;
								}
								//echo $nom_recuiring; //exit();
								//print_r($data); exit();
								
								$cek_i=0;
								if($periode){ 
									$bulan = generate_options_months();
									$temp=$this->rest_ws_model->getDetailTagihanById($tagihan->ID_TRANSAKSI);								
									foreach($periode as $vp){
										$cekRec = $this->rest_ws_model->getRecuiringByIDTagihanPeriode($temp->ID, $vp->BULAN);
										if($cekRec==NULL){
											$sekarang = date_create(date("Y-m-d"));
											//$sekarang = date_create("2017-12-11");
											$j_tempo = date_create($vp->BULAN);
											$jarak = date_diff($sekarang, $j_tempo);
											if($vp->ID == 1){                                                        
												$ss = $jarak->format("%r%a");
												if($ss >= 0){
													$yes = 1;
												}
											}
											$denda = $jarak->format("%r%a");
											if($denda < 0){
												$j_denda = 50000;
											}else{
												$j_denda = 0;
											}
											$cek_i++;
											$tahunsaja=substr($vp->BULAN,0,4);
											$bulansaja=substr($vp->BULAN,5,2);
											$pecah=ceil($nom_recuiring/6);											
											$tot=str_pad(($pecah+$j_denda),12,0,STR_PAD_LEFT);
											if($arrnama[0])
												$nama = $arrnama[0];
											array_push($data['DetailTagihan'],array('Tahun'=>$tahunsaja,'Semester'=>sprintf("%03d",$bulansaja),'KodeTagihan'=>'SPP','NmTagihan'=>$nama,'Amount'=>$tot));
											$jml_tag_hitung++;
										}		
									} 
								}
								
								//print_r($data); exit();
						
						$data['JumlahTagihan']= $jml_tag_hitung;
								
						if($jml_tag_hitung>0){
							$data['Status']['isError']="False";
							$data['Status']['ResponseCode']="00";
							$data['Status']['ErrorDesc']="Success";
						}
						else {
							$data['Status']['isError']="True";
							$data['Status']['ResponseCode']="07";
							$data['Status']['ErrorDesc']="Tagihan Sudah Terbayar";                
						}
					} else {
						$data['Status']['isError']="True";
						$data['Status']['ResponseCode']="03";
						$data['Status']['ErrorDesc']="Tidak Ada Tagihan";                
					}
				} else {
					$data['Status']['isError']="True";
					$data['Status']['ResponseCode']="12";
					$data['Status']['ErrorDesc']="Mhs Tidak Terdaftar";
				}
			} else {
				if($datamhs){
					$pj=strlen($datamhs->NAMA_MAHASISWA);
					if($pj>30)
					$data['Nama']= substr($datamhs->NAMA_MAHASISWA,0,30);
					else
					$data['Nama']= str_pad($datamhs->NAMA_MAHASISWA,30);
					$pjp=strlen($datamhs->NAMA_PRODI);
					
					$periode = $this->rest_ws_model->getPeriodeKeu();
					
					if($tagihan){
						$pjp=strlen($tagihan->ID);
						if($pjp>20)
							$data['ProgramStudy']= substr($tagihan->ID,0,20);
						else
							$data['ProgramStudy']= str_pad($tagihan->ID,20,0,STR_PAD_LEFT);
						$tag=json_decode($tagihan->DETAIL);
						$kod=json_decode($tagihan->DETAIL_KODE);
								$jml=count($tag);
								$jml_tagihan=($jml-1)/2;
								
								$dibayar="";
								$jml_tag_hitung=0;
								$data['DetailTagihan']=array();
								$t=0;
								$arrnama=array();
								
								foreach($tag AS $kk){
									
									$temp=$this->rest_ws_model->getDetailTagihanById($tagihan->ID);
									$nama=$tag[$t]->nama;
									$kodenya=$kod[$t];
									$tahun=substr($tagihan->TAHUN_SEMESTER,0,4);
									$semester=str_pad(substr($tagihan->TAHUN_SEMESTER,4,1),3,0,STR_PAD_LEFT);
									//$kode=$tag[$t]->nama;
									$kode=$tag[$t]->kode;
									//echo "123123";exit();
									//echo $tag[$t]->nominal;
									//exit();
									$dibayar=$this->rest_ws_model->getSudahDibayarByNimNamaTahunSmt($nim,$kode,$tag[$t]->nominal,$tahun);
									//$lll=$this->rest_ws_model->getSudahDibayarByNimNama($nim,$kode,123);
									//echo "asdasda"; exit();
									//$dibayar=$this->rest_ws_model->getCoba(1,2,3);
									if($dibayar){
										$sisa=0;
									} else {
										$sisa=str_pad((($tag[($t)]->nominal)),12,0,STR_PAD_LEFT);
									}
									if($sisa>0){
										 if($tag[($t)]->rec == '1'){
											$nom_recuiring += $tag[($t)]->nominal;
											array_push($arrnama,$tag[($t)]->nama);
										} else {
											
										}
									}
									$t++;
								}
								
								$cek_i=0;
								if($periode){ 
									$bulan = generate_options_months();
									$temp=$this->rest_ws_model->getDetailTagihanById($tagihan->ID_TRANSAKSI);								
									foreach($periode as $vp){
										$cekRec = $this->rest_ws_model->getRecuiringByIDTagihanPeriode($temp->ID, $vp->BULAN);
										if($cekRec==NULL){
											$sekarang = date_create(date("Y-m-d"));
											//$sekarang = date_create("2017-12-11");
											$blnskr=date("m");
											$thnskr=date("Y");
											//$per=explode("-",$vp->BULAN);
											$j_tempo = date_create($vp->BULAN);
											$jarak = date_diff($sekarang, $j_tempo);
											if($vp->ID == 1){                                                        
												$ss = $jarak->format("%r%a");
												if($ss >= 0){
													$yes = 1;
												}
											}
											$denda = $jarak->format("%r%a");
											if($denda < 0){
												$j_denda = 50000;
											}else{
												$j_denda = 0;
											}
											$cek_i++;
											$tahunsaja=substr($vp->BULAN,0,4);
											$bulansaja=substr($vp->BULAN,5,2);
											$pecah=ceil($nom_recuiring/6);
											//echo $nom_recuiring; exit();
											$tot=str_pad(($pecah+$j_denda),12,0,STR_PAD_LEFT);
											if($arrnama[0])
												$nama = $arrnama[0];
											else
												$nama = "SPP bulan ".getBulan($bulansaja)." ".$tahunsaja;
											if($bulansaja==($blnskr) && $tahunsaja==$thnskr){
												array_push($data['DetailTagihan'],array('Tahun'=>$tahunsaja,'Semester'=>sprintf("%03d",$bulansaja),'KodeTagihan'=>'SPP','NmTagihan'=>$nama,'Amount'=>$tot));
												$jml_tag_hitung++;
											}
										}		
									} 
								}
						
						$data['JumlahTagihan']= $jml_tag_hitung;
								
						if($jml_tag_hitung>0){
							$data['Status']['isError']="False";
							$data['Status']['ResponseCode']="00";
							$data['Status']['ErrorDesc']="Success";
						}
						else {
							$data['Status']['isError']="True";
							$data['Status']['ResponseCode']="07";
							$data['Status']['ErrorDesc']="Tagihan Sudah Terbayar";                
						}
					} else {
						$data['Status']['isError']="True";
						$data['Status']['ResponseCode']="03";
						$data['Status']['ErrorDesc']="Tidak Ada Tagihan";                
					}
				} else {
					$data['Status']['isError']="True";
					$data['Status']['ResponseCode']="12";
					$data['Status']['ErrorDesc']="Mhs Tidak Terdaftar";
				}
			}
		} else {
				$data['Status']['isine']="$df";
				$data['Status']['isError']="True";
				$data['Status']['ResponseCode']="12";
				$data['Status']['ErrorDesc']="Format salah2";
			}
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }
	
	function payment_post()
    {
		date_default_timezone_set("Asia/Jakarta");
		$tgl=date("Y-m-d");
		$bulan = generate_options_months();
        //$dt=$this->post('payment');
        //$dt=json_decode($dt);
		$jj=file_get_contents('php://input');
		$dt=json_decode($jj);
        $nim=$dt->NIM;        
        $nim=(int)$nim;
        $nama=$dt->Nama;
        $jml_tagihan=(int)$dt->JumlahTagihan;
		$datetime=date("Y-m-d H:i:s");
        $detail_tagihan = $dt->DetailTagihan;
        $transaction = (int)$dt->ProgramStudy; 
        $temp="";
        $jml_bayar=0;
        $temp_baru="";
        $tagihanLama=$this->rest_ws_model->getTagihanById($transaction);
		$setting = $this->rest_ws_model->getSettingKeu();
		$kontrol = $this->system_model->getViewKontrolData();
        $tag=json_decode($tagihanLama->DETAIL);
        //$tag=explode("#",$tagihanLama->DETAIL);
        $jml_tagihan_detail=count($tag);
        $vo="";
        for ($i=0; $i < (int)$jml_tagihan; $i++) {
			$trapNama=$detail_tagihan[$i]->KodeTagihan;
			$nominalKirim=$detail_tagihan[$i]->Amount;
			$tahunKirim=$detail_tagihan[$i]->Tahun;
			$semesterKirim=$detail_tagihan[$i]->Semester;
			//print_r($detail_tagihan[$i]);
			//exit();
            if($tagihanLama->DETAIL){
				if($trapNama=="SPP"){
						$noms = $nominalKirim;						
						$sekarang = date_create($tgl);
						$bl=($tahunKirim."-".sprintf("%02d",$semesterKirim).'-10');
						$j_tempo = date_create($bl);
						$interval = date_diff($sekarang, $j_tempo);
						$int = $interval->format("%r%a");                        
						$nama = "Pembayaran ".$trapNama." Bulan : ".$bulan[substr($semesterKirim,1,2)]." ".$tahunKirim;
						if($int < 0){
							$denda = $setting->DENDA_RECUIRRING;
							$status = '2';
						}else{
							$denda = 0;
							$status = '1';
						}
						
						if($vo){
							$insertTransK = $this->rest_ws_model->insertTransaksiKreditVoucher($nama,$nim,$noms,$tgl,$kontrol->SEMESTER,$vo);							
						} else {
							$insertTransK = $this->rest_ws_model->insertTransaksiKredit($nama,$nim,$noms,$tgl,$kontrol->SEMESTER);
							$vo=$insertTransK;
							$this->rest_ws_model->updateTransaksiKredit($insertTransK);
						}
						$insertRecuirring = $this->rest_ws_model->updateTagihanRecuirring($tgl,$bl,$transaction,$noms,$denda,$status,$kontrol->SEMESTER,$nim,$vo);                        						
				} else {
					$nama = "Pembayaran ".$trapNama." ".$tahunKirim;						
					if($vo){
						$insertTransK = $this->rest_ws_model->insertTransaksiKreditVoucher($nama,$nim,$nominalKirim,$tgl,$kontrol->SEMESTER,$vo);						
					} else {
						//$insertTransK = $this->rest_ws_model->insertTransaksiKredit($nama,$nim,$noms,$tgl,$kontrol->SEMESTER);
						$insertTransK = $this->rest_ws_model->insertTransaksiKredit($nama,$nim,$nominalKirim,$tgl,$kontrol->SEMESTER);
						$vo=$insertTransK;
						$this->rest_ws_model->updateTransaksiKredit($insertTransK);
					}
					
				}
				if($vo){
					$pjkv=strlen($vo);
					if($pjkv>11)
						$data['KodeVoucher']= substr($vo,0,11);		    
					else
						$data['KodeVoucher']= str_pad($vo,11);
				} else {
					$data['KodeVoucher']= str_pad($vo,11);
				}
				$skrg=date("Y-m-d H:i:s");
				$data['DateTime']= $skrg;
				
				$data['NIM']=$nim;
				$data['Nama']=$dt->Nama;
				
				if($transaction>20)
					$data['ProgramStudy']= substr($transaction,0,20);
				else
					$data['ProgramStudy']= str_pad($transaction,20,0,STR_PAD_LEFT);
				
				$data['DateTime']= "$datetime";
				$data['Status']['isError']="False";
				$data['Status']['ResponseCode']="00";
				$data['Status']['ErrorDesc']="Success"; 
			}
		}
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }
    
    function reversal_post()
    {
        //$dt=$this->post('reversal');
        //$dt=json_decode($dt);		
		$jj=file_get_contents('php://input');
		$dt=json_decode($jj);
		error_reporting(0);
		if($dt->NIM && $dt->ProgramStudy && $dt->KodeVoucher){
			$nim=$dt->NIM;        
			$nim=(int)$nim;
			$nama=$dt->Nama;
			$prodi=(int)$dt->ProgramStudy;
			$id_transaksi=(int)$dt->KodeVoucher;
			//$transaction=$dt->TransactionId;        
			//$detail_tagihan = $dt->DetailTagihan;
			$temp="";
			$jml_bayar=0;
			$temp_baru="";
			
			//Ambil Data
			$tagihanUpdate=$this->rest_ws_model->getRecurringByVoucher($id_transaksi);
			$transaksiHapus=$this->rest_ws_model->getTransaksiByVoucher($id_transaksi);
			//echo $prodi."-".$id_transaksi."<br>";
			//print_r($tagihanUpdate);
			//echo "<br>";
			//print_r($transaksiHapus);
			//exit();
			$datamhs = $this->rest_ws_model->cekMahasiswa($nim);
			$pjn=strlen($nim);
			if($pjn>15)
			$data['NIM']= substr($nim,0,15);
			else
			$data['NIM']= str_pad($nim,15,0,STR_PAD_LEFT);
			
			date_default_timezone_set("Asia/Jakarta");
			$skrg=date("Y-m-d H:i:s");                        
			
			if($datamhs){            
				$data['Nama']= $datamhs->NAMA_MAHASISWA;
				$pjp=strlen($transaction);
			if($pjp>20)
			$data['ProgramStudy']= substr($prodi,0,20);
			else
			$data['ProgramStudy']= str_pad($prodi,20,0,STR_PAD_LEFT);
			if($transaksiHapus){
					if($tagihanUpdate != FALSE){
						//$this->rest_ws_model->insertDetailTagihanWithDetail($nim,$jml_bayar,$tglnya[0],$temp,$transaction);
						$this->rest_ws_model->deleteDetailTransaksi($id_transaksi); 
						$this->rest_ws_model->updateRecurringByVoucher($id_transaksi);
						//$data['KodeVoucher']= substr(md5($nim."-".$datetime),0,15);
						//$data['DateTime']= $datetime;
						$data['Status']['isError']="False";
						$data['Status']['ResponseCode']="00";
						$data['Status']['ErrorDesc']="Success";
					} else {
						$data['Status']['isError']="True";
						$data['Status']['ResponseCode']="11";
						$data['Status']['ErrorDesc']="Transaksi tidak ada atau sudah direversal"; 
					}                
				} else {
					$data['Status']['isError']="True";
					$data['Status']['ResponseCode']="03";
					$data['Status']['ErrorDesc']="Tidak Ada Tagihan";                
				}
			} else {
				$data['Status']['isError']="True";
				$data['Status']['ResponseCode']="12";
				$data['Status']['ErrorDesc']="Mhs Tidak Terdaftar";
			}
		} else {
			$data['Status']['isError']="True";
			$data['Status']['ResponseCode']="12";
			$data['Status']['ErrorDesc']="Mhs Tidak Terdaftar";
		}
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }
    
}