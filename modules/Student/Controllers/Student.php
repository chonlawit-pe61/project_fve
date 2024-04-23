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
    $data['std'] = $StudentModel->getAllStd();
    return view('Modules\Student\Views\index.php', $data);
  }
  public function createStd()
  {
    $StudentModel = new StudentModel();
    $data['typepeople'] = $StudentModel->getTypepeople();
    $data['provice'] = $StudentModel->provice();
    $data['distic'] = $StudentModel->distic();
    $data['Subdistic'] = $StudentModel->Subdistic();
    $data['level'] = $StudentModel->level();
    $data['typegender'] = $StudentModel->typegender();
    $data['religion'] = $StudentModel->religion();
    $data['special_ability'] = $StudentModel->special_ability();
    $data['classroom'] = $StudentModel->classroom();
    $data['department'] = $StudentModel->department();
    $data['year'] = $StudentModel->year();
    $data['teachertitle'] = $StudentModel->teachertitle();
    $data['isparent'] = $StudentModel->isparent();
    $data['ismarried'] = $StudentModel->ismarried();
    return view('Modules\Student\Views\createStd.php', $data);
  }
  public function insetStd()
  {
    $session = session();
    $StudentModel = new StudentModel();
    $input = $this->request->getPost();// $_POST
    $files = $this->request->getFiles();// $_file
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
}
