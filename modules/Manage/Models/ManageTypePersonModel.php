<?php

namespace Modules\Manage\Models;

use CodeIgniter\Model;

class ManageTypePersonModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    public function getTypePerson()
    {
        $builder = $this->db->table('roles');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function ManageTypePerson($input)
    {
        $builder = $this->db->table('roles');
        $builder->set('name', $input['name']);
        if (!empty($input['id'])) {
            $builder->where('id', $input['id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    public function DeleteTypePerson($input)
    {
        $builder = $this->db->table('roles');
        $builder->where('id', $input['id']);
        $builder->delete();
    }
}
