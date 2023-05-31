<?php

namespace App\Controllers;

use App\Models\ModelHome;
use App\Models\ModelAdmin;
use App\Models\Modelkontak;

class Home extends BaseController

{
    protected $ModelHome;
    protected $ModelAdmin;
    protected $ModelKontak;

    public function __construct()
    {
        $this->ModelHome = new ModelHome();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKontak = new ModelKontak();
    }

    public function index()
    {
        $setting = $this->ModelAdmin->ViewSetting();
        $url = 'https://api.myquran.com/v1/sholat/jadwal/' . $setting['id_kota'] . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '';
        $waktu = json_decode(file_get_contents($url), true);
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'waktu' => $waktu,
        ];
        return view('v_template', $data);
    }

    public function Agenda()
    {
        $data = [
            'judul' => 'Agenda',
            'page' => 'front-end/v_agenda',
            'agenda' => $this->ModelHome->Agenda(),
        ];
        return view('v_template', $data);
    }

    public function Sejarah()
    {
        $data = [
            'judul' => 'Sejarah',
            'page' => 'front-end/v_sejarah',
            'sejarah' => $this->ModelHome->Sejarah(),
        ];
        return view('v_template', $data);
    }

    public function Visimisi()
    {
        $data = [
            'judul' => 'Visi dan Misi',
            'page' => 'front-end/v_visimisi',
            'visimisi' => $this->ModelHome->Visimisi(),
        ];
        return view('v_template', $data);
    }

    public function Organisasi()
    {
        $data = [
            'judul' => 'Organisasi',
            'page' => 'front-end/v_organisasi',
            'organisasi' => $this->ModelHome->Organisasi(),
        ];
        return view('v_template', $data);
    }

    public function Sarana()
    {
        $data = [
            'judul' => 'Sarana',
            'page' => 'front-end/v_sarana',
            'sarana' => $this->ModelHome->Sarana(),
        ];
        return view('v_template', $data);
    }

    public function Kontak()
    {
        $this->ModelKontak = new ModelKontak();
        $data = [
            'judul' => 'Kontak',
            'subjudul' => '',
            'menu' => 'kontak',
            'submenu' => '',
            'page' => 'front-end/v_kontak',
            'kontak' => $this->ModelKontak->getKontak(),
        ];
        return view('v_template', $data);
    }

    public function SaveKontak()
    {
        $this->ModelHome = new ModelHome();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'pesan' => $this->request->getPost('pesan'),
        ];
        $this->ModelHome->SaveKontak($data);
        session()->setFlashdata('pesan', 'Pesan terkirim!!');
        return redirect()->to(base_url('Home/kontak'));
    }
}
