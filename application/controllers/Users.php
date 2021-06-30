<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Database');
    }

    public function login()
    {
        if (!$this->session->userdata('credentials')) :
            if ($this->input->post('email') && $this->input->post('password')) :
                $con['returnType'] = 'count';
                $con['conditions'] = array(
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                );
                $cek_user_admin = $this->Database->getData("admin", $con);
                $con['returnType'] = 'count';
                $con['conditions'] = array(
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                );
                $cek_user_user = $this->Database->getData("penyewa", $con);
                $con['returnType'] = 'count';
                $con['conditions'] = array(
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                );
                $cek_user_garasi = $this->Database->getData("staff_garasi", $con);
                if ($cek_user_admin == 1) {
                    $user_live = "admin";
                } else if ($cek_user_user == 1) {
                    $user_live = "penyewa";
                } else if ($cek_user_garasi == 1) {
                    $user_live = "staff_garasi";
                }
                if ($cek_user_admin == 1 || $cek_user_user == 1 || $cek_user_garasi == 1) :
                    $con['returnType'] = 'single';
                    $con['conditions'] = array(
                        'email' => $this->input->post('email'),
                    );
                    $info_akun = $this->Database->getData($user_live, $con);
                    $data['notif_sukses'] = 'Selamat menikmati Layanan Kami	.';
                    $this->session->set_userdata('credentials', array($info_akun, $user_live));
                    redirect(base_url());
                else :
                    $data['notif_error'] = 'Email/Password Salah mohon inputkan ulang.';
                    $this->load->view('auth/login', $data);
                endif;
            else :
                $this->load->view('auth/login');
            endif;
        else :
            redirect(base_url());
        endif;
    }

    public function register()
    {
        if (!$this->session->userdata('credentials')) :
            $data['web_config'] = $this->Database->getData("konfigurasi_web")[0];
            if ($this->input->post('nama') && $this->input->post('nik') && $this->input->post('sim') && $this->input->post('email') && $this->input->post('password')) :
                $con['returnType'] = 'count';
                $con['conditions'] = array(
                    'email' => $this->input->post('email'),
                );
                $cek_user = $this->Database->getData("penyewa", $con);
                if ($cek_user == 1) :
                    $data['notif_error'] = 'Email is already registered, please log in.';
                else :
                    $sql = array(
                        'nama_lengkap' => $this->input->post('nama'),
                        'nik' => $this->input->post('nik'),
                        'sim' => $this->input->post('sim'),
                        'saldo' => 0,
                        'email' => $this->input->post('email'),
                        'password' => md5($this->input->post('password')),
                    );
                    $insert = json_decode($this->Database->insert("penyewa", $sql));
                    if ($insert) :
                        $data['notif_sukses'] = 'Email registered successfully.';
                    else :
                        $data['notif_error'] = 'Error Insert.';
                    endif;
                endif;
                $this->load->view('auth/regis', $data);
            else :
                $this->load->view('auth/regis', $data);
            endif;
        else :
            redirect(base_url());
        endif;
    }

    public function register_staff()
    {
        if (!$this->session->userdata('credentials')) :
            $data['web_config'] = $this->Database->getData("konfigurasi_web")[0];
            if ($this->input->post('nama') && $this->input->post('nik') && $this->input->post('sim') && $this->input->post('email') && $this->input->post('password')) :
                $con['returnType'] = 'count';
                $con['conditions'] = array(
                    'email' => $this->input->post('email'),
                );
                $cek_user = $this->Database->getData("staff_garasi", $con);
                if ($cek_user == 1) :
                    $data['notif_error'] = 'Email is already registered, please log in.';
                else :
                    $sql = array(
                        'nama_lengkap' => $this->input->post('nama'),
                        'nik' => $this->input->post('nik'),
                        'sim' => $this->input->post('sim'),
                        'saldo' => 0,
                        'email' => $this->input->post('email'),
                        'password' => md5($this->input->post('password')),
                        'status' => "PENDING"
                    );
                    $insert = json_decode($this->Database->insert("staff_garasi", $sql));
                    if ($insert) :
                        $data['notif_sukses'] = 'Email registered successfully.';
                    else :
                        $data['notif_error'] = 'Error Insert.';
                    endif;
                endif;
                $this->load->view('auth/regis', $data);
            else :
                $this->load->view('auth/regis', $data);
            endif;
        else :
            redirect(base_url());
        endif;
    }
    /*
        Controllers Users/Riwayat
        
        Pendahuluan :
        User melihat semua data penyewa mobil terbaru hinggal terlama, dengan persyaratan sudah login/masuk ke dalam aplikasi.
        Fungsi ini merujuk kebutuhan fungsional <Lihat Riwayat Penyewa> dan <Lihat Riwayat Staff Garasi>

        Parameters :
        Method : GET
        $sess : array<string, array<string,mixed>>

        Return Values :
        Menampilkan Tampilan views/include/head
        Menampilkan Tampilan views/page/riwayat
        $data : array

    */
    public function riwayat()
    {
        /* 
            Pengecekan Session
        */
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
            $ses = $this->session->userdata('credentials');
            $data['user'] =  $ses[0];
            $data['sql'] =  $ses[1];
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
            if ($ses[1] == "penyewa") {
                /*
                    <Lihat Riwayat Penyewa>
                */
                $con['conditions'] = array(
                    'id_penyewa' => $ses[0]["id"],
                );
                $data["orderan"] = $this->Database->getData("riwayat", $con);
                $data["mobil"] = $this->Database->getData("mobil");
                $data["level"] = "Penyewa";
            } else if ($ses[1] == "admin") { } else if ($ses[1] == "staff_garasi") {
                /* 
                    <Lihat Riwayat Staff Garasi>
                */ }
            /*
                Return tampilan beserta variable $data
            */
            $this->load->view('include/head', $data);
            $this->load->view('page/riwayat', $data);
        endif;
    }

    /*
        Controllers Users/Invoice
        
        Pendahuluan :
        Pembayaran/Deposit Saldo akan mendapatkan rincian mulai dari tanggal melakukan pembayaran atau deposit, 
        id-order, nominal pembayaran yang sudah dibayar/harus dibayar.
        Fungsi ini merujuk kebutuhan fungsional <Tagihan>

        Parameters :
        Method : GET
        $sess : array<string, array<string,mixed>>

        Return Values :
        Menampilkan Tampilan views/include/head
        Menampilkan Tampilan views/page/invoice
        $data : array

    */
    public function invoice()
    {
        /* 
            Pengecekan Session
        */
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
            $ses = $this->session->userdata('credentials');
            $data['user'] =  $ses[0];
            $data['sql'] =  $ses[1];
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
            if ($ses[1] == "penyewa") {
                /* 
                    Mengambil data dari ID User (Penyewa)
                */
                $con['conditions'] = array(
                    'id_penyewa' => $ses[0]["id"],
                );
                $orderan = $this->Database->getData("riwayat", $con);
                $saldo = $this->Database->getData("saldo", $con);
                if ($saldo) :
                    $data['database'] = array_merge($orderan, $saldo);
                else :
                    $data['database'] = $orderan;
                endif;
                $data["mobil"] = $this->Database->getData("mobil");
                $data["level"] = "Penyewa";
            } else if ($ses[1] == "admin") { } else if ($ses[1] == "staff_garasi") {
                $con['conditions'] = array(
                    'id_staff' => $ses[0]["id"],
                );
                $data["database"] = $this->Database->getData("riwayat", $con);
                $data["level"] = "Staff Garasi";
            }
            /*
                Return tampilan beserta variable $data
            */
            $this->load->view('include/head', $data);
            $this->load->view('page/invoice', $data);
        endif;
    }

    public function password()
    {
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
            $ses = $this->session->userdata('credentials');
            $data['sql'] =  $ses[1];
            if ($this->input->post('oldpass') && $this->input->post('newpass') && $this->input->post('cpass')) :
                $old = md5($this->input->post('oldpass'));
                $new = md5($this->input->post('newpass'));
                $konfrim = md5($this->input->post('cpass'));
                if ($old == $ses[0]['password']) :
                    if ($new == $konfrim) :
                        $sql = array(
                            'password' => $konfrim,
                        );
                        $update = json_decode($this->Database->update($ses[1], $sql, $ses[0]['id']));
                        if ($update) :
                            redirect(base_url('logout'));
                        else :
                            $data['laporan'] = '<div class="alert alert-danger" role="alert">There is data that is still blank, please fill in first.</div>';
                        endif;
                    else :
                        $data['laporan'] = '<div class="alert alert-danger" role="alert">The new password is not the same as the confirmation password. Please retype it.</div>';
                    endif;
                else :
                    $data['laporan'] = '<div class="alert alert-danger" role="alert">Incorrect password, please enter correctly.</div>';
                endif;
            endif;
            $data['user'] =  $ses[0];
            $n = explode(' ', $ses[0]["nama_lengkap"]);
            $data["nama_dipisah"] = $n;
            $foto = '';
            for ($x = 0; $x <= 1; $x++) {
                $foto .= substr($n[$x], 0, 1);
            }
            $data["foto_profile"] = $foto;
            if ($ses[1] == "penyewa") {
                $con['returnType'] = 'count';
                $con['conditions'] = array(
                    'id_penyewa' => $ses[0]["id"],
                );
                $data["total_orderan"] = $this->Database->getData("riwayat", $con);
                $data["level"] = "Penyewa";
            } else if ($ses[1] == "admin") { } else if ($ses[1] == "staff_garasi") {
                $data["level"] = "Staff Garasi";
            }
            $this->load->view('include/head', $data);
            $this->load->view('auth/password', $data);
        endif;
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function profile()
    {
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
            $ses = $this->session->userdata('credentials');
            $data['sql'] =  $ses[1];
            if ($this->input->post('fname') && $this->input->post('lname') && $this->input->post('phone') && $this->input->post('address') && $this->input->post('city')) :
                $sql = array(
                    'nama_lengkap' => $this->input->post('fname') . ' ' . $this->input->post('lname'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'phone' => $this->input->post('phone'),
                );
                $update = json_decode($this->Database->update($ses[1], $sql, $ses[0]['id']));
                if ($update) :
                    $data['laporan'] = '<div class="alert alert-success" role="alert">The data has been updated successfully, make sure the data is valid.</div>';
                else :
                    $data['laporan'] = '<div class="alert alert-danger" role="alert">There is data that is still blank, please fill in first.</div>';
                endif;
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'id' => $ses[0]['id'],
                );
                $info_akun = $this->Database->getData($ses[1], $con);
                $this->session->set_userdata('credentials', array($info_akun, $ses[1]));
                $ses = $this->session->userdata('credentials');
            endif;
            $data['user'] =  $ses[0];
            $n = explode(' ', $ses[0]["nama_lengkap"]);
            $data["nama_dipisah"] = $n;
            $foto = '';
            for ($x = 0; $x <= 1; $x++) {
                $foto .= substr($n[$x], 0, 1);
            }
            $data["foto_profile"] = $foto;
            if ($ses[1] == "penyewa") {
                $con['returnType'] = 'count';
                $con['conditions'] = array(
                    'id_penyewa' => $ses[0]["id"],
                );
                $data["total_orderan"] = $this->Database->getData("riwayat", $con);
                $data["level"] = "Penyewa";
            } else if ($ses[1] == "admin") { } else if ($ses[1] == "staff_garasi") {
                $ses = $this->session->userdata('credentials');
                $data['sql'] =  $ses[1];
                if ($this->input->post('fname') && $this->input->post('lname')) :
                    $sql = array(
                        'nama_lengkap' => $this->input->post('fname') . ' ' . $this->input->post('lname'),
                    );
                    $update = json_decode($this->Database->update($ses[1], $sql, $ses[0]['id']));
                    if ($update) :
                        $data['laporan'] = '<div class="alert alert-success" role="alert">The data has been updated successfully, make sure the data is valid.</div>';
                    else :
                        $data['laporan'] = '<div class="alert alert-danger" role="alert">There is data that is still blank, please fill in first.</div>';
                    endif;
                    $con['returnType'] = 'single';
                    $con['conditions'] = array(
                        'id' => $ses[0]['id'],
                    );
                    $info_akun = $this->Database->getData($ses[1], $con);
                    $this->session->set_userdata('credentials', array($info_akun, $ses[1]));
                    $ses = $this->session->userdata('credentials');
                endif;
                $data["level"] = "Staff Garasi";
            }
            $this->load->view('include/head', $data);
            $this->load->view('auth/profile', $data);
        endif;
    }

    public function topup()
    {
        $id  = $this->input->post('id_penyewa');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
        $data = [
            'id_penyewa' => $id,
            'id_mobil' => null,
            'id_staff' => null,
            'tipe_riwayat' => 'Topup',
            'harga' => $this->input->post('nominal'),
            'service' => null,
            'pembayaran' => $this->input->post('pay'),
            'dibuat' => $tanggal,
            'status' => 2
        ];
        $this->Database->insert("riwayat", $data);
        redirect(base_url('invoice'));
    }

    public function tarik_saldo()
    {
        $id  = $this->input->post('id_staff');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d H:i:s');
        $data = [
            'id_staff' => $id,
            'id_mobil' => null,
            'id_penyewa' => null,
            'tipe_riwayat' => 'Withdraw',
            'harga' => -($this->input->post('nominal')),
            'service' => null,
            'pembayaran' => $this->input->post('pay'),
            'dibuat' => $tanggal,
            'status' => 2
        ];
        $this->Database->insert("riwayat", $data);
        redirect(base_url('invoice'));
    }

    public function kupon()
    {
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $kode = $this->input->post('kode');
            $con['conditions'] = array(
                'kode_promo' => $kode,
            );
            $orderan = $this->Database->getData("promo", $con);
            if ($orderan) {
                print json_encode(array("result" => 1, "content" => "Promotion successfully added", "price" => $orderan[0]['diskon']));
            } else {
                print json_encode(array("result" => 0, "content" => 'Promo code not found.'));
            }
        endif;
    }
}
