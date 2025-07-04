<?php

namespace Modules\ManageSubjectTeacher\Controllers;

use App\Controllers\BaseController;
use Modules\ManageSubjectTeacher\Models\ManageSubjectTeacherModel;
use Modules\Subject\Models\SubjectModel;

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
    // echo die();
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
    $subjectModel = new SubjectModel();
    $data['subject_id'] = @$_GET['id'];
    $data['term'] = $_GET['term'];
    $data['year'] = @$_GET['year'] != '' ? @$_GET['year'] : date('Y');
    $data['student'] = $ManageSubjectTeacherModel->getStudentInSubject($data['subject_id'], $data['term'], $data['year']);

    $data['subject'] = $ManageSubjectTeacherModel->getSubjectById(@$_GET['id']);
    $data['getTeacherListAll'] = $subjectModel->getTeacherListAll();
    $data['plan_student'] = $ManageSubjectTeacherModel->getPlan_student($data['subject_id'], $data['term'], $data['year']);
    // echo '<pre>';
    // print_r($data['plan_student']);
    // die();

    return view('Modules\ManageSubjectTeacher\Views\ManageSubjectTeacherSubject.php', $data);
  }
  public function ManageGradeStudent()
  {
    $session = session();
    $input = $this->request->getPost();
    $ManageSubjectTeacherModel = new ManageSubjectTeacherModel();
    $ManageSubjectTeacherModel->UpdateGradeStudent($input);
    $session->setFlashdata('msg', 'บันทึกข้อมูลสำเร็จ');
    return redirect()->to(base_url('/ManageSubjectTeacher/Subject/Term/ListStudent?id=' . $input['id'] . '&term='  . $input['term'] . '&year=' . $input['year']));
  }
  public function exportPDFStudent()
  {
    $session = session();
    $item = $session->get();
    ini_set("pcre.backtrack_limit", "5000000");
    $data['date_thai'] = $this->Date_thai;
    $mpdf = new \Mpdf\Mpdf([
      'default_font' => 'thsarabun',
      'default_font_size' => 13,
      'mode' => 'utf-8',
      'format' => 'A4',
      'margin_top' => 10,
      'margin_bottom' => 10,
      'margin_left' => 10,
      'margin_right' => 10,
      'margin_header' => 0, // 30mm not pixel
      'margin_footer' => 0, // 10mm
      'orientation' => 'P', // L แนวนอน P แนวตั้งง
    ]);
    $this->response->setHeader('Content-Type', 'application/pdf');

    $ManageSubjectTeacherModel = new ManageSubjectTeacherModel();

    $department = $ManageSubjectTeacherModel->getListDepartment();

    foreach ($department as $row) {
      $result = $ManageSubjectTeacherModel->getListStudents($_GET['subject_id_plan'], $_GET['term'], @$_GET['year'], $row['department_id']);
      if (!empty($result)) {
        $data['students'][$row['department_id']] =  $result;
        $data['students'][$row['department_id']]['department_name'] = $row['department_name'];
      }
    }


    foreach ($data['students'] as $department_id => $std) {
      foreach ($std as $key => $detail_std) {
        if (is_numeric($key) && is_array($detail_std)) {
          $data['students'][$department_id]['details'] = $ManageSubjectTeacherModel->getSubjectById($detail_std['subjects_id']);
          $data['students'][$department_id]['graduated_level'] = $ManageSubjectTeacherModel->getEducationLevel($detail_std['certificate_id']);
          $data['students'][$department_id]['std_level'] = $ManageSubjectTeacherModel->getYearStd($detail_std['student_graduated_level']);
        }
      }
    }


    // }



    // $data['students'] = $ManageSubjectTeacherModel->getListStudents($_GET['subject_id_plan'], $_GET['term'], @$_GET['year']);
    $data['subject'] = $ManageSubjectTeacherModel->getSubjectById($_GET['subject_id_plan']);
    $data['teacher'] = $ManageSubjectTeacherModel->getTeacherById($data['subject']['teacher_id']);
    $data['teacher_consider'] = $ManageSubjectTeacherModel->getTeacherById($_GET['consider']);
    $data['teacher_prename_consider'] = $ManageSubjectTeacherModel->getPrenameById($data['teacher_consider']['prename_id']);
    $data['plan_student'] = $ManageSubjectTeacherModel->getPlan_student($_GET['subject_id_plan'], $_GET['term'], @$_GET['year']);
    $data['teacher_org'] = $ManageSubjectTeacherModel->getDepartmentById($data['teacher']['department_id']);


    $data['teacher_consider2'] = $ManageSubjectTeacherModel->getTeacherById($_GET['consider_2']);
    $data['teacher_prename_consider2'] = $ManageSubjectTeacherModel->getPrenameById($data['teacher_consider2']['prename_id']);
    $data['teacher_consider3'] = $ManageSubjectTeacherModel->getTeacherById($_GET['consider_3']);
    $data['teacher_prename_consider3'] = $ManageSubjectTeacherModel->getPrenameById($data['teacher_consider3']['prename_id']);
    $data['teacher_consider4'] = $ManageSubjectTeacherModel->getTeacherById($_GET['consider_4']);
    $data['teacher_prename_consider4'] = $ManageSubjectTeacherModel->getPrenameById($data['teacher_consider4']['prename_id']);

    $html = view('Modules\ManageSubjectTeacher\Views\exportPDF\FormPDF1.php', $data);

    $mpdf->WriteHTML($html);
    $mpdf->Output('pdf.pdf', 'I');
  }
}
