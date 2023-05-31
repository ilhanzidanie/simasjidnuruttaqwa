<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUsers;

class Users extends BaseController
{
    protected $ModelUsers;

    public function __construct()
    {
        $this->ModelUsers = new ModelUsers();
    }
    public function index()
    {
        $data = [
            'judul' => 'Users',
            'subjudul' => '',
            'menu' => 'users',
            'submenu' => '',
            'page' => 'v_users',
            'users' => $this->ModelUsers->DataUsers(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertData()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        ];
        $this->ModelUsers->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('Users'));
    }

    public function UpdateData($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        ];
        $this->ModelUsers->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to(base_url('Users'));
    }

    public function DeleteData($id_user)
    {
        $data = [
            'id_user' => $id_user,

        ];
        $this->ModelUsers->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Users'));
    }
}
