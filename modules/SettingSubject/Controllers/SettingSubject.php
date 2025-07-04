<?php

namespace Modules\SettingSubject\Controllers;

use App\Controllers\BaseController;
use Modules\SettingSubject\Models\SettingSubjectModel;
use Modules\Subject\Models\SubjectModel;
use Mpdf\Tag\Em;

/**
 *
 */
class SettingSubject extends BaseController
{
  public function SettingSubjectList()
  {
    $SettingSubjectModel = new SettingSubjectModel();
    $data['plan_education'] = $SettingSubjectModel->getPlanEducation();
    return view('Modules\SettingSubject\Views\SettingSubjectList.php', $data);
  }
  public function ManageSettingSubject($id = '')
  {
    $SettingSubjectModel = new SettingSubjectModel();
    $SubjectModel = new SubjectModel();
    $data['subjects'] = $SettingSubjectModel->getSubjects();
    $data['getTeacherListAll'] = $SubjectModel->getTeacherListAll();
    if (!empty($id)) {
      $data['id'] = $id;
      $data['plan_education'] = $SettingSubjectModel->getPlanEducation($id);
      $data['plan_subjects'] = $SettingSubjectModel->getPlanSubjects($id);
    }
    // echo '<pre>';
    // print_r($data);
    // die();

    return view('Modules\SettingSubject\Views\ManageSettingSubject.php', $data);
  }

  public function getSubjectToTable()
  {
    $input = $this->request->getPost();

    $SettingSubjectModel = new SettingSubjectModel();
    if (!empty($input)) {
      $data['subjects'] = $SettingSubjectModel->getSubjectsForTB($input);
      if (!empty($data['subjects'])) {
        return json_encode($data['subjects']);
      } else {
        return json_encode(1);
      }
    }
  }
  public function RemoveSubject()
  {
    $input = $this->request->getPost();
    $SettingSubjectModel = new SettingSubjectModel();
    $SettingSubjectModel->RemoveSubject($input);
    return json_encode(1);
  }
  public function RemovePlanEducation()
  {
    $input = $this->request->getPost();
    $SettingSubjectModel = new SettingSubjectModel();
    $SettingSubjectModel->RemovePlanEducation($input);
    return json_encode(1);
  }



  public function CreateUpdateSettingSubject()
  {
    $SettingSubjectModel = new SettingSubjectModel();
    $input = $this->request->getPost();
    // echo '<pre>';
    // print_r($input);
    // die();
    // echo 
    $SettingSubjectModel->CreateUpdateSettingSubject($input);
    return redirect()->to(base_url('/SettingSubject'));
  }
}
