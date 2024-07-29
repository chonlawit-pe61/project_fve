<?php

namespace Modules\Subject_old\Models;

use CodeIgniter\HTTP\Response;
use CodeIgniter\Model;

class SubjectModel_old extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    function getSubject($id = '')
    {
        $builder = $this->db->table('subjects_old');
        $builder->select('subjects_old.*,subject_group.group_name');
        $builder->join('subject_group', 'subject_group.id = subjects_old.group_id', 'left');
        if ($id) {
            $builder->where('subjects_old.id', $id);
            $data = $builder->get()->getRowArray();
        } else {
            $builder->where('subjects_old.is_active', 1);
            $data = $builder->get()->getResultArray();
        }
        return $data;
    }

    function saveSubject($input)
    {
        $builder = $this->db->table('subjects_old');
        $builder->set('group_id', $input['group_id']);
        $builder->set('name', $input['name']);
        $builder->set('subjects_id', $input['subjects_id']);
        $builder->set('lecture_unit', $input['lecture_unit']);
        $builder->set('teacher_id', $input['teacher_id']);
        $builder->set('practical_unit', $input['practical_unit']);
        $builder->set('group_catagory', $input['group_catagory']);
        $builder->set('unit', $input['unit']);
        $builder->set('hour', $input['hour']);
        $builder->set('created_by', 1);
        $builder->set('comment', @$input['comment']);
        if (!empty($input['old_school'])) {
            if ($input['old_school'] > 0) {
                $builder->set('old_school', @$input['old_school']);
            }
        }



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
        $builder = $this->db->table('subjects_old');
        $builder->set('is_active', 0);
        $builder->where('id', $id);
        $builder->update();
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
    function getSubject_catagory()
    {
        $builder = $this->db->table('subject_catagory_type');
        $data = $builder->select('*')->get()->getResultArray();
        return $data;
    }
}
