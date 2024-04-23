<?php

namespace Modules\Auth\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    public function CheckLogin($input = '')
    {
        $table = $this->db->table('user');
        $table->select('*');
        $table->where('user', $input['user']);
        $table->where('pass', $input['pass']);
        $data = $table->get()->getRowArray();
        return $data;
    }
}
