<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKontak extends Model
{
    public function getKontak()
    {
        return $this->db->table('tbl_kontak')
            ->get()->getResultArray();
    }
    public function DeleteKontak($id)
    {
        $this->db->table('tbl_kontak')
            ->where('id_kontak', $id)
            ->delete();
    }
}
