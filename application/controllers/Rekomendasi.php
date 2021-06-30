<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekomendasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Database');
    }

    public function mobil_terbaik()
    {
        $bintang_mobil = $this->Database->urut_secara("mobil", "DESC", "rating");
        $jumlah = array();
        foreach ($bintang_mobil as $mobil) {
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'id' => $mobil["id"],
            );
            $total = $this->Database->getData("riwayat", $con);
            array_push($jumlah, '"' . $mobil["id"] . '"=>"' . $total . '"');
        }
        asort($jumlah);
        return $jumlah;
    }
}
