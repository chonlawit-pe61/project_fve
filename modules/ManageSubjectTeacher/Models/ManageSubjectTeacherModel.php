<?php

namespace Modules\ManageSubjectTeacher\Models;

use CodeIgniter\Model;

class ManageSubjectTeacherModel extends Model
{
  protected $table      = "";
  protected $primaryKey = "";
  protected $allowedFields = [];

  public function getSubject($id = '')
  {
    $builder = $this->db->table('subjects');
    $builder->select('*');
    $builder->where('teacher_id', $id);
    $data = $builder->get()->getResultArray();
    return $data;
  }

  public function getListStudents()
  {
    $builder = $this->db->table('plan_student');
    $builder->select('*');
    $builder->join('student', 'student.users_id = plan_student.users_id', 'left');
    $builder->join('users', 'users.id = plan_student.users_id', 'left');
    $builder->join('prename', 'prename.prename_id = users.prename_id', 'left');
    $builder->join('department', 'department.department_id = student.student_department', 'left');
    $data = $builder->get()->getResultArray();
    // echo $this->db->getLastQuery();
    // die();
    return $data;
  }
  public function getSubjectById($id = '')
  {
    $builder = $this->db->table('subjects');
    $builder->select('*');
    $builder->where('id', $id);
    $data = $builder->get()->getRowArray();
    return $data;
  }
  public function getStudentInSubject($id = '', $term = '')
  {
    $builder = $this->db->table('plan_student');
    $builder->select('*');
    $builder->join('student', 'student.users_id = plan_student.users_id', 'left');
    $builder->join('department', 'department.department_id = student.student_department', 'left');
    $builder->where('plan_student.subjects_id', $id);
    $builder->where('plan_student.plan_student_term', $term);
    $builder->where('student.users_id IS NOT NULL');
    $builder->orderBy('student.student_department', 'desc');
    $data = $builder->get()->getResultArray();
    // echo $this->db->getLastQuery();
    // die();
    // 

    return $data;
  }
  public function UpdateGradeStudent($input)
  {
    $builder = $this->db->table('plan_student');
    if (!empty($input)) {
      foreach ($input['student'] as $key => $row) {
        $builder->set('grade_student', $row);
        $builder->where('plan_student_id', $key);
        $builder->update();
      }
    }
  }
}
