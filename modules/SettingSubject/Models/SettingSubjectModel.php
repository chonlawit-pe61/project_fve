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
        $builder->select('*  ,subjects.id as id_subject ');
        $builder->join('users', 'users.id = subjects.teacher_id', 'left');
        $builder->join('prename', 'prename.prename_id = users.prename_id', 'left');
        $data = $builder->get()->getResultArray();

        return $data;
    }

    public function getPlanEducation($id = '')
    {
        $builder =  $this->db->table('plan_education');
        $builder->select('*');
        if (!empty($id)) {
            $builder->where('plan_education_id', $id);
            $data = $builder->get()->getRowArray();
        } else {
            $data = $builder->get()->getResultArray();
        }
        return $data;
    }
    public function getPlanSubjects($id = '')
    {
        $builder =  $this->db->table('plan_subjects');
        $builder->select('* , subjects.id as id_subject');
        if (!empty($id)) {
            $builder->where('plan_education_id', $id);
            $builder->join('subjects', 'subjects.id = plan_subjects.subjects_id', 'left');
            $builder->join('users', 'users.id = subjects.teacher_id', 'left');
            $builder->join('prename', 'prename.prename_id = users.prename_id', 'left');
        }
        $data = $builder->get()->getResultArray();
        // 
        // ech
        return $data;
    }

    public function getSubjectsForTB($input)
    {
        $builder = $this->db->table('subjects');
        $builder->select('*,subjects.id as id_subject');
        $builder->join('users', 'users.id = subjects.teacher_id', 'left');
        $builder->join('prename', 'prename.prename_id = users.prename_id', 'left');
        $builder->whereIn('subjects.id', $input['subject']);
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function CreateUpdateSettingSubject($input)
    {

        $builder = $this->db->table('plan_education');
        $builder->set('plan_education_name', $input['plan_education_name']);
        if (!empty($input['plan_education_id'])) {
            $builder->where('plan_education_id', $input['plan_education_id']);
            $builder->update();
            $id = $input['plan_education_id'];
        } else {
            $builder->insert();
            $id = $this->db->insertID();
        }
        $builderSubject = $this->db->table('plan_subjects');
        if (!empty($input['subject_id'])) {
            $builderSubject->where('plan_education_id', $id);
            $builderSubject->delete();
            foreach ($input['subject_id'] as $row) {
                $builderSubject->set('plan_education_id', $id);
                $builderSubject->set('subjects_id', $row);
                $builderSubject->insert();
            }
        }
    }
    public function RemoveSubject($input)
    {
        $builder = $this->db->table('plan_subjects');
        $builder->where('plan_subjects_id', $input['subject_id']);
        $builder->delete();
    }
}
