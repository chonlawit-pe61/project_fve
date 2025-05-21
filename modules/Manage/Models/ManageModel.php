<?php

namespace Modules\Manage\Models;

use CodeIgniter\Model;

class ManageModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    public function getPrename()
    {
        $builder = $this->db->table('prename');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function ManagePrename($input)
    {
        $builder = $this->db->table('prename');
        $builder->set('prename_name', $input['prename']);
        if (!empty($input['prename_id'])) {
            $builder->where('prename_id', $input['prename_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    public function DeletePrename($input)
    {
        $builder = $this->db->table('prename');
        $builder->where('prename_id', $input['prename_id']);
        $builder->delete();
    }

    public function getSubjectCatagoryType()
    {
        $builder = $this->db->table('subject_catagory_type');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function ManageSubjectCatagoryType($input)
    {
        $builder = $this->db->table('subject_catagory_type');
        $builder->set('subject_catagory_name', $input['subject_catagory_name']);
        if (!empty($input['subject_catagory_id'])) {
            $builder->where('subject_catagory_id', $input['subject_catagory_id']);
            $builder->update();
        } else {
            $builder->insert();
        }
    }
    public function DeleteSubjectCatagoryType($input)
    {
        $builder = $this->db->table('subject_catagory_type');
        $builder->where('subject_catagory_id', $input['subject_catagory_id']);
        $builder->delete();
    }
}
