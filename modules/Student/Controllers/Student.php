<?php

namespace Modules\Student\Controllers;

use App\Controllers\BaseController;
use Modules\Student\Models\StudentModel;

/**
 *
 */
class Student extends BaseController
{
  public function index()
  {
    $StudentModel = new StudentModel();
    $session = session();
    $item = $session->get();

    if ($item['role_id'] == 3) {
      $data['students'] = $StudentModel->getAllStd(@$item['user_id']);
    } else {
      $data['students'] = $StudentModel->getAllStd();
    }

    // echo '<pre>';
    // print_r($data);
    // die();
    return view('Modules\Student\Views\index.php', $data);
  }
  public function createStd($id = '')
  {
    // print_r($_SESSION);
    // die();
    $StudentModel = new StudentModel();
    $data['type_card'] = $StudentModel->getTypeCard();
    $data['provinces'] = $StudentModel->getProvince();
    $data['genders'] = $StudentModel->getGender();
    $data['religions'] = $StudentModel->getReligion();
    $data['bloods'] = $StudentModel->getBlood();
    $data['education_levels'] = $StudentModel->getEducationLevel();
    $data['departments'] = $StudentModel->getDepartment();
    $data['education_years'] = $StudentModel->getEducationYear();
    $data['education_rooms'] = $StudentModel->getEducationRoom();
    $data['prenames'] = $StudentModel->getPrename();
    $data['status_types'] = $StudentModel->getStatusType();
    $data['users'] = $StudentModel->getUserType2(3);
    if (!empty($id)) {
      $data['student'] = $StudentModel->getStudentById($id);
      $data['id'] = $id;
    }
    // echo '<pre>';
    // print_r($data);
    // die();
    return view('Modules\Student\Views\createStd.php', $data);
  }
  public function insetStd()
  {

    $session = session();
    $StudentModel = new StudentModel();
    $item = $session->get();
    // $input['users_id'] = $session['role_id'];
    $input = $this->request->getPost(); // $_POST
    // $input['username'] = 'std2';
    // $input['password'] = 'std2';
    $input['insert_by'] = $item['user_id'];
    $files = $this->request->getFiles(); // $_file
    if ($files['file1']->isValid()) {
      $randomName = $files['file1']->getRandomName();
      $data['fileName'] = $files['file1']->getName();
      $data['randomName'] = $randomName;
      $data['fileType'] = $files['file1']->getClientMimeType();
      $data['fileSize'] = $files['file1']->getSize();
      $files['file1']->move('public/files/imgStd', $randomName);
      $input['file1'] = $randomName;
    }
    $StudentModel->insetStd($input);
    return redirect()->to(base_url('/Student'));
  }
  public function getDistrict()
  {
    $input = $this->request->getPost();
    $StudentModel = new StudentModel();
    $result = $StudentModel->getDistrict($input['province_id']);
    return json_encode($result);
  }
  public function getSubdistrict()
  {
    $input = $this->request->getPost();
    $StudentModel = new StudentModel();
    $result = $StudentModel->getSubdistrict($input['subdistrict_id']);
    return json_encode($result);
  }

  public function StudentSubject()
  {
    $session = session();
    $StudentModel = new StudentModel();
    $item = $session->get();;
    $student_id = $item['user_id'];
    $data['year'] = $_GET['year'] != '' ? $_GET['year'] : date('Y');
    $data['student'] =  $StudentModel->getStudentByUserID($student_id);
    $data['student_subject'] = $StudentModel->getStudentSubject($student_id, 1, $data['year']);
    $data['student_subject2'] = $StudentModel->getStudentSubject($student_id, 2, $data['year']);
    $data['student_subject_old_1'] = $StudentModel->getStudentSubject_old($student_id, 1, $data['year']);
    $data['student_subject_old_2'] = $StudentModel->getStudentSubject_old($student_id, 2, $data['year']);

    return view('Modules\Student\Views\Student\ListStudentSubject.php', $data);
  }
  public function exportProfileStudent()
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

    $session = session();
    $StudentModel = new StudentModel();
    $item = $session->get();;
    $student_id = $_GET['user_id'] ? $_GET['user_id'] : $item['user_id'];
    $data['student'] =  $StudentModel->getStudentByUserID($student_id);
    $data['student_subject'] = $StudentModel->getStudentSubject($student_id, 1);
    $data['student_subject2'] = $StudentModel->getStudentSubject($student_id, 2);
    $data['student_subject_old_1'] = $StudentModel->getStudentSubject_old($student_id, 1, $data['year']);
    $data['student_subject_old_2'] = $StudentModel->getStudentSubject_old($student_id, 2, $data['year']);
    $html = view('Modules\Student\Views\exportPDF\FormPDF1.php', $data);
    $mpdf->WriteHTML($html);
    $mpdf->Output('pdf.pdf', 'I');
  }

  public function SubjectStudent()
  {
    $session = session();
    $StudentModel = new StudentModel();
    $item = $session->get();
    $user_id = $_GET['id'];
    $data['year'] = $_GET['year'] != '' ? $_GET['year'] : date('Y');
    // 
    $data['role_id'] = $item['role_id'];
    $data['student'] =  $StudentModel->getStudentByUserID($user_id);
    $data['student_subject'] = $StudentModel->getStudentSubject($user_id, 1, $data['year']);
    $data['student_subject2'] = $StudentModel->getStudentSubject($user_id, 2, $data['year']);
    $data['student_subject_old_1'] = $StudentModel->getStudentSubject_old($user_id, 1, $data['year']);
    $data['student_subject_old_2'] = $StudentModel->getStudentSubject_old($user_id, 2, $data['year']);
    $data['subject'] = $StudentModel->getSubject();
    $data['subject_old'] = $StudentModel->getSubject_old();

    // echo '<pre>';
    // print_r($student_id);
    // die();
    return view('Modules\Student\Views\SubjectStudent.php', $data);
  }
  public function insertSubject()
  {
    $session = session();
    $StudentModel = new StudentModel();
    $input = $this->request->getPost();
    $resutl =  $StudentModel->InsertSubject($input);
    if ($resutl == 0) {
      // $session->setFlashdata('msg', 'วิชาที่เลือกซ้ำ');
      return redirect()->to(base_url('Student/SubjectStudent?id=' . $input['users_id']));
    } else {
      return redirect()->to(base_url('Student/SubjectStudent?id=' . $input['users_id']));
    }
  }
  public function InsertSubject_old()
  {
    $session = session();
    $StudentModel = new StudentModel();
    $input = $this->request->getPost();
    $resutl =  $StudentModel->InsertSubject_old($input);

    if ($resutl == 0) {
      // $session->setFlashdata('msg', 'วิชาที่เลือกซ้ำ');
      return redirect()->to(base_url('Student/SubjectStudent?id=' . $input['users_id']));
    } else {
      return redirect()->to(base_url('Student/SubjectStudent?id=' . $input['users_id']));
    }
  }

  public function DeleteSubject()
  {
    $session = session();
    $StudentModel = new StudentModel();
    $input = $this->request->getPost();
    $StudentModel->DeleteSubject($input);
    // return redirect()->to(base_url('Student/SubjectStudent?id=' . $input['users_id']));
  }
  public function DeleteStudent()
  {
    $session = session();
    $StudentModel = new StudentModel();
    $input = $this->request->getPost();
    $StudentModel->DeleteStudent($input);
    // return redirect()->to(base_url('Student/SubjectStudent?id=' . $input['users_id']));
  }
  public function updateStatusPlanStudentOld()
  {
    $StudentModel = new StudentModel();
    $input = $this->request->getPost();
    $StudentModel->UpdateStatusPlanOld($input);
    // return redirect()->to(base_url('Student/SubjectStudent?id=' . $input['users_id']));
  }
}
