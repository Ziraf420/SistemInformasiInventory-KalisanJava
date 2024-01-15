<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('Data_kopi');
        $this->load->library('form_validation');
        $this->load->library('session');

        $data['habis'] = $this->Data_kopi->countstock();
        $data['expired'] = $this->Data_kopi->countexp();
        $data['hampir_habis'] = $this->Data_kopi->hampir_habis();
        $data['hampir_exp'] = $this->Data_kopi->hampir_kadal();
        $this->load->view('templates/topbar', $data, true);
    }

    // PENJUALAN
    public function laporan_penjualan()
    {
        $data['title'] = 'Laporan Penjualan Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data["tahun"] = $this->Laporan_model->gettahun();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/laporan_penjualan', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_penjualan()
    {
        $data['title'] = 'Laporan Penjualan Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $data['sumJual'] = $this->Laporan_model->show_invoice('tb_penjualan')->result();
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $tahun2 = $this->input->post('tahun2');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['judul'] = "Laporan Penjualan Pertanggal";
            $data['datafilter'] = $this->Laporan_model->filterbytanggal($tanggalawal, $tanggalakhir);
            $data['subjudul'] = "Dari Tanggal : " . date('j F Y', strtotime($tanggalawal)) . '<br>Sampai tanggal : ' . date('j F Y', strtotime($tanggalakhir));

            $this->load->view('templates/header', $data);
            $this->load->view('user/cetak_laporan_penjualan', $data);
            $this->load->view('templates/footer');
        } else if ($nilaifilter == 2) {
            $data['judul'] = "Laporan Penjualan PerBulan";
            $data['datafilter'] = $this->Laporan_model->filterbybulan($tahun1, $bulanawal, $bulanakhir);
            $data['subjudul'] = "Dari Bulan : " . $bulanawal . '<br>Sampai Bulan : ' . $bulanakhir . '<br>Tahun: ' . $tahun1;

            $this->load->view('templates/header', $data);
            $this->load->view('user/cetak_laporan_penjualan', $data);
            $this->load->view('templates/footer');
        } else if ($nilaifilter == 3) {
            $data['judul'] = "Laporan Penjualan PerTahun";
            $data['datafilter'] = $this->Laporan_model->filterbytahun($tahun2);
            $data['subjudul'] = 'Tahun : ' . $tahun2;

            $this->load->view('templates/header', $data);
            $this->load->view('user/cetak_laporan_penjualan', $data);
            $this->load->view('templates/footer');
        }
    }

    // PEMBELIAN
    public function laporan_pembelian()
    {
        $data['title'] = 'Laporan Pembelian Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data["tahun"] = $this->Laporan_model->gettahun_beli();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/laporan_pembelian', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_pembelian()
    {
        $data['title'] = 'Laporan Pembelian Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $tahun2 = $this->input->post('tahun2');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['judul'] = "Laporan Pembelian Pertanggal";
            $data['datafilter'] = $this->Laporan_model->filterbytanggal_beli($tanggalawal, $tanggalakhir);
            $data['subjudul'] = "Dari Tanggal : " . date('j F Y', strtotime($tanggalawal)) . '<br>Sampai tanggal : ' . date('j F Y', strtotime($tanggalakhir));

            $this->load->view('templates/header', $data);
            $this->load->view('user/cetak_laporan_pembelian', $data);
            $this->load->view('templates/footer');
        } else if ($nilaifilter == 2) {
            $data['judul'] = "Laporan Pembelian PerBulan";
            $data['datafilter'] = $this->Laporan_model->filterbybulan_beli($tahun1, $bulanawal, $bulanakhir);
            $data['subjudul'] = "Dari Bulan : " . $bulanawal . '<br>Sampai Bulan : ' . $bulanakhir . '<br>Tahun: ' . $tahun1;

            $this->load->view('templates/header', $data);
            $this->load->view('user/cetak_laporan_pembelian', $data);
            $this->load->view('templates/footer');
        } else if ($nilaifilter == 3) {
            $data['judul'] = "Laporan Pembelian PerTahun";
            $data['datafilter'] = $this->Laporan_model->filterbytahun_beli($tahun2);
            $data['subjudul'] = 'Tahun : ' . $tahun2;

            $this->load->view('templates/header', $data);
            $this->load->view('user/cetak_laporan_pembelian', $data);
            $this->load->view('templates/footer');
        }
    }
}
