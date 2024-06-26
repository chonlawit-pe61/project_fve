<?php

namespace Modules\ManageSubjectStd\Controllers;

use App\Controllers\BaseController;
use Modules\Addmin\Models\Addminmodel;
use Modules\ManageSubjectStd\Models\ManageSubjectStdModel;
use Modules\Personel\Models\CommonModel;

/**
 *
 */
class ManageSubjectStd extends BaseController
{
  public function SubjectStdList()
  {
    $ManageSubjectStdModel = new ManageSubjectStdModel();
    $department = @$_GET['department'];
    $id_card = @$_GET['id_card'];
    // $data['department_get'] = $_GET['department'];
    $year = @$_GET['year'];
    $room = @$_GET['room'];
    $student_id = '';
    $data['listStudent'] = $ManageSubjectStdModel->getListStudent($student_id, $department, $id_card, $year, $room);
    $data['department'] = $ManageSubjectStdModel->getDepartment();
    $data['education_year'] = $ManageSubjectStdModel->getEducationYear();
    $data['education_room'] = $ManageSubjectStdModel->getEducationRoom();
    $data['plan_education'] = $ManageSubjectStdModel->getPlanEducation();

    return view('Modules\ManageSubjectStd\Views\ManageSubjectStdList.php', $data);
  }

  public function ManageSubjectStdList()
  {
    $input = $this->request->getPost();
    $ManageSubjectStdModel = new ManageSubjectStdModel();
    $ManageSubjectStdModel->ManageSubjectStdList($input);
    return redirect()->to(base_url('/ManageSubjectStd'));
  }
}
