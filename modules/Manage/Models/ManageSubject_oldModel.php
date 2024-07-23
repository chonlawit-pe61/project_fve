<?php

namespace Modules\Manage\Models;

use CodeIgniter\Model;

class ManageSubjectModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    public function getSubject_old()
    {
        $builder = $this->db->table('subjects_oldSchool');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function ManageTypeSubject($input)
    {
        $builder = $this->db->table('subjects_oldSchool');
        $builder->set('group_name', $input['group_name']);
        $builder->set('group_code', $input['group_code']);
        if (!empty($input['id'])) {
            $builder->where('id', $input['id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    public function DeleteTypeSubject($input)
    {
        $builder = $this->db->table('subjects_oldSchool');
        $builder->where('id', $input['id']);
        $builder->delete();
    }
}
