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
  public function exportPDFStudent()
  {
    $session = session();
    $item = $session->get();
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
    $data['students'] = $ManageSubjectTeacherModel->getListStudents();
    $html = view('Modules\ManageSubjectTeacher\Views\exportPDF\FormPDF1.php', $data);
    $mpdf->WriteHTML($html);
    $mpdf->Output('pdf.pdf', 'I');
  }
}
