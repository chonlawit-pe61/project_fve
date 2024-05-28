<?php

namespace Modules\SettingSubject\Models;

use CodeIgniter\Model;

class SettingSubjectModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    public function getSubjects($input = '')
    {
        $builder = $this->db->table('subjects');
        $builder->select('*');
        $data = $builder->get()->getResultArray();

        return $data;
    }

    public function getSubjectsForTB($input = '')
    {
        $builder = $this->db->table('subjects');
        $builder->select('*');
        $builder->whereIn('id', $input['subject']);
        $data = $builder->get()->getResultArray();
        return $data;
    }
}
