<?php

namespace Modules\Student\Models;

use CodeIgniter\Model;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class StudentModel extends Model
{
    protected $table      = "";
    protected $primaryKey = "";
    protected $allowedFields = [];

    public function getAllStd($input = '')
    {
        $table = $this->db->table('student');
        $table->select(' *,
        department.department_name,
        education_year.education_year_name,
        education_room.education_room_name,
        (
        SELECT
           prename.prename_name
        FROM
           prename
        WHERE
           prename.prename_id = student.student_teacher_prename
        ) as prename_student_teacher');
        $table->join('department', 'department.department_id = student.student_department', 'left');
        $table->join('education_year', 'education_year.education_year_id = student.student_level', 'left');
        $table->join('education_room', 'education_room.education_room_id = student.student_room', 'left');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function getTypepeople()
    {
        $table = $this->db->table('typepeople');
        $table->select('*');
        $data = $table->get()->getResultArray();
        // echo $this->db->getLastQuery();
        // die();
        return $data;
    }
    public function insetStd($input = '')
    {
        // e
        // $table = $this->db->table('std');
        $builder = $this->db->table('users');
        $builder->set('username', $input['username']);
        $builder->set('password', password_hash($input['password'], PASSWORD_DEFAULT));
        $builder->set('firstname', $input['thainamestd']);
        $builder->set('lastname', $input['thailaststd']);
        $builder->set('department_id', $input['department']);
        $builder->set('created_at', date('Y-m-d H:i:s'));
        $builder->set('created_by', $input['insert_by']);
        $builder->set('updated_at', date('Y-m-d H:i:s'));
        $builder->set('updated_by', $input['insert_by']);
        $builder->set('role_id', 3);
        if (!empty($input['id_users'])) {
            $builder->update();
            $id = $input['id_users'];
        } else {
            $builder->insert();
            $id = $this->db->insertID();
        }
        // echo '<pre>';
        // print_r($input);
        // echo $id;
        // die();

        $builderStd = $this->db->table('student');
        $builderStd->set('users_id', $id);
        $builderStd->set('student_id_card', $input['numberpeople']);
        $builderStd->set('student_type_card', $input['type_card_id']);
        $builderStd->set('student_name_th', $input['thainamestd']);
        $builderStd->set('student_lname_th', $input['thailaststd']);
        $builderStd->set('student_name_en', $input['engnamestd']);
        $builderStd->set('student_lname_en', $input['englaststd']);
        $builderStd->set('student_nickname', $input['nicknamestd']);
        $builderStd->set('student_address', $input['housenumber']);
        $builderStd->set('student_moo', $input['village']);
        $builderStd->set('student_province', $input['province']);
        $builderStd->set('student_district', $input['district']);
        $builderStd->set('student_subdistrict', $input['subdistrictstd']);
        $builderStd->set('student_gender', $input['gender']);
        $builderStd->set('student_religion', $input['religion']);
        $builderStd->set('student_ability', $input['special_ability']);
        $builderStd->set('student_weight', $input['weight_kg']);
        $builderStd->set('student_height', $input['height_cm']);
        $builderStd->set('student_blood', $input['blood_type']);
        $builderStd->set('student_defect', $input['scar']);
        $builderStd->set('student_congenital_disease', $input['chronic_disease']);
        $builderStd->set('student_phone', $input['student_phone_number']);
        $builderStd->set('student_original_educational', $input['schoolName']);
        $builderStd->set('student_graduated_level', $input['level']);
        $builderStd->set('student_department', $input['department']);
        $builderStd->set('student_room', $input['classroom']);
        $builderStd->set('student_teacher_prename', $input['teacherTitle']);
        $builderStd->set('student_teacher_name', $input['teacherName']);
        $builderStd->set('student_img', $input['file1']);
        $builderStd->set('student_father_name', $input['fnamefather']);
        $builderStd->set('student_father_lname', $input['lnamefather']);
        $builderStd->set('student_father_id_card', $input['numberpeoplefather']);
        $builderStd->set('student_father_type_card', $input['typepeoplefather']);

        $builderStd->set('student_father_status', $input['father_status']);
        $builderStd->set('student_father_job', $input['father_occupation']);
        $builderStd->set('student_father_disability', $input['father_disability_type']);
        $builderStd->set('student_mather_name', $input['fnamemother']);
        $builderStd->set('student_mather_lname', $input['lnamemother']);
        $builderStd->set('student_mather_id_card', $input['numberpeoplemother']);
        $builderStd->set('student_mather_type_card', $input['typepeoplemother']);
        $builderStd->set('student_mather_status', $input['mother_status']);
        $builderStd->set('student_mather_job', $input['mother_occupation']);
        $builderStd->set('student_mather_disability', $input['mother_disability_type']);
        $builderStd->set('student_fa_ma_marita_status', $input['isMarried']);
        $builderStd->set('student_guardian_name', $input['firstnameguardian']);
        $builderStd->set('student_guardian_lname', $input['lastnameguardian']);
        $builderStd->set('student_guardian_id_card', $input['firstnameguardian']);
        $builderStd->set('student_guardian_type_card', $input['firstnameguardian']);
        $builderStd->set('student_guardian_relationship', $input['firstnameguardian']);
        $builderStd->set('student_guardian_job', $input['firstnameguardian']);
        $builderStd->set('student_guardian_address', $input['firstnameguardian']);
        $builderStd->set('student_guardian_moo', $input['firstnameguardian']);
        $builderStd->set('student_guardian_province', $input['firstnameguardian']);
        $builderStd->set('student_guardian_district', $input['firstnameguardian']);
        $builderStd->set('student_guardian_subdistrict', $input['firstnameguardian']);
        $builderStd->set('student_guardian_phone', $input['firstnameguardian']);
        if (!empty($input['student_id'])) {
            $builderStd->set('update_at', date('Y-m-d H:i:s'));
            $builderStd->where('student_id', $input['student_id']);
            $builderStd->update();
        } else {
            $builderStd->set('create_at', date('Y-m-d H:i:s'));
            $builderStd->set('update_at', date('Y-m-d H:i:s'));
            $builderStd->insert();
        }
    }

    public function getTypeCard()
    {
        $builder = $this->db->table('type_card');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function getProvince()
    {
        $builder = $this->db->table('province');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function getGender()
    {
        $builder = $this->db->table('gender');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function getReligion()
    {
        $builder = $this->db->table('religion');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function getBlood()
    {
        $builder = $this->db->table('blood');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function getEducationLevel()
    {
        $builder = $this->db->table('education_level');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function getEducationYear()
    {
        $builder = $this->db->table('education_year');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function getStatusType()
    {
        $builder = $this->db->table('status_type');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }


    public function getPrename()
    {
        $builder = $this->db->table('prename');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function getEducationRoom()
    {
        $builder = $this->db->table('education_room');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function getDepartment()
    {
        $builder = $this->db->table('department');
        $builder->select('*');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function getDistrict($province_id)
    {
        $builder = $this->db->table('district');
        $builder->select('*');
        $builder->where('province_id', $province_id);
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function getSubdistrict($district_id)
    {
        $builder = $this->db->table('subdistrict');
        $builder->select('*');
        $builder->where('district_id', $district_id);
        $data = $builder->get()->getResultArray();
        return $data;
    }
}
