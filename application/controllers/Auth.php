<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');    
    }

    // method login 
    public function index()
    {
        // kunci akses auth ketika sdh login
        if ($this->session->userdata('email')){
            redirect('user');
        }

        // verifikasi login
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
            'required' => 'Email harus diisi',
            'valid_email' => 'Email tidak Valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim',[
            'required' => 'Password harus diisi'
        ]);

        // skema login gagal
        if ( $this->form_validation->run() == false ){
            $data ['title'] = 'Halaman Masuk';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
        // skema login berhasil
        $this->_login();
        }

    }

    // private method login berhasil
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email]) -> row_array();
        // verifikasi user 
        if($user ) {
            // jika email user active
            if($user['is_active'] == 1){   
                // cek password
                if (password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                }
                else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('auth');
                }
            }
            else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email sudah tidak aktif!</div>');
                redirect('auth');
            }

        } 
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email anda belum terdaftar!</div>');
            redirect('auth');
        }
    }


    // buat akun baru
    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim',[
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email ini sudah terdaftar',
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password harus diisi'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        // skema buat akun gagal
        if($this->form_validation->run() == false){
            $data['title'] = 'Buat Akun';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } 
        // skema buat akun berhasil
        else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, Akun anda telah terdaftar!</div>');
            redirect('auth');
        }
    }

    // method logout
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Telah Keluar Akun!</div>');
        redirect('auth');
    }

}