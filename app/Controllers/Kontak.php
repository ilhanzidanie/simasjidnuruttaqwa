<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKontak;

class Kontak extends BaseController
{
    protected $ModelKontak;
    public function __construct()
    {
        $this->ModelKontak = new ModelKontak();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kontak',
            'subjudul' => '',
            'menu' => 'kontak',
            'submenu' => '',
            'page' => 'v_kontak',
            'kontak' => $this->ModelKontak->getKontak(),
        ];
        return view('v_template_admin', $data);
    }
    public function DeleteKontak($id_kontak)
    {
        $data = [
            'id_kontak' => $id_kontak,

        ];
        $this->ModelKontak->DeleteKontak($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Kontak'));
    }
}
