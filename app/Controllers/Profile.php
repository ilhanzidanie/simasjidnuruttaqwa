<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProfile;

class Profile extends BaseController
{
    protected $ModelProfile;


    public function __construct()
    {
        $this->ModelProfile = new ModelProfile();
    }

    public function index()
    {
        $data = [
            'judul' => 'Sejarah',
            'subjudul' => '',
            'menu' => 'profile',
            'submenu' => 'sejarah',
            'page' => 'v_sejarah',
            'sejarah' => $this->ModelProfile->getDataSejarah(),
        ];
        return view('v_template_admin', $data);
    }

    // CRUD SEJARAH
    //INSERT SEJARAH
    // public function InsertSejarah()
    // {
    //     $data = [
    //         'deskripsi_sejarah' => $this->request->getPost('deskripsi_sejarah'),
    //     ];
    //     $this->ModelProfile->InsertSejarah($data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
    //     return redirect()->to(base_url('Profile'));
    // }

    public function UpdateSejarah($id_sejarah)
    {
        $data = [
            'id_sejarah' => $id_sejarah,
            'deskripsi_sejarah' => nl2br($this->request->getPost('deskripsi_sejarah')),
        ];
        $this->ModelProfile->UpdateSejarah($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to(base_url('Profile'));
    }

    //DELETE SEJARAH
    // public function DeleteSejarah($id_sejarah)
    // {
    //     $data = [
    //         'id_sejarah' => $id_sejarah,
    //     ];
    //     $this->ModelProfile->DeleteSejarah($data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
    //     return redirect()->to(base_url('Profile'));
    // }

    public function visimisi()
    {
        $data = [
            'judul' => 'Visi dan Misi',
            'subjudul' => '',
            'menu' => 'profile',
            'submenu' => 'visimisi',
            'page' => 'v_visimisi',
            'visimisi' => $this->ModelProfile->getDataVisiMisi(),
        ];
        return view('v_template_admin', $data);
    }

    // CRUD VISI MISI
    // public function InsertVisiMisi()
    // {
    //     $data = [
    //         'deskripsi_visi' => nl2br($this->request->getPost('deskripsi_visi')),
    //         'deskripsi_misi' => nl2br($this->request->getPost('deskripsi_misi')),
    //     ];
    //     $this->ModelProfile->InsertVisiMisi($data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
    //     return redirect()->to(base_url('Profile/Visimisi'));
    // }

    public function UpdateVisiMisi($id_visimisi)
    {
        $data = [
            'id_visimisi' => $id_visimisi,
            'deskripsi_visi' => nl2br($this->request->getPost('deskripsi_visi')),
            'deskripsi_misi' => nl2br($this->request->getPost('deskripsi_misi')),
        ];
        $this->ModelProfile->UpdateVisiMisi($id_visimisi, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to(base_url('Profile/Visimisi'));
    }

    // public function DeleteVisiMisi($id_visimisi)
    // {
    //     $data = [
    //         'id_visimisi' => $id_visimisi,
    //     ];
    //     $this->ModelProfile->DeleteVisiMisi($data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
    //     return redirect()->to(base_url('Profile/Visimisi'));
    // }

    //CRUD ORGANISASI

    public function organisasi()
    {
        $data = [
            'judul' => 'Organisasi',
            'subjudul' => '',
            'menu' => 'profile',
            'submenu' => 'organisasi',
            'page' => 'v_organisasi',
            'organisasi' => $this->ModelProfile->getDataOrganisasi(),
        ];
        return view('v_template_admin', $data);
    }

    public function InsertOrganisasi()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'jabatan' => 'required',
            'kontak' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('pesan', $validation->listErrors());
            return redirect()->to(base_url('Profile/Organisasi'));
        }

        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move(ROOTPATH . 'public/uploads', $namaFoto);

        $data = [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'kontak' => $this->request->getPost('kontak'),
            'foto' => $namaFoto,
        ];

        $this->ModelProfile->insertOrganisasi($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('Profile/Organisasi'));
    }

    public function UpdateOrganisasi($id_organisasi)
    {
        $ModelProfile = new ModelProfile();
        $organisasi = $ModelProfile->getDataOrganisasi();

        // Cek apakah ada file gambar yang diupload
        $foto = $this->request->getFile('foto');
        if ($foto->getError() == 4) {
            $nama_file = $organisasi['foto'];
        } else {
            $newName = $foto->getRandomName();
            $foto->move(ROOTPATH . 'public/uploads', $newName);
            $nama_file = $newName; // Perbarui nilai variabel $nama_file
        }

        // Pindahkan file gambar yang diunggah
        $data = [
            'nama' => $this->request->getPost('nama'),
            'jabatan' => $this->request->getPost('jabatan'),
            'kontak' => $this->request->getPost('kontak'),
            'foto' => $nama_file,
        ];
        // Perbarui data ke database
        $ModelProfile->UpdateOrganisasi($id_organisasi, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to(base_url('Profile/Organisasi'));
    }
    public function DeleteOrganisasi($id_organisasi)
    {
        $organisasi = $this->ModelProfile->getDataOrganisasi();
        if (isset($organisasi['foto']) && $organisasi['foto'] !== '') {
            $fotoPath = ROOTPATH . 'public/uploads' . $organisasi['foto'];
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $data = [
            'id_organisasi' => $id_organisasi,
        ];
        $this->ModelProfile->DeleteOrganisasi($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Profile/Organisasi'));
    }


    public function sarana()
    {
        $data = [
            'judul' => 'Sarana dan Prasarana',
            'subjudul' => '',
            'menu' => 'profile',
            'submenu' => 'sarana',
            'page' => 'v_sarana',
            'sarana' => $this->ModelProfile->getDataSarana(),
        ];
        return view('v_template_admin', $data);
    }

    // CRUD VISI MISI
    // public function InsertSarana()
    // {
    //     $data = [
    //         'deskripsi' => $this->request->getPost('deskripsi'),
    //     ];
    //     $this->ModelProfile->InsertSarana($data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
    //     return redirect()->to(base_url('Profile/Sarana'));
    // }

    public function UpdateSarana($id_sarana)
    {
        $data = [
            'id_sarana' => $id_sarana,
            'deskripsi' => nl2br($this->request->getPost('deskripsi')),

        ];
        $this->ModelProfile->UpdateSarana($id_sarana, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to(base_url('Profile/Sarana'));
    }

    // public function DeleteSarana($id_sarana)
    // {
    //     $data = [
    //         'id_sarana' => $id_sarana,
    //     ];
    //     $this->ModelProfile->DeleteSarana($data);
    //     session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
    //     return redirect()->to(base_url('Profile/Sarana'));
    // }
}
