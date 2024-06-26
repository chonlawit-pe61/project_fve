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
        $table->select('*,
        `department`.`department_name`,
        `education_year`.`education_year_name`,
        `education_room`.`education_room_name`,
        prename.prename_name as prename_teacher,
        users.firstname,
        users.lastname');
        $table->join('department', 'department.department_id = student.student_department', 'left');
        $table->join('education_year', 'education_year.education_year_id = student.student_level', 'left');
        $table->join('education_room', 'education_room.education_room_id = student.student_room', 'left');
        $table->join('users', 'users.id = student.student_teacher_id', 'left');
        $table->join('prename', 'prename.prename_id = users.prename_id', 'left');
        $data = $table->get()->getResultArray();
        // echo $this->db->getLastQuery();
        // die();
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
        // echo '<pre>';
        // print_r($input);
        // die();
        $builder = $this->db->table('users');
        $builder->set('username', $input['username']);
        if (!empty($input['password'])) {
            $builder->set('password', password_hash($input['password'], PASSWORD_DEFAULT));
        }
        $builder->set('prename_id', $input['prename']);
        $builder->set('firstname', $input['thainamestd']);
        $builder->set('lastname', $input['thailaststd']);
        $builder->set('department_id', $input['department']);
        $builder->set('created_at', date('Y-m-d H:i:s'));
        $builder->set('created_by', $input['insert_by']);
        $builder->set('updated_at', date('Y-m-d H:i:s'));
        $builder->set('updated_by', $input['insert_by']);
        $builder->set('role_id', 3);
        if (!empty($input['id_users'])) {
            $builder->where('id', $input['id_users']);
            $builder->update();
            $id = $input['id_users'];
        } else {
            $builder->insert();
            $id = $this->db->insertID();
        }
        echo '<pre>';
        print_r($input);
        // echo $id;
        die();

        $builderStd = $this->db->table('student');
        $builderStd->set('users_id', $id);
        $builderStd->set('student_id_card', $input['numberpeople']);
        $builderStd->set('student_type_card', $input['type_card_id']);
        $builderStd->set('student_name_th', $input['thainamestd']);
        $builderStd->set('student_lname_th', $input['thailaststd']);
        $builderStd->set('student_name_en', $input['engnamestd']);
        $builderStd->set('student_lname_en', $input['englaststd']);
        // $builderStd->set('student_nickname', $input['nicknamestd']);
        $builderStd->set('student_address', $input['housenumber']);
        $builderStd->set('student_moo', $input['village']);

        $builderStd->set('student_room', $input['student_room']);
        $builderStd->set('student_level', $input['student_level']);


        $builderStd->set('student_province', $input['province']);
        $builderStd->set('student_district', $input['district']);
        $builderStd->set('student_subdistrict', $input['subdistrictstd']);
        $builderStd->set('student_gender', $input['gender']);
        $builderStd->set('student_religion', $input['religion']);
        // $builderStd->set('student_ability', $input['special_ability']);
        // $builderStd->set('student_weight', $input['weight_kg']);
        // $builderStd->set('student_height', $input['height_cm']);
        $builderStd->set('student_blood', $input['blood_type']);
        $builderStd->set('student_defect', $input['scar']);
        $builderStd->set('student_congenital_disease', $input['chronic_disease']);
        $builderStd->set('student_phone', $input['student_phone_number']);
        $builderStd->set('student_original_educational', $input['schoolName']);
        $builderStd->set('student_graduated_level', $input['level']);
        $builderStd->set('student_department', $input['department']);
        // $builderStd->set('student_room', $input['classroom']);
        $builderStd->set('student_teacher_id', $input['teacherTitle']);
        if (!empty($input['file1'])) {
            $builderStd->set('student_img', $input['file1']);
        }
        $builderStd->set('student_guardian_name', $input['firstnameguardian']);
        $builderStd->set('student_guardian_lname', $input['lastnameguardian']);
        $builderStd->set('student_guardian_id_card', $input['numberpeopleguardian']);
        $builderStd->set('student_guardian_type_card', $input['typepeopleguardian']);
        $builderStd->set('student_guardian_relationship', $input['parentguardian']);
        $builderStd->set('student_guardian_job', $input['guardian_occupation']);
        $builderStd->set('student_guardian_address', $input['housenumberguardian']);
        $builderStd->set('student_guardian_moo', $input['villageguardian']);
        $builderStd->set('student_guardian_province', $input['provinceguardian']);
        $builderStd->set('student_guardian_district', $input['districtguardian']);
        $builderStd->set('student_guardian_subdistrict', $input['subdistrictguardian']);
        $builderStd->set('student_guardian_phone', $input['phoneguardian']);
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

    public function getUserType2($role_id = '')
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->where('role_id', $role_id);
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

    public function getStudentById($student_id = '')
    {
        $builder = $this->db->table('student');
        $builder->select('*,
        users.username,
        users.password');
        $builder->join('users', 'users.id = student.users_id', 'left');
        $builder->where('student_id', $student_id);
        $data = $builder->get()->getRowArray();

        return $data;
    }
    public function getStudentByUserID($student_id = '')
    {
        $builder = $this->db->table('student');
        $builder->select('*,
        users.username,
        users.password,
            (
        SELECT
            province.province_th
        FROM
            province
        WHERE
            province.id = student.student_province
        ) as std_province,
        (
        SELECT
            district.district_th
        FROM
            district
        WHERE
            district.id = student.student_district
        ) as std_district,
        (
        SELECT
            subdistrict.subdistrict_th
        FROM
            subdistrict
        WHERE
            subdistrict.id = student.student_subdistrict
        ) as std_subdistrict');
        $builder->join('users', 'users.id = student.users_id', 'left');
        $builder->where('users_id', $student_id);
        $data = $builder->get()->getRowArray();

        return $data;
    }
    public function getStudentSubject($student_id = '', $term = '')
    {
        $builder = $this->db->table('plan_student');
        $builder->select('plan_student.*,
        subjects.*');
        $builder->join('subjects', 'subjects.id = plan_student.subjects_id', 'left');
        $builder->where('plan_student.plan_student_term', $term);
        $builder->where('plan_student.users_id', $student_id);
        $data = $builder->get()->getResultArray();
        return $data;
    }
}
