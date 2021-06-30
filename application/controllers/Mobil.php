<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Database');
    }

    public function getDetail($url_view)
    {
        $con['conditions'] = array(
            'url_view' => $url_view,
        );
        $route_url = $this->Database->getData("mobil", $con);
        if ($route_url) {
            if ($this->session->userdata('credentials')) :
                $ses = $this->session->userdata('credentials');
                $data['user'] =  $ses[0];
                $n = explode(' ', $ses[0]["nama_lengkap"]);
                $foto = '';
                if (
                    count($n) > 1
                ) {
                    $total = 1;
                } else {
                    $total = count($n) - 1;
                }
                for ($x = 0; $x <= $total; $x++) {
                    $foto .= substr($n[$x], 0, 1);
                }
                $data["foto_profile"] = $foto;
                $data['level'] = "Penyewa";
            endif;
            $con['conditions'] = array(
                'id_mobil' => $route_url[0]['id'],
                'status' => 0,
            );
            $riwayat = $this->Database->getData("riwayat", $con);
            if ($riwayat) {
                $data['total_pemesanan'] = count($riwayat);
            } else {
                $data['total_pemesanan'] = 0;
            }
            $data['rate'] = $riwayat;
            $data['web_config'] = $this->Database->getData("konfigurasi_web", array('id' => 1));
            $data['data_mobil'] = $route_url[0];
            $data['penyewa'] = $this->Database->getData("penyewa");
            $this->load->view('include/head', $data);
            $this->load->view('page/detail_mobil', $data);
        } else {
            $this->load->view('page/error');
        }
    }

    public function Buy()
    {
        if (!$this->session->userdata('credentials')) :
            redirect(base_url('login'));
        else :
            $id_mobil = $this->input->post('id_mobil');
            // var_dump($id_mobil);
            // exit();
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
            $con['conditions'] = array(
                'id_penyewa' => $ses[0]["id"],
            );
            $data["orderan"] = $this->Database->getData("riwayat", $con);
            $data["foto_profile"] = $foto;
            $data['level'] = "Penyewa";
            $con['conditions'] = array(
                'id' => $id_mobil,
            );
            $route_url = $this->Database->getData("mobil", $con);
            if ($route_url) {
                if ($this->input->post('rentbysaldo')) {
                    var_dump("awawa");
                    exit();
                }
                $data['mobil'] = $route_url[0];
                $this->load->view('include/head', $data);
                $this->load->view('page/checkout', $data);
            } else {
                $this->load->view('page/error');
            }
        endif;
    }

    public function rate_car()
    {
        $id  = $this->input->post('id_sewa');
        $con['conditions'] = array(
            'id' => $id,
        );
        $riwayat = $this->Database->getData("riwayat", $con)[0];
        if ($riwayat) {
            $mobil = [
                'rate' => $this->input->post('rating'),
                'status' => 0,
                'note' => $this->input->post('note')
            ];
            $this->Database->update("riwayat", $mobil, $id);
            $data = [
                'full' => 0,
            ];
            $this->Database->update("mobil", $data, $riwayat['id_mobil']);
            redirect(base_url('history'));
        } else {
            redirect(show_404());
        }
    }

    public function cek()
    {
        if (!$this->session->userdata('credentials')) :
            redirect(show_404());
        else :
            if ($this->input->post('id_mobil') && $this->input->post('mulainya') && $this->input->post('harga') && $this->input->post('nama') && $this->input->post('service') && $this->input->post('alamat') && $this->input->post('sewanya') && $this->input->post('metode')) {
                $tgl1 = new DateTime($this->input->post('mulainya'));
                $tgl2 = new DateTime($this->input->post('sewanya'));
                $d = $tgl2->diff($tgl1)->days;
                $con['conditions'] = array(
                    'id' => $this->input->post('id_mobil'),
                );
                $riwayat = $this->Database->getData("mobil", $con)[0];
                if ($riwayat) {
                    $total_biaya = $d * $this->input->post('harga');
                    $con['conditions'] = array(
                        'id' => $riwayat['id_staff'],
                    );
                    $staff = $this->Database->getData("staff_garasi", $con)[0];
                    $ses = $this->session->userdata('credentials')[0];
                    $user = $this->Database->getData("penyewa", array("id" => $ses['id']));
                    if ($this->input->post('metode') == "Saldo") {
                        if ($user["saldo"] >= $total_biaya) {
                            $saldo_min = [
                                'saldo' => $user['saldo'] - $total_biaya,
                            ];
                            $this->Database->update("penyewa", $saldo_min, $user['id']);
                            $saldo_send = [
                                'saldo' => $staff['saldo'] + $total_biaya
                            ];
                            $this->Database->update("staff_garasi", $saldo_send, $staff['id']);
                            $data = [
                                'full' => 1
                            ];
                            $this->Database->update("mobil", $data, $this->input->post('id_mobil'));
                            $con['conditions'] = array(
                                'id' => $this->input->post('id_mobil'),
                            );
                            $mobil = $this->Database->getData("mobil", $con);
                            $md5view = md5("riwayatrental" . rand(000, 999));
                            $sql = array(
                                'id_mobil' => $this->input->post('id_mobil'),
                                'id_penyewa' => $user['id'],
                                'id_staff' => $mobil[0]['id_staff'],
                                'tipe_riwayat' => "Rent",
                                'alamat' => $this->input->post('alamat'),
                                'tanggal_mulai' => $this->input->post('mulainya'),
                                'tanggal_selesai' => $this->input->post('sewanya'),
                                'service' => $this->input->post('service'),
                                'pembayaran' => $this->input->post('metode'),
                                'harga' => $total_biaya,
                                'status' => 2,
                                'rate' => NULL,
                                'note' => NULL,
                                'id_url' => $md5view,
                                'dibuat' => date("Y-m-d"),
                            );
                            $this->Database->insert("riwayat", $sql);
                            redirect(base_url('invoice/' . $md5view));
                        } else {
                            redirect(base_url("cars/detail/" . $riwayat['url_view'] . "?error_type=saldo"));
                        }
                    } else if ($this->input->post('metode') == "COD") {
                        $data = [
                            'full' => 1
                        ];
                        $this->Database->update("mobil", $data, $this->input->post('id_mobil'));
                        $con['conditions'] = array(
                            'id' => $this->input->post('id_mobil'),
                        );
                        $mobil = $this->Database->getData("mobil", $con);
                        $md5view = md5("riwayatrental" . rand(000, 999));
                        $sql = array(
                            'id_mobil' => $this->input->post('id_mobil'),
                            'id_penyewa' => $user['id'],
                            'id_staff' => $mobil[0]['id_staff'],
                            'tipe_riwayat' => "Rent",
                            'alamat' => $this->input->post('alamat'),
                            'tanggal_mulai' => $this->input->post('mulainya'),
                            'tanggal_selesai' => $this->input->post('sewanya'),
                            'service' => $this->input->post('service'),
                            'pembayaran' => $this->input->post('metode'),
                            'harga' => $total_biaya,
                            'status' => 2,
                            'rate' => NULL,
                            'note' => NULL,
                            'id_url' => $md5view,
                            'dibuat' => date("Y-m-d"),
                        );
                        $this->Database->insert("riwayat", $sql);
                        redirect(base_url('invoice/' . $md5view));
                    }
                } else {
                    redirect(show_404());
                }
            } else {
                redirect(show_404());
            }
        endif;
    }
}
