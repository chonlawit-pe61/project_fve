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
}
