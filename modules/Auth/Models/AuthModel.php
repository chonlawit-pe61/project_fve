<?php

namespace Modules\Auth\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    public function CheckLogin($username)
    {
        $table = $this->db->table('users');
        $table->select('*');
        $table->where('username', $username);
        // $table->where('password', $password);
        $data = $table->get()->getRowArray();
        return $data;
    }
}
