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
    $builder->where('old_school = 0');
    $data = $builder->get()->getResultArray();
    return $data;
  }

  public function getListStudents($subjects_id = '', $plan_student_term = '', $plan_student_year = '')
  {
    $builder = $this->db->table('plan_student');
    $builder->select('*');
    $builder->join('student', 'student.users_id = plan_student.users_id', 'left');
    $builder->join('users', 'users.id = plan_student.users_id', 'left');
    $builder->join('prename', 'prename.prename_id = users.prename_id', 'left');
    $builder->join('department', 'department.department_id = student.student_department', 'left');
    $builder->where('plan_student.subjects_id', $subjects_id);
    $builder->where('plan_student.plan_student_term', $plan_student_term);
    $builder->where('plan_student_year', $plan_student_year);
    $builder->where('users.is_active', 1);
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
  public function getPlan_student($subject_id = '', $term = '', $year = '')
  {
    $builder = $this->db->table('plan_student');
    $builder->select('*');
    $builder->where('subjects_id', $subject_id);
    $builder->where('plan_student_term', $term);
    $builder->where('plan_student_year', $year);
    $data = $builder->get()->getRowArray();
    return $data;
  }


  public function getPrenameById($id = '')
  {
    $builder = $this->db->table('prename');
    $builder->select('*');
    $builder->where('prename_id', $id);
    $data = $builder->get()->getRowArray();
    return $data;
  }
  public function getTeacherById($id = '')
  {
    $builder = $this->db->table('users');
    $builder->select('*');
    $builder->where('id', $id);
    $data = $builder->get()->getRowArray();
    return $data;
  }
  public function getDepartmentById($id = '')
  {
    $builder = $this->db->table('department');
    $builder->select('*');
    $builder->where('department_id', $id);
    $data = $builder->get()->getRowArray();
    return $data;
  }
  public function getStudentInSubject($id = '', $term = '', $year = '')
  {
    $builder = $this->db->table('plan_student');
    $builder->select('*');
    $builder->join('student', 'student.users_id = plan_student.users_id', 'left');
    $builder->join('department', 'department.department_id = student.student_department', 'left');
    $builder->where('plan_student.subjects_id', $id);
    $builder->where('plan_student.plan_student_term', $term);
    $builder->where('plan_student.plan_student_year', $year);
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
        $builder->set('affective', $row['affective']);
        $builder->set('work', $row['work']);
        $builder->set('max_affective', $input['max_affective']);
        $builder->set('max_work', $input['max_work']);
        $builder->set('max_test', $input['max_test']);
        $builder->set('max_midterm_exam', $input['max_midterm_exam']);
        $builder->set('max_final_exam', $input['max_final_exam']);
        $builder->set('test', $row['test']);
        $builder->set('midterm_exam', $row['midterm_exam']);
        $builder->set('final_exam', $row['final_exam']);
        $builder->where('plan_student_id', $key);
        $builder->update();
      }
    }
  }
}
