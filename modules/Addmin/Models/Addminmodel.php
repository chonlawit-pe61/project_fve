<?php

namespace Modules\Addmin\Models;

use CodeIgniter\Model;

class Addminmodel extends Model
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
    public function get_userlive()
    {
        $table = $this->db->table('userlive');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function createaddmin($input)
    
  {
    $table = $this->db->table('user');
    $table->set('firstname', $input['firstname']);
    $table->set('lastname', $input['lastname']);
    $table->set('user', $input['user']);
    $table->set('pass', $input['pass']);
    $table->set('statusstd', $input['statusstd']);
    $table->insert();
  }
}
