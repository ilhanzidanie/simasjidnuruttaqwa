<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class Login extends BaseController
{
    protected $ModelLogin;

    public function __construct()
    {
        $this->ModelLogin = new ModelLogin();
    }

    public function index()
    {
        $data = [
            'judul' => 'Login',
            'validation' => \Config\Services::validation(),
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Diisi !',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Diisi !',
                ]
            ],

        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $CekLogin = $this->ModelLogin->CekUser($username, $password);

            if ($CekLogin) {
                session()->set('username', $CekLogin['username']);
                session()->set('level', $CekLogin['level']);
                return redirect()->to(base_url('Admin'));
            } else {
                session()->setFlashdata('gagal', 'Email atau Password salah!!');
                return redirect()->to(base_url('Login'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Login'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function LogOut()
    {
        session()->remove('username');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Anda Berhasil Logout');
        return redirect()->to(base_url('Login'));
    }
}
