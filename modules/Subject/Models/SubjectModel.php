<?php

namespace Modules\Subject\Models;

use CodeIgniter\HTTP\Response;
use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getSubject($id = '')
    {
        $builder = $this->db->table('subjects');
        $builder->select('*');
        if ($id) {
            $data = $builder->get()->getRowArray();
        } else {
            $builder->where('is_active', 1);
            $data = $builder->get()->getResultArray();
        }
        return $data;
    }

    function saveSubject($input)
    {
        $builder = $this->db->table('subjects');

        $builder->set('group_id', $input['group_id']);
        $builder->set('name', $input['name']);
        $builder->set('subjects_id', $input['subjects_id']);
        $builder->set('lecture_unit', $input['lecture_unit']);
        $builder->set('teacher_id', $input['teacher_id']);
        $builder->set('practical_unit', $input['practical_unit']);
        $builder->set('unit', $input['unit']);
        $builder->set('hour', $input['hour']);
        $builder->set('created_by', 1);

        if (!empty($input['id'])) {
            $builder->where('id', $input['id']);
            $builder->update();
        } else {
            $builder->insert();
        }
        $res = [
            'status' => 200,
            'msg' => 'Successfully'
        ];

        return json_encode($res);
    }

    function deleteSubject($id)
    {
        $builder = $this->db->table('subjects');
        $builder->set('is_active', 0);
        $builder->update();

        $res = [
            'status' => 200,
            'msg' => '  Successfully'
        ];
        return $res;
    }

    function getTeacherListAll()
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('role_id != 3');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    // Master Data
    function getSubjectGroup()
    {
        $builder = $this->db->table('subject_group');
        $data = $builder->select('*')->where('is_active', 1)->get()->getResultArray();
        return $data;
    }
}
