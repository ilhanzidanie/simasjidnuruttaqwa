<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    public function Agenda()
    {
        return $this->db->table('tbl_agenda')
            ->where('month(tanggal)', date('m'))
            ->where('year(tanggal)', date('Y'))
            ->orderBy('tanggal', 'ASC')
            ->get()->getResultArray();
    }

    protected $table = 'tbl_sejarah';
    protected $primaryKey = 'id_sejarah';

    public function Sejarah()
    {
        return $this->findAll();
    }

    public function Visimisi()
    {
        // $db = \Config\Database::connect(); // Menghubungkan ke database

        $query = $this->db->table('tbl_visimisi')
            ->select('deskripsi_visi, deskripsi_misi')
            ->get()
            ->getResultArray();

        return $query;
    }

    public function Organisasi()
    {
        $query = $this->db->table('tbl_organisasi')
            ->select('nama, foto, jabatan, kontak')
            ->get();

        if ($query->getNumRows() > 0) {
            return $query->getResultArray();
        } else {
            return []; // Return an empty array if no records are found
        }
    }

    public function Sarana()
    {
        return $this->db->table('tbl_sarana')
            ->get()->getResultArray();
    }

    public function getKontak()
    {
        return $this->db->table('tbl_kontak')
            ->get()->getResultArray();
    }

    public function SaveKontak($data)
    {
        $this->db->table('tbl_kontak')->insert($data);
    }
}
