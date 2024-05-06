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
        $table = $this->db->table('std');
        $table->select('std.*,
        typepeople.*,
        department.*,
        level.*,
        classroom.*,
        (
        SELECT
            th_province.province_th
         FROM
            th_province
         WHERE
            th_province.id = std.province
        ) as std_province,
        (
        SELECT
            th_district.district_th
         FROM
            th_district
         WHERE
            th_district.province_id = std.district
        ) as std_district,
        (
        SELECT
            th_subdistrict.subdistrict_th
         FROM
            th_subdistrict
         WHERE
            th_subdistrict.district_id = std.subdistrict
        ) as std_subdistrict,
        (
            SELECT
                teachertitle.teacherTitle_name
             FROM
                teacherTitle
             WHERE
                teachertitle.teacherTitle_id = std.teacherTitle
            )as std_teacherTitle');
        $table->join('typepeople', 'typepeople.typepeople_id = std.typepeople', 'left');
        $table->join('department', 'department.department_id = std.department', 'left');
        $table->join('level', 'level.level_id = std.level', 'left');
        $table->join('classroom', 'classroom.classroom_id = std.classroom', 'left');
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
        $table = $this->db->table('std');
        $table->set('numberpeople', $input['numberpeople']);
        $table->set('typepeople', $input['typepeople']);
        $table->set('thainamestd', $input['thainamestd']);
        $table->set('thailaststd', $input['thailaststd']);
        $table->set('engnamestd', $input['engnamestd']);
        $table->set('englaststd', $input['englaststd']);
        $table->set('nicknamestd', $input['nicknamestd']);
        $table->set('housenumber', $input['housenumber']);
        $table->set('village', $input['village']);
        $table->set('province', $input['province']);
        $table->set('district', $input['district']);
        $table->set('subdistrict', $input['subdistrictstd']);
        $table->set('gender', $input['gender']);
        $table->set('religion', $input['religion']);
        $table->set('special_ability', $input['special_ability']);
        $table->set('weight_kg', $input['weight_kg']);
        $table->set('height_cm', $input['height_cm']);
        $table->set('blood_type', $input['blood_type']);
        $table->set('scar', $input['scar']);
        $table->set('chronic_disease', $input['chronic_disease']);
        $table->set('student_phone_number', $input['student_phone_number']);
        $table->set('schoolName', $input['schoolName']);
        $table->set('level', 1);
        $table->set('department', 1);
        $table->set('year', 1);
        $table->set('classroom', 1);
        $table->set('teacherTitle', 1);
        $table->set('teacherName', $input['teacherName']);
        $table->set('fnamefather', $input['fnamefather']);
        $table->set('lnamefather', $input['lnamefather']);
        $table->set('numberpeoplefather', $input['numberpeoplefather']);
        $table->set('typepeoplefather', $input['typepeoplefather']);
        $table->set('father_occupation', $input['father_occupation']);
        $table->set('father_disability_type', $input['father_disability_type']);
        $table->set('fnamemother', $input['fnamemother']);
        $table->set('lnamemother', $input['lnamemother']);
        $table->set('numberpeoplemother', $input['numberpeoplemother']);
        $table->set('typepeoplemother', $input['typepeoplemother']);
        $table->set('mother_status', $input['mother_status']);
        $table->set('mother_occupation', $input['mother_occupation']);
        $table->set('mother_disability_type', $input['mother_disability_type']);
        $table->set('isMarried', 1);
        $table->set('firstnameguardian', $input['firstnameguardian']);
        $table->set('lastnameguardian', $input['lastnameguardian']);
        $table->set('numberpeopleguardian', $input['numberpeopleguardian']);
        $table->set('typepeopleguardian', 1);
        $table->set('parentguardian', $input['parentguardian']);
        $table->set('guardian_occupation', $input['guardian_occupation']);
        $table->set('housenumberguardian', $input['housenumberguardian']);
        $table->set('villageguardian', $input['villageguardian']);
        $table->set('provinceguardian', $input['provinceguardian']);
        $table->set('subdistrictguardian', $input['subdistrictguardian']);
        $table->set('phoneguardian', $input['phoneguardian']);
        $table->set('img', $input['file1']);
        $table->insert();
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
        $builder->where('pronivce_id', $province_id);
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
