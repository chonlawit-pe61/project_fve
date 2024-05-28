<?php

namespace Modules\SettingSubject\Controllers;

use App\Controllers\BaseController;
use Modules\SettingSubject\Models\SettingSubjectModel;
use Mpdf\Tag\Em;

/**
 *
 */
class SettingSubject extends BaseController
{
  public function SettingSubjectList()
  {
    return view('Modules\SettingSubject\Views\SettingSubjectList.php');
  }
  public function ManageSettingSubject()
  {
    $SettingSubjectModel = new SettingSubjectModel();
    $data['subjects'] = $SettingSubjectModel->getSubjects();

    return view('Modules\SettingSubject\Views\ManageSettingSubject.php', $data);
  }

  public function getSubjectToTable()
  {
    $input = $this->request->getPost();

    $SettingSubjectModel = new SettingSubjectModel();
    if (!empty($input)) {
      $data['subjects'] = $SettingSubjectModel->getSubjectsForTB($input);
    }


    // echo '<pre>';
    // print_r($data);
    // die();
    return view('Modules\SettingSubject\Views\component\tbbody_subject.php', $data);
  }
}
