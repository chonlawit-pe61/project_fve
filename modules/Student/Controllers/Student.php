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
    $data['students'] = $StudentModel->getAllStd();
    return view('Modules\Student\Views\index.php', $data);
  }
  public function createStd()
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
    // $data['special_ability'] = $StudentModel->special_ability();
    // $data['classroom'] = $StudentModel->classroom();
    // $data['department'] = $StudentModel->department();
    // $data['year'] = $StudentModel->year();
    // $data['teachertitle'] = $StudentModel->teachertitle();
    // $data['isparent'] = $StudentModel->isparent();
    // $data['ismarried'] = $StudentModel->ismarried();
    return view('Modules\Student\Views\createStd.php', $data);
  }
  public function insetStd()
  {

    $session = session();
    $StudentModel = new StudentModel();
    $item = $session->get();
    // $input['users_id'] = $session['role_id'];
    $input = $this->request->getPost(); // $_POST
    $input['username'] = 'std2';
    $input['password'] = 'std2';
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
    $session->setFlashdata('success', 'บันทึกข้อมูลสำเร็จ');
    $session->setFlashdata('error', 'บันทึกข้อมูลไม่สำเร็จ');
    $StudentModel->insetStd($input);
    return redirect()->to(base_url('/Student/create'));
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
}
