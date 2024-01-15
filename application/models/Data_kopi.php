<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Data_kopi extends CI_Model
{
    // model ambil semua data table dari database
    public function getDataKopi($table)
    {
        return $this->db->get($table)->result();
    }

    // nampilin join antara tabel kopi dan tabel pemasok dan tabel kategori
    public function joinKopi()
    {
        $this->db->select("*");
        $this->db->from("tb_kopi");
        $this->db->join("tb_pemasok", "tb_pemasok.id_pemasok = tb_kopi.id_pemasok");
        $this->db->join("tb_kategori", "tb_kategori.id_kat = tb_kopi.id_kat");

        return $this->db->get()->result();
    }

    // method tambah kopi
    public function tambah_kopi()
    {

        $data = [
            'nama_kopi' => $this->input->post('nama_kopi', true),
            'penyimpanan' => $this->input->post('penyimpanan', true),
            'stok' => $this->input->post('stok', true),
            'id_kat' => $this->input->post('id_kat', true),
            'kedaluwarsa' => $this->input->post('kedaluwarsa', true),
            'h_jual' => $this->input->post('harga_jual', true),
            'h_beli' => $this->input->post('harga_beli', true),
            'id_pemasok' => $this->input->post('id_pemasok', true),


        ];

        $this->db->insert('tb_kopi', $data);
    }

    // method tambah kategori
    public function tambah_kategori()
    {

        $data = [
            'nama_kat' => $this->input->post('nama_kategori', true),
            'desk_kat' => $this->input->post('deskripsi', true),
        ];

        $this->db->insert('tb_kategori', $data);
    }

    // method tambah pemasok
    public function tambah_pemasok()
    {

        $data = [
            'nama_pemasok' => $this->input->post('nama_pemasok', true),
            'alamat_pemasok' => $this->input->post('alamat_pemasok', true),
            'telepon_pemasok' => $this->input->post('telepon_pemasok', true),
        ];

        $this->db->insert('tb_pemasok', $data);
    }


    // edit join kopi
    public function tampil_kopi($id_kopi)
    {
        $this->db->select("*");
        $this->db->from("tb_kopi");
        $this->db->join("tb_pemasok", "tb_pemasok.id_pemasok = tb_kopi.id_pemasok");
        $this->db->join("tb_kategori", "tb_kategori.id_kat = tb_kopi.id_kat");
        $this->db->where("tb_kopi.id_kopi = $id_kopi");
        return $this->db->get()->result();
    }

    // GET HIDDEN ID untuk ubah data
    public function getKopi($id_kopi)
    {
        return $this->db->get_where('tb_kopi', ['id_kopi' => $id_kopi])->row_array();
        // $query = $this->db->query("SELECT * FROM tb_kopi WHERE id_kopi = $id_kopi ORDER BY id_kopi ASC");
        // return $query->result();
    }
    public function getKategori($id_kat)
    {
        return $this->db->get_where('tb_kategori', ['id_kat' => $id_kat])->row_array();
    }
    public function getPemasok($id_pemasok)
    {
        return $this->db->get_where('tb_pemasok', ['id_pemasok' => $id_pemasok])->row_array();
    }

    // KEDALUWARSA DAN STOK

    // sudah kedaluwarsa
    public function expired()
    {
        return $this->db->query('SELECT * FROM tb_kopi JOIN tb_kategori ON tb_kategori.id_kat = tb_kopi.id_kat JOIN tb_pemasok ON tb_pemasok.id_pemasok = tb_kopi.id_pemasok WHERE kedaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 40 YEAR) AND NOW()');
    }

    // hampir kedaluwarsa
    public function almostexp()
    {
        return $this->db->query('SELECT * FROM tb_kopi JOIN tb_kategori ON tb_kategori.id_kat = tb_kopi.id_kat JOIN tb_pemasok ON tb_pemasok.id_pemasok = tb_kopi.id_pemasok WHERE kedaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 15 DAY)');
    }

    // Stok kopi hampir habis 
    public function almoststok()
    {
        return $this->db->query('SELECT * FROM tb_kopi JOIN tb_kategori ON tb_kategori.id_kat = tb_kopi.id_kat JOIN tb_pemasok ON tb_pemasok.id_pemasok = tb_kopi.id_pemasok WHERE stok BETWEEN 1 AND 9');
    }

    // stok kopi sudah habis 
    public function habis_stok()
    {
        return $this->db->query('SELECT * FROM tb_kopi JOIN tb_kategori ON tb_kategori.id_kat = tb_kopi.id_kat JOIN tb_pemasok ON tb_pemasok.id_pemasok = tb_kopi.id_pemasok WHERE stok BETWEEN 0 AND 0');
    }

    // hitung total kopi
    public function total_kopi()
    {
        $to =  $this->db->query('SELECT *, SUM(tb_kopi.stok) as sumkopi FROM tb_kopi');
        if ($to->num_rows() > 0) {
            foreach ($to->result() as $get) {
                return $get->sumkopi;
            }
        } else {
            return FALSE;
        }
    }

    // notif kadaluwarsa
    function countstock()
    {
        $cs =  $this->db->query('SELECT * FROM tb_kopi WHERE stok BETWEEN 0 AND 0');
        $habis = $cs->num_rows();
        return $habis;
    }

    function hampir_habis()
    {
        $cs =  $this->db->query('SELECT * FROM tb_kopi WHERE stok BETWEEN 1 AND 9');
        $hampirHabis = $cs->num_rows();
        return $hampirHabis;
    }

    function countexp()
    {
        $ce = $this->db->query('SELECT * FROM tb_kopi WHERE kedaluwarsa BETWEEN DATE_SUB(NOW(), INTERVAL 100 YEAR) AND NOW()');
        $expired = $ce->num_rows();
        return $expired;
    }

    function hampir_kadal()
    {
        $ce =  $this->db->query('SELECT * FROM tb_kopi WHERE kedaluwarsa BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 15 DAY)');
        $hampirKadal = $ce->num_rows();
        return $hampirKadal;
    }

    // total kategori
    public function total_kategori()
    {
        $tk =  $this->db->query('SELECT * FROM tb_kategori');
        $totKat = $tk->num_rows();
        return $totKat;
    }

    // total pemasok
    public function total_pemasok()
    {
        $tp =  $this->db->query('SELECT * FROM tb_pemasok');
        $sup = $tp->num_rows();
        return $sup;
    }

    // total pembelian
    // function total_beli(){       
    //    $q = "SELECT *, SUM(tb_pembelian.subtotal) as 'totalAll' FROM tb_pembelian ";

    //     $run_q = $this->db->query($q);

    //     if ($run_q->num_rows() > 0) {
    //         foreach ($run_q->result() as $get) {
    //             return $get->totalAll;
    //         }
    //     }
    //     else {
    //         return FALSE;
    //     }  
    // }

    // // total penjualan 
    // function total_jual(){       
    //    $q = "SELECT *, SUM(tb_penjualan.subtotal) as 'totalAll' FROM tb_penjualan";

    //     $run_q = $this->db->query($q);

    //     if ($run_q->num_rows() > 0) {
    //         foreach ($run_q->result() as $get) {
    //             return $get->totalAll;
    //         }
    //     }
    //     else {
    //         return FALSE;
    //     }  
    // }

    // JOIN TABEL

    // ambil kategori muncul di form kopi
    public function get_kategori()
    {
        $query = $this->db->query("SELECT * FROM tb_kategori ORDER BY id_kat ASC");
        return $query->result();
        // $data = array();
        // $query = $this->db->get('tb_kategori')->result_array();

        // if (is_array($query) && count($query) > 0) {
        //     foreach ($query as $row) {
        //         $data[$row['nama_kat']] = $row['nama_kat'];
        //     }
        // }
        // asort($data);
        // return $data;
    }

    function get_pemasok2()
    {
        $query = $this->db->query("SELECT * FROM tb_pemasok");

        return $query->result();
        // $data = array();
        // $query = $this->db->get('tb_pemasok')->result_array();

        // if (is_array($query) && count($query) > 0) {
        //     foreach ($query as $row) {
        //         $data[$row['nama_pemasok']] = $row['nama_pemasok'];
        //     }
        // }
        // asort($data);
        // return $data;
    }

    public function get_pemasok()
    {
        $query = $this->db->query("SELECT * FROM tb_pemasok ORDER BY id_pemasok ASC");
        return $query->result();
    }


    // edit data kopi biar bisa muncul pemasok kategori
    public function edit_data_kopi($table)
    {
        return $this->db->get($table)->result();
    }


    // WILAYAH MODEL EDIT DATA

    // method ubah kopi
    public function edit_kopi()
    {

        $data = [
            'nama_kopi' => $this->input->post('nama_kopi', true),
            'penyimpanan' => $this->input->post('penyimpanan', true),
            'stok' => $this->input->post('stok', true),
            'id_kat' => $this->input->post('id_kat', true),
            'kedaluwarsa' => $this->input->post('kedaluwarsa', true),
            'h_jual' => $this->input->post('h_jual', true),
            'h_beli' => $this->input->post('h_beli', true),
            'id_pemasok' => $this->input->post('id_pemasok', true),
        ];

        $this->db->where('id_kopi', $this->input->post('id_kopi'));
        $this->db->update('tb_kopi', $data);
    }

    // method ubah kategori
    public function edit_kat()
    {

        $data = [
            'nama_kat' => $this->input->post('nama_kategori', true),
            'desk_kat' => $this->input->post('deskripsi', true),
        ];

        $this->db->where('id_kat', $this->input->post('id_kat'));
        $this->db->update('tb_kategori', $data);
    }

    // method ubah pemasok
    public function edit_pemasok()
    {

        $data = [
            'nama_pemasok' => $this->input->post('nama_pemasok', true),
            'alamat_pemasok' => $this->input->post('alamat_pemasok', true),
            'telepon_pemasok' => $this->input->post('telepon_pemasok', true),
        ];

        $this->db->where('id_pemasok', $this->input->post('id_pemasok'));
        $this->db->update('tb_pemasok', $data);
    }


    // WILAYAH MODEL HAPUS DATA

    // hapus kopi
    public function hapus_kopi($id_kopi)
    {
        $this->db->delete('tb_kopi', ['id_kopi' => $id_kopi]);
    }

    // hapus kategori
    public function hapus_kat($id_kat)
    {
        $this->db->delete('tb_kategori', ['id_kat' => $id_kat]);
    }

    // hapus pemasok
    public function hapus_pmasok($id_pemasok)
    {
        $this->db->delete('tb_pemasok', ['id_pemasok' => $id_pemasok]);
    }

    // method hapus penjualan
    public function hapus_penjualan($id)
    {
        $this->db->where('id_jual', $id);
        $this->db->delete('tb_penjualan');
    }

    // method hapus penjualan
    public function hapus_pembelian($id)
    {
        $this->db->where('id_beli', $id);
        $this->db->delete('tb_penjualan');
    }

    // TRASAKSI
    function getmedbysupplier($id_pemasok)
    {
        $hasil = $this->db->query("SELECT * FROM tb_kopi  WHERE id_pemasok='$id_pemasok'");
        return $hasil->result();
    }

    // function get_product2($nama_kopi)
    // {
    //     $hasil = array();
    //     $hsl = $this->db->query("SELECT * FROM tb_kopi WHERE nama_kopi='$nama_kopi'");

    //     if ($hsl->num_rows() > 0) {
    //         foreach ($hsl->result() as $data) {
    //             $hasil = array(
    //                 'nama_kopi' => $data->nama_kopi,
    //                 'stok' => $data->stok,
    //                 'nama_kat' => $data->nama_kat,
    //                 'h_jual' => $data->h_jual,
    //                 'h_beli' => $data->h_beli,
    //             );
    //         }
    //     }
    //     return $hasil;
    // }

    function get_product($nama_kopi)
    {
        $hasil = array();
        $hsl = $this->db->query("SELECT * FROM tb_kopi JOIN tb_kategori ON tb_kategori.id_kat = tb_kopi.id_kat JOIN tb_pemasok ON tb_pemasok.id_pemasok = tb_kopi.id_pemasok WHERE nama_kopi='$nama_kopi'");

        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nama_kopi' => $data->nama_kopi,
                    'stok' => $data->stok,
                    'nama_kat' => $data->nama_kat,
                    'h_jual' => $data->h_jual,
                    'h_beli' => $data->h_beli,

                );
            }
        }
        return $hasil;
    }

    function get_product3($nama_kopi)
    {
        $hasil = array();
        $hsl = $this->db->query("SELECT * FROM tb_kopi JOIN tb_kategori ON tb_kategori.id_kat = tb_kopi.id_kat WHERE nama_kopi='$nama_kopi'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nama_kopi' => $data->nama_kopi,
                    'stok' => $data->stok,
                    'id_kat' => $data->id_kat,
                    'nama_kat' => $data->nama_kat,
                    'h_jual' => $data->h_jual,
                    'h_beli' => $data->h_beli,

                );
            }
        }
        return $hasil;
    }

    function get_medicine()
    {
        // $this->db->select("*");
        // $this->db->from("tb_kopi");
        // $this->db->join("tb_pemasok", "tb_pemasok.id_pemasok = tb_kopi.id_pemasok");
        // $this->db->join("tb_kategori", "tb_kategori.id_kat = tb_kopi.id_kat");
        // $this->db->order_by("tb_kopi.id_kopi", "ASC");
        // return $this->db->get()->result();

        $data = array();
        $query = $this->db->get('tb_kopi')->result_array();

        if (is_array($query) && count($query) > 0) {
            foreach ($query as $row) {
                $data[$row['nama_kopi']] = $row['nama_kopi'];
                // $data[$row['id_kopi']] = $row['id_kopi'];
            }
        }
        asort($data);
        return $data;
    }


    // TAMBAH PENJUALAN
    function tambah_penjualan()
    {

        $nama_pembeli = $this->input->post('nama_pembeli');
        $tgl_beli = date("Y-m-d", strtotime($this->input->post('tgl_beli')));
        $grandtotal = $this->input->post('grandtotal');
        $ref = generateRandomString();
        $nama_kopi = $this->input->post('nama_kopi');
        $h_jual = $this->input->post('h_jual');
        $banyak = $this->input->post('banyak');
        $subtotal = $this->input->post('subtotal');

        foreach ($nama_kopi as $key => $val) {

            $data[] = array(
                'nama_pembeli' => $nama_pembeli,
                'tgl_beli' => $tgl_beli,
                'grandtotal' => $grandtotal,
                'ref' => $ref,
                'nama_kopi' => $val,
                'h_jual' => $h_jual[$key],
                'banyak' => $banyak[$key],
                'subtotal' => $subtotal[$key],
            );

            $this->db->set('stok', 'stok-' . $banyak[$key], FALSE);
            $this->db->where('nama_kopi', $val);
            $updated = $this->db->update('tb_kopi');
        }

        $this->db->insert_batch('tb_penjualan', $data);
    }

    function tambah_pembelian()
    {

        $id_pemasok = $this->input->post('id_pemasok');
        $tgl_beli = date("Y-m-d", strtotime($this->input->post('tgl_beli')));
        $grandtotal = $this->input->post('grandtotal');
        $ref = generateRandomString();
        $nama_kopi = $this->input->post('nama_kopi');
        $h_beli = $this->input->post('h_beli');
        $banyak = $this->input->post('banyak');
        $subtotal = $this->input->post('subtotal');

        foreach ($nama_kopi as $key => $val) {

            $data[] = array(
                'id_pemasok' => $id_pemasok,
                'tgl_beli' => $tgl_beli,
                'grandtotal' => $grandtotal,
                'ref' => $ref,
                'nama_kopi' => $val,
                'h_beli' => $h_beli[$key],
                'banyak' => $banyak[$key],
                'subtotal' => $subtotal[$key],

            );

            $this->db->set('stok', 'stok+' . $banyak[$key], FALSE);
            $this->db->where('nama_kopi', $val);
            $updated = $this->db->update('tb_kopi');
        }

        $this->db->insert_batch('tb_pembelian', $data);
    }

    // LAPORAN
    public function get_laporan()
    {
        $q = "SELECT month.month_name as month, 
            SUM(tb_pembelian.subtotal) AS total1,
            SUM(tb_penjualan.subtotal) AS total2  
            FROM month 
            LEFT JOIN tb_pembelian ON month.month_num = MONTH(tb_pembelian.tgl_beli)
            AND YEAR(tb_pembelian.tgl_beli)= '2021'  
            LEFT JOIN tb_penjualan ON month.month_num = MONTH(tb_penjualan.tgl_beli)
            AND YEAR(tb_penjualan.tgl_beli)= '2021' 
            GROUP BY month.month_name ORDER BY month.month_num";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            return $run_q->result();
        } else {
            return FALSE;
        }
    }


    function count_totalbeli()
    {
        $q = "SELECT *, SUM(tb_pembelian.subtotal) as 'totalTrans' FROM tb_pembelian ";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            foreach ($run_q->result() as $get) {
                return $get->totalTrans;
            }
        } else {
            return FALSE;
        }
    }

    function count_totaljual()
    {
        $q = "SELECT *, SUM(tb_penjualan.subtotal) as 'totalTrans' FROM tb_penjualan";

        $run_q = $this->db->query($q);

        if ($run_q->num_rows() > 0) {
            foreach ($run_q->result() as $get) {
                return $get->totalTrans;
            }
        } else {
            return FALSE;
        }
    }

    function get_gabung($tahun_beli)
    {
        $query = $this->db->query("SELECT m.month_name as month, 
                i.total_inv, 
                p.total_pur
                FROM month m
                LEFT JOIN (SELECT MONTH(tgl_beli) as month, 
                            SUM(subtotal) as total_inv  
                            FROM tb_penjualan
                            WHERE YEAR(tgl_beli)= '$tahun_beli'
                            GROUP BY month) i  ON (m.month_num = i.month)    
                LEFT JOIN (SELECT MONTH(tgl_beli) as month, 
                            SUM(subtotal) as total_pur
                            FROM  tb_pembelian 
                            WHERE YEAR(tgl_beli)= '$tahun_beli'
                            GROUP BY month) p ON (m.month_num = p.month )
                            ORDER BY m.month_num");

        $hasil = array();

        foreach ($query->result_array() as $data) {
            $hasil[] = array(
                "month" => $data['month'],
                "total_inv" => $data['total_inv'],
                "total_pur" => $data['total_pur'],


            );
        }
        return $hasil;
    }

    // LAPORAN
    function get_total($tahun_beli)
    {
        $query = $this->db->query("SELECT *, (SELECT *, 
                            SUM(subtotal) as total_inv  
                            FROM tb_penjualan
                            WHERE YEAR(tgl_beli)= '2021'
                            )  
                LEFT JOIN (SELECT *, 
                            SUM(subtotal) as total_pur
                            FROM  tb_pembelian 
                            WHERE YEAR(tgl_beli)= '2021'
                            )  
                ");

        $hasil = array();

        foreach ($query->result_array() as $data) {
            $hasil[] = array(
                "month" => $data['month'],
                "total_inv" => $data['total_inv'],
                "total_pur" => $data['total_pur'],


            );
        }
        return $hasil;
    }

    // NOTA
    function show_data($where, $table)
    {
        $this->db->select('*');
        $this->db->select_sum('banyak');
        $run_q = $this->db->get_where($table, $where);
        return $run_q;
    }

    function show_data_beli($where, $table)
    {
        $this->db->select('*');
        $this->db->select_sum('banyak');
        $this->db->join("tb_pemasok", "tb_pemasok.id_pemasok = $table.id_pemasok");
        $run_q = $this->db->get_where($table, $where);
        return $run_q;
    }

    function show_invoice($where, $table)
    {
        $this->db->select('*');
        $run_q = $this->db->get_where($table, $where);
        return $run_q;
    }

    // FITUR PENGELOMPOKAN TRANSAKSI

    function penjualan()
    {
        $this->db->select('*');

        $this->db->select_sum('tb_penjualan.banyak');

        $this->db->group_by('ref');
        $this->db->order_by('tgl_beli', 'DESC');

        $run_q = $this->db->get('tb_penjualan');
        return $run_q;
    }

    function pembelian()
    {
        $this->db->select('*');

        $this->db->select_sum('tb_pembelian.banyak');
        $this->db->join("tb_pemasok", "tb_pemasok.id_pemasok = tb_pembelian.id_pemasok");

        $this->db->group_by('ref');
        $this->db->order_by('tgl_beli', 'DESC');

        $run_q = $this->db->get('tb_pembelian');
        return $run_q;
    }


    // LAPORAN MODEL BARU
    function laporan_penjualan()
    {
        $this->db->select('*');

        $this->db->select_sum('tb_penjualan.banyak');

        $this->db->group_by('ref');
        $this->db->order_by('tgl_beli', 'DESC');

        $run_q = $this->db->get('tb_penjualan');
        return $run_q;
    }
}
