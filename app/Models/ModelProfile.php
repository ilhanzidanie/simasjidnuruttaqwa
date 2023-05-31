<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProfile extends Model
{

    protected $table = 'tbl_sejarah';
    protected $primaryKey = 'id_sejarah';
    protected $allowedFields = ['deskripsi_sejarah'];
    //SEJARAH
    public function getDataSejarah()
    {
        return $this->db->table('tbl_sejarah')
            ->get()->getResultArray();
    }

    //INSERT SEJARAH
    // public function InsertSejarah($data)
    // {
    //     $this->db->table('tbl_sejarah')->insert($data);
    // }

    public function UpdateSejarah($data)
    {
        $this->db->table('tbl_sejarah')
            ->where('id_sejarah', $data['id_sejarah'])
            ->update($data);
    }

    //DELETE SEJARAH
    // public function DeleteSejarah($data)
    // {
    //     $this->db->table('tbl_sejarah')
    //         ->where('id_sejarah', $data['id_sejarah'])
    //         ->delete($data);
    // }


    //VISI DAN MISI
    protected $tableVisiMisi = 'tbl_visimisi';
    protected $primaryKeyVisiMisi = 'id_visimisi';
    protected $allowedFieldsVisiMisi = ['deskripsi_visi', 'deskripsi_misi'];

    public function getDataVisiMisi()
    {
        return $this->db->table($this->tableVisiMisi)
            ->get()->getResultArray();
    }

    public function InsertVisiMisi($data)
    {
        $this->db->table($this->tableVisiMisi)->insert($data);
    }

    public function UpdateVisiMisi($id, $data)
    {
        $this->db->table($this->tableVisiMisi)
            ->where($this->primaryKeyVisiMisi, $id)
            ->update($data);
    }

    public function DeleteVisiMisi($id)
    {
        $this->db->table($this->tableVisiMisi)
            ->where($this->primaryKeyVisiMisi, $id)
            ->delete();
    }

    //ORGANISASI
    protected $tableOrganisasi = 'tbl_organisasi';
    protected $primaryKeyOrganisasi = 'id_organisasi';
    protected $allowedFieldsOrganisasi = ['nama', 'jabatan', 'foto', 'kontak'];

    public function getDataOrganisasi()
    {
        return $this->db->table($this->tableOrganisasi)
            ->get()->getResultArray();
    }

    public function InsertOrganisasi($data)
    {
        $this->db->table($this->tableOrganisasi)->insert($data);
    }

    public function UpdateOrganisasi($id, $data)
    {
        $this->db->table($this->tableOrganisasi)
            ->where($this->primaryKeyOrganisasi, $id)
            ->update($data);
    }

    public function DeleteOrganisasi($id)
    {
        $this->db->table($this->tableOrganisasi)
            ->where($this->primaryKeyOrganisasi, $id)
            ->delete();
    }

    //sarana
    protected $tableSarana = 'tbl_sarana';
    protected $primaryKeySarana = 'id_sarana';
    protected $allowedFieldsSarana = 'deskripsi';

    public function getDataSarana()
    {
        return $this->db->table($this->tableSarana)
            ->get()->getResultArray();
    }

    public function InsertSarana($data)
    {
        $this->db->table($this->tableSarana)->insert($data);
    }

    public function UpdateSarana($id, $data)
    {
        $this->db->table($this->tableSarana)
            ->where($this->primaryKeySarana, $id)
            ->update($data);
    }

    public function DeleteSarana($id)
    {
        $this->db->table($this->tableSarana)
            ->where($this->primaryKeySarana, $id)
            ->delete();
    }
}
