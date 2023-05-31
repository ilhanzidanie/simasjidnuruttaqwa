<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
    protected $ModelAdmin;
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => '',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'v_dashboard',
        ];
        return view('v_template_admin', $data);
    }

    public function Setting()
    {
        $url = 'https://api.myquran.com/v1/sholat/kota/semua';
        $kota = json_decode(file_get_contents($url), true);
        $data = [
            'judul' => 'Setting',
            'subjudul' => '',
            'menu' => 'setting',
            'submenu' => '',
            'page' => 'v_setting',
            'setting' => $this->ModelAdmin->ViewSetting(),
            'kota' => $kota,
        ];
        return view('v_template_admin', $data);
    }

    public function UpdateSetting()
    {
        $data = [
            'id' => 1,
            'nama_masjid' => $this->request->getPost('nama_masjid'),
            'id_kota' => $this->request->getPost('id_kota'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->ModelAdmin->UpdateSetting($data);
        session()->setFlashdata('pesan', 'Setting Berhasil Diubah');
        return redirect()->to(base_url('Admin/Setting'));
    }
}
