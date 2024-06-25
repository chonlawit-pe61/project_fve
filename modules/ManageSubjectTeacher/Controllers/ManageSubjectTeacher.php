<?php

namespace Modules\ManageSubjectTeacher\Controllers;

use App\Controllers\BaseController;
use Modules\ManageSubjectTeacher\Models\ManageSubjectTeacherModel;

/**
 *
 */
class ManageSubjectTeacher extends BaseController
{
  public function ManageSubjectTeacherList()
  {
    $session = session();
    $item = $session->get();
    $ManageSubjectTeacherModel = new ManageSubjectTeacherModel();
    $data['subjects'] = $ManageSubjectTeacherModel->getSubject($item['user_id']);
    return view('Modules\ManageSubjectTeacher\Views\ManageSubjectTeacherList.php', $data);
  }
  public function ManageSubjectTeacherTerm()
  {
    $session = session();
    $item = $session->get();
    return view('Modules\ManageSubjectTeacher\Views\ManageSubjectTeacherTerm.php');
  }

  public function ManageSubjectTeacherSubject($id = '')
  {
    $session = session();
    $item = $session->get();
    $ManageSubjectTeacherModel = new ManageSubjectTeacherModel();
    $subject_id = $_GET['id'];
    $term = $_GET['term'];
    $data['student'] = $ManageSubjectTeacherModel->getStudentInSubject($subject_id, $term);
    return view('Modules\ManageSubjectTeacher\Views\ManageSubjectTeacherSubject.php', $data);
  }
  public function ManageGradeStudent()
  {
    $input = $this->request->getPost();
    $ManageSubjectTeacherModel = new ManageSubjectTeacherModel();
    $ManageSubjectTeacherModel->UpdateGradeStudent($input);
    return redirect()->to(base_url('/ManageSubjectTeacher/Subject/Term/ListStudent?id=' . $input['id'] . '&term='  . $input['term']));
  }
}
