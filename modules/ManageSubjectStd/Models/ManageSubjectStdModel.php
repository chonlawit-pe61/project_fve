<?php

namespace Modules\ManageSubjectStd\Models;

use CodeIgniter\Model;

class ManageSubjectStdModel extends Model
{
  protected $table      = "";
  protected $primaryKey = "";
  protected $allowedFields = [];

  public function getListStudent($input = '',  $department = '', $id_card = '', $year = '', $room = '')
  {
    $builder = $this->db->table('student');
    $builder->select('student.*,
    users.*,
    plan_student.plan_student_term,
    plan_student.plan_student_year,
    plan_student.users_id as plan_student_id,
    plan_student.subjects_id,
    department.department_name');
    $builder->join('department', 'department.department_id = student.student_department', 'left');
    $builder->join('users', 'users.id = student.users_id', 'left');
    $builder->join('plan_student', 'plan_student.users_id = student.users_id', 'left');
    if (!empty($input['student_id'])) {
      $builder->where('student_id', $input['student_id']);
      $data = $builder->get()->getRowArray();
    } else {
      if (!empty($department)) {
        $builder->where('department.department_id', $department);
      }
      if (!empty($id_card)) {
        $builder->where("student.student_id_card =" . $id_card);
      }
      if (!empty($year)) {
        $builder->where("student.student_level =" . $year);
      }
      if (!empty($room)) {
        $builder->where("student.student_room =" . $room);
      }
      // $builder->where('plan_student.plan_student_id IS NULL');
      $builder->groupBy('student_id');
      $data = $builder->get()->getResultArray();
    }
    // ech
    // e
    return $data;
  }
  public function getDepartment($input = '')
  {
    $builder = $this->db->table('department');
    $builder->select('*');
    $data = $builder->get()->getResultArray();

    // echo $this->db->getLastQuery();
    // die();
    return $data;
  }

  public function getEducationYear()
  {
    $builder = $this->db->table('education_year');
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
  public function getPlanEducation()
  {
    $builder = $this->db->table('plan_education');
    $builder->select('*');
    $data = $builder->get()->getResultArray();
    return $data;
  }

  public function ManageSubjectStdList($input = array())
  {
   
    $builderSubject = $this->db->table('plan_subjects');
    $builderSubject->select('*');
    $builderSubject->where('plan_education_id', $input['plan_education_id']);
    $subject = $builderSubject->get()->getResultArray();
    $builder = $this->db->table('plan_student');
    if (!empty($input['id_student'])) {
      foreach ($input['id_student'] as $row) {
        $builder->where('users_id', $row);
        $builder->where('plan_student_year', $input['plan_student_year']);
        $builder->where('plan_student_term', $input['plan_student_term']);
        $builder->delete();
        foreach ($subject as $rowSub) {
          $builder->set('plan_student_term', $input['plan_student_term']);
          $builder->set('plan_student_year', $input['plan_student_year']);
          $builder->set('users_id', $row);
          $builder->set('subjects_id', $rowSub['subjects_id']);
          $builder->insert();
        }
      }
    }
  }
}
