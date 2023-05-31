<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    public function CekUser($username, $password)
    {
        return $this->db->table('tbl_user')
            ->where('username', $username)
            ->where('password', $password)
            ->get()->getRowArray();
    }
}
