<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Database');
	}

	public function index()
	{
		if (!$this->session->userdata('credentials')) :
			$data["promo"] = $this->Database->getData("promo");
			$data["pemilik"] = $this->Database->getData("staff_garasi");
			$data["mobil"] = $this->Database->getData("mobil");
			$rekomendasi_by = array("jenis", "harga");
			$rekomendasi = array_rand($rekomendasi_by);
			$data["mobil_rekomendasi"] = $this->Database->urut_secara("mobil", "rand", $rekomendasi_by[$rekomendasi]);
			$this->load->view('include/head', $data);
			$this->load->view('welcome_message', $data);
		else :
			$data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
			$ses = $this->session->userdata('credentials');
			if ($ses[1] == "penyewa") {
				$data['user'] =  $ses[0];
				$n = explode(' ', $ses[0]["nama_lengkap"]);
				$foto = '';
				if (count($n) > 1) {
					$total = 1;
				} else {
					$total = count($n) - 1;
				}
				for ($x = 0; $x <= $total; $x++) {
					$foto .= substr($n[$x], 0, 1);
				}
				$con['conditions'] = array(
					'id_penyewa' => $ses[0]["id"],
				);
				$data["promo"] = $this->Database->getData("promo");
				$data["orderan"] = $this->Database->getData("riwayat", $con);
				$data["foto_profile"] = $foto;
				$data['level'] = "Penyewa";
				$data["pemilik"] = $this->Database->getData("staff_garasi");
				$datamobil['conditions'] = array(
					'status' => "Aktif",
				);
				$data["mobil"] = $this->Database->getData("mobil", $datamobil);
				$rekomendasi_by = array("jenis", "harga");
				$rekomendasi = array_rand($rekomendasi_by);
				$data["mobil_rekomendasi"] = $this->Database->urut_secara("mobil", "rand", $rekomendasi_by[$rekomendasi]);
				$this->load->view('include/head', $data);
				$this->load->view('page/dashboard_penyewa', $data);
			} else if ($ses[1] == "staff_garasi") {
				$data['user'] =  $ses[0];
				$n = explode(' ', $ses[0]["nama_lengkap"]);
				$foto = '';
				if (count($n) > 1) {
					$total = 1;
				} else {
					$total = count($n) - 1;
				}
				for ($x = 0; $x <= $total; $x++) {
					$foto .= substr($n[$x], 0, 1);
				}
				$data["foto_profile"] = $foto;
				$data['level'] = "Staff Garasi";
				$con['conditions'] = array(
					'id_staff' => $ses[0]["id"],
					'status' => 'Aktif',
				);
				$data["mobil"] = $this->Database->getData("mobil", $con);
				$orderan = $this->Database->getData("riwayat");
				$data['database'] = $orderan;
				$con['conditions'] = array(
					'id' => $data['database'][0]['id_penyewa'],
				);
				$data['penyewa'] = $this->Database->getData("penyewa", $con);
				$this->load->view('include/nav_staff', $data);
				$this->load->view('page/dashboard_staff', $data);
			} else if ($ses[1] == "admin") {
				$data['user'] =  $ses[0];
				$n = explode(' ', $ses[0]["nama_lengkap"]);
				$foto = '';
				if (count($n) > 1) {
					$total = 1;
				} else {
					$total = count($n) - 1;
				}
				for ($x = 0; $x <= $total; $x++) {
					$foto .= substr($n[$x], 0, 1);
				}
				$data["pemilik"] = $this->Database->getData("staff_garasi");
				$data["level"] = "admin";
				$data["foto_profile"] = $foto;
				$con['conditions'] = array(
					'status' => 'Aktif',
				);
				$data["mobil"] = $this->Database->getData("mobil", $con);
				$data["rating"] = $this->Database->average_rate();
				$this->load->view('include/nav_admin', $data);
				$this->load->view('page/admin_mobil', $data);
			}
		endif;
	}
}
