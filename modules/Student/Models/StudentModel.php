<?php

namespace Modules\Student\Models;

use CodeIgniter\Model;

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

    public function provice()
    {
        $table = $this->db->table('th_province');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function distic()
    {
        $table = $this->db->table('th_district');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function Subdistic()
    {
        $table = $this->db->table('th_subdistrict');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function level()
    {
        $table = $this->db->table('level');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function typegender()
    {
        $table = $this->db->table('typegender');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function religion()
    {
        $table = $this->db->table('religion');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }

    public function special_ability()
    {
        $table = $this->db->table('special_ability');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }

    public function classroom()
    {
        $table = $this->db->table('classroom');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function teachertitle()
    {
        $table = $this->db->table('teachertitle');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function department()
    {
        $table = $this->db->table('department');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }

    public function year()
    {
        $table = $this->db->table('year');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function isparent()
    {
        $table = $this->db->table('isparent');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
    public function ismarried()
    {
        $table = $this->db->table('ismarried');
        $table->select('*');
        $data = $table->get()->getResultArray();
        return $data;
    }
}
