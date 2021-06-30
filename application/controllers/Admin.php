<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Database');
    }


    public function staff()
    {
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
            $ses = $this->session->userdata('credentials');
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
            if ($ses[1] == "admin") {
                $data["mobil"] = $this->Database->getData("mobil");
                $data["pemilik"] = $this->Database->getData("staff_garasi");
                $data["level"] = "admin";
            }
            $this->load->view('include/head', $data);
            $this->load->view('page/admin_staffgarasi', $data);
        endif;
    }

    public function penyewa()
    {
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
            $ses = $this->session->userdata('credentials');
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
            if ($ses[1] == "admin") {
                $data["penyewa"] = $this->Database->getData("penyewa");
                $data["level"] = "admin";
            }
            $this->load->view('include/head', $data);
            $this->load->view('page/admin_penyewa', $data);
        endif;
    }

    public function promo()
    {
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
            $ses = $this->session->userdata('credentials');
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
            if ($ses[1] == "admin") {
                $data["promo"] = $this->Database->getData("promo");
                $data["mobil"] = $this->Database->getData("mobil");
                $data["level"] = "admin";
            }
            $this->load->view('include/head', $data);
            $this->load->view('page/admin_promo', $data);
        endif;
    }

    public function tambah_promo()
    {
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
            $ses = $this->session->userdata('credentials');
            $data['user'] =  $ses[0];
            if ($ses[1] == "admin") {
                $data = [
                    'id_mobil' => $this->input->post('mobil'),
                    'id_admin' => $data['user']['id'],
                    'kode_promo' => $this->input->post('kode_promo'),
                    'diskon' => $this->input->post('diskon'),
                    'deskripsi' => $this->input->post('deskripsi')
                ];
                $this->Database->insert("promo", $data);
                redirect(base_url('admin/promo'));
            }
        endif;
    }

    public function change_status()
    {
        $id  = $this->input->post('id_staff');
        $data = [
            'status' => $this->input->post('status')
        ];
        $this->Database->update("staff_garasi", $data, $id);
        redirect(base_url('admin/staff'));
    }

    public function reject_status($id)
    {
        $data = [
            'status' => "REJECT"
        ];
        $this->Database->update("staff_garasi", $data, $id);
        redirect(base_url('admin/staff'));
    }

    public function approve_status($id)
    {
        $data = [
            'status' => "AKTIF"
        ];
        $this->Database->update("staff_garasi", $data, $id);
        redirect(base_url('admin/staff'));
    }

    public function delete_staff($id)
    {
        $this->Database->delete("staff_garasi", $id);
        redirect(base_url('admin/staff'));
    }

    public function confirm_payment()
    {
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
            $ses = $this->session->userdata('credentials');
            $data['user'] =  $ses[0];
            $n = explode(' ', $ses[0]["nama_lengkap"]);
            $data["nama_dipisah"] = $n;
            $foto = '';
            for ($x = 0; $x <= 1; $x++) {
                $foto .= substr($n[$x], 0, 1);
            }
            $data["foto_profile"] = $foto;
            /* 
                Pengecekan LEVEL User (Penyewa, Staff Garasi, atau Admin)
            */
            if ($ses[1] == "admin") {
                $con['conditions'] = array(
                    'status' => 2,
                );
                $orderan = $this->Database->getData("riwayat", $con);
                $data['database'] = $orderan;
                $data["level"] = "admin";
            }
            /*
                Return tampilan beserta variable $data
            */
            $this->load->view('include/head', $data);
            $this->load->view('page/admin_confirmpayment', $data);
        endif;
    }

    public function confirm($id)
    {
        $order = explode("-", $id);
        if ($order[0] == "DEPO") {
            $data = [
                'status' => 0
            ];
            $this->Database->update("riwayat", $data, $order[1]);
            $con['conditions'] = array(
                'id' => $order[1],
            );
            $orderan = $this->Database->getData("riwayat", $con);
            if ($orderan[0]['tipe_riwayat'] == 'Topup') {
                $con['conditions'] = array(
                    'id' => $orderan[0]['id_penyewa'],
                );
                $penyewa = $this->Database->getData("penyewa", $con);
                $update_saldo = $penyewa[0]['saldo'] + $orderan[0]['harga'];
                $update = [
                    'saldo' => $update_saldo
                ];
                $this->Database->update("penyewa", $update, $penyewa[0]['id']);
            } else if ($orderan[0]['tipe_riwayat'] == 'Withdraw') {
                $con['conditions'] = array(
                    'id' => $orderan[0]['id_staff'],
                );
                $staff = $this->Database->getData("staff_garasi", $con);
                $update_saldo = $staff[0]['saldo'] + $orderan[0]['harga'];
                $update = [
                    'saldo' => $update_saldo
                ];
                $this->Database->update("staff_garasi", $update, $staff[0]['id']);
            }
        }
        redirect(base_url('confirm-payment'));
    }
}
